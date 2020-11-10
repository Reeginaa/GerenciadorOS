@extends('admin')

<title>Editar Ordem Serviço</title>

@section('main')
<br><br><br><br>
<div class="row">
    <div class="col-lg-0"></div>
    <div class="col-lg-12">
        <div id="ui">
            <h1 class="text-center">Editar Ordem de Serviço</h1>
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

            <form action="{{ route('ordemServicos.update', $registro->id) }}" method="post" class="form-group text-center">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="cliente">Cliente: * |
                        <a href="{{ route('pessoas.create') }}">
                            <i class="fas fa-plus"></i> Cadastrar Cliente
                        </a>
                    </label>
                    <select name="pessoa_id" id="pessoa" class="form-control" required>
                        <option value="">Selecione o cliente</option>
                        @foreach ($listaPessoa as $item)
                            <option {{ ($registro->pessoa_id==$item->id) ? "selected" : "" }} value="{{ $item->id }}">{{ $item->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="equipamento">Equipamento: * |
                            <a href="{{ route('equipamentos.create') }}">
                                <i class="fas fa-plus"></i> Cadastrar Equipamento
                            </a>
                        </label>
                        <select name="equipamento_id" id="equipamento" class="form-control" required>
                            <option value="">Selecione um equipamento</option>
                            @foreach ($listaEquipamento as $item)
                                <option {{ ($registro->equipamento_id==$item->id) ? "selected" : "" }} value="{{ $item->id }}">{{ $item->nomeEquipamento }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="defeito">Defeito: *</label>
                        <input type="text" name="defeito" id="defeito" class="form-control" required
                         placeholder="Escreva o problema/defeito do equipamento" value="{{ $registro->defeito }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="dataInicio">Data Inicio: *</label>
                        <input type="date" name="dataInicio" id="dataInicio" class="form-control"
                         required value="{{ $registro->dataInicio }}">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="dataTermino">Data Término: </label>
                        <input type="date" name="dataTermino" id="dataTermino" class="form-control"
                         value="{{ $registro->dataTermino }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="statusServico">Status serviço: *</label>
                        <select name="statusServico_id" id="statusServico" class="form-control" required>
                            <option value="">Selecione um status</option>
                            @foreach ($listaStatusServico as $item)
                                <option {{ ($registro->statusServico_id==$item->id) ? "selected" : "" }} value="{{ $item->id }}">{{ $item->status }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="observacoesOS">Observações:</label>
                        <textarea name="observacoesOS" id="observacoesOS" cols="30" rows="1" class="form-control"
                         type="text" placeholder="Escreva as observações do equipament">
                         {{ $registro->observacoesOS }}
                        </textarea>
                    </div>
                </div>

                {{-- Orçamento --}}
                <hr class="hr-light">
                <h4 class="text-center text-white"><u>Orçamento</u></h4>
                <div class="form-group">
                    <input type="file" name="arquivo" id="arquivo" class="form-control" value="{{ $registro->arquivo }}">
                </div>

                {{-- Tabela Serviço --}}
                <hr class="hr-light">
                <h4 class="text-center text-white"><u>Serviço</u></h4>
                <div class="container">
                    {{-- <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <div>
                                <a href="#" class="btn btn-success btn-sm">
                                    <i class="far fa-file-alt"></i> Adicionar Serviço</a>
                            </div>
                            <table id="dtBasicExample" class="table table-striped table-bordered table-sm white" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <td>Serviço</td>
                                        <td>Valor</td>
                                        <td>Ações</td>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                        <div class="col-lg-1"></div>
                    </div> --}}
                </div>

                {{-- Tabela Peças --}}
                <hr class="hr-light">
                <h4 class="text-center text-white"><u>Peças</u></h4>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <div>
                                <a href="#" class="btn btn-success btn-sm">
                                    <i class="far fa-file-alt"></i> Adicionar Peça</a>
                            </div>
                            <table id="dtBasicExample" class="table table-striped table-bordered table-sm white" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <td>QTD</td>
                                        <td>Peça</td>
                                        <td>Valor Unitário</td>
                                        <td>Ações</td>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                        <div class="col-lg-1"></div>
                    </div>

                </div>

                <hr class="hr-light">
                <button type="submit" class="btn btn-success">Salvar</button>
                @if ($registro->statusServico_id != 6 && $registro->statusServico_id != 3)
                    <a href="{{ route('fecharOS', $registro->id) }}" class="btn btn-primary">Fechar O.S.</a>
                @endif
                @if ($registro->statusServico_id == 6 || $registro->statusServico_id == 3)
                    <a href="{{ route('reabrirOS', $registro->id) }}" class="btn btn-primary">Reabir O.S.</a>
                @endif
                @if ($registro->statusServico_id != 3 && $registro->statusServico_id != 6)
                    <a href="{{ route('faturarOS', $registro->id) }}" class="btn btn-primary">Faturar O.S.</a>
                @endif

                <a href="#" class="btn btn-primary">Imprimir O.S.</a>
                <a href="#" class="btn btn-primary">Imprimir Nº</a>
                <a href="{{ route('ordemServicos.index') }}" class="btn btn-danger">Voltar</a>
            </form>
        </div>
    </div>
    <div class="col-lg-0"></div>
</div>
<br><br><br><br>
@endsection
