
<title>Lista de Tipo Pessoa</title>

<div id="intro" class="view">
  <div class="container-fluid full-bg-img mask rgba-black-strong d-flex align-items-center justify-content-center">
    <div class="row d-flex justify-content-center">
      <div class="col-md-10 text-center">
        <div class="container border white">
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
        </div>
      </div>
    </div>
  </div>
</div>