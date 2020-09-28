<h1>Manutenção de Tipo Pessoa</h1>

<form class="form" action="<?php echo $acao; ?>" method="post">
  <div class="form-group">
    <label for="">Tipo Pessoa</label>
    <input class="form-control" type="text" name="tipo"
      value="<?php if(isset($registro)) echo $registro['tipo']; ?>" required>
  </div>
  <div class="form-group">
    <label for="">Descrição</label>
    <input class="form-control" type="text" name="descricao"
      value="<?php if(isset($registro)) echo $registro['descricao']; ?>">
  </div>
  <button class="btn btn-info" type="submit">Enviar</button>
</form>
    