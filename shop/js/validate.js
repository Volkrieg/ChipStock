$("#form_register").validate({
  rules: {
               name: {
                 required:true, 
                 minlength:3, 
                 maxlength:9,
                 alphanumeric: true,
                 nowhitespace: true,
               },
               apellidos: {
                required:true, 
                minlength:3, 
                maxlength:9,
                alphanumeric: true,
                nowhitespace: true,
              },
               email: {
                 email: true,
                 required:true,
               },
               usuario: {
                required:true, 
                minlength:3, 
                maxlength:9,
                alphanumeric: true,
                nowhitespace: true,
              },
               pass: {
                 required:true,
                 minlength:6,
                 maxlength:15,
                 nowhitespace:true,
               }


             },
             messages: {
                         name: {
                           required:"Campo usuario obligatorio.",
                           minlength:"El campo usuario no cumple con los caracteres mínimos.",
                           maxlength:"El campo usuario excede el máximo de caracteres.",
                           nowhitespace:"El campo usuario no permite espacios en blanco.",
                           alphanumeric:"El campo usuario solo admite caracteres alfanuméricos."
                         },

                         apellidos: {
                          required:"Campo usuario obligatorio.",
                          minlength:"El campo usuario no cumple con los caracteres mínimos.",
                          maxlength:"El campo usuario excede el máximo de caracteres.",
                          nowhitespace:"El campo usuario no permite espacios en blanco.",
                          alphanumeric:"El campo usuario solo admite caracteres alfanuméricos."
                        },
              
                         email: {
                           required: "El campo email es obligatorio."
                         },

                         usuario: {
                          required:"Campo usuario obligatorio.",
                          minlength:"El campo usuario no cumple con los caracteres mínimos.",
                          maxlength:"El campo usuario excede el máximo de caracteres.",
                          nowhitespace:"El campo usuario no permite espacios en blanco.",
                          alphanumeric:"El campo usuario solo admite caracteres alfanuméricos."
                        },
              
                         pass: {
                           required:"El campo contraseña obligatorio",
                           minlength:"La contraseña no cumple con los mínimos caracteres (6).",
                           maxlength:"La contraseña excede los máximos caracteres(15).",
                           nowhitespace:"La contraseña no admite espacios en blanco"
                         }
                       } 
})

$("#guardar_register").click(function(){
  if($("form_register").valid() == false){
      return;
  }
 let nombre = $("#nombre").val()
 let apellidos = $("#apellidos").val()
 let email = $("#email").val()
 let usuario = $("#usuario").val()
 let pass = $("#pass").val()
 let aviso = $("#aviso").is(":checked")


})






$("#form_loginAdmin").validate({
  rules: {
               user: {
                required:true, 
                minlength:3, 
                nowhitespace: true,
              },
               pass: {
                 required:true,
                 nowhitespace:true,
               }


             },
             messages: {
                         user: {
                          required:"Campo usuario obligatorio.",
                          nowhitespace:"El campo usuario no permite espacios en blanco.",
                          alphanumeric:"El campo usuario solo admite caracteres alfanuméricos."
                        },
              
                         pass: {
                           required:"El campo contraseña obligatorio",
                           nowhitespace:"La contraseña no admite espacios en blanco"
                         }
                       } 
})



$("#guardar_loginAdmin").click(function(){
  if($("form_loginAdmin").valid() == false){
     return;
  }
 let user = $("#nombre").val()
 let pass = $("#pass").val()
 let aviso = $("#aviso").is(":checked")


})















$("#form_login").validate({
  rules: {
               user: {
                required:true, 
                minlength:3, 
                nowhitespace: true,
              },
               pass: {
                 required:true,
                 nowhitespace:true,
               }


             },
             messages: {
                         user: {
                          required:"Campo usuario obligatorio.",
                          nowhitespace:"El campo usuario no permite espacios en blanco.",
                          alphanumeric:"El campo usuario solo admite caracteres alfanuméricos."
                        },
              
                         pass: {
                           required:"El campo contraseña obligatorio",
                           nowhitespace:"La contraseña no admite espacios en blanco"
                         }
                       } 
})



$("#guardar_login").click(function(){
  if($("form_login").valid() == false){
     return;
  }
 let user = $("#nombre").val()
 let pass = $("#pass").val()
 let aviso = $("#aviso").is(":checked")


})



















// function validateLogin() {
//     var $myForm = $("#form");
//     $myForm.validate({
//       rules: {
//         usuario : {
//           required:true, 
//           minlength:3, 
//           maxlength:15,
//           nowhitespace: true,
//           alphanumeric: true,
//         },
//         pass : {
//           required:true,
//            minlength:6, 
//            maxlength:15,
//            nowhitespace: true,
//         }
//       },
//       messages: {
//         usuario: {
//           required:"Campo usuario obligatorio.",
//           minlength:"El campo usuario no cumple con los caracteres mínimos.",
//           maxlength:"El campo usuario excede el máximo de caracteres.",
//           nowhitespace:"El campo usuario no permite espacios en blanco.",
//           alphanumeric:"El campo usuario solo admite caracteres alfanuméricos."
//         },

//         pass: {
//           required:"El campo contraseña obligatorio",
//           minlength:"La contraseña no cumple con los mínimos caracteres (6).",
//           maxlength:"La contraseña excede los máximos caracteres(15).",
//           nowhitespace:"La contraseña no admite espacios en blanco"
//         }
//       }
//     })
//   };

  
//   //REGISTER

//   function validateRegister(){
//     var $myForm = $("#form");
//     $myForm.validate({
//         rules: {
//           usuario: {
//             required:true, 
//             minlength:3, 
//             maxlength:9,
//             alphanumeric: true,
//             nowhitespace: true,
//           },
//           email: {
//             email: true,
//             required:true,
//           },
//           pass: {
//             required:true,
//             minlength:6,
//             maxlength:15,
//             nowhitespace:true,
//           }
//         },
//         messages: {
//           usuario: {
//             required:"Campo usuario obligatorio.",
//             minlength:"El campo usuario no cumple con los caracteres mínimos.",
//             maxlength:"El campo usuario excede el máximo de caracteres.",
//             nowhitespace:"El campo usuario no permite espacios en blanco.",
//             alphanumeric:"El campo usuario solo admite caracteres alfanuméricos."
//           },

//           email: {
//             required: "El campo email es obligatorio."
//           },

//           pass: {
//             required:"El campo contraseña obligatorio",
//             minlength:"La contraseña no cumple con los mínimos caracteres (6).",
//             maxlength:"La contraseña excede los máximos caracteres(15).",
//             nowhitespace:"La contraseña no admite espacios en blanco"
//           }
//         } 
//     });
//     $('#form').on('keyup blur', function(){
//       if($('#form').valid()){
//         $('#btn').prop('disabled', false);
//       }else{
//         $('#btn').prop('disabled', 'disabled');
//       }
//     });
// }


// //TODO: Validación AreaAdmin


// function validateAdminArea(){
//   var $myForm = $("#form");
//   $myForm.validate({
//       rules: {
//         usuario: {
//           required:true, 
//           minlength:3, 
//           maxlength:9,
//           alphanumeric: true,
//           nowhitespace: true,
//         },
//         email: {
//           email: true,
//           required:true,
//         },
//         pass: {
//           required:true,
//           minlength:6,
//           maxlength:15,
//           nowhitespace:true,
//         }
//       },
//       messages: {
//         usuario: {
//           required:"Campo usuario obligatorio.",
//           minlength:"El campo usuario no cumple con los caracteres mínimos.",
//           maxlength:"El campo usuario excede el máximo de caracteres.",
//           nowhitespace:"El campo usuario no permite espacios en blanco.",
//           alphanumeric:"El campo usuario solo admite caracteres alfanuméricos."
//         },

//         email: {
//           required: "El campo email es obligatorio."
//         },

//         pass: {
//           required:"El campo contraseña obligatorio",
//           minlength:"La contraseña no cumple con los mínimos caracteres (6).",
//           maxlength:"La contraseña excede los máximos caracteres(15).",
//           nowhitespace:"La contraseña no admite espacios en blanco"
//         }
//       } 
//   });
//   $('#form').on('keyup blur', function(){
//     if($('#form').valid()){
//       $('#btn').prop('disabled', false);
//     }else{
//       $('#btn').prop('disabled', 'disabled');
//     }
//   });
// }



    