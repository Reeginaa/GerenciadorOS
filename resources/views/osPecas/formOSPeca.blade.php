@extends('admin')

<title>Adicionar Peça na OS</title>

@section('main')
<br><br><br><br>
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div id="ui">
            <h1 class="text-center">Adicionar</h1>
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

            <form action="{{ route('osPecas.store') }}" method="post" class="form-group text-center">
                @csrf
                <div class="form-group">
                    <label for="ordemServico">Ordem Serviço: </label>
                    <select class="form-control" name="ordemServico_id" id="ordemServico_id">
                        <option value="">Selecione a OS</option>
                        @foreach ($listaOrdemServico as $item)
                            <option value="{{ $item->id }}">{{ $item->id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="form-group col-lg-3">
                        <label for="quantidade">Quantidade:</label>
                        <input type="number" class="form-control">
                    </div>
                    <div class="form-group col-lg-9">
                        <label for="peca">Peça: |
                            <a href="{{ route('pecas.create') }}">
                                <i class="fas fa-plus"></i> Cadastrar Peça
                            </a>
                        </label>
                        <select name="peca_id" id="peca_id" class="form-control">
                            <option value="">Selecione a Peça</option>
                            @foreach ($listaPeca as $item)
                                <option value="{{ $item->id }}">{{ $item->item }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-3"></div>
</div>
<br><br><br><br>
@endsection
