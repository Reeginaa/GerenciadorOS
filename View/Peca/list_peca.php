<h1>Lista de Peça!</h1>
<a class="btn btn-info" href="<?= $link ?>&acao=cadastrar">Novo</a>
<table class="table table-hover table-striped">
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