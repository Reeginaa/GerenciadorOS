
<title>Cadastro de Marca</title>

<div id="intro" class="view">
  <div class="container-fluid full-bg-img mask rgba-black-strong d-flex align-items-center justify-content-center">
    <div class="row d-flex justify-content-center">
      <div class="col-md-14 text-center">
        <div class="card">
          <h5 class="card-header info-color white-text text-center py-4 peach-gradient">
            <strong>Manutenção de Marca</strong>
          </h5>
        </div>
        <div class="container border white">
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
            <button class="btn btn-success" type="submit">Enviar</button>
            <button class="btn btn-warning" type="reset">Limpar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
