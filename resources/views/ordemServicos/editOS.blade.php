@extends('admin')

<title>Editar Ordem Serviço</title>

@section('main')
<br><br><br><br>
<div class="row">
    <div class="col-lg-0"></div>
    <div class="col-lg-12">
        <div id="ui">
            <h1 class="text-center">Editar Ordem de Serviço</h1>
            <hr class="hr-light">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('ordemServicos.update', $registro->id) }}" method="post" class="form-group text-center">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="cliente">Cliente: * |
                        <a href="{{ route('pessoas.create') }}">
                            <i class="fas fa-plus"></i> Cadastrar Cliente
                        </a>
                    </label>
                    <select name="pessoa_id" id="pessoa" class="form-control" required>
                        <option value="">Selecione o cliente</option>
                        @foreach ($listaPessoa as $item)
                            <option {{ ($registro->pessoa_id==$item->id) ? "selected" : "" }} value="{{ $item->id }}">{{ $item->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="equipamento">Equipamento: * |
                            <a href="{{ route('equipamentos.create') }}">
                                <i class="fas fa-plus"></i> Cadastrar Equipamento
                            </a>
                        </label>
                        <select name="equipamento_id" id="equipamento" class="form-control" required>
                            <option value="">Selecione um equipamento</option>
                            @foreach ($listaEquipamento as $item)
                                <option {{ ($registro->equipamento_id==$item->id) ? "selected" : "" }} value="{{ $item->id }}">{{ $item->nomeEquipamento }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="defeito">Defeito: *</label>
                        <input type="text" name="defeito" id="defeito" class="form-control" required
                         placeholder="Escreva o problema/defeito do equipamento" value="{{ $registro->defeito }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="dataInicio">Data Inicio: *</label>
                        <input type="date" name="dataInicio" id="dataInicio" class="form-control"
                         required value="{{ $registro->dataInicio }}">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="dataTermino">Data Término: </label>
                        <input type="date" name="dataTermino" id="dataTermino" class="form-control"
                         value="{{ $registro->dataTermino }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="statusServico">Status serviço: *</label>
                        <select name="statusServico_id" id="statusServico" class="form-control" required>
                            <option value="">Selecione um status</option>
                            @foreach ($listaStatusServico as $item)
                                <option {{ ($registro->statusServico_id==$item->id) ? "selected" : "" }} value="{{ $item->id }}">{{ $item->status }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="observacoesOS">Observações:</label>
                        <textarea name="observacoesOS" id="observacoesOS" cols="30" rows="1" class="form-control"
                         type="text" placeholder="Escreva as observações do equipament">
                         {{ $registro->observacoesOS }}
                        </textarea>
                    </div>
                </div>

                {{-- Orçamento --}}
                <hr class="hr-light">
                <h4 class="text-center text-white"><u>Orçamento</u></h4>
                <div class="form-group">
                    <input type="file" name="arquivo" id="arquivo" class="form-control" value="{{ $registro->arquivo }}">
                </div>

                {{-- Tabela Serviço --}}
                <hr class="hr-light">
                <h4 class="text-center text-white"><u>Serviço</u></h4>
                <div class="container">

                </div>

                {{-- Tabela Peças --}}
                <hr class="hr-light">
                <h4 class="text-center text-white"><u>Peças</u></h4>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <div>
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                 data-target="#addModal">
                                    <i class="far fa-file-alt" data-toggle="tooltip" data-placement="top"
                                        title="Incluir"></i> Adicionar Peça
                                </button>
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
                                    @foreach ($registro->osPeca as $item)
                                        <tr>
                                            <td>{{ $item->quantidade }}</td>
                                            <td>{{ $item->peca->item }}</td>
                                            <td>{{ $item->peca->valorVenda }}</td>
                                            <td>
                                                <form action="{{ route('osPecas.destroy', $item->id) }}" method="POST">
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
                        <div class="col-lg-1"></div>
                    </div>
                </div>

                <hr class="hr-light">
                <button type="submit" class="btn btn-success">Salvar</button>
                @if ($registro->statusServico_id != 5 && $registro->statusServico_id != 1)
                    <a href="{{ route('fecharOS', $registro->id) }}" class="btn btn-primary">Fechar O.S.</a>
                @endif
                @if ($registro->statusServico_id == 5 || $registro->statusServico_id == 1)
                    <a href="{{ route('reabrirOS', $registro->id) }}" class="btn btn-primary">Reabir O.S.</a>
                @endif
                @if ($registro->statusServico_id != 5 && $registro->statusServico_id != 1)
                    <a href="{{ route('faturarOS', $registro->id) }}" class="btn btn-primary">Faturar O.S.</a>
                    <a href="{{ route('concertarOS', $registro->id) }}" class="btn btn-primary">Concertada</a>
                @endif

                <a href="#" class="btn btn-primary">Imprimir O.S.</a>
                <a href="#" class="btn btn-primary">Imprimir Nº</a>
                <a href="{{ route('ordemServicos.index') }}" class="btn btn-danger">Voltar</a>
            </form>
        </div>
    </div>
    <div class="col-lg-0"></div>
</div>

{{-- Start add modal --}}
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            {{-- Cabeça do modal --}}
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white font-weight-bold" id="addModalLabel">{{ __('Nova Peça') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- \Cabeça do modal --}}
            {{-- Corpo do modal --}}
            <div class="modal-body">
                <form action="{{ route('osPecas.store') }}" method="POST" id="addForm">
                    @csrf
                    <input type="hidden" name="ordemServico_id" value="{{ $registro->id }}">
                    <div class="row">
                        <div class="form-group col-lg-3">
                            <label for="quantidade">Quantidade:</label>
                            <input type="integer" class="form-control" name="quantidade" id="quantidade">
                        </div>
                        <div class="form-group col-lg-9">
                            <label for="peca">Peça: |
                                <a href="{{ route('pecas.create') }}">
                                    <i class="fas fa-plus"></i> Cadastrar Peça
                                </a>
                            </label>
                            <select name="peca_id" id="peca_id" class="form-control">
                                <option value="">Selecione a Peça</option>
                                @foreach ($listaPeca as $item)
                                    <option value="{{ $item->id }}">{{ $item->item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6"></div>
                        <div class="form-group col-lg-6">
                            <label for="valorPeca">Valor Unitário: </label>
                            <input type="real" class="form-control" name="valorPeca" id="valorPeca" readonly>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success" data-toggle="tooltip" title="Salvar">
                        <i class="fas fa-save mr-1"></i>{{ _('Salvar') }}
                    </button>
                </form>
            </div>
            {{-- \Corpo do modal --}}
            {{-- Rodapé do modal --}}
            {{-- <div class="modal-footer bg-light">
                <button type="button" class="btn btn-warning" data-dismiss="modal" data-toggle="tooltip" title="Cancelar">
                    <i class="fas fa-undo-alt mr-1"></i>{{ __('Cancelar') }}
                </button>
                <button type="submit" form="addModal" class="btn btn-success" data-toggle="tooltip" title="Salvar">
                    <i class="fas fa-save mr-1"></i>{{ _('Salvar') }}
                </button>
            </div> --}}
            {{-- \Rodapé do modal --}}
        </div>
    </div>
</div>
{{-- End add modal --}}
<br><br><br><br>
@endsection

@section('script_pages')
    <script>
         //função com método ajax para buscar informações sobre o produto
        $('#peca_id').on('change', function(event){
            event.stopPropagation();
            value = $(this).children("option:selected").val();
            //alert("hello mundão : " + value);
            // GET AJAX request
            $.ajax({
                type: 'POST',
                url:  "{{ route('getPeca') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": value
                },
                success: function (response) {

                    console.log(response);

                    $('#valorPeca').val(response.valor);

                },
                error: function (response) {
                    console.log(response)
                }
            });
            //atualizaSubTotal();
        });
    </script>
@endsection
