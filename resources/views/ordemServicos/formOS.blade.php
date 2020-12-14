@extends('admin')

<title>Adicionar Ordem Serviço</title>

@section('main')
    <br><br><br><br>
    <div class="row">
        <div class="col-lg-0"></div>
        <div class="col-lg-12">
            <div id="ui">
                <h1 class="text-center">Adicionar Ordem de Serviço</h1>
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

                <form action="{{ route('ordemServicos.store') }}" method="post" class="form-group text-center">
                    @csrf
                    <div class="form-group">
                        <label for="cliente">Cliente: * </label>
                            <a href="#" class="cliente" data-toggle="modal" data-target="#addCliente">
                                <i class="fas fa-plus mr-1" data-toggle="tooltip" title="Novo Cliente"></i>Cadastrar Cliente
                            </a>
                        <select name="pessoa_id" id="pessoa" class="form-control" required>
                            <option value="">Selecione o cliente</option>
                            @foreach ($listaPessoa as $item)
                                <option value="{{ $item->id }}">{{ $item->nome . ' - ' . $item->cpf }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="equipamento">Equipamento: * </label>
                                <a href="#" class="equipamento" data-toggle="modal" data-target="#addEquipamento">
                                    <i class="fas fa-plus mr-1" data-toggle="tooltip" title="Novo Equipamento"></i>Cadastrar Equipamento
                                </a>
                            <select name="equipamento_id" id="equipamento" class="form-control" required>
                                <option value="">Selecione um equipamento</option>
                                @foreach ($listaEquipamento as $item)
                                    <option value="{{ $item->id }}">{{ $item->nomeEquipamento }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="defeito">Defeito: *</label>
                            <input type="text" name="defeito" id="defeito" class="form-control" required
                            placeholder="Escreva o problema/defeito do equipamento">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="dataInicio">Data de Entrada: *</label>
                            <input type="date" name="dataInicio" id="dataInicio" class="form-control"
                            required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="dataTermino">Data Término: </label>
                            <input type="date" name="dataTermino" id="dataTermino" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="statusServico">Status serviço: *</label>
                            <select name="statusServico_id" id="statusServico" class="form-control" required>
                                <option value="">Selecione um status</option>
                                @foreach ($listaStatusServico as $item)
                                    <option value="{{ $item->id }}">{{ $item->status }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="observacoesOS">Observações:</label>
                            <textarea name="observacoesOS" id="observacoesOS" cols="30" rows="1" class="form-control"
                            type="text" placeholder="Escreva as observações do equipamento"></textarea>
                        </div>
                    </div>

                    {{-- Termos checkbox --}}
                    <hr class="hr-light">
                    <h4 class="text-center text-white"><b>Termos</b></h4>
                    <p class="font-weight-light text-justify text-white">
                        <li class="text-center text-white">Todo serviço realizado tem <b>garantia de 3 meses</b>,
                            apartir da data de término aqui constada.
                        </li>
                        <li class="text-center text-white">Após o decorrer de <b>3 meses</b> e <b>3 tentativas</b> de entrar em
                            contato com o cliente, e o equipamento permanecer nos aposentos da loja, a <b>loja tem
                            total liberdade para realizar o descarte, venda, doação ou leilão do mesmo.</b>
                        </li>
                        <li class="text-center text-white">Se por acaso o cliente comparecer ao estabelecimento
                            para a retirada do equipamento e o mesmo estiver ainda no estabelecimento, <b>após o
                            decorrer de 3 meses, o cliente deverá pagar uma multa.</b>
                        </li>
                        <br>
                        <input type="checkbox" name="termos" id="termos" class="form-check-input" value="1" required>
                        <label for="termos"><b><u>Li, concordo e estou ciente dos termos.</u></b></label>
                    </p>
                    <hr class="hr-light">
                    <button type="submit" class="btn btn-success">
                        <i class="far fa-save mr-1"></i>Salvar
                    </button>
                    <button type="reset" class="btn btn-warning">
                        <i class="fas fa-backspace mr-1"></i>Limpar
                    </button>
                    <a href="{{ route('ordemServicos.index') }}" class="btn btn-danger">
                        <i class="fas fa-undo mr-1"></i>Voltar
                    </a>
                </form>
            </div>
        </div>
        <div class="col-lg-0"></div>
    </div>
    <br><br><br><br>

    {{-- MODAL AUXILIAR --}}

    {{-- START Modal ADD Cliente --}}
    <div class="modal fade" id="addCliente" tabindex="1600" role="dialog" aria-labelledby="addClienteLabel" aria-hidden="true" style="z-index: 1600 !important">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header peach-gradient">
                    <h5 class="modal-title text-white font-weight-bold" id="addClienteLabel">
                        {{ __('Novo Cliente') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ action('App\Http\Controllers\PessoaController@store') }}" method="post" id="formAddCliente" onsubmit="return false;">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="tipo">Tipo Pessoa: * </label>
                                <a href="#" class="tipoPessoa" data-toggle="modal" data-target="#addTipoPessoa">
                                    <i class="fas fa-plus mr-1" data-toggle="tooltip" title="Novo Tipo Pessoa"></i>Cadastrar Tipo Pessoa
                                </a>
                            <select name="tipoPessoa_id" id="tipo" class="form-control" required>
                                <option value="">Selecione um tipo de pessoa</option>
                                {{-- @foreach ($listaTipoPessoa as $item)
                                    <option value="{{ $item->id }}">{{ $item->tipo }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nome">Nome: *</label>
                            <input id="nome" type="text" class="form-control" name="nome" required
                            placeholder="Escreva o nome da pessoa" maxlength="250">
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="cpf">CPF: *</label>
                                <input id="cpf" type="text" class="form-control" name="cpf" required
                                onkeypress="$(this).mask('000.000.000-00');" placeholder="___.___.___-__">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="rg">RG: *</label>
                                <input id="rg" type="text" class="form-control" name="rg" required max="10">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-5">
                                <label for="dataNascimento">Data Nascimento: *</label>
                                <input type="date" name="dataNascimento" id="dataNascimento" class="form-control" required>
                            </div>
                            <div class="form-group col-lg-7">
                                <label for="sexo">Sexo: *</label>
                                <input type="text" name="sexo" id="sexo" class="form-control" required
                                placeholder="Feminino/Masculino">
                            </div>
                        </div>

                        <hr>
                        <h4 class="text-center"><u>Endereço</u></h4>
                        <div class="row">
                            <div class="form-group col-lg-10">
                                <label for="logradouro">Logradouro: *</label>
                                <input type="text" name="logradouro" id="logradouro" class="form-control" required
                                placeholder="Informe o endereço">
                            </div>
                            <div class="form-group col-lg-2">
                                <label for="numero">Nº: </label>
                                <input type="int" name="numero" id="numero" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="complemento">Complemento: </label>
                            <input type="text" name="complemento" id="complemento" class="form-control"
                             placeholder="Informe um ponto de referência ou mais informações desejadas">
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="bairro">Bairro: *</label>
                                <input type="text" name="bairro" id="bairro" class="form-control" required
                                placeholder="Informe o bairro">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="cidade">Cidade: *</label>
                                <input type="text" name="cidade" id="cidade" class="form-control" required
                                placeholder="Informe a cidade">
                            </div>
                        </div>
                        <hr>
                        <h4 class="text-center"><u>Outras Informações Para Contato</u></h4>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="email">E-mail: </label>
                            <input type="email" name="email" id="email" class="form-control"
                            placeholder="example@example.com.br">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="telefone">Telefone:</label>
                                <input type="text" name="telefone" id="telefone" class="form-control"
                                placeholder="(99) 9 9999-9999" onkeypress="$(this).mask('(00) 0 0000-0000')">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success" data-toggle="tooltip" title="Salvar" id="addClienteButton">
                            <i class="fas fa-save mr-1"></i>{{ __('Salvar') }}
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal" data-toggle="tooltip" title="Cancelar">
                            <i class="fas fa-undo-alt mr-1"></i>{{ __('Cancelar') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- END Modal ADD Cliente --}}

    {{-- START Modal ADD Equipamento --}}
    <div class="modal fade" id="addEquipamento" tabindex="1600" role="dialog" aria-labelledby="addEquipamentoLabel" aria-hidden="true" style="z-index: 1600 !important">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header peach-gradient">
                    <h5 class="modal-title text-white font-weight-bold" id="addEquipamentoLabel">
                        {{ __('Novo Equipamento') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ action('App\Http\Controllers\EquipamentoController@store') }}" method="post" id="formAddEquipamento" onsubmit="return false;">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nomeEquipamento">Equipamento: *</label>
                            <input id="nomeEquipamento" type="text" class="form-control" name="nomeEquipamento" required
                            placeholder="Escreva o nome do equipamento" max="40">
                        </div>
                        <div class="form-group">
                            <label for="marca">Marca: * </label>
                                <a href="#" class="marca" data-toggle="modal" data-target="#addMarca">
                                    <i class="fas fa-plus mr-1" data-toggle="tooltip" title="Nova Marca"></i>Cadastrar Marca
                                </a>
                            <select class="form-control" name="marca_id" id="marca" required>
                                <option value="">Selecione uma Marca</option>
                                {{-- @foreach ($listaMarca as $item)
                                    <option value="{{ $item->id }}">{{ $item->nomeMarca }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="modelo">Modelo: </label>
                                <input type="text" name="modelo" id="modelo" class="form-control"
                                placeholder="Escreva o modelo do Equipamento">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="numeroSerie">Nº de Série: </label>
                                <input type="text" name="numeroSerie" id="numeroSerie" class="form-control"
                                placeholder="Escreva o número de série">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="observacoesEquipamento">Observações: </label>
                            <textarea id="observacoesEquipamento" name="observacoesEquipamento" type="text" class="form-control"
                            placeholder="Escreva as observações do equipamento se necessário" maxlength="350"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success" data-toggle="tooltip" title="Salvar" id="addEquipamentoButton">
                            <i class="fas fa-save mr-1"></i>{{ __('Salvar') }}
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal" data-toggle="tooltip" title="Cancelar">
                            <i class="fas fa-undo-alt mr-1"></i>{{ __('Cancelar') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- END Modal ADD Equipamento --}}
@endsection
