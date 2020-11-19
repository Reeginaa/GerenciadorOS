@extends('admin')

<title>Lista de Pessoas</title>

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
                                    {{-- <a href="{{ route('pessoas.show', $item->id) }}" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalVerPessoa">
                                        <i class="far fa-eye"></i> Ver
                                    </a> --}}
                                    <a href="#" class="btn_crud btn btn-info btn-sm view"><i class="fas fa-eye"
                                        data-toggle="tooltip" title="Visualizar"></i> Ver
                                    </a>
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
        <div class="col-lg-0"></div>
    </div>
    <br><br><br>

    {{-- Start View Modal --}}
    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white font-weight-bold" id="viewModalTitle">{{ __('Ver Pessoa') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="viewForm">
                        <div class="form-group">
                            <label for="id" class="md-0">id</label>
                            <input type="text" name="id" id="id" class="form-control" style="text-align: center; width: 90px;" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tipoPessoa_id" class="md-0">Tipo Pessoa</label>
                            <input type="text" name="tipoPessoa_id" id="tipoPessoa_id" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nome" class="md-0">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="cpf" class="md-0">CPF</label>
                            <input type="text" name="cpf" id="cpf" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="rg" class="md-0">RG</label>
                            <input type="text" name="rg" id="rg" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="dataNascimento" class="md-0">Data Nascimento</label>
                            <input type="text" name="dataNascimento" id="dataNascimento" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="sexo" class="md-0">Sexo</label>
                            <input type="text" name="sexo" id="sexo" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="logradouro" class="md-0">Logradouro</label>
                            <input type="text" name="logradouro" id="logradouro" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="numero" class="md-0">Número</label>
                            <input type="text" name="numero" id="numero" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="complemento" class="md-0">Complemento</label>
                            <input type="text" name="complemento" id="complemento" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="bairro" class="md-0">Bairro</label>
                            <input type="text" name="bairro" id="bairro" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="cidade" class="md-0">Cidade</label>
                            <input type="text" name="cidade" id="cidade" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email" class="md-0">E-mail</label>
                            <input type="text" name="email" id="email" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="senha" class="md-0">Senha</label>
                            <input type="password" name="senha" id="senha" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="telefone" class="md-0">Telefone</label>
                            <input type="text" name="telefone" id="telefone" class="form-control" readonly>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="tooltip"
                        title="Sair"><i class="fas fa-undo-alt mr-1"></i>{{ __('Sair') }}</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End View Modal --}}
@endsection

@section('script_pages')
<script type="text/javascript">
    $(document).ready(function(){
        var table = $('#dtBasicExample').DataTable();

        //Start View
        table.on('click', '.view', function() {
                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);

                $('#viewModal #id').val(data[0]);
                $('#viewModal #tipoPessoa_id').val(data[1]);
                $('#viewModal #nome').val(data[2]);
                $('#viewModal #cpf').val(data[3]);
                $('#viewModal #rg').val(data[4]);
                $('#viewModal #dataNascimento').val(data[5]);
                $('#viewModal #sexo').val(data[6]);
                $('#viewModal #logradouro').val(data[7]);
                $('#viewModal #numero').val(data[8]);
                $('#viewModal #complemento').val(data[9]);
                $('#viewModal #bairro').val(data[10]);
                $('#viewModal #cidade').val(data[11]);
                $('#viewModal #email').val(data[12]);
                $('#viewModal #senha').val(data[13]);
                $('#viewModal #telefone').val(data[14]);

                $('#viewForm').attr('action');
                $('#viewModal').modal('show');
            });
            //End View

    })
</script>
@endsection
