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
                        <label for="">Cliente: *</label>
                        <select class="browser-default custom-select" required>
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
                            <label for="">Data Início: *</label>
                            <input class="form-control" type="date" name="dataInicio" required
                                value="<?php if(isset($registro)) echo $registro['dataInicio']; ?>">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="">Data Término:</label>
                            <input class="form-control" type="date" name="dataTermino" 
                                value="<?php if(isset($registro)) echo $registro['dataTermino']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-5">
                        <label for="">Equipamento: *</label>
                        <select class="browser-default custom-select" required>
                            <option selected>Selecione o Equipamento</option>
                            <?php foreach ($listaEquipamento as $item): ?>
                                <option value="<?= $item['id'] ?>" <?php if(isset($registro) && $registro['codigoEquipamento']==$item['id']) echo "selected";?>>
                                    <?= $item['nomeEquipamento']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                        <div class="form-group col-lg-7">
                            <label for="">Defeito: *</label>
                            <input class="form-control" type="text" name="defeito" placeholder="Descreva o Defeito"
                                value="<?php if(isset($registro)) echo $registro['defeito']; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-5">
                            <label for="">Status: *</label>
                            <select class="browser-default custom-select" required>
                                <option selected>Selecione o Status</option>
                                <?php foreach ($listaStatus as $item): ?>
                                    <option value="<?= $item['id'] ?>" <?php if(isset($registro) && $registro['codigoStatusServico']==$item['id']) echo "selected";?>>
                                        <?= $item['status']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-lg-7">
                            <label for="">Observaçoes:</label>
                            <textarea class="form-control" type="text" name="observacoesOS" placeholder="Escreva as observações"
                                value="<?php if(isset($registro)) echo $registro['observacoesOS']; ?>"></textarea>
                        </div>
                    </div>
                    <hr class="hr-light">
                    <h4 class="text-center text-white"><b><u>Orçamento</u></b></h4>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Anexo Orçamento:</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" value="<?php if(isset($registro)) echo $registro['anexoOrcamento']; ?>">
                            <label class="custom-file-label">Escolher arquivo</label>
                        </div>
                    </div>

                    <hr class="hr-light">

                    <!-- Serviço -->
                    <h4 class="text-center text-white"><b><u>Serviço</u></b></h4>
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
                                <td></td>
                                <td></td>
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
                    <h4 class="text-center text-white"><b><u>Peça</u></b></h4>
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
                                <td></td>
                                <td></td>
                                <td></td>
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
                    <div class="row">
                        <div class="col-lg-9"></div>
                        <div class="col-lg-3">
                            <label for=""><u>Valor Total:</u></label>
                            <input type="int" class="form-control" disabled
                             value="<?php if(isset($registro)) echo $registro['valorTotal']; ?>" >
                        </div>
                        <div class="col-lg-0"></div>
                    </div>
                    <!-- Peça -->
                    <hr class="hr-light">
                    <button class="btn btn-success" type="submit">Enviar</button>
                    <button class="btn btn-warning" type="reset">Limpar</button>
                    <button class="btn btn-primary" type="reset">Fechar</button>
                    <button class="btn btn-primary" type="reset">Faturar</button>
                    <button class="btn btn-primary" type="reset">Imprimir OS.</button>
                    <button class="btn btn-primary" type="reset">Imprimir Nº</button>
                </form>
            </div>
        </div>
        <div class="col-lg-1"></div>
    </div>
</div>
<br><br><br><br>