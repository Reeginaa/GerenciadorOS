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
                            <label for="tipo_modal">Tipo Pessoa: * </label>
                                <a href="#" class="tipoPessoa" data-toggle="modal" data-target="#addTipoPessoa">
                                    <i class="fas fa-plus mr-1" data-toggle="tooltip" title="Novo Tipo Pessoa"></i>Cadastrar Tipo Pessoa
                                </a>
                            <select name="tipoPessoa_id_modal" id="tipo_modal" class="form-control" required>
                                <option value="">Selecione um tipo de pessoa</option>
                                @foreach ($listaTipoPessoa as $item)
                                    <option value="{{ $item->id }}">{{ $item->tipo }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nome_modal">Nome: *</label>
                            <input id="nome_modal" type="text" class="form-control" name="nome_modal" required
                            placeholder="Escreva o nome da pessoa" maxlength="250">
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="cpf_modal">CPF: *</label>
                                <input id="cpf_modal" type="text" class="form-control" name="cpf_modal" required
                                onkeypress="$(this).mask('000.000.000-00');" placeholder="___.___.___-__">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="rg_modal">RG: *</label>
                                <input id="rg_modal" type="text" class="form-control" name="rg_modal" required max="10">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-5">
                                <label for="dataNascimento_modal">Data Nascimento: *</label>
                                <input type="date" name="dataNascimento_modal" id="dataNascimento_modal" class="form-control" required>
                            </div>
                            <div class="form-group col-lg-7">
                                <label for="sexo_modal">Sexo: *</label>
                                <input type="text" name="sexo_modal" id="sexo_modal" class="form-control" required
                                placeholder="Feminino/Masculino">
                            </div>
                        </div>

                        <hr>
                        <h4 class="text-center"><u>Endereço</u></h4>
                        <div class="row">
                            <div class="form-group col-lg-10">
                                <label for="logradouro_modal">Logradouro: *</label>
                                <input type="text" name="logradouro_modal" id="logradouro_modal" class="form-control" required
                                placeholder="Informe o endereço">
                            </div>
                            <div class="form-group col-lg-2">
                                <label for="numero_modal">Nº: </label>
                                <input type="int" name="numero_modal" id="numero_modal" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="complemento_modal">Complemento: </label>
                            <input type="text" name="complemento_modal" id="complemento_modal" class="form-control"
                             placeholder="Informe um ponto de referência ou mais informações desejadas">
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="bairro_modal">Bairro: *</label>
                                <input type="text" name="bairro_modal" id="bairro_modal" class="form-control" required
                                placeholder="Informe o bairro">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="cidade_modal">Cidade: *</label>
                                <input type="text" name="cidade_modal" id="cidade_modal" class="form-control" required
                                placeholder="Informe a cidade">
                            </div>
                        </div>
                        <hr>
                        <h4 class="text-center"><u>Outras Informações Para Contato</u></h4>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="email_modal">E-mail: </label>
                            <input type="email" name="email_modal" id="email_modal" class="form-control"
                            placeholder="example@example.com.br">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="telefone_modal">Telefone:</label>
                                <input type="text" name="telefone_modal" id="telefone_modal" class="form-control"
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
                            <label for="nomeEquipamento_modal">Equipamento: *</label>
                            <input id="nomeEquipamento_modal" type="text" class="form-control" name="nomeEquipamento_modal" required
                            placeholder="Escreva o nome do equipamento" max="40">
                        </div>
                        <div class="form-group">
                            <label for="marca_modal">Marca: * </label>
                                <a href="#" class="marca" data-toggle="modal" data-target="#addMarca">
                                    <i class="fas fa-plus mr-1" data-toggle="tooltip" title="Nova Marca"></i>Cadastrar Marca
                                </a>
                            <select class="form-control" name="marca_id_modal" id="marca_modal" required>
                                <option value="">Selecione uma Marca</option>
                                @foreach ($listaMarca as $item)
                                    <option value="{{ $item->id }}">{{ $item->nomeMarca }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="modelo_modal">Modelo: </label>
                                <input type="text" name="modelo_modal" id="modelo_modal" class="form-control"
                                placeholder="Escreva o modelo do Equipamento">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="numeroSerie_modal">Nº de Série: </label>
                                <input type="text" name="numeroSerie_modal" id="numeroSerie_modal" class="form-control"
                                placeholder="Escreva o número de série">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="observacoesEquipamento_modal">Observações: </label>
                            <textarea id="observacoesEquipamento_modal" name="observacoesEquipamento_modal" type="text" class="form-control"
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

    {{-- START Modal ADD Tipo Pessoa --}}
    <div class="modal fade" id="addTipoPessoa" tabindex="1600" role="dialog" aria-labelledby="addTipoPessoaLabel" aria-hidden="true" style="z-index: 1600 !important">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header peach-gradient">
                    <h5 class="modal-title text-white font-weight-bold" id="addTipoPessoaLabel">
                        {{ __('Novo Tipo Pessoa') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ action('App\Http\Controllers\TipoPessoaController@store') }}" method="POST" id="formAddTipoPessoa" onsubmit="return false;">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="tipoPessoa_modal" class="md-0">Tipo Pessoa: *</label>
                            <input type="text" id="tipoPessoa_modal" class="form-control" name="tipoPessoa_modal" required
                             placeholder="Escreva o tipo de pessoa, ex.: Cliente, Atendente...">
                        </div>
                        <div class="form-group">
                            <label for="descricao_modal">Descrição: </label>
                            <textarea name="descricao_modal" id="descricao_modal" type="text" class="form-control"
                             placeholder="Escreva uma descrição se necessário"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success" data-toggle="tooltip" title="Salvar" id="addTipoPessoaButton">
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
    {{-- END Modal ADD Tipo Pessoa --}}

    {{--START ADD Modal Marca --}}
    <div class="modal fade" id="addMarca" tabindex="1600" role="dialog" aria-labelledby="addMarcaLabel" aria-hidden="true" style="z-index: 1600 !important;">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header peach-gradient">
                    <h5 class="modal-title text-white font-weight-bold" id="addMarcaLabel">
                        {{ __('Nova Marca') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ action('App\Http\Controllers\MarcaController@store') }}" method="post" id="formAddMarca" onsubmit="return false;">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nomeMarca_modal">Marca: *</label>
                            <input id="nomeMarca_modal" type="text" class="form-control" name="nomeMarca_modal" required
                             placeholder="Escreva o nome da marca">
                        </div>
                        <div class="form-group">
                            <label for="observacaoMarca_modal">Observações: </label>
                            <textarea id="observacaoMarca_modal" name="observacaoMarca_modal" type="text" class="form-control"
                             placeholder="Escreva as observações da marca se necessário"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success" data-toggle="tooltip" title="Salvar" id="addMarcaButton">
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
    {{-- END ADD Modal Marca --}}
@endsection

@section('script_pages')
    <script>
        $(document).ready(function(){

            // Modal de Cliente
            $('#formAddCliente').submit(function(){
                // Pegando os dados do formulário e pegando o token que valida o request
                var nome = $("#nome_modal").val();
                var cpf = $("#cpf_modal").val();
                var rg = $("#rg_modal").val();
                var dataNascimento = $("#dataNascimento_modal").val();
                var sexo = $("#sexo_modal").val();
                var logradouro = $("#logradouro_modal").val();
                var numero = $("#numero_modal").val();
                var complemento = $("#complemento_modal").val();
                var bairro = $("#bairro_modal").val();
                var cidade = $("#cidade_modal").val();
                var email = $("#email_modal").val();
                var telefone = $("#telefone_modal").val();
                var tipoPessoa_id = $("#tipo_modal").val();
                var _token = $("[name='_token']")[0]. value;

                // Montando o objeto que será enviado na request
                var dados = {
                    nome: nome,
                    cpf: cpf,
                    rg: rg,
                    dataNascimento: dataNascimento,
                    sexo: sexo,
                    logradouro: logradouro,
                    numero: numero,
                    complemento: complemento,
                    bairro: bairro,
                    cidade: cidade,
                    email: email,
                    telefone: telefone,
                    tipoPessoa_id: tipoPessoa_id,
                    _token: _token,
                    ajax: true
                }

                //console.log(dados);

                // Executando o POST para a rota de cadastro de pessoa
                $.ajax({
                    url: "/pessoas",
                    type: 'POST',
                    data: dados
                })

                // Caso der sucesso então adiciona a pessoa no select e fecha o modal
                .done(function(result){
                    // Como o resultado volta em string então da parse para JSON
                    result = JSON.parse(result);

                    // setando o tipo pessoa no select
                    $('[name=id]').map(function(_i, element){
                        var option = document.createElement("option");
                        option.text = result.nome + " - " + result.cpf;
                        option.value = result.id;
                        element.appendChild(option);
                        element.value = result.id;
                    });

                    // Fechando o modal
                    $('#addCliente').modal('hide');
                })

                // Caso der erro então da um aviso
                .fail(function(err){
                    console.log(err);
                    alert("Erro ao tentar cadastrar pessoa.");
                })

                return false;
            });

            // Modal de Equipamento
            $('#formAddEquipamento').submit(function(){
                // Pegando os dados do formulário e pegando o token que validá o request
                var nomeEquipamento = $("#nomeEquipamento_modal").val();
                var modelo = $("modelo_modal").val();
                var numeroSerie = $("#numeroSerie_modal").val();
                var observacoesEquipamento = $("#observacoesEquipamento_modal").val();
                var marca_id = $("#marca_modal").val();
                var _token = $("[name='_token']")[0].value;

                // Montando o objeto que será enviado na request
                var dados = {
                    nomeEquipamento: nomeEquipamento,
                    modelo: modelo,
                    numeroSerie: numeroSerie,
                    observacoesEquipamento: observacoesEquipamento,
                    marca_id: marca_id,
                    _token: _token,
                    ajax: true
                }


                // Executando o POST para a rota de cadastro de tipo pessoa
                $.ajax({
                    url:"/equipamentos",
                    type: 'POST',
                    data: dados
                })

                // Caso der sucesso então adiciona o novo equipamento no select e fecha o modal
                .done(function(result){
                    // Como o resultado volta em string então da parse para JSON
                    result = JSON.parse(result);

                    // setando o tipo pessoa no select
                    $('[name=id]').map(function(_i, element){
                        var option = document.createElement("option");
                        option.text = result.nomeEquipamento;
                        option.value = result.id;
                        element.appendChild(option);
                        element.value = result.id;
                    });

                    // Fechando o modal
                    $('#addEquipamento').modal('hide');
                })

                // Caso der erro então da um aviso
                .fail(function(err){
                    console.log(err);
                    alert("Erro ao tentar cadastrar equipamento.");
                })

                return false;
            });

            // Modal Tipo Pessoa
            $('#formAddTipoPessoa').submit(function(){
                // Pegando os dados do formulário e pegando o token que validá o request
                var tipo = $("#tipoPessoa_modal").val();
                var descricao = $("#descricao_modal").val();
                var _token = $("[name='_token']")[0].value;

                // Montando o objeto que será enviado na request
                var dados = {
                    tipo: tipo,
                    descricao: descricao,
                    _token: _token,
                    ajax: true
                }

                console.log(dados);

                // Executando o POST para a rota de cadastro de tipo pessoa
                $.ajax({
                    url:"/tipoPessoas",
                    type: 'POST',
                    data: dados
                })

                // Caso der sucesso então adiciona o novo tipo de pessoa no select e fecha o modal
                .done(function(result){
                    // Como o resultado volta em string então da parse para JSON
                    result = JSON.parse(result);

                    // setando o tipo pessoa no select
                    $('[name=id]').map(function(_i, element){
                        var option = document.createElement("option");
                        option.text = result.tipo;
                        option.value = result.id;
                        element.appendChild(option);
                        element.value = result.id;
                    });

                    // Fechando o modal
                    $('#addTipoPessoa').modal('hide');
                })

                // Caso der erro então da um aviso
                .fail(function(err){
                    console.log(err);
                    alert("Erro ao tentar cadastrar tipo de pessoa.");
                })

                return false;
            });

            // Modal Marca
            $('#formAddMarca').submit(function(){
                // Pegando os dados do formulário e pegando o token que validá o request
                var nomeMarca = $("#nomeMarca_modal").val();
                var observacaoMarca = $("observacaoMarca_modal").val();
                var _token = $("[name='_token']")[0].value;

                // Montando o objeto que será enviado na request
                var dados = {
                    nomeMarca: nomeMarca,
                    observacaoMarca: observacaoMarca,
                    _token: _token,
                    ajax: true
                }

                // Executando o POST para a rota de cadastro de marca
                $.ajax({
                    url:"/marcas",
                    type: 'POST',
                    data: dados
                })

                // Caso der sucesso então adiciona a nova marca no select e fecha o modal
                .done(function(result){
                    // Como o resultado volta em string então da parse para JSON
                    result = JSON.parse(result);

                    // setando o tipo pessoa no select
                    $('[name=id]').map(function(_i, element){
                        var option = document.createElement("option");
                        option.text = result.nomeMarca;
                        option.value = result.id;
                        element.appendChild(option);
                        element.value = result.id;
                    });

                    // Fechando o modal
                    $('#addMarca').modal('hide');
                })

                // Caso der erro então da um aviso
                .fail(function(err){
                    console.log(err);
                    alert("Erro ao tentar cadastrar a marca.");
                })

                return false;
            });

        });
    </script>
@endsection
