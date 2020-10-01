
<title>Cadastro de Equipamento</title>

<br><br><br>
<div class="container">
  <div class="row">
    <div class="col-lg-3"></div>
      <div class="col-lg-6">
        <div id="ui">
          <h1 class="text-center">Cadastro de Equipamento</h1>
          <hr class="hr-light">
          <form class="form-group text-center" action="<?php echo $acao; ?>" method="post">
            <div class="form-group">
              <label for="">Equipamento</label>
              <input class="form-control" type="text" name="nomeEquipamento"
                  value="<?php if(isset($registro)) echo $registro['nomeEquipamento']; ?>" required 
                  placeholder="Escreva o nome do Equipamento">
            </div>
            <div class="row">
              <div class="form-group col-lg-6">
                <label for="">Modelo</label>
                <input class="form-control" type="text" name="modelo"
                    value="<?php if(isset($registro)) echo $registro['modelo']; ?>" 
                    placeholder="Escreva o modelo">
              </div>
              <div class="form-group col-lg-6">
                <label for="">Número de Série</label>
                <input class="form-control" type="text" name="numeroSerie"
                    value="<?php if(isset($registro)) echo $registro['numeroSerie']; ?>" 
                    placeholder="Escreva o número de série">
              </div>
            </div>
            <div class="form-group">
              <label for="">Observações</label>
              <textarea class="form-control" type="text" name="observacoesEquipamento"
                  value="<?php if(isset($registro)) echo $registro['observacoesEquipamento']; ?>" 
                  placeholder="Escreva observações sobre o equipamento"></textarea>
            </div>
            <div class="form-group">
              <label for="">Marca</label>
              <select class="browser-default custom-select">
                <option selected>Selecione a Marca</option>
                <option value="1">LG</option>
                <option value="2">Xiaomi</option>
              </select>
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