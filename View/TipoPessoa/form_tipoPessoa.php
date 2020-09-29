
<title>Manutenção de Tipo Pessoa</title>

<div id="intro" class="view">
  <div class="container-fluid full-bg-img mask rgba-black-strong d-flex align-items-center justify-content-center">
    <div class="row d-flex justify-content-center">
      <div class="col-md-10 text-center">
        <div class="container border white">
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
        </div>
      </div>
    </div>
  </div>
</div>
    