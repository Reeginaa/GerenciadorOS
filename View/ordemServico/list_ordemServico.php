<title>Lista de Ordens de Serviço</title>

<br><br><br>
<div class="container">
    <div class="row">
        <div class="col-lg-0"></div>
        <div class="col-lg-12">
            <div id="ui">
                <h1 class="text-center">Lista de Ordens de Serviço</h1>
                <hr class="hr-light">
                <a class="btn btn-success" href="<?= $link ?>&acao=cadastrar">
                    <i class="far fa-file-alt"></i> Novo
                </a>
                <table id="dtBasicExample" class="table table-striped table-bordered table-sm white" cellspacing="0" width="100%">
                    <thead>
                        <th>#</th>
                        <th>Cliente</th>
                        <th>Início</th>
                        <th>Término</th>
                        <th>Defeito</th>
                        <th>Status</th>
                        <th>Equipamento</th>
                        <th>Valor Total</th>
                        <th>Ações</th>
                    </thead>
                    <tbody>
                        <?php foreach ($lista as $linha):?>
                            <tr>
                                <td><?php echo $linha['id'] ?></td>
                                <td><?php echo $linha['cliente'] ?></td>
                                <td><?php echo $linha['dataInicio'] ?></td>
                                <td><?php echo $linha['dataTermino'] ?></td>
                                <td><?php echo $linha['defeito'] ?></td>
                                <td><?php echo $linha['status'] ?></td>
                                <td><?php echo $linha['equipamento'] ?></td>
                                <td><?php echo $linha['valorTotal'] ?></td>
                                <td>
                                    <a class="btn btn-warning btn-sm" href="<?= $link ?>&acao=cadastrar&id=<?php echo $linha['id']; ?>">
                                        <i class="far fa-edit"></i> Editar
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="<?= $link ?>&acao=remover&id=<?php echo $linha['id']; ?>">
                                        <i class="far fa-trash-alt"></i> Excluir
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-0"></div>
    </div>
</div>