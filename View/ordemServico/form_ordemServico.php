<title>Manutenção de Ordem de Serviço</title>

<br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <div id="ui">
                <h1 class="text-center">Cadastro de Ordem de Serviço</h1>
                <hr class="hr-light">
                <form class="form-group text-center" action="<?php echo $acao; ?>" method="post">
                    <div class="form-group">
                        <label for="">Cliente</label>
                        <select class="browser-default custom-select">
                            <option selected>Selecione o Cliente</option>
                            <?php foreach ($listaCliente as $item): ?>
                                <option value="<?= $item['id'] ?>" <?php if(isset($registro) && $registro['codigoPessoa']==$item['id']) echo "selected";?>>
                                    <?= $item['nome']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="">Data Início</label>
                            <input class="form-control" type="date" name="dataInicio"
                                value="<?php if(isset($registro)) echo $registro['dataInicio']; ?>">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="">Data Término</label>
                            <input class="form-control" type="date" name="dataInicio"
                                value="<?php if(isset($registro)) echo $registro['dataInicio']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-5">
                        <label for="">Equipamento</label>
                        <select class="browser-default custom-select">
                            <option selected>Selecione o Equipamento</option>
                            <?php foreach ($listaEquipamento as $item): ?>
                                <option value="<?= $item['id'] ?>" <?php if(isset($registro) && $registro['codigoEquipamento']==$item['id']) echo "selected";?>>
                                    <?= $item['nomeEquipamento']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                        <div class="form-group col-lg-7">
                            <label for="">Defeito</label>
                            <input class="form-control" type="text" name="defeito" placeholder="Descreva o Defeito"
                                value="<?php if(isset($registro)) echo $registro['defeito']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-5">
                            <label for="">Status</label>
                            <select class="browser-default custom-select">
                                <option selected>Selecione o Status</option>
                                <?php foreach ($listaStatus as $item): ?>
                                    <option value="<?= $item['id'] ?>" <?php if(isset($registro) && $registro['codigoStatusServico']==$item['id']) echo "selected";?>>
                                        <?= $item['status']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-lg-7">
                            <label for="">Observaçoes</label>
                            <textarea class="form-control" type="text" name="observacoesOS" placeholder="Escreva as observações"
                                value="<?php if(isset($registro)) echo $registro['observacoesOS']; ?>"></textarea>
                        </div>
                    </div>
                    <hr class="hr-light">

                    <!-- Orçamento -->
                    <form action="<?php echo $acao; ?>">
                        <h4 class="text-center text-white">Adicionar Orçamento</h4>
                        <div class="row">
                            <div class="form-group col-lg-6 text-white">
                                <input type="file" name="arquivo" 
                                    value="<?php if(isset($registro)) echo $registro['arquivo'];?>">
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control" name="descricaoAnexo" placeholder="Descrição"
                                value="<?php if(isset($registro)) echo $registro['descricaoAnexo'];?>">
                            </div>
                        </div>
                        <button class="btn btn-success btn-sm" type="submit">Salvar</button>
                        <button class="btn btn-warning btn-sm" type="reset">Limpar</button>
                    </form>
                    <!-- Orçamento -->

                    <hr class="hr-light">

                    <!-- Serviço -->
                    <h4 class="text-center text-white">Serviço</h4>
                    <a class="btn btn-success btn-sm" href="#">
                        <i class="far fa-file-alt"></i> Adicionar
                    </a>
                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm white" cellspacing="0" width="100%">
                        <thead>
                            <th>Serviço</th>
                            <th>Valor Unitário</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Troca</td>
                                <td>50,00</td>
                                <td>
                                    <a class="btn btn-warning btn-sm" href="#">
                                        <i class="far fa-edit"></i> Editar
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="#">
                                        <i class="far fa-trash-alt"></i> Excluir
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- Serviço -->

                    <!-- Peça -->
                    <h4 class="text-center text-white">Peça</h4>
                    <a class="btn btn-success btn-sm" href="#">
                        <i class="far fa-file-alt"></i> Adicionar
                    </a>
                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm white" cellspacing="0" width="100%">
                        <thead>
                            <th>Quantidade</th>
                            <th>Peça</th>
                            <th>Valor Unitário</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Placa</td>
                                <td>50,00</td>
                                <td>
                                    <a class="btn btn-warning btn-sm" href="#">
                                        <i class="far fa-edit"></i> Editar
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="#">
                                        <i class="far fa-trash-alt"></i> Excluir
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- Peça -->
                    <hr class="hr-light">
                    <button class="btn btn-success" type="submit">Enviar</button>
                    <button class="btn btn-warning" type="reset">Limpar</button>
                </form>
            </div>
        </div>
        <div class="col-lg-1"></div>
    </div>
</div>
<br><br><br><br>