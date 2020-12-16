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
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                {{-- START FORMULÁRIO DE EDIÇÃO DA ORDEM DE SERVIÇO --}}
                <form action="{{ route('ordemServicos.update', $registro->id) }}" method="post" class="form-group text-center">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="cliente">Cliente: *</label>
                        <select name="pessoa_id" id="pessoa" class="form-control" required>
                            <option value="">Selecione um Cliente</option>
                            @foreach ($listaPessoa as $item)
                                <option {{ ($registro->pessoa_id==$item->id) ? "selected" : "" }} value="{{ $item->id }}">{{ $item->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="equipamento">Equipamento: * </label>
                            <select name="equipamento_id" id="equipamento" class="form-control" required>
                                <option value="Selecione um equipamento"></option>
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
                            <label for="dataInicio">Data de Entrada: *</label>
                            <input type="text" name="dataInicio" id="dataInicio" class="form-control"
                             required value="{{ date('d/m/Y', strtotime($registro->dataInicio)) }}"
                             readonly>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="dataTermino">Data Término: </label>
                            <input type="text" name="dataTermino" id="dataTermino" class="form-control"
                             value="@if ($registro->dataTermino == null){{ $registro->dataTermino}}@else{{ date('d/m/Y', strtotime($registro->dataTermino)) }}@endif"
                             onkeypress="$(this).mask('00/00/0000')" placeholder="dd/mm/aaaa">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="statusServico">Status Serviço: *</label>
                            <select name="statusServico_id" id="statusServico" class="form-control" required>
                                <option value="">Selecione um status</option>
                                @foreach ($listaStatusServico as $item)
                                    <option {{ ($registro->statusServico_id==$item->id) ? "selected" : "" }} value="{{ $item->id }}">{{ $item->status }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="observacoesOS">Observações: </label>
                            <textarea name="observacoesOS" id="observacoesOS" cols="30" rows="1" class="form-control"
                             type="text" placeholder="Escreva as observações da O.S.">{{ $registro->observacoesOS }}</textarea>
                        </div>
                    </div>

                    {{--Tabela com os Orçamentos --}}
                    <hr class="hr-light">
                    <h4 class="text-center text-white"><u>Orçamento</u></h4>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div>
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addModalOrçamento">
                                        <i class="fas fa-plus mr-1" data-toggle="tooltip" data-placement="top" title="Incluir Anexo"></i>Adicionar Anexo
                                    </button>
                                </div>
                                <br>
                                <table class="table table-striped table-bordered table-sm white">
                                    <thead>
                                        <tr>
                                            <td>Nome Anexo</td>
                                            <td>Arquivo</td>
                                            <td>Ações</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($registro->anexoOrcamento as $item)
                                            <tr id="anexoOrcamento_{{ $item->id }}">
                                                <td>{{ $item->nome }}</td>
                                                <td>{{ $item->nome_arquivo }}</td>
                                                <td>
                                                    {{-- Download --}}
                                                    <a href="{{ route('download', $item->id) }}" class="btn btn-blue-grey btn-sm">
                                                        <i class="fas fa-download mr-1"></i>Download
                                                    </a>
                                                    {{-- Exclusão --}}
                                                    <button class="btn btn-danger btn-sm" type="button" onclick="removerAnexoOrcamento({{ $item->id }})">
                                                        <i class="far fa-trash-alt mr-1"></i>Excluir
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-2"></div>
                        </div>
                    </div>

                    {{-- Tabela Serviços --}}
                    <hr class="hr-light">
                    <h4 class="text-center text-white"><u>Serviço</u></h4>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div>
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addModalServico">
                                        <i class="fas fa-plus mr-1" data-toggle="tooltip" data-placement="top" title="Incluir Servico"></i>Adicionar Serviço a O.S.
                                    </button>
                                </div>
                                <br>
                                <table class="table table-striped table-bordered table-sm white">
                                    <thead>
                                        <tr>
                                            <td>Serviço</td>
                                            <td>Valor</td>
                                            <td>Ações</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($registro->osServico as $item)
                                            <tr id="osServico_{{ $item->id }}">
                                                <td>{{ $item->servico->servico }}</td>
                                                <td>R$ {{ $item->servico->valor }}</td>
                                                <td>
                                                    {{-- Exclusão --}}
                                                    <button class="btn btn-danger btn-sm" type="button" onclick="removerOsServico({{ $item->id }})">
                                                        <i class="far fa-trash-alt mr-1"></i>Excluir
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-2"></div>
                        </div>
                    </div>

                    {{-- Tabela Peças --}}
                    <hr class="hr-light">
                    <h4 class="text-center text-white"><u>Peças</u></h4>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div>
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addModalPeca">
                                        <i class="fas fa-plus mr-1" data-toggle="tooltip" data-placement="top" title="Incluir Peça"></i>Adicionar Peça a O.S.
                                    </button>
                                </div>
                                <br>
                                <table class="table table-striped table-bordered table-sm white">
                                    <thead>
                                        <tr>
                                            <td>QTD</td>
                                            <td>Peça</td>
                                            <td>Valor Unitário</td>
                                            <td>Valor Total</td>
                                            <td>Ações</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($registro->osPeca as $item)
                                            <tr id="osPeca_{{ $item->id }}">
                                                <td>{{ $item->qtd }}</td>
                                                <td>{{ $item->peca->item }}</td>
                                                <td>R$ {{ $item->peca->valorVenda }}</td>
                                                <td>R$ {{ $item->valor_total }}</td>
                                                <td>
                                                    {{-- Exclusão --}}
                                                    <button class="btn btn-danger btn-sm" type="button" onclick="removerOsPeca({{ $item->id }})">
                                                        <i class="far fa-trash-alt mr-1"></i>Excluir
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-2"></div>
                        </div>
                    </div>
                    <br>
                    <div class="col-lg-0"></div>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="form-group col-lg-9"></div>
                            <div class="form-group col-lg-3">
                                <label for="valorTotal">Valor Total:</label>
                                <input type="real" name="valorTotal" id="valorTotal" class="form-control" value="R$ {{ $registro->valorTotal }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-0"></div>

                    <hr class="hr-light">
                    {{-- Botão Salvar --}}
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save mr-1"></i>Salvar
                    </button>
                    {{-- Botão Voltar --}}
                    <a href="{{ route('ordemServicos.index') }}" class="btn btn-danger">
                        <i class="fas fa-undo mr-1"></i>Voltar
                    </a>
                    @if ($registro->statusServico_id != 5 && $registro->statusServico_id != 1 && $registro->statusServico_id != 2)
                        <a href="{{ route('fecharOS', $registro->id) }}" class="btn btn-primary">
                            <i class="far fa-times-circle mr-1"></i>Fechar O.S.
                        </a>
                    @endif
                    @if ($registro->statusServico_id == 5 || $registro->statusServico_id == 1 || $registro->statusServico_id == 2)
                        <a href="{{ route('reabrirOS', $registro->id) }}" class="btn btn-primary">
                            <i class="fas fa-door-open mr-1"></i>Reabir O.S.
                        </a>
                    @endif
                    @if ($registro->statusServico_id != 5 && $registro->statusServico_id != 2 )
                        <a href="{{ route('pagarOS', $registro->id) }}" class="btn btn-primary">
                            <i class="fas fa-hand-holding-usd mr-1"></i>Pagar O.S.
                        </a>
                    @endif
                    @if ($registro->statusServico_id != 5 && $registro->statusServico_id != 1 && $registro->statusServico_id != 2 )
                        <a href="{{ route('concertarOS', $registro->id) }}" class="btn btn-primary">
                            <i class="fas fa-check mr-1"></i>Concertar O.S.
                        </a>
                    @endif

                    <a href="{{ route('imprimirOS', $registro->id) }}" class="btn btn-primary">
                        <i class="fas fa-print mr-1"></i>Imprimir O.S.
                    </a>
                </form>
            </div>
        </div>
        <div class="col-lg-0"></div>
    </div>
    <br><br><br><br>

    {{-- Start Modal ADD Peça na OS --}}
    <div class="modal fade" id="addModalPeca" tabindex="-1" role="dialog" aria-labelledby="addModalPecaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                {{-- Cabeça do modal --}}
                <div class="modal-header peach-gradient">
                    <h5 class="modal-title text-white font-weight-bold" id="addModalPecaLabel">{{ __('Nova Peça') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- \Cabeça do modal --}}
                {{-- Corpo do modal --}}
                <div class="modal-body">
                    <form action="{{ route('osPecas.store') }}" method="POST" id="addFormPeca">
                        @csrf
                        <input type="hidden" name="ordemServico_id" value="{{ $registro->id }}">
                        <div class="row">
                            <div class="form-group col-lg-3">
                                <label for="qtd">Quantidade: *</label>
                                <input type="number" class="form-control" name="qtd" id="qtd" required>
                            </div>
                            <div class="form-group col-lg-9">
                                <label for="peca">Peça: *</label>
                                <select name="peca_id" id="peca_id" class="form-control" required>
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
                            <i class="fas fa-save mr-1"></i>{{ __('Salvar') }}
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal" data-toggle="tooltip" title="Cancelar">
                            <i class="fas fa-undo-alt mr-1"></i>{{ __('Cancelar') }}
                        </button>
                    </form>
                </div>
                {{-- \Corpo do modal --}}
            </div>
        </div>
    </div>
    {{-- End Modal ADD Peça na OS --}}

    {{-- Start Modal ADD Serviço na OS --}}
    <div class="modal fade" id="addModalServico" tabindex="-1" role="dialog" aria-labelledby="addModalServicoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                {{-- Cabeça do Modal --}}
                <div class="modal-header peach-gradient">
                    <h5 class="modal-title text-white font-weight-bold" id="addModalServicoLabel">{{ __('Novo Serviço') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- \Cabeça do Modal --}}
                {{-- Corpo do Modal --}}
                <div class="modal-body">
                    <form action="{{ route('osServicos.store') }}" method="POST" id="addFormServico">
                        @csrf
                        <input type="hidden" name="ordemServico_id" value="{{ $registro->id }}">
                        <div class="form-group">
                            <label for="servico_id">Servico: </label>
                            <select name="servico_id" id="servico_id" class="form-control">
                                <option value="">Selecione o Serviço</option>
                                @foreach ($listaServico as $item)
                                    <option value="{{ $item->id }}">{{ $item->servico }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6"></div>
                            <div class="form-group col-lg-6">
                                <label for="valorServico">Valor: </label>
                                <input type="real" class="form-control" name="valorServico" id="valorServico" readonly>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success" data-toggle="tooltip" title="Salvar">
                            <i class="fas fa-save mr-1"></i> {{ __('Salvar') }}
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal" data-toggle="toolt1p" title="Cancelar">
                            <i class="fas fa-undo-alt mr-1"></i>{{ __('Cancelar') }}
                        </button>
                    </form>
                </div>
                {{-- \Corpo do Modal --}}
            </div>
        </div>
    </div>
    {{-- End Modal ADD Serviço na OS --}}

    {{-- Start Modal ADD Orçamento na OS --}}
    <div class="modal fade" id="addModalOrçamento" tabindex="-1" role="dialog" aria-labelledby="addModalAnexoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                {{-- Cabeça do Modal --}}
                <div class="modal-header peach-gradient">
                    <h5 class="modal-title text-white font-weight-bold" id="addModalAnexoLabel">{{ __('Novo Anexo') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- \Cabeça do Modal --}}
                {{-- Corpo do Modal --}}
                <div class="modal-body">
                    <form action="{{ route('anexoorcamento.store') }}" method="post" id="addFormAnexo" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="ordemServico_id" value="{{ $registro->id }}">
                        <div class="form-group">
                            <label for="nome">Nome: </label>
                            <input type="text" name="nome" id="nome" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="arquivo">Arquivo: </label>
                            <input type="file" name="arquivo" id="arquivo" class="form-control-file">
                        </div>
                        <button type="submit" class="btn btn-success" data-toggle="tooltip" title="Salvar">
                            <i class="fas fa-save mr-1"></i>{{ __('Salvar') }}
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal" data-toggle="tooltip" title="Cancelar">
                            <i class="fas fa-undo-alt mr-1"></i>{{ __('Cancelar') }}
                        </button>
                    </form>
                </div>
                {{-- \Corpo do Modal --}}
            </div>
        </div>
    </div>
    {{-- End Modal ADD Orçamento na OS --}}
@endsection

@section('script_pages')
    <script>

        //função com método ajax para buscar informações sobre a Peça
        $('#peca_id').on('change', function(event){
            event.stopPropagation();
            value = $(this).children("option:selected").val();
            //alert("hello mundão : " + value);
            // GET AJAX request
            $.ajax({
                type: 'POST',
                url:  "{{ route('postPeca') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": value
                },
                success: function (response) {

                    console.log(response);

                    $('#valorPeca').val(response.pecaValor);

                },
                error: function (response) {
                    console.log(response)
                }
            });
        });

        //função com método ajax para buscar informações sobre o Serviço
        $('#servico_id').on('change', function(event){
            event.stopPropagation();
            value = $(this).children("option:selected").val();

            $.ajax({
                type: 'POST',
                url: "{{ route('postServico') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": value
                },
                success: function(response) {

                    console.log(response);

                    $('#valorServico').val(response.servicoValor);
                },
                error: function(response) {
                    console.log(response)
                }
            });
        });

        // Função com método ajax para remover item peça da tabela
        function removerOsPeca(id){
            $.ajax({
                type: 'POST',
                url: "{{ route('removerOsPecas') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                success: function(response) {

                    console.log(response);

                    $('[id*="osPeca_'+id+'"]').remove();

                },
                error: function(response) {
                    console.log(response)
                }
            });
            // após excluir a peça da um reload na página para atualizar o valor total
            window.location.reload();
        }

        // Função com método ajax para remover item serviço da tabela
        function removerOsServico(id){
            $.ajax({
                type: 'POST',
                url: "{{ route('removerOsServicos') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                success: function(response) {

                    console.log(response);

                    $('[id*="osServico_'+id+'"]').remove();

                },
                error: function(response) {
                    console.log(response)
                }
            });
            // após excluir o serviço da um reload na página para atualizar o valor total
            window.location.reload();
        }

        // Função com método ajax para remover anexo da tabela
        function removerAnexoOrcamento(id){
            $.ajax({
                type: 'POST',
                url: "{{ route('removerAnexoOrcamento') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                success: function(response) {

                    console.log(response);

                    $('[id*="anexoOrcamento_'+id+'"]').remove();
                },
                error: function(response) {
                    console.log(response)
                }
            });
        }

    </script>

    @include('scripts.confirmdeletion')
@endsection
