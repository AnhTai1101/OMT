
function search(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: 'http://127.0.0.1:8000/backend/search',
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
    console.log(data);
    data.forEach(function(value){
        // html += '<tr> <td>' + value.guid + '</td> </tr>';
        html += '<tr>';
            html += '<td>' + value.guid + '</td>';
            html += '<td>' + value.name + '</td>';
            html += '<td>' + value.created_at + '</td>';
            html += '<td>';
                html += '<button class="btn btn-primary edit" data-toggle="modal" data-target="#modal-edit' + value.guid + '" type="button"><i class="fas fa-edit"></i></button>';
                html += '  <a href="/backend/delete/' + value.guid + '">';
                    html += '<button class="btn btn-danger delete" data-toggle="modal" data-target="" type="button"><i class="fas fa-trash-alt"></i></button>'
                html += '</a>'
            html += '</td>';
        html += '</tr>';


        // console.log(value);
    });
    // console.log(data);
    $('#modal-add').modal('hide');

    $('#XuatData').html(html);
}

//table-update
function tableUpdate(data){
    var html = '';
    data.forEach(function(data){
        html += '<div class="modal fade" id="modal-edit';
        html += data.guid + '"';
        html += ' tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
            html += '<div class="modal-dialog" role="document">' + '<div class="modal-content">' + '<div class="modal-header">' + '';

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
        url: "http://127.0.0.1:8000/backend/add",
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

$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: "http://127.0.0.1:8000/backend/get-all",
        dataType: 'JSON',
        success: function(data){
            Xuat(data);
            // alert(data);
        },
        error: function(){
            console.log('error');
        }
    });
});