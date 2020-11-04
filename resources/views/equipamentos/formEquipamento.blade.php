@extends('admin')

@section('main')
<br><br><br><br>
<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div id="ui">
            <h1 class="text-center">Adicionar Equipamento</h1>
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

            <form action="{{ route('equipamentos.store') }}" method="post" class="form-group text-center">
                @csrf
                <div class="form-group">
                    <label for="nomeEquipamento">Equipamento: *</label>
                    <input id="nomeEquipamento" type="text" class="form-control" name="nomeEquipamento" required
                     placeholder="Escreva o nome do equipamento">
                </div>
                <div class="form-group">
                    <label for="marca">Marca: * |
                        <a href="{{ route('marcas.create') }}">
                            <i class="fas fa-plus"></i> Cadastrar Marca
                        </a>
                    </label>
                    <select class="form-control" name="marca_id" id="marca" required>
                        <option value="">Selecione uma Marca</option>
                        @foreach ($listaMarca as $item)
                            <option value="{{ $item->id }}">{{ $item->nomeMarca }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="modelo">Modelo: </label>
                        <input type="text" name="modelo" id="modelo" class="form-control"
                         placeholder="Escreva o modelo do Equipamento">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="numeroSerie">Nº de Série: </label>
                        <input type="text" name="numeroSerie" id="numeroSerie" class="form-control"
                         placeholder="Escreva o número de série">
                    </div>
                </div>
                <div class="form-group">
                    <label for="observacoesEquipamento">Observações: </label>
                    <textarea id="observacoesEquipamento" name="observacoesEquipamento" type="text" class="form-control"
                     placeholder="Escreva as observações do equipamento se necessário"></textarea>
                </div>
                <hr class="hr-light">
                <button type="submit" class="btn btn-success">Salvar</button>
                <button type="reset" class="btn btn-warning">Limpar</button>
            </form>
        </div>
    </div>
    <div class="col-lg-2"></div>
</div>
<br><br><br><br>
@endsection
