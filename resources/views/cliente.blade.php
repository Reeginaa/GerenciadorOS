<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cliente</title>
    <!-- MDB icon -->
    <link rel="icon" href="{{ URL::to('img/eletronica_raio.png') }}" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="{{ URL::to('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{ URL::to('css/mdb.min.css')}}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href=" {{ URL::to('css/style.css')}}">
    <!-- MDBootstrap Datatables  -->
    <link href="{{ URL::to('css/addons/datatables.min.css')}}" rel="stylesheet">
</head>
<body>

  <!-- Barra de Navegação -->
    <header>
      <!--Navbar-->
      <nav class="navbar navbar-expand-lg navbar-dark peach-gradient fixed-top">
        <div class="container">
          <!-- Navbar brand -->
          <a class="navbar-brand" href="#">
            <img src="{{ URL::to('img/eletronica_NomeSemBorda.png')}}" height="30" alt="mdb logo">
          </a>

          <!-- Collapse button -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
            aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Collapsible content -->
          <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="https://www.facebook.com/Eletr%C3%B4nica-Cerbaro-173610546308366/">
                  <i class="fab fa-facebook-f"></i> Facebook
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://www.instagram.com/eletronica_cerbaro/?hl=pt-br">
                  <i class="fab fa-instagram"></i> Instagram</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-user"></i> Perfil
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                  <a class="dropdown-item" href="#">Sair</a>
                </div>
              </li>
            </ul>
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

                <!-- Título -->
                <h2 class="display-3 font-bold white-text mb-2">Cliente, Seja Bem Vindo!</h2>
                <!-- Divisor -->
                <hr class="hr-light">
                <!-- Descrição -->
                <h4 class="white-text my-4">Esta aqui é sua área de interação conosco, nós da Eletrônica
                  e Conveniência Cerbaro acreditamos que assim podemos agilizar nosso atendimento a você. Por
                  favor, qualquer dúvida entre em contato conosco, estaremos disponiveis para lhe atender, tirar
                  dúvidas e ouvir sugestões sobre nosso atendimento. Consulte suas Ordens de Serviço a baixo.</h4>

              </div>
            </div>
          </div>
        </div>
      <!-- Mask -->
    </header>
  <!-- Barra de Navegação -->


  <!-- Layout principal -->
  <main class="mt-5">
    <div class="container">

      <!-- Tabela -->
      <div class="card">
        <h5 class="card-header info-color white-text text-center py-4 peach-gradient">
          <strong>Suas Ordens de Serviço</strong>
        </h5>
      </div>
      <div class="container border white">
        <table id="dtBasicExample" class="table table-striped table-bordered table-sm table-responsive" cellspacing="0" width="100%">
          <thead>
            <th>#</th>
            <th>Equipamento</th>
            <th>Data Início</th>
            <th>Data Término</th>
            <th>Status Serviço</th>
            <th>Valor Total</th>
            <th>Orçamento</th>
            <th>Ações</th>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>TV</td>
              <td>25/09/2020</td>
              <td></td>
              <td>AGUARDANDO APROVAÇÃO DE ORÇAMENTO</td>
              <td></td>
              <td>orçamento_TV.pdf</td>
              <td>
                <a class="btn btn-success btn-sm" href="#">Aprovar</a>
                <a class="btn btn-danger btn-sm" href="#">Desaprovar</a>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>Notebook</td>
              <td>21/09/2020</td>
              <td>28/09/2020</td>
              <td>AGUARDANDO RETIRADA</td>
              <td>R$ 500,00</td>
              <td>orçamento_NOTEBOOK.pdf</td>
              <td>
                <a class="btn btn-success btn-sm disabled" href="#">Aprovar</a>
                <a class="btn btn-danger btn-sm disabled" href="#">Desaprovar</a>
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>Rádio</td>
              <td>28/08/2020</td>
              <td>01/09/2020</td>
              <td>CONCLUÍDA</td>
              <td>R$ 245,50</td>
              <td>orçamento_RÁDIO.pdf</td>
              <td>
                <a class="btn btn-success btn-sm disabled" href="#">Aprovar</a>
                <a class="btn btn-danger btn-sm disabled" href="#">Desaprovar</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </main>
  <br>
  <br>
  <!-- Layout principal -->

  <!-- Footer -->
    <footer class="page-footer font-small peach-gradient">

      <!-- Copyright -->
      <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="#"> Maria Regina Cerbaro</a>
      </div>
      <!-- Copyright -->

    </footer>
  <!-- Footer -->

  <!-- JQuery -->
  <script type="text/javascript" src="{{ URL::to('js/jquery.min.js')}}"></script>
  <!-- Mascara -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{ URL::to('js/popper.mn.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{ URL::to('js/bootstrap.min.js') }}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{ URL::to('js/mdb.min.js')}}"></script>
  <!-- MDBootstrap Datatables  -->
  <script type="text/javascript" src="{{ URL::to('js/addons/datatables.min.js')}}"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript"></script>

</body>
</html>
