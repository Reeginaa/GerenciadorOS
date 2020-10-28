@extends('admin')

@section('main')
<div class="row">
    <div class="col-sm-8 offset-2">
        <h1 class="display-3">Alterar Peça</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route ('pecas.update', $peca->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="item">Item</label>
                <input type="text" name="item" class="form-control" value={{$peca->item}}>
            </div>
            <div class="form-control">
                <label for="quantidade">Quantidade</label>
                <input type="number" name="quantidade" class="form-control" value={{$peca->quantidade}}>
            </div>
            <div class="form-control">
                <label for="valorCompra">Valor Compra</label>
                <input type="number" name="valorCompra" class="form-control" value={{$peca->valorCompra}}>
            </div>
            <div class="form-control">
                <label for="valorVenda">Valor Venda</label>
                <input type="number" name="valorVenda" class="form-control" value={{$peca->valorVenda}}>
            </div>
            <div class="form-control">
                <label for="desconto">Desconto</label>
                <input type="number" name="desconto" class="form-control" value={{$peca->desconto}}>
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
</div>
@endsection
