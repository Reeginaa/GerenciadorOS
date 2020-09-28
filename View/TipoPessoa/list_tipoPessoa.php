<h1>Lista de Tipo Pessoa!</h1>
<a class="btn btn-info" href="<?= $link ?>&acao=cadastrar">Novo</a>
<table class="table table-hover table-striped">
  <thead>
    <th>#</th>
    <th>Tipo</th>
    <th>Descrição</th>
    <th>Ações</th>
  </thead>
  <tbody>
    <?php foreach ($lista as $linha): ?>
      <tr>
        <td><?php echo $linha['id']; ?></td>
        <td><?php echo $linha['tipo']; ?></td>
        <td><?php echo $linha['descricao']; ?></td>
        <td>
          <a class="btn btn-warning btn-sm" href="<?= $link ?>&acao=cadastrar&id=<?php echo $linha['id']; ?>">Editar</a>
          <a class="btn btn-danger btn-sm" href="<?= $link ?>&acao=remover&id=<?php echo $linha['id']; ?>">Excluir</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
    