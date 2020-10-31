@extends('layouts.app')

<!-- Your custom styles (optional) -->
<link rel="stylesheet" href=" {{ URL::to('css/style.css')}}">
<title>Sobre</title>

@section('nav')
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
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home.index') }}">
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
                    <h2 class="display-3 font-bold white-text mb-2">Sobre</h2>
                    <!-- Divisor -->
                    <hr class="hr-light">
                    <!-- Descrição -->
                    <h4 class="white-text my-4">
                        Sistema de gerenciamento de ordem de serviço da Eletrônica Cerbaro e Conveniência, um sistema prático
                        e intuitivo para o seu estabelecimento, através dele você pode gerenciar suas ordens de serviço, gerar
                        relatórios, acompanhar o estoque de peça e diminuir a quantidade de papéis antes utilizados nessa função.
                        Além é claro da segurança de que seus dados e informações sempre estarão ali, sem chance de perder.
                    </h4>
                    <hr class="hr-light">
                    <h4 class="white-text my-4">
                        Também possui uma interface para o seu cliente, onde ele poderá acompanhar como está o andamento das suas
                        ordens de serviço, e ter uma interação mais dinâmica com o seu estabelecimento. O cliente pode aprovar o orçamento
                        através do login dele, sem demais transtornos e com segurança.
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <!-- Mask -->

</header>
<!-- Barra de Navegação -->

@endsection
