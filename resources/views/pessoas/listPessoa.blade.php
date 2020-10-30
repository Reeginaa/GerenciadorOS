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
            <h1 class="text-center">Lista de Pessoas</h1>
            <hr class="hr-light">
            <div>
                <a href="{{ route('pessoas.create') }}" class="btn btn-success">
                    <i class="far fa-file-alt"> Nova Pessoa</i>
                </a>
            </div>
            <table id="dtBasicExample" class="table table estriped table-bordered table-sm white" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Tipo</td>
                        <td>Nome</td>
                        <td>CPF</td>
                        <td>Cidade</td>
                        <td>Telefone</td>
                        <td>E-mail</td>
                        <td>Ações</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lista as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->tipoPessoa->tipo }}</td>
                            <td>{{ $item->nome }}</td>
                            <td>{{ $item->cpf }}</td>
                            <td>{{ $item->cidade }}</td>
                            <td>{{ $item->telefone }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <a href="{{ route('pessoas.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                    <i class="far fa-edit"></i> Editar
                                </a>

                                <form action="{{ route('pessoas.destroy', $item->id) }}" method="POST">
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
