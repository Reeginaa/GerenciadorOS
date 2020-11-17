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
                    <label for="tipo">Tipo Pessoa: * |
                        <a href="{{ route('tipoPessoas.create') }}">
                            <i class="fas fa-plus"></i> Cadastrar Tipo Pessoa
                        </a>
                    </label>
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
                        onkeypress="$(this).mask('000.000.000-00');">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="rg">RG: *</label>
                        <input id="rg" type="text" class="form-control" name="rg" required>
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
                         placeholder="Feminino/Masculo">
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
                    <input type="text" name="complemento" id="complemento" class="form-control">
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
                <h4 class="text-center text-white"><u>Outras Informações</u></h4>
                <div class="form-group">
                    <label for="email">E-mail: </label>
                    <input type="email" name="email" id="email" class="form-control"
                     placeholder="example@example.com.br">
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="senha">Senha: </label>
                        <input type="password" name="senha" id="senha" class="form-control"
                         placeholder="Informe a senha">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="telefone">Telefone:</label>
                        <input type="text" name="telefone" id="telefone" class="form-control"
                         placeholder="(99) 9 9999-9999" onkeypress="$(this).mask('(00) 0 0000-0000')">
                    </div>
                </div>
                <hr class="hr-light">
                <button type="submit" class="btn btn-success">Salvar</button>
                <button type="reset" class="btn btn-warning">Limpar</button>
                <a href="{{ route('pessoas.index') }}" class="btn btn-danger">Voltar</a>
            </form>
        </div>
    </div>
    <div class="col-lg-2"></div>
</div>
<br><br><br><br>
@endsection
