@extends('admin')

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Alterar Tipo Pessoa</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tipoPessoas.update', $tipoPessoa->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="tipo">Tipo Pessoa</label>
                <input type="text" class="form-control" name="tipo" value= {{ $tipoPessoa->tipo }} >
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" name="descricao" value= {{ $tipoPessoa->descricao}} >
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
</div>
@endsection
