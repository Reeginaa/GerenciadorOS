@extends('layouts.app')

<!-- Your custom styles (optional) -->
<link rel="stylesheet" href=" {{ URL::to('css/style.css')}}">
<title>Gerenciador de Ordem de Serviço - Login</title>

@section('nav')
<header>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark peach-gradient fixed-top">
        <div class="container">
            {{-- Navbar brand --}}
            <a href="#" class="navbar-brand">
                <img src="{{ URL::to('img/eletronica_NomeSemBorda.png') }}" alt="mdb logo" height="30">
            </a>

            {{-- Collapse button --}}
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
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
                </ul>
                {{-- Links --}}
            </div>
            {{-- Collapsible content --}}
        </div>
    </nav>
    {{-- /Navbar --}}

    {{-- Mask --}}
    <div id="intro" class="view">
        <div class="container-fluid full-bg-img mask rgba-black-strong d-flex align-items-center
         justify-content-center">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12 text-center">
                    {{-- Material Login --}}
                    <div class="card">

                    <h5 class="card-header info-color white-text text-center py-4 peach-gradient">
                        <strong>Entrar</strong>
                    </h5>

                    <!--Card content-->
                    <div class="card-body px-lg-5 pt-0">

                    <!-- Form -->
                    <form class="text-center" style="color: #757575;" action="{{ route('login') }}" method="POST">
                        @csrf

                        <!-- Email -->
                        <div class="md-form">
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <label for="email">E-mail</label>

                            <div class="col-md-6">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Senha -->
                        <div class="md-form">
                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <label for="password">Senha</label>

                            <div class="col-md-6">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="d-flex justify-content-around">
                            <div>
                                <!-- Lembrar-me -->
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">Lembrar-me</label>
                                </div>
                            </div>
                            <div>
                                <!-- Esqueceu a senha -->
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        Esqueceu sua senha?
                                    </a>
                                @endif
                            </div>
                        </div>

                        <!-- Sign in button -->
                        <button class="btn btn-outline-danger btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Entrar</button>

                        <!-- Register -->
                        <p>Não tem conta?
                        <a href="{{ route('register') }}">Cadastre-se</a>
                        </p>
                     </form>
                    <!-- Form -->
                </div>
            </div>
        </div>
    </div>
</header>
@endsection
