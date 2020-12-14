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

    {{-- Start DELETE Modal --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white font-weight-bold" id="deleteModalTitle">{{ __('Excluir Marca') }}</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/tipoPessoas" method="POST" id="deleteForm">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div id="delete-modal-body">
                            {{-- Content Jquery --}}
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-success" data-dismiss="modal">
                        <i class="fas fa-undo-alt mr-1"></i>{{ __('Não') }}
                    </button>
                    <button type="submit" class="btn btn-danger" form="deleteForm">
                        <i class="fas fa-trash-alt mr-1"></i>{{ __('Sim') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- End DELETE Modal --}}
@endsection

@section('script_pages')
    <script type="text/javascript">

        $(document).ready(function() {
            var table = $('#dtBasicExample').DataTable();

            //Start Delete Record
            table.on('click', '.delete', function() {
                $tr = $(this).closest('tr');
                if($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);

                var conteudo = $(".modal-body").html();

                $('#delete-modal-body').html(
                    '<input type="hidden" name="_method" value="DELETE">' +
                    '<p>Deseja excluir "<strong>' +data[1] + '</strong>"?</p>'
                );
                $('#deleteForm').attr('action', '/tipoPessoas/' + data[0]);
                $('#deleteModal').modal('show');
            });
            // End DELETE Record
        });
    </script>

    @include('scripts.confirmdeletion')
@endsection

