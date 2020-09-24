<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Gerenciador de Ordem de Serviço</title>
  <!-- MDB icon -->
  <link rel="icon" href="../img/eletronica_raio.png" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="../css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>

  <!-- Barra de Navegação -->
    <header>
      <!--Navbar-->
      <nav class="navbar navbar-expand-lg navbar-dark peach-gradient fixed-top">
        <div class="container">
          <!-- Navbar brand -->
          <a class="navbar-brand" href="#">
            <img src="../img/eletronica_NomeSemBorda.png" height="30" alt="mdb logo">
          </a>

          <!-- Collapse button -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
            aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Collapsible content -->
          <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">
                      <i class="fas fa-home"></i>Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li>
              <li class="nav-item">
                <a class="nav-link" href="https://www.facebook.com/Eletr%C3%B4nica-Cerbaro-173610546308366/">
                  <i class="fab fa-facebook-f"></i> Facebook
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://www.instagram.com/eletronica_cerbaro/?hl=pt-br">
                  <i class="fab fa-instagram"></i> Instagram
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="indexSobre.php">
                  <i class="fas fa-info-circle"></i>Sobre
                </a>
              </li>
              
            </ul>
            <!-- Links -->
          </div>
          <!-- Collapsible content -->

        </div>
      </nav>
      <!--/.Navbar-->

      <!-- Mask -->
        <div id="intro" class="view">
          <div class="container-fluid full-bg-img mask rgba-black-strong d-flex align-items-center
            justify-content-center">

            <!-- Material form login -->
            <div class="card">
                <h5 class="card-header info-color white-text text-center py-4 peach-gradient">
                    <strong>Login</strong>
                </h5>
  
                <!--Card content-->
                <div class="card-body px-lg-5 pt-0">
  
                    <!-- Form -->
                    <form class="text-center" style="color: #757575;" action="indexAdministrador.php">
  
                        <!-- Email -->
                        <div class="md-form">
                            <input type="email" id="materialLoginFormEmail" class="form-control">
                            <label for="materialLoginFormEmail">E-mail</label>
                        </div>
  
                        <!-- Password -->
                        <div class="md-form">
                            <input type="password" id="materialLoginFormPassword" class="form-control">
                            <label for="materialLoginFormPassword">Senha</label>
                        </div>
  
                        <div class="d-flex justify-content-around">
                            <div>
                                <!-- Remember me -->
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="materialLoginFormRemember">
                                    <label class="form-check-label" for="materialLoginFormRemember">Lembrar login</label>
                                </div>
                            </div>
                            <div>
                                <!-- Forgot password -->
                                <a href="">Esqueceu a senha?</a>
                            </div>
                        </div>
  
                        <!-- Sign in button -->
                        <button class="btn btn-outline-danger btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Entrar</button>
  
                    </form>
                    <!-- Form -->
  
                </div>
  
            </div>
            <!-- Material form login -->
          </div>
        </div>
      <!-- Mask -->
    </header>
  <!-- Barra de Navegação -->


  
  <!-- Footer -->
    <footer class="page-footer font-small peach-gradient">

      <!-- Copyright -->
      <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="#"> Maria Regina Cerbaro</a>
      </div>
    <!-- Copyright -->

    </footer>
  <!-- Footer -->

  <!-- jQuery -->
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript"></script>

</body>
</html>
