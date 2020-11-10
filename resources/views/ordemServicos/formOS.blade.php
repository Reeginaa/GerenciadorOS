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
                    <label for="cliente">Cliente: * |
                        <a href="{{ route('pessoas.create') }}">
                            <i class="fas fa-plus"></i> Cadastrar Cliente
                        </a>
                    </label>
                    <select name="pessoa_id" id="pessoa" class="form-control" required>
                        <option value="">Selecione o cliente</option>
                        @foreach ($listaPessoa as $item)
                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
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
                        <label for="dataInicio">Data Inicio: *</label>
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

                {{-- Orçamento --}}
                <hr class="hr-light">
                <h4 class="text-center text-white"><u>Orçamento</u></h4>
                <div class="form-group">
                    <input type="file" name="arquivo" id="arquivo" class="form-control">
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
                    <input type="checkbox" name="termos" id="termos" class="form-check-input">
                    <label for="termos"><b><u>Li, concordo e estou ciente dos termos.</u></b></label>
                </p>
                <hr class="hr-light">
                <button type="submit" class="btn btn-success">Salvar</button>
                <button type="reset" class="btn btn-warning">Limpar</button>
                <a href="{{ route('ordemServicos.index') }}" class="btn btn-danger">Voltar</a>
            </form>
        </div>
    </div>
    <div class="col-lg-0"></div>
</div>
<br><br><br><br>
@endsection
