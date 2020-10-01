
<title>Manutenção de Tipo Pessoa</title>

<br><br><br><br>
<div class="container">
  <div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
      <div id="ui">
        <h1 class="text-center">Cadastro de Tipo Pessoa</h1>
        <hr class="hr-light">
        <form class="form-group text-center" action="<?php echo $acao; ?>" method="post">
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
            <button class="btn btn-success" type="submit">Enviar</button>
            <button class="btn btn-warning" type="reset">Limpar</button>
          </form>
      </div>
    </div>
    <div class="col-lg-3"></div>
  </div>
</div>
<br><br><br><br>        