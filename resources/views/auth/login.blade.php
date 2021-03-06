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
                {{-- \Links --}}
            </div>
            {{-- \Collapsible content --}}
        </div>
    </nav>
    {{-- \Navbar --}}

    {{-- Mask --}}
    <div id="intro" class="view">
        <div class="container-fluid mask rgba-black-strong d-flex align-items-center justify-content-center">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <h5 class="card-header info-color white-text text-center py-4 peach-gradient">
                            <strong>{{ __('Login') }}</strong>
                        </h5>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Lembrar-me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-outline-danger">
                                            {{ __('Entrar') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="#">
                                                {{ __('Esqueceu sua senha??') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- \Mask --}}
</header>
@endsection
