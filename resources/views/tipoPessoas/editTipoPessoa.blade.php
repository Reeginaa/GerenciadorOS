@extends('admin')

<title>Editar Tipo Pessoa</title>

@section('main')
<br><br><br><br>
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div id="ui">
            <h1 class="text-center">Editar Tipo Pessoa</h1>
            <hr class="hr-light">
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('tipoPessoas.update', $registro->id) }}" method="post" class="form-group text-center">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="tipo">Tipo de Pessoa: *</label>
                        <input id="tipo" type="text" class="form-control" name="tipo"
                         required placeholder="Informe o tipo de pessoa" value="{{ $registro->tipo }}">
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição: </label>
                        <textarea name="descricao" id="descricao" type="text" class="form-control"
                         placeholder="Escreva as descrições sobre o tipo de pessoa se necessário">{{ $registro->descricao }}</textarea>
                    </div>
                    <hr class="hr-light">
                    <button type="submit" class="btn btn-success">
                        <i class="far fa-save mr-1"></i>Salvar
                    </button>
                    <a href="{{ route('tipoPessoas.index') }}" class="btn btn-danger">
                        <i class="fas fa-undo mr-1"></i>Voltar
                    </a>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-3"></div>
</div>
<br><br><br><br>
@endsection
