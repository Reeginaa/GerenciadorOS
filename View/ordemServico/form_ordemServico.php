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
                    <h4 class="text-center text-white">Peças/Serviço</h4>
                    <a class="btn btn-success btn-sm" href="#">
                        <i class="far fa-file-alt"></i> Adicionar
                    </a>
                    <a class="btn btn-warning btn-sm" href="#">
                        <i class="far fa-file-alt"></i> Editar
                    </a>
                    <a class="btn btn-danger btn-sm" href="#">
                        <i class="far fa-file-alt"></i> Excluir
                    </a>
                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm white" cellspacing="0" width="100%">
                        <thead>
                            <th>Qtd</th>
                            <th>Serviço</th>
                            <th>Peça</th>
                            <th>Valor Unitário</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Troca</td>
                                <td>Placa</td>
                                <td>50,00</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr class="hr-light">
                </form>
            </div>
        </div>
        <div class="col-lg-1"></div>
    </div>
</div>
<br><br><br><br>