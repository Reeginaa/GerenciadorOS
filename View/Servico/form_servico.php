
<title>Manutenção de Serviço</title>

<br><br><br>
<div class="container">
  <div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
      <div id="ui">
        <h1 class="text-center">Cadastro de Serviço</h1>
        <hr class="hr-light">
        <form class="form-group text-center" action="<?php echo $acao; ?>" method="post">
            <div class="form-group">
              <label for="">Serviço: *</label>
              <input class="form-control" type="text" name="servico"
                value="<?php if(isset($registro)) echo $registro['servico']; ?>" required>
            </div>
            <div class="row">
              <div class="form-group col-lg-6">
                <label for="">Valor: *</label>
                <input class="form-control" type="real" name="valor"
                  value="<?php if(isset($registro)) echo $registro['valor']; ?>" required
                  onkeypress="$(this).mask('R$ 9.990,00')">
              </div>
              <div class="form-group col-lg-6">
                <label for="">Desconto:</label>
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
<br><br><br><br><br>