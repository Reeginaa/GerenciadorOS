<h1>Manutenção de Peça</h1>

<form class="form" action="<?php echo $acao; ?>" method="post">
  <div class="form-group">
    <label for="">Item</label>
    <input class="form-control" type="text" name="item"
      value="<?php if(isset($registro)) echo $registro['item']; ?>" required>
  </div>
  <div class="form-group">
    <label for="">Quantidade</label>
    <input class="form-control" type="number" name="quantidade"
      value="<?php if(isset($registro)) echo $registro['quantidade']; ?>" required>
  </div>
  <div class="form-group">
    <label for="">Valor Compra</label>
    <input class="form-control" type="real" name="valorCompra"
      value="<?php if(isset($registro)) echo $registro['valorCompra']; ?>" required>
  </div>
  <div class="form-group">
    <label for="">Valor Venda</label>
    <input class="form-control" type="real" name="valorVenda"
      value="<?php if(isset($registro)) echo $registro['valorVenda']; ?>" required>
  </div>
  <div class="form-group">
    <label for="">Desconto</label>
    <input class="form-control" type="real" name="desconto"
      value="<?php if(isset($registro)) echo $registro['desconto']; ?>">
  </div>
  <button class="btn btn-info" type="submit">Enviar</button>
</form>