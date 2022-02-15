	$(document).ready(function(){
		// recuperar datos de la tabla clientes..
	   	function loadTableData(){
	       $.ajax({
	           url : "ver.php",
	           type : "POST",
	           success:function(data){
	              $("#tableData").html(data);
	           }
	       });
	   	}
	   	loadTableData();
		$("#registro").click(function(e){
			e.preventDefault();
			var usuario = $("#usuario").val();
			var email = $("#email").val();
			var nombre = $("#nombre").val();
			var rol = $("#rol").val();
			var saldo = $("#saldo").val();
			var password = $("#password").val();
			if(usuario !=="" && email !=="" && nombre !=="" && rol !=="" && password !=="" && saldo !==""){
				$.ajax({
					url : "accion.php",
					type: "POST",
					cache: false,
					data : {usuario:usuario,email:email, nombre:nombre, rol:rol, saldo:saldo, password:password},
					success:function(data){
						alert("Datos insertados correctamente");
						$("#clienteForm")[0].reset();
						loadTableData();
					},
				});
			}else{
				alert("Todos los campos son obligatorios");
			}
		});	

		// Eliminar registro a MySql desde PHP usando jQuery AJAX
		$(document).on("click",".borrar-btn",function(){
			if (confirm("¿Estás seguro de eliminar esto?")) {
				var id = $(this).data('id');
				var element = this;
				$.ajax({
					url :"borrar.php",
					type:"POST",
					cache:false,
					data:{borrarId:id},
					success:function(data){
						if (data == 1) {
							$(element).closest("tr").fadeOut();
							alert("Registro de usuario eliminado correctamente");	
						}else{
							alert("Identificación de usuario inválida");
						}
					}
				});
			}
		});

		// Edite el registro a mysqli desde php usando jquery ajax
		$(document).on("click",".editar-btn",function(){
			var id = $(this).data('id');
			$.ajax({
				url :"extraer.php",
				type:"POST",
				cache:false,
				data:{editarId:id},
				success:function(data){
					$("#editarForm").html(data);
				},
			});
		});

		// User record update to mysqli from php using jquery ajax
		$(document).on("click","#editarSubmit", function(){
			var editar_id = $("#editarId").val();
			var usuario = $("#editarUsuario").val();
			var nombre = $("#editarNombre").val();
			var email = $("#editarEmail").val();
			var rol = $("#editarRol").val();
			var saldo = $("#editarSaldo").val();
			var password = $("#editarPassword").val();
			
			$.ajax({
				url:"actualizar.php",
				type:"POST",
				cache:false,
				data:{editar_id:editar_id,usuario:usuario,nombre:nombre,email:email,rol:rol,saldo:saldo,password:password},
				success:function(data){
					if (data == 1) {
						alert("Registro de usuario actualizado correctamente");
						loadTableData();
					}else{
						alert("Algo salió mal");	
					}
				}
			});
		});
	});