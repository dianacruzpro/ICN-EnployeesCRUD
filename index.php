<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ICN - Project</title>

  <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./styles.css">
  <link rel="stylesheet" href="./pluging/sweetAlert2/sweetalert2.min.css">
</head>

<body class="body">
  <div id="login">
    <img class="logo" src="https://www.pedagogica.edu.sv/wp-content/uploads/2023/07/NUEVO-LOGO-UPED-SMALL.png" alt="Logo pedagogica">
    <h1 class="text-center text-white display-4">LOGIN</h1>
    <div class="container">
      <div id="login-row" class="row justify-content-center align-items-center">
        <div id="login-column" class="col-md-6">
          <div id="login-box" class="col-md-12 bg-light text-dark">
            <form id="formLogin" class="form" action="bd/login.php" method="POST">
              <div class="form-group">
                <label for="username" class="text-dark">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Username" >
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" >
              </div>
              <div class="form-group text-center">
                <input type="submit" value="Login" name="submit" class="btn btn-dark btn-lg btn-block">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="./jquery/jquery-3.7.1.min.js"></script>
  <script src="./bootstrap/js/bootstrap.min.js"></script>
  <script src="./popper/popper.min.js"></script>

  <script src="pluging/sweetAlert2/sweetalert2.all.min.js"></script>
  <script src="app.js"></script>
</body>

</html>