@extends('admin')

<title>Lista de Marcas</title>

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
                <h1 class="text-center">Lista de Marcas</h1>
                <hr class="hr-light">
                <div>
                    <a href="{{ route ('marcas.create') }}" class="btn btn-success">
                        <i class="fas fa-plus mr-1"></i>Nova Marca
                    </a>
                </div>
                <table id="dtBasicExample" class="table table-striped table-bordered table-sm white" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Marca</td>
                            <td>Observações</td>
                            <td>Ações</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lista as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nomeMarca }}</td>
                                <td>{{ $item->observacaoMarca }}</td>
                                <td>
                                    <a href="{{ route('marcas.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                        <i class="far fa-edit mr-1"></i>Editar
                                    </a>
                                    <a href="#" class="btn_crud btn btn-danger btn-sm"
                                     onclick="return confirmDeletion({{ $item->id }}, '{{ $item->nomeMarca }}', '{{ strtolower(class_basename($item)) }}');">
                                        <i class="far fa-trash-alt mr-1" data-toggle="tooltip" title="Excluir"></i>Excluir
                                    </a>
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

@section('script_pages')
    @include('scripts.confirmdeletion')
@endsection
