@extends('admin')

<title>Lista de Ordem de Serviço</title>

@section('main')
    <br><br><br>
    <div class="row">
        <div class="col-lg-0"></div>
        <div class="col-lg-12">
            @if (session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            <div id="ui">
                <h1 class="text-center">Lista de Ordem de Serviço</h1>
                <hr class="hr-light">
                <div>
                    <a href="{{ route('ordemServicos.create') }}" class="btn btn-success">
                        <i class="fas fa-plus mr-1"></i>Nova O.S.
                    </a>
                </div>
                <table id="dtBasicExample" class="table table-striped table-bordered table-sm white" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Cliente</td>
                            <td>Status</td>
                            <td>Data de Entrada</td>
                            <td>Data Termino</td>
                            <td>Equipamento</td>
                            <td>Defeito</td>
                            <td>Valor Total</td>
                            <td>Ações</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lista as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->pessoa->nome }}</td>
                                <td>{{ $item->statusServico->status }}</td>
                                <td>{{ $item->dataInicio }}</td>
                                <td>{{ $item->dataTermino }}</td>
                                <td>{{ $item->equipamento->nomeEquipamento }}</td>
                                <td>{{ $item->defeito }}</td>
                                <td>{{ $item->valorTotal }}</td>
                                <td>
                                    {{-- Edição --}}
                                    <a href="{{ route('ordemServicos.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                        <i class="far fa-edit mr-1"></i>Editar
                                    </a>
                                    <br>
                                    <a href="{{ route('comprovantepdf') }}" class="btn btn-blue-grey btn-sm">
                                        <i class="fas fa-print mr-1"></i>Imprimir Comprovante e Nº
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-0"></div>
    </div>
    <br><br><br>
@endsection
