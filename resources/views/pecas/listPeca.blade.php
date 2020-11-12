@extends('admin')

<title>Lista de Peças</title>

@section('main')
<br><br><br>
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-sm-10">
        @if (session()->get ('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <div id="ui">
            <h1 class="text-center">Lista de Peças</h1>
            <hr class="hr-light">
            <div>
                <a href="{{ route ('pecas.create') }}" class="btn btn-success">
                    <i class="far fa-file-alt"></i> Nova Peça
                </a>
            </div>
            <table id="dtBasicExample" class="table table-striped table-bordered table-sm white" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Item</td>
                        <td>Quantidade</td>
                        <td>Valor Compra</td>
                        <td>Valor Venda</td>
                        <td>Ações</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lista as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->item }}</td>
                            <td>{{ $item->quantidade }}</td>
                            <td>{{ $item->valorCompra }}</td>
                            <td>{{ $item->valorVenda }}</td>
                            <td>
                                <a href="{{ route('pecas.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                    <i class="far fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('pecas.destroy', $item->id) }}" method="post">
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
