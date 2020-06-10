// $(document).ready(function() {
// $("#btn-add").click(function() {
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         });
//         $.ajax({
//             type: 'POST',
//             url: '/intern_version',
//             data: {
//                 task: $("#frmAddiv input[name=_name]").val(),
//                 description: $("#frmAddTask input[name=_created_at]").val(),
//             },
//             dataType: 'json',
//             success: function(data) {
//                 $('#frmAddiv').trigger("reset");
//                 $("#frmAddiv .close").click();
//                 window.location.reload();
//             },
//             error: function(data) {
//                 var errors = $.parseJSON(data.responseText);
//                 $('#add-task-errors').html('');
//                 $.each(errors.messages, function(key, value) {
//                     $('#add-task-errors').append('<li>' + value + '</li>');
//                 });
//                 $("#add-error-bag").show();
//             }
//         });
//     });
// });
