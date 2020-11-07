@extends('ordemServicos.formOS')

@section('pecas')
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
            {{-- <h1 class="text-center">Lista de Equipamentos</h1>
            <hr class="hr-light"> --}}
            <div>
                <a href="{{ route ('osPecas.create') }}" class="btn btn-success">
                    <i class="far fa-file-alt"></i> Novo Registro
                </a>
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
                <tbody>
                    @foreach ($lista as $item)
                        <tr>
                            <td>{{ $item->quantidade }}</td>
                            <td>{{ $item->peca->item }}</td>
                            <td>{{ $item->peca->valorPeca }}</td>
                            <td>
                                <a href="{{ route('osPecas.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                    <i class="far fa-edit"></i> Editar
                                </a>

                                <form action="{{ route('osPecas.destroy', $item->id) }}" method="post">
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
