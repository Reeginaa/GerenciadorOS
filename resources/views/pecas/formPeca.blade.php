@extends('admin')

<title>Adicionar Peça</title>

@section('main')
<br><br><br><br>
<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div id="ui">
            <h1 class="text-center">Adicionar Peça</h1>
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

            <form action="{{ route('pecas.store') }}" method="post" class="form-group text-center">
                @csrf
                <div class="row">
                    <div class="form-group col-lg-9">
                        <label for="item">Item: *</label>
                        <input id="item" type="text" class="form-control" name="item"
                         required placeholder="Informe o nome do item">
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="quantidade">Quantidade: *</label>
                        <input type="number" class="form-control" name="quantidade" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="valorCompra">Valor Compra: *</label>
                        <input type="real" class="form-control" name="valorCompra" required onkeypress="$(this).mask('R$ ##0,00')">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="valorVenda">Valor Venda: *</label>
                        <input type="real" class="form-control" name="valorVenda" required onkeypress="$(this).mask('R$ ##0,00')">
                    </div>
                </div>
                <hr class="hr-light">
                <button type="submit" class="btn btn-success">
                    <i class="far fa-save mr-1"></i>Salvar
                </button>
                <button type="reset" class="btn btn-warning">
                    <i class="fas fa-backspace mr-1"></i>Limpar
                </button>
                <a href="{{ route('pecas.index') }}" class="btn btn-danger">
                    <i class="fas fa-undo mr-1"></i>Voltar
                </a>
            </form>
        </div>
    </div>
    <div class="col-lg-2"></div>
</div>
<br><br><br>
@endsection

