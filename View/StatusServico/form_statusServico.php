<h1>Manutenção de Peça</h1>

<form class="form" action="<?php echo $acao; ?>" method="post">
  <div class="form-group">
    <label for="">Status</label>
    <input class="form-control" type="text" name="status"
      value="<?php if(isset($registro)) echo $registro['status']; ?>" required>
  </div>
  <div class="form-group">
    <label for="">Descrição</label>
    <input class="form-control" type="text" name="descricaoStatus"
      value="<?php if(isset($registro)) echo $registro['descricaoStatus']; ?>">
  </div>
  <button class="btn btn-info" type="submit">Enviar</button>
</form>