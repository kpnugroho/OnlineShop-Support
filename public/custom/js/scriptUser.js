// $(document).ready(function() {
// 	//set CSRF Token
//     $.ajaxSetup({
// 		headers: {
// 		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
// 		}
//     });
// });	

// //Event button submit

// $('body').on('click', '#btn-submit', function(event) {
//     // hapus event defaultnya
//     event.preventDefault();

//     var form = $('form'),
//     url = form.attr('action'),
//     method = $('input[name=_method]').val() == undefined ? 'POST' : 'PUT';

//     // hapus pesan error
//     $(".invalid-feedback").remove();
//     $(".alert-feedback").remove();

//     $.ajax({
//         url : url,
//         method : method,
//         data : form.serialize(),
//         success : function (response) {
//             console.log('OK');

//             // bersihkan form input
//             form.trigger('reset');
//             // // sembunyikan modal
//             // $('#modal').modal('hide');
//             // //refresh datatable
//             // $('#datatable').DataTable().ajax.reload();

//             // //message sweet alert
//             // //Proses Saving
//             // swal({
//             //     type: 'success',
//             //     title: 'success',
//             //     text: 'Saved Successfully!'
//             // })
//         },
//         error : function (xhr) {
//             var res = xhr.responseJSON;

//             console.log(res);
//             if($.isEmptyObject(res) == false) {
//                 $.each(res.errors, function (key, value) {
//                     console.log(key + ' - ' + value);

//                     $('#' + key)
//                         .addClass('invalid');

//                     //Menambhakan teks error
//                     // $('#' + key)
//                     // .closest('.form-group')
//                     // // .addClass('has-error')
//                     // .append('<span class="help-block">' + value + '</span>');
//                 });
//             }
//         }
//     }); 
// });