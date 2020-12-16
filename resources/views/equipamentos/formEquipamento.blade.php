@extends('admin')

<title>Adicionar Equipamento</title>

@section('main')
    <br><br><br><br>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div id="ui">
                <h1 class="text-center">Adicionar Equipamento</h1>
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

                <form action="{{ route('equipamentos.store') }}" method="post" class="form-group text-center">
                    @csrf
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
                            @foreach ($listaMarca as $item)
                                <option value="{{ $item->id }}">{{ $item->nomeMarca }}</option>
                            @endforeach
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
                    <hr class="hr-light">
                    <button type="submit" class="btn btn-success">
                        <i class="far fa-save mr-1"></i>Salvar
                    </button>
                    <button type="reset" class="btn btn-warning">
                        <i class="fas fa-backspace mr-1"></i>Limpar
                    </button>
                    <a href="{{ route('equipamentos.index') }}" class="btn btn-danger">
                        <i class="fas fa-undo mr-1"></i>Voltar
                    </a>
                </form>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
    <br><br><br><br>

    {{-- MODAL AUXILIAR --}}

    {{-- MODAL AUXILIAR PARA ADICIONAR A MARCA --}}
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

            $('#formAddMarca').submit(function(){

                // Pegando os dados do formulário e pegando o token que válida o request
                var nomeMarca = $("#nomeMarca_modal").val();
                var observacaoMarca = $("#observacaoMarca_modal").val();
                var _token = $("[name='_token']")[0].value;

                // Montanto o objeto que será enviado na request
                var dados = {
                    nomeMarca: nomeMarca,
                    observacaoMarca: observacaoMarca,
                    _token: _token,
                    ajax: true
                }

                //Executando o POST para a rota de cadastro de marca
                $.ajax({
                    url: "/marcas",
                    type: 'POST',
                    data: dados
                })

                // Caso der sucesso então adiciona a nova marca no select e fecha o modal
                .done(function(result){
                    // Como o resultado volta em string então da parse para JSON
                    result = JSON.parse(result);

                    //console.log(result);

                    // setando a marca no select
                    $('#marca').map(function(_i, element){
                        var option = document.createElement("option");
                        option.text = result.nomeMarca;
                        option.value = result.id;
                        element.appendChild(option);
                        element.value = result.id;
                    });

                    // Fechando o modal
                    $('#addMarca').modal('hide');
                })

                // Caso der erro então da um aviso.
                .fail(function (err) {
                    console.log(err);
                    alert("Erro ao tentar cadastrar a marca.");
                })

                return false;
            });
        });
    </script>
@endsection
