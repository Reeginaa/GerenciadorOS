<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Lista de Status de Serviço!</title>
  </head>
  <body>
    <div class="container">
      <h1>Lista de Status de Serviço!</h1>
      <a class="btn btn-info" href="../../Controller/statusServico.php?acao=cadastrar">Novo</a>
      <table class="table table-hover table-striped"><!--cria tabela-->
          <thead><!--Cabeçalho da tabela-->
            <th>#</th>
            <th>Status Serviço</th>
            <th>Descrição</th>
            <th>Ações</th>
          </thead>
          <tbody><!--Corpo da tabela-->
            <?php foreach ($lista as $linha): ?>
              <tr>
                <td><?php echo $linha['idStatusServico']; ?></td>
                <td><?php echo $linha['status']; ?></td>
                <td><?php echo $linha['descricaoStatus']; ?></td>
                <td>
                  <a class="btn btn-warning btn-sm" href="../Controller/statusServico.php?acao=cadastrar&idStatusServico=<?php echo $linha['idStatusServico']; ?>">Editar</a>
                  <a class="btn btn-danger btn-sm" href="../Controller/statusServico.php?acao=remover&idStatusServico=<?php echo $linha['idStatusServico']; ?>">Excluir</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
      </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
