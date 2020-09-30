
<title>Lista de Peças</title>

<div id="intro" class="view">
  <div class="container-fluid full-bg-img mask rgba-black-strong d-flex align-items-center justify-content-center">
    <div class="row d-flex justify-content-center">
      <div class="col-md-14 text-center">
        <div class="card">
          <h5 class="card-header info-color white-text text-center py-4 peach-gradient">
            <strong>Lista de Peças</strong>
          </h5>
        </div>
        <div class="container border white">
          <a class="btn btn-primary" href="<?= $link ?>&acao=cadastrar">Novo</a>
          <table id="dtBasicExample" class="table table-striped table-bordered table-sm table-responsive" cellspacing="0" width="100%">

            <thead>
              <th>#</th>
              <th>Item</th>
              <th>Quantidade</th>
              <th>Valor Compra</th>
              <th>Valor Venda</th>
              <th>Desconto</th>
              <th>Ações</th>
            </thead>
            <tbody>
              <?php foreach ($lista as $linha): ?>
                <tr>
                  <td><?php echo $linha['id']; ?></td>
                  <td><?php echo $linha['item']; ?></td>
                  <td><?php echo $linha['quantidade']; ?></td>
                  <td><?php echo $linha['valorCompra']; ?></td>
                  <td><?php echo $linha['valorVenda']; ?></td>
                  <td><?php echo $linha['desconto']; ?></td>
                  <td>
                    <a class="btn btn-warning btn-sm" href="<?= $link ?>&acao=cadastrar&id=<?php echo $linha['id']; ?>">Editar</a>
                    <a class="btn btn-danger btn-sm" href="<?= $link ?>&acao=remover&id=<?php echo $linha['id']; ?>">Excluir</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>