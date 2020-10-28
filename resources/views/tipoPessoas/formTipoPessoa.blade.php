@extends('admin')

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Adicionar Tipo Pessoa</h1>
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

            <form action="{{ route('tipoPessoas.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="tipo">Tipo de Pessoa</label>
                    <input type="text" class="form-control" name="tipo">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" name="descricao">
                </div>
                <button type="submit" class="btn btn-success">Salvar</button>
                <button type="reset" class="btn btn-warning">Limpar</button>
            </form>
        </div>
    </div>
</div>
@endsection
