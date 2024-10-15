$('#formLogin').submit(function (e) {
  e.preventDefault();
  const $username = $.trim($('#username').val());
  const $password = $.trim($('#password').val());
  console.log($username);
  console.log($password);

  if ($username.length === 0 || $password.length === 0) {
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
      data: { username: $username, password: $password },
      success: function (response) {
        console.log(response)
        if (response.redirect) {
          console.log("Redirigiendo a: " + response.redirect);
          window.location.href = response.redirect; // Redirigir al cliente si hay una URL de redirección
        } else if(response.error){
            // Mostrar un mensaje de error si la respuesta no es válida
            swal.fire({
                icon: "error",
                //title: "Error al iniciar sesión, por favor intente nuevamente."
                title: response.error
            });
            
        }
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText); // Para depurar
        swal.fire({
            icon: "error",
            title: "Ocurrió un error en la conexión. Inténtalo de nuevo más tarde."
        });
    }
    });
  }
});