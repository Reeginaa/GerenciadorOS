@extends('admin')

{{-- <title>Lista de Tipo Pessoa</title> --}}

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
                <h1 class="text-center">Lista de Tipo de Pessoa</h1>
                <hr class="hr-light">
                <div>
                    <a href="{{ route('tipoPessoas.create') }}" class="btn btn-success">
                        <i class="fas fa-plus mr-1"></i>Novo Tipo Pessoa
                    </a>
                </div>
                <table id="dtBasicExample" class="table table-striped table-bordered table-sm white" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Tipo</td>
                            <td>Descrição</td>
                            <td>Ações</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lista as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->tipo }}</td>
                                <td>{{ $item->descricao }}</td>
                                <td>
                                    {{-- Edição --}}
                                    <a href="{{ route('tipoPessoas.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                        <i class="far fa-edit mr-1"></i>Editar
                                    </a>
                                    {{-- Exclusão --}}
                                    <a href="#" class="btn_crud btn btn-danger btn-sm"
                                    onclick="return confirmDeletion({{ $item->id }}, '{{ $item->tipo }}', '{{ strtolower(class_basename($item)) }}');">
                                        <i class="far fa-trash-alt mr-1" data-toggle="tooltop" title="Excluir"></i>Excluir
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br><br><br>
@endsection

@section('script_pages')
    @include('scripts.confirmdeletion')
@endsection

