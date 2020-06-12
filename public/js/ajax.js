
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
            
            success: function(data) {
                var html = '';
                // html += '<td>' + ''
                data.forEach(function inDuLieu(name){
                    html += '<tr> <td>' + name + '</td> </tr>';
                });
                $('#dataTable').html(html);
            },
            error: function(){
                console.log('error');
            }
        });
    }