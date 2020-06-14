
function search(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: 'http://localhost:8000/Reponsitory/public/backend/search',
        data: {
            like: $('#like').val(),
            skip: $('#skip').val(),
            take: $('#take').val(),
        },
        dataType: 'JSON',
        success: function(data) {
            Xuat(data);
        },
        error: function(){
            console.log('error');
        }
    });
}

//xuat
function Xuat(data) {
    var html = '';
    // html += '<td>' + '';
    // data = JSON.parse(data);
    // console.log(data);
    data.forEach(function(value){
        // html += '<tr> <td>' + value.guid + '</td> </tr>';
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
function page(option){
    var html = '<a type="button">&laquo;</a>';
    //<a href="#">1</a>
    var pages = option['pages'];
    var page = option['page'];
    for(var j =1; j<=pages ; j++){
        if(j == (page+1)){
            html += '<a id="page2" type="button" class="active">' + j +'</a>'
        }else{
            html += '<a id="page2" type="button">'+ j +'</a>'

        }
    }
    html += '<a type="button">&raquo;</a>';
    $('.pagination').html(html);
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
        success: function(data){
            console.log('oke');
            // hide model edit
            $('#modal-edit').modal('hide');
            Xuat(data);
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
        success: function(data){
            Xuat(data);
        },
        error: function(){
            console.log('error');
        }
    });
}

//delete
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
        success: function(data){
            console.log('oke');
            // $('#modal-edit').modal('hide');
            Xuat(data);
        },
        error: function(){ 
            console.log('error');
        }
    });
}
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
            take: 3,

        },
        dataType: 'text',
        success: function(result){
            result = JSON.parse(result);
            var data = result.data;
            Xuat(data);
            page(result.option);
            console.log(result.option['page']);
            
        },
        error: function(){
            console.log('error search2');
        }
    });
}

// select option onchange
function changeFunc() {
    var selectBox = document.getElementById("take2");
    var take = selectBox.options[selectBox.selectedIndex].value;
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
            page: $('.active').val(),
            take: take,

        },
        dataType: 'text',
        success: function(result){
            result = JSON.parse(result);
            // $('#edit-id').text('aasdf');
            // $('input[name=edit-id]').val('tai');
            // alert($('input[name=edit-id]').val());
            var data = result.data;
            Xuat(data);
            console.log(result);
            
        },
        error: function(){
            console.log('error search2');
        }
    });
}

$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: "http://localhost:8000/Reponsitory/public/backend/get-all",
        dataType: 'JSON',
        success: function(data){
            // $('#edit-id').text('aasdf');
            // $('input[name=edit-id]').val('tai');
            // alert($('input[name=edit-id]').val());
            Xuat(data);
            // alert(data);
            
        },
        error: function(){
            console.log('error');
        }
    });
});