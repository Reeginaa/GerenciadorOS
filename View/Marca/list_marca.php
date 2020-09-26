<!doctype html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Lista Marca</title>
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
          <div class="collapse navbar-collapse" id="basicExampleNav">

            <!-- Links -->
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">
                  <i class="fas fa-home"></i>Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              
              <!-- Dropdown -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-desktop"></i> Ordem de Serviço</a>
                <div class="dropdown-menu dropdown-primary orange accent-2" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Cadastrar</a>
                  <a class="dropdown-item" href="#">Consultar</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <i class="far fa-file-alt"></i>Cadastros Básicos</a>
                <div class="dropdown-menu dropdown-primary orange accent-2" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="?controller=marca">Marca</a>
                  <a class="dropdown-item" href="?controller=servico">Serviço</a>
                  <a class="dropdown-item" href="?controller=peca">Peça</a>
                  <a class="dropdown-item" href="?controller=statusServico">Status Serviço</a>
                  <a class="dropdown-item" href="?controller=tipoPessoa">Tipo Pessoa</a>
                  <!-- <a class="dropdown-item" href="#">Equipamento</a>
                  <a class="dropdown-item" href="#">Pessoa</a> -->
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <i class="far fa-file-alt"></i> Relatórios</a>
                <div class="dropdown-menu dropdown-primary orange accent-2" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Gerar Relatórios</a>
                </div>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="index.html">
                  <i class="fas fa-sign-out-alt"></i>Sair
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

            <div class="row d-flex justify-content-center">
              <div class="col-md-10 text-center">  
                <div class="container">
                  <h1>Lista de Marca!</h1>
                  <a class="btn btn-info" href="<?= $link ?>&acao=cadastrar">Novo</a>
                  <table class="table table-hover table-striped">
                    <thead>
                      <th>#</th>
                      <th>Marca</th>
                      <th>Observação</th>
                      <th>Ações</th>
                    </thead>
                    <tbody>
                      <?php foreach ($lista as $linha): ?>
                        <tr>
                          <td><?php echo $linha['id']; ?></td>
                          <td><?php echo $linha['nomeMarca']; ?></td>
                          <td><?php echo $linha['observacaoMarca']; ?></td>
                          <td>
                            <a class="btn btn-warning btn-sm" href="<?= $link ?>&acao=cadastrar&id=<?php echo $linha['id']; ?>">Editar</a>
                            <a class="btn btn-danger btn-sm" href="<?= $link ?>&acao=remover&id=<?php echo $linha['id']; ?>">Excluir</a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>              
              </div>
            </div>
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
