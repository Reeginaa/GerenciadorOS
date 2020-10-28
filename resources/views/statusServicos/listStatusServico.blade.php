@extends('admin')

@section('main')
<br><br><br>
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <div id="ui">
            <h1 class="text-center">Lista de Status</h1>
            <hr class="hr-light">
            <div>
                <a href="{{ route ('statusServicos.create') }}" class="btn btn-success">
                    <i class="far fa-file-alt"></i> Novo Status
                </a>
            </div>
            <table id="dtBasicExample" class="table table-striped table-bordered table-sm white" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Status</td>
                        <td>Descrição</td>
                        <td>Ações</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($statusServicos as $statusServico)
                        <tr>
                            <td>{{ $statusServico->id }}</td>
                            <td>{{ $statusServico->status }}</td>
                            <td>{{ $statusServico->descricaoStatus }}</td>
                            <td>
                                <a href="{{ route('statusServicos.edit', $statusServico->id) }}" class="btn btn-warning btn-sm">
                                    <i class="far fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('statusServicos.destroy', $statusServico->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
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
