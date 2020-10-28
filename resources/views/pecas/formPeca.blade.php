@extends('admin')

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Adicionar Peça</h1>
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

            <form action="{{ route('pecas.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="item">Item</label>
                    <input type="text" class="form-control" name="item">
                </div>
                <div class="form-group">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" class="form-control" name="quantidade">
                </div>
                <div class="form-group">
                    <label for="valorCompra">Valor Compra</label>
                    <input type="number" class="form-control" name="valorCompra">
                </div>
                <div class="form-group">
                    <label for="valorVenda">Valor Venda</label>
                    <input type="number" class="form-control" name="valorVenda">
                </div>
                <div class="form-group">
                    <label for="desconto">Desconto</label>
                    <input type="number" class="form-control" name="desconto">
                </div>
                <button type="submit" class="btn btn-success">Salvar</button>
                <button type="reset" class="btn btn-warning">Limpar</button>
            </form>
        </div>
    </div>
</div>
@endsection
