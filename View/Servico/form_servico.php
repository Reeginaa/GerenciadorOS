<h1>Manutenção de Peça</h1>

<form class="form" action="<?php echo $acao; ?>" method="post">
  <div class="form-group">
    <label for="">Serviço</label>
    <input class="form-control" type="text" name="servico"
      value="<?php if(isset($registro)) echo $registro['servico']; ?>" required>
  </div>
  <div class="form-group">
    <label for="">Valor</label>
    <input class="form-control" type="real" name="valor"
      value="<?php if(isset($registro)) echo $registro['valor']; ?>" required>
  </div>
  <div class="form-group">
    <label for="">Desconto</label>
    <input class="form-control" type="real" name="desconto"
      value="<?php if(isset($registro)) echo $registro['desconto']; ?>">
  </div>
  <button class="btn btn-info" type="submit">Enviar</button>
</form>
