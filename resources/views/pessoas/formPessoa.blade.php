@extends('admin')

<title>Adicionar Pessoa</title>

@section('main')
    <br><br><br><br>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div id="ui">
                <h1 class="text-center">Adicionar Pessoa</h1>
                <hr class="hr-light">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('pessoas.store') }}" method="post" class="form-group text-center">
                    @csrf
                    <div class="form-group">
                        <label for="tipo">Tipo Pessoa: * </label>
                            <a href="#" class="tipoPessoa" data-toggle="modal" data-target="#addTipoPessoa">
                                <i class="fas fa-plus mr-1" data-toggle="tooltip" title="Novo Tipo Pessoa"></i>Cadastrar Tipo Pessoa
                            </a>
                        <select name="tipoPessoa_id" id="tipo" class="form-control" required>
                            <option value="">Selecione um tipo de pessoa</option>
                            @foreach ($listaTipoPessoa as $item)
                                <option value="{{ $item->id }}">{{ $item->tipo }}</option>
                            @endforeach
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

                    <hr class="hr-light">
                    <h4 class="text-center text-white"><u>Endereço</u></h4>
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
                    <hr class="hr-light">
                    <h4 class="text-center text-white"><u>Outras Informações Para Contato</u></h4>
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
                    <hr class="hr-light">
                    <button type="submit" class="btn btn-success">
                        <i class="far fa-save mr-1"></i>Salvar
                    </button>
                    <button type="reset" class="btn btn-warning">
                        <i class="fas fa-backspace mr-1"></i>Limpar
                    </button>
                    <a href="{{ route('pessoas.index') }}" class="btn btn-danger">
                        <i class="fas fa-undo mr-1"></i>Voltar
                    </a>
                </form>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
    <br><br><br><br>

    {{-- MODAL AUXILIAR --}}

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
                            <label for="tipo_modal" class="md-0">Tipo Pessoa: *</label>
                            <input type="text" id="tipo_modal" class="form-control" name="tipo_modal" required
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
@endsection

@section('script_pages')
    <script>
        $(document).ready(function(){

            $('#formAddTipoPessoa').submit(function(){
                // Pegando os dados do formulário e pegando o token que validá o request
                var tipo = $("#tipo_modal").val();
                var descricao = $("descricao_modal").val();
                var _token = $("[name='_token']")[0].value;

                // Montando o objeto que será enviado na request
                var dados = {
                    tipo: tipo,
                    descricao: descricao,
                    _token: _token,
                    ajax: true
                }

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
                    $('#tipo').map(function(_i, element){
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
        });
    </script>
@endsection
