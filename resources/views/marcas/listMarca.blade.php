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
                    <i class="far fa-file-alt"></i> Nova Marca
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
                                    <i class="far fa-edit"></i> Editar
                                </a>

                                {{-- <form action="{{ route('marcas.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">
                                        <i class="far fa-trash-alt"></i> Excluir
                                    </button>
                                </form> --}}
                                <a href="#" class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip"
                                 onclick="return confirmDeletion({{ $item->id }}, '{{ $item->nomeMarca }}', '{{ strtolower(class_basename($item)) }}')"
                                 title="Excluir">
                                    <i class="fas fa-trash-alt"></i> Excluir
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

<!-- Start DELETE Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle"
aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header bg-danger">
            <h5 class="modal-title text-white font-weight-bold" id="deleteModalTitle">{{ __('Excluir Produto') }}
            </h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="/marcas" method="POST" id="deleteForm">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <div id="delete-modal-body">
                    <!-- Content Jquery -->
                </div>
            </form>
        </div>
        <div class="modal-footer bg-light">
            <button type="button" class="btn btn-success" data-dismiss="modal"><i
                    class="fas fa-undo-alt mr-1"></i>{{ __('Não') }}</button>
            <button type="submit" form="deleteForm" class="btn btn-danger"><i
                    class="fas fa-trash-alt mr-1"></i>{{ __('Sim') }}</button>
        </div>
    </div>
</div>
</div>
<!-- End DELETE Modal -->

@endsection

@section('script_pages')
    <script type="text/javascript">
        $(document).ready(function(){

            var table = $('#dtBasicExample').DataTable();

            //Start Delete Record
            table.on('click', '.delete', function() {
                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);

                //$('#id').val(data[0]);
                var conteudo = $(".modal-body").html();

                $('#delete-modal-body').html(
                    '<input type="hidden" name="_method" value="DELETE">' +
                    '<p>Deseja excluir "<strong>' + data[1] + '</strong>"?</p>');
                $('#deleteForm').attr('action', '/marcas/' + data[0]);
                $('#deleteModal').modal('show');
            });
            //End Delete Record
        });
    </script>

    @include('scripts.confirmdeletion')
@endsection
