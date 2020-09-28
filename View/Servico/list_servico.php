<h1>Lista de Peça!</h1>
<a class="btn btn-info" href="<?= $link ?>&acao=cadastrar">Novo</a>
<table class="table table-hover table-striped">
  <thead>
    <th>#</th>
    <th>Serviço</th>
    <th>Valor</th>
    <th>Desconto</th>
    <th>Ações</th>
  </thead>
  <tbody>
    <?php foreach ($lista as $linha): ?>
      <tr>
        <td><?php echo $linha['id']; ?></td>
        <td><?php echo $linha['servico']; ?></td>
        <td><?php echo $linha['valor']; ?></td>
        <td><?php echo $linha['desconto']; ?></td>
        <td>
          <a class="btn btn-warning btn-sm" href="<?= $link ?>&acao=cadastrar&id=<?php echo $linha['id']; ?>">Editar</a>
          <a class="btn btn-danger btn-sm" href="<?= $link ?>&acao=remover&id=<?php echo $linha['id']; ?>">Excluir</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
    