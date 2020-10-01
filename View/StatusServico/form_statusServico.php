
<title>Manutenção Status Serviço</title>

<br><br><br>
<div class="container">
  <div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
      <div id="ui">
        <h1 class="text-center">Cadastro de Status de Serviço</h1>
        <hr class="hr-light">
        <form class="form-group text-center" action="<?php echo $acao; ?>" method="post">
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
            <button class="btn btn-success" type="submit">Enviar</button>
            <button class="btn btn-warning" type="reset">Limpar</button>
          </form>
      </div>
    </div>
    <div class="col-lg-3"></div>
  </div>
</div>
<br><br><br>   