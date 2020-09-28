<h1>Manutenção de Marca</h1>

<form class="form" action="<?php echo $acao; ?>" method="post">
  <div class="form-group">
    <label for="">Marca</label>
    <input class="form-control" type="text" name="nomeMarca"
      value="<?php if(isset($registro)) echo $registro['nomeMarca']; ?>" required>
  </div>
  <div class="form-group">
    <label for="">Observação</label>
    <input class="form-control" type="text" name="observacaoMarca"
      value="<?php if(isset($registro)) echo $registro['observacaoMarca']; ?>">
  </div>
  <button class="btn btn-info" type="submit">Enviar</button>
</form>
              