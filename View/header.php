<?php
      if(isset($registro)) $acao .= "&id=".$registro['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!-- MDB icon -->
  <link rel="icon" href="./interface/img/eletronica_raio.png" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="./interface/css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="./interface/css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="./interface/css/style.css">
  <!-- MDBootstrap Datatables  -->
  <link href="./interface/css/addons/datatables.min.css" rel="stylesheet">
  
</head>
<body>

  <!-- Barra de Navegação -->
    <header>
      <!--Navbar-->
      <nav class="navbar navbar-expand-lg navbar-dark peach-gradient fixed-top">
        <div class="container">
          <!-- Navbar brand -->
          <a class="navbar-brand" href="#">
            <img src="./interface/img/eletronica_NomeSemBorda.png" height="30" alt="mdb logo">
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
                <a class="nav-link" href="index.php">
                  <i class="fas fa-home"></i>Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <i class="fas fa-desktop"></i>Ordem de Serviço
                </a>
              </li>

              <!-- Dropdown -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <i class="far fa-file-alt"></i>Cadastros Básicos</a>
                <div class="dropdown-menu dropdown-primary orange accent-2" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="index.php?controller=marca">Marca</a>
                  <a class="dropdown-item" href="index.php?controller=servico">Serviço</a>
                  <a class="dropdown-item" href="index.php?controller=peca">Peça</a>
                  <a class="dropdown-item" href="index.php?controller=statusServico">Status Serviço</a>
                  <a class="dropdown-item" href="index.php?controller=tipoPessoa">Tipo Pessoa</a>
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

      
                     
              