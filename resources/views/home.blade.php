@extends('layouts.app')

<!-- Your custom styles (optional) -->
<link rel="stylesheet" href=" {{ URL::to('css/style.css')}}">
<title>Gerenciador de Ordem de Serviço</title>

@section('nav')
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
                  <i class="fab fa-facebook-square"></i> Facebook
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://www.instagram.com/eletronica_cerbaro/?hl=pt-br">
                  <i class="fab fa-instagram"></i> Instagram
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('sobre.index')}}">
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
                <div class="row d-flex justify-content-center">
                    <div class="col-md-10 text-center">
                        <!-- Título -->
                        <h2 class="display-3 font-bold white-text mb-2">Gerenciador de O.S.</h2>
                        <!-- Divisor -->
                        <hr class="hr-light">
                        <!-- Descrição -->
                        <h4 class="white-text my-4">Um sistema prático e fácil para gerenciar e armazenar dados de seus serviços.</h4>
                        <a href="{{ route('admin.index') }}">
                            <button type="button" class="btn btn-outline-white">Entrar
                                <i class="fa fa-user-shield ml-2"></i>
                            </button>
                        </a>
                    </div>
                </div>
          </div>
        </div>
      <!-- Mask -->
    </header>
  <!-- Barra de Navegação -->
@endsection

