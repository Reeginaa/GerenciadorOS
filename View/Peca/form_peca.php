
<title>Manutenção de Peça</title>

<div id="intro" class="view">
  <div class="container-fluid full-bg-img mask rgba-black-strong d-flex align-items-center justify-content-center">
    <div class="row d-flex justify-content-center">
      <div class="col-md-14 text-center">
        <div class="card">
          <h5 class="card-header info-color white-text text-center py-4 peach-gradient">
            <strong>Manutenção de Peças</strong>
          </h5>
        </div>
        <div class="container border white">
          <form class="form" action="<?php echo $acao; ?>" method="post">
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
              <div class="form-group col-lg-6">
                <label for="">Valor Compra</label>
                <input class="form-control" type="real" name="valorCompra"
                  value="<?php if(isset($registro)) echo $registro['valorCompra']; ?>" required>
              </div>
              <div class="form-group col-lg-6">
                <label for="">Valor Venda</label>
                <input class="form-control" type="real" name="valorVenda"
                  value="<?php if(isset($registro)) echo $registro['valorVenda']; ?>" required>
              </div>
            </div>
            <div class="form-group">
              <label for="">Desconto</label>
              <input class="form-control" type="real" name="desconto"
                value="<?php if(isset($registro)) echo $registro['desconto']; ?>">
            </div>
            <button class="btn btn-success" type="submit">Enviar</button>
            <button class="btn btn-warning" type="reset">Limpar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>