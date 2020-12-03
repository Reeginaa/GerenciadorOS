@extends('admin')

<title>Editar Equipamento</title>

@section('main')
<br><br><br><br>
<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div id="ui">
            <h1 class="text-center">Editar Equipamento</h1>
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

            <form action="{{ route('equipamentos.update', $registro->id) }}" method="post" class="form-group text-center">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nomeEquipamento">Equipamento: *</label>
                    <input id="nomeEquipamento" type="text" class="form-control" name="nomeEquipamento" required
                     placeholder="Escreva o nome do equipamento" value="{{ $registro->nomeEquipamento }}">
                </div>
                <div class="form-group">
                    <label for="marca">Marca: </label>
                    <select class="form-control" name="marca_id" id="marca" required>
                        <option value="">Selecione uma Marca</option>
                        @foreach ($listaMarca as $item)
                            <option {{ ($registro->marca_id==$item->id) ? "selected" : "" }} value="{{ $item->id }}">{{ $item->nomeMarca }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="modelo">Modelo: </label>
                        <input type="text" name="modelo" id="modelo" class="form-control"
                         placeholder="Escreva o modelo do Equipamento" value="{{ $registro->modelo }}">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="numeroSerie">Nº de Série: </label>
                        <input type="text" name="numeroSerie" id="numeroSerie" class="form-control"
                         placeholder="Escreva o número de série" value="{{ $registro->numeroSerie }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="observacoesEquipamento">Observações: </label>
                    <textarea id="observacoesEquipamento" name="observacoesEquipamento" type="text" class="form-control"
                     placeholder="Escreva as observações do equipamento se necessário">{{ $registro->observacoesEquipamento }}</textarea>
                </div>
                <hr class="hr-light">
                <button type="submit" class="btn btn-success">
                    <i class="far fa-save mr-1"></i>Salvar
                </button>
                <a href="{{ route('equipamentos.index') }}" class="btn btn-danger">
                    <i class="fas fa-undo mr-1"></i>Voltar
                </a>
            </form>
        </div>
    </div>
    <div class="col-lg-2"></div>
</div>
<br><br><br><br>
@endsection
