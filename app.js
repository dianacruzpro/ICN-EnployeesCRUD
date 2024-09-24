$('#formLogin').submit(function (e) {
  e.preventDefault();
  var username = $.trim($('#username').val());
  var password = $.trim($('#password').val());

  if (username.length == "" || password.length == "") {
    swal.fire({
      icon: "warning",
      title: "Ingrese un usuario o contraseña."
    });
    return false;
  } else {
    $.ajax({
      url: "bd/login.php",
      type: "POST",
      datatype: "json",
      data: { username: username, password: password },
      success: function (data) {
        if (data == "null") {
          swal.fire({
            icon: "error",
            title: "Usuario y/o password incorrectas",
          });
        } else {
          swal.fire({
            icon: "success",
            title: "La conexion es exitosa!",
            confirmButtonColor: "#3885d6",
            confirmButtonText: "Ingresar"
          }).then(result => {
            if (result.value) {
              window.location.href = "vistas/home.php"
            }
          })
        }
      }
    });
  }

});