
<title>Manutenção de Peça</title>

<br><br><br><br>
<div class="container">
  <div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
      <div id="ui">
        <h1 class="text-center">Cadastro de Peças</h1>
        <hr class="hr-light">
        <form class="form-group text-center" action="<?php echo $acao; ?>" method="post">
            <div class="row">
              <div class="form-group col-lg-8">
                <label for="">Item</label>
                <input class="form-control" type="text" name="item"
                  value="<?php if(isset($registro)) echo $registro['item']; ?>" required>
              </div>
              <div class="form-group col-lg-4">
                <label for="">Quantidade</label>
                <input class="form-control" type="number" name="quantidade"
                  value="<?php if(isset($registro)) echo $registro['quantidade']; ?>" required>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-4">
                <label for="">Valor Compra</label>
                <input class="form-control" type="real" name="valorCompra"
                  value="<?php if(isset($registro)) echo $registro['valorCompra']; ?>" required>
              </div>
              <div class="form-group col-lg-4">
                <label for="">Valor Venda</label>
                <input class="form-control" type="real" name="valorVenda"
                  value="<?php if(isset($registro)) echo $registro['valorVenda']; ?>" required>
              </div>
              <div class="form-group col-lg-4">
                <label for="">Desconto</label>
                <input class="form-control" type="real" name="desconto"
                  value="<?php if(isset($registro)) echo $registro['desconto']; ?>">
              </div>
            </div>
            <button class="btn btn-success" type="submit">Enviar</button>
            <button class="btn btn-warning" type="reset">Limpar</button>
          </form>
      </div>
    </div>
    <div class="col-lg-3"></div>
  </div>
</div>
<br><br><br><br>        