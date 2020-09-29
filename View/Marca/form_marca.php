
<title>Cadastro de Marca</title>

<div id="intro" class="view">
        <div class="container-fluid full-bg-img mask rgba-black-strong d-flex align-items-center justify-content-center">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 text-center">
                  <div class="container border white">
                    <h1>Manutenção de Marca</h1>

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
                      <button class="btn btn-info" type="submit">Enviar</button>
                    </form>
                  </div>
                </div>
            </div>
        </div>
</div>
