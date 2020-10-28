@extends('admin')

@section('main')
<br><br><br>
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        @if (session()->get ('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <div id="ui">
            <h1 class="text-center">Lista de Serviços</h1>
            <hr class="hr-light">
            <div>
                <a href="{{ route ('servicos.create') }}" class="btn btn-success">
                    <i class="far fa-file-alt"></i> Novo Serviço
                </a>
            </div>
            <table id="dtBasicExample" class="table table-striped table-bordered table-sm white" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Serviço</td>
                        <td>Valor</td>
                        <td>Desconto</td>
                        <td>Ações</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($servicos as $servico)
                        <tr>
                            <td>{{ $servico->id }}</td>
                            <td>{{ $servico->servico }}</td>
                            <td>{{ $servico->valor }}</td>
                            <td>{{ $servico->desconto }}</td>
                            <td>
                                <a href="{{ route('servicos.edit', $servico->id) }}" class="btn btn-warning btn-sm">
                                    <i class="far fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('servicos.destroy', $servico->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">
                                        <i class="far fa-trash-alt"></i> Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-lg-1"></div>
</div>
<br><br><br>
@endsection
