$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: "http://localhost:8000/Reponsitory/public/backend/search2",
        data: {

        },
        dataType: 'JSON',
        success: function(result){
            // result = JSON.parse(result);
            var data = result.data;
            var option = result.option;
            Xuat(data);
            printPage(option);
            // alert(result.data);
            
        },
        error: function(){
            console.log('error');
        }
    });
});

//xuat
function Xuat(data) {
    var html = '';
    // data = JSON.parse(data);
    data.forEach(function(value){
        html += '<tr>';
            html += '<td>' + value.guid + '</td>';
            html += '<td id=name_'+ value.guid + '>' + value.name + '</td>';
            html += '<td>' + value.created_at + '</td>';
            html += '<td>';
                //html += '<button class="btn btn-primary edit" data-toggle="modal" data-target="#modal-edit' + value.guid + '" type="button"><i class="fas fa-edit"></i></button>';
                html += '<button class="btn btn-primary edit" ';
                html += 'onclick=edit(';
                    html += "'" + value.guid+ "'";
                html += ')';
                html += '  type="button"><i class="fas fa-edit"></i></button>  ';
                // html += '  <a href="/backend/delete/' + value.guid + '">';
                    html += '<button';
                    html += ' onclick=del(';
                        html += "'" + value.guid+ "'";
                    html += ')';
                    html += ' class="btn btn-danger delete" data-toggle="modal" data-target="" type="button"><i class="fas fa-trash-alt"></i></button>'
                // html += '</a>'
            html += '</td>';
        html += '</tr>';
        // console.log(value);
    });
    // console.log(data);
    $('#modal-add').modal('hide');

    $('#XuatData').html(html);
}

//paginate
function printPage(option){
    $('#page-max').val(option.pages);
    $('#span-count').text(option.count);
    //<a href="#">1</a>
    var pages = option['pages'];
    var page = option.page;
    $('.pagination').html('');
    if(pages > 1){
        var html = '<a type="button " ' + 'onclick=changePage(-1)' +'>&laquo;</a>';
        for(var j =1; j<=pages ; j++){
            if(j == page){
                html += '<a type="button " '+'onclick=changePage(' + j+ ')' + ' class="active">' + j +'</a>'
            }else{
                html += '<a type="button " ' + 'onclick=changePage(' + j + ')' + '>'+ j +'</a>';

            }
        }
        html += '<a type="button" ' + 'onclick=changePage(0)' +'>&raquo;</a>';
        $('.pagination').html(html);
    }else{
        $('.pagination').html('');
    }
    
}

//table-update
function edit(data){
    // console.log(data);
    // show modal edit
    $('#modal-edit').modal('show');
    $('input[name=id-edit]').val(data);
    var name = 'name_' + data;
    var nameEdit = $('#'+ name).text();
    $('input[name=name-edit]').val(nameEdit);

}

// action update
function update(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: "http://localhost:8000/Reponsitory/public/backend/update",
        data: {
            _id: $('input[name=id-edit]').val(),
            _name: $('input[name=name-edit]').val(),
        },
        dataType: 'JSON',
        success: function(result){
            $('#modal-edit').modal('hide');
            var data = result.data;
            var option = result.option;
            Xuat(data);
            printPage(option);
        },
        error: function(){
            console.log('error');
        }
    });
}

// add
function add(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: "http://localhost:8000/Reponsitory/public/backend/add",
        data: {
            _name: $('#add-name').val(),
            _password: $('#add-password').val(),
        },
        dataType: 'JSON',
        success: function(result){
            search2();
            // $('#modal-add').modal('hide');
            // var data = result.data;
            // var option = result.option;
            // Xuat(data);
            // printPage(option);
        },
        error: function(){
            console.log('error');
        }
    });
}

// del
function del(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: "http://localhost:8000/Reponsitory/public/backend/delete",
        data: {
            _id: id,
        },
        dataType: 'JSON',
        success: function(result){
            $('#modal-add').modal('hide');
            var data = result.data;
            var option = result.option;
            Xuat(data);
            printPage(option);
        },
        error: function(){ 
            console.log('error');
        }
    });
}

//search
function search2(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: "http://localhost:8000/Reponsitory/public/backend/search2",
        data: {
            key_search: $('#key-search2').val(),
            page: 0,
            take: 5,

        },
        dataType: 'text',
        success: function(result){
            result = JSON.parse(result);
            var data = result.data;
            Xuat(data);
            printPage(result.option);
            
        },
        error: function(){
            console.log('error search2');
        }
    });
}

// select option onchange
function changeFunc() {
    var selectBox = document.getElementById("take2");
    var take2 = selectBox.options[selectBox.selectedIndex].value;
    var page1 = $('.active').html();
    page1 = Number(page1);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: "http://localhost:8000/Reponsitory/public/backend/search2",
        data: {
            key_search: $('#key-search2').val(),
            page: page1,
            take: take2,

        },
        dataType: 'text',
        success: function(result){
            result = JSON.parse(result);
            var option = result.option;
            var data = result.data;
            Xuat(data);
            printPage(option);
            
        },
        error: function(){
            console.log('error search2');
        }
    });
}

// change page
function changePage(page1){
    // <0 giam
    var page3 = 0;
    var page2 = $('.active').html();
    page2 = Number(page2);
    var pageMax = $('#page-max').val();
    pageMax = Number(pageMax);
    if(page1 < 0){
        if(page2 == 1){
            page3 = pageMax;
        }else{
            page3 = page2 -1;
        }
        
    }
    // bang 0 -> tang
    if(page1 == 0){
        if(page2 == pageMax){
            page3 == 1
        }else{
            page3 = page2 +1;
        }
        
    }
    
    // bang khong chinh la page1
    if(page1 > 0){
        page3 = page1;
    }
    var selectBox = document.getElementById("take2");
    var take2 = selectBox.options[selectBox.selectedIndex].value;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: "http://localhost:8000/Reponsitory/public/backend/search2",
        data: {
            key_search: $('#key-search2').val(),
            page: page3,
            take: take2,

        },
        dataType: 'text',
        success: function(result){
            result = JSON.parse(result);
            var data = result.data;
            Xuat(data);
            printPage(result.option);
            // console.log(result.option['page']);
            
        },
        error: function(){
            console.log('error search2');
        }
    });
}
