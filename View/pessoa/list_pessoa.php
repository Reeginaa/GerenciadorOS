
<title>Lista de Pessoas</title>

<br><br><br>
<div class="container">
  <div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
      <div id="ui">
        <h1 class="text-center">Lista de Pessoas</h1>
        <hr class="hr-light">
        <a class="btn btn-primary" href="<?= $link ?>&acao=cadastrar">
          <i class="far fa-file-alt"></i> Novo
        </a>
        <table id="dtBasicExample" class="table table-striped table-bordered table-sm white" cellspacing="0" width="100%">
          <thead>
            <th>#</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Cidade</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Ações</th>
          </thead>
          <tbody>
            <?php foreach ($lista as $linha): ?>
              <tr>
                <td><?php echo $linha['id']; ?></td>
                <td><?php echo $linha['nome']; ?></td>
                <td><?php echo $linha['cpf']; ?></td>
                <td><?php echo $linha['cidade']; ?></td>
                <td><?php echo $linha['email']; ?></td>
                <td><?php echo $linha['telefone']; ?></td>
                <td>
                  <a class="btn btn-warning btn-sm" href="<?= $link ?>&acao=cadastrar&id=<?php echo $linha['id']; ?>">
                    <i class="far fa-edit"></i> Editar
                  </a>
                  <a class="btn btn-danger btn-sm" href="<?= $link ?>&acao=remover&id=<?php echo $linha['id']; ?>">
                    <i class="far fa-trash-alt"></i> Excluir
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-lg-1"></div>
  </div>
</div>   
<br><br><br>  
            
              