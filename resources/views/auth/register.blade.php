@extends('layouts.app')

<!-- Your custom styles (optional) -->
<link rel="stylesheet" href=" {{ URL::to('css/style.css')}}">
<title>Gerenciador de Ordem de Serviço - Cadastro</title>

@section('nav')
<header>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark peach-gradient fixed-top">
        <div class="container">
            {{-- Navbar brand --}}
            <a href="#" class="navbar-brand">
                <img src="{{ URL::to('img/eletronica_NomeSemBorda.png') }}" alt="mbd logo" height="30">
            </a>

            {{-- Collapse button --}}
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#basicExampleNav"
             aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- Collapsible content --}}
            <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                {{-- Links --}}
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{ route('home.index') }}" class="nav-link">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
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
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fas fa-user"></i> Entrar
                        </a>
                    </li>
                </ul>
                {{-- \Links --}}
            </div>
            {{-- \Collapsible content --}}
        </div>
    </nav>
    {{-- \Navbar --}}

    {{-- Mask --}}
    <div id="intro" class="view">
        <div class="container-fluid full-db-img mask rgba-black-strong d-flex align-items-center
         justify-content-center">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12 text-center">
                    <!-- Material form register -->
                    <div class="card">

                        <h5 class="card-header info-color white-text text-center py-4 peach-gradient">
                            <strong>Cadastro</strong>
                        </h5>

                        <!--Card content-->
                        <div class="card-body px-lg-5 pt-0">

                            <!-- Form -->
                            <form class="text-center" style="color: #757575;" action="{{ route('register') }}" method="POST">
                                @csrf

                                {{-- Nome --}}
                                <div class="md-form">
                                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    <label for="name">Nome Completo</label>

                                    <div class="col-md-6">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- E-mail -->
                                <div class="md-form">
                                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    <label for="email">E-mail</label>

                                    <div class="col-md-6">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <!-- senha -->
                                        <div class="md-form">
                                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                            <label for="password">Senha</label>

                                            <div class="col-md-6">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        {{-- Comfirma senha --}}
                                        <div class="md-form">
                                            <input type="password" id="password-confirm" class="form-control @error('password') is-invalid @enderror" name="password-confirm" required autocomplete="new-password">
                                            <label for="password-confirm">Confirma Senha</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Sign up button -->
                                <button class="btn btn-outline-danger btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">
                                    Cadastrar
                                </button>

                            </form>
                            <!-- Form -->

                        </div>

                    </div>
                    <!-- Material form register -->
                </div>
            </div>
        </div>
    </div>
    {{-- \Mask --}}
</header>
@endsection
