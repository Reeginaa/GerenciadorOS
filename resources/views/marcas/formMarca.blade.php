@extends('admin')

<title>Adicionar Marca</title>

@section('main')
<br><br><br><br>
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div id="ui">
            <h1 class="text-center">Adicionar Marca</h1>
            <hr class="hr-light">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('marcas.store') }}" method="post" class="form-group text-center">
                @csrf
                <div class="form-group">
                    <label for="nomeMarca">Marca: *</label>
                    <input id="nomeMarca" type="text" class="form-control" name="nomeMarca" required
                     placeholder="Escreva o nome da marca">
                </div>
                <div class="form-group">
                    <label for="observacaoMarca">Observações: </label>
                    <textarea id="observacaoMarca" name="observacaoMarca" type="text" class="form-control"
                     placeholder="Escreva as observações da marca se necessário"></textarea>
                </div>
                <hr class="hr-light">
                <button type="submit" class="btn btn-success">Salvar</button>
                <button type="reset" class="btn btn-warning">Limpar</button>
                <a href="{{ route('marcas.index') }}" class="btn btn-danger">Voltar</a>
            </form>
        </div>
    </div>
    <div class="col-lg-3"></div>
</div>
<br><br><br><br>
@endsection
