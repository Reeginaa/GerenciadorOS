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
                    <a class="nav-link" href="{{ route('admin') }}">
                        <i class="fas fa-home mr-1"></i>Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('ordemServicos.index') }}">
                        <i class="fas fa-desktop mr-1"></i>Ordem de Serviço
                    </a>
                </li>

                <!-- Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                     aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-file-alt mr-1"></i>Cadastros Básicos
                    </a>
                    <div class="dropdown-menu dropdown-primary orange accent-2" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('marcas.index') }}">Marca</a>
                        <a class="dropdown-item" href="{{ route('servicos.index') }}">Serviço</a>
                        <a class="dropdown-item" href="{{ route('pecas.index') }}">Peça</a>
                        <a class="dropdown-item" href="{{ route('statusServicos.index') }}">Status Serviço</a>
                        <a class="dropdown-item" href="{{ route('tipoPessoas.index') }}">Tipo Pessoa</a>
                        <a class="dropdown-item" href="{{ route('equipamentos.index') }}">Equipamento</a>
                        <a class="dropdown-item" href="{{ route('pessoas.index') }}">Pessoa</a>
                    </div>
                </li>
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                     aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-file-alt mr-1"></i> Relatórios</a>
                    <div class="dropdown-menu dropdown-primary orange accent-2" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('testeReport') }}">Gera Relatório Teste</a>
                    </div>
                </li> --}}

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fas fa-user-alt mr-1"></i>{{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-primary orange accent-2" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    </div>
                </li>

            </ul>
            <!-- Links -->
          </div>
          <!-- Collapsible content -->
        </div>
    </nav>
    @if (Route::current()->getName() =='admin')
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    @endif
</header>
@endsection
