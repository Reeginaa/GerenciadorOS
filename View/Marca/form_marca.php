
<title>Cadastro de Marca</title>

<br><br><br>
<div class="container">
  <div class="row">
    <div class="col-lg-3"></div>
      <div class="col-lg-6">
        <div id="ui">
          <h1 class="text-center">Cadastro de Marca</h1>
          <hr class="hr-light">
          <form class="form-group text-center" action="<?php echo $acao; ?>" method="post">
            <div class="form-group">
              <label for="">Marca</label>
              <input class="form-control" type="text" name="nomeMarca"
                  value="<?php if(isset($registro)) echo $registro['nomeMarca']; ?>" required 
                  placeholder="Escreva o nome da Marca">
            </div>
            <div class="form-group">
              <label for="">Observações</label>
              <textarea class="form-control" type="text" name="observacaoMarca"
                  value="<?php if(isset($registro)) echo $registro['observacaoMarca']; ?>" required 
                  placeholder="Escreva observações sobre a marca"></textarea>
            </div>
            <button class="btn btn-success" type="submit">Enviar</button>
            <button class="btn btn-warning" type="reset">Limpar</button>
          </form>
        </div>
      </div>
      <div class="col-lg-3"></div>
    </div>
  </div>
</div>
<br><br><br><br>