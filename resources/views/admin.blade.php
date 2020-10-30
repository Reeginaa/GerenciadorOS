@extends('layouts.app')

<!-- Your custom styles (optional) -->
<link rel="stylesheet" href=" {{ URL::to('css/styleAdmin.css')}}">
<title>Administrador</title>

@section('nav')
<header>
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
          <div class="collapse navbar-collapse" id="basicExampleNav">

            <!-- Links -->
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">
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
                  <a class="dropdown-item" href="{{ route ('marcas.index') }}">Marca</a>
                  <a class="dropdown-item" href="{{ route ('servicos.index') }}">Serviço</a>
                  <a class="dropdown-item" href="{{ route ('pecas.index') }}">Peça</a>
                  <a class="dropdown-item" href="{{ route ('statusServicos.index') }}">Status Serviço</a>
                  <a class="dropdown-item" href="{{ route ('tipoPessoas.index') }}">Tipo Pessoa</a>
                  <a class="dropdown-item" href="{{ route ('equipamentos.index') }}">Equipamento</a>
                  <a class="dropdown-item" href="{{ route ('pessoas.index') }}">Pessoa</a>
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
                <a class="nav-link" href="{{route('home.index')}} ">
                  <i class="fas fa-sign-out-alt"></i>Sair
                </a>
              </li>

            </ul>
            <!-- Links -->
          </div>
          <!-- Collapsible content -->
        </div>
    </nav>
</header>
@endsection
