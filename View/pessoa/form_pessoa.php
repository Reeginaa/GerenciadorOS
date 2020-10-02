
<title>Manutenção de Pessoa</title>

<br><br><br><br>
<div class="container">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <div id="ui">
        <h1 class="text-center">Cadastro de Pessoa</h1>
        <hr class="hr-light">
        <form class="form-group text-center" action="<?php echo $acao; ?>" method="post">
          <div class="form-group">
            <label for="">Tipo Pessoa</label>
            <select class="browser-default custom-select">
              <option selected>Selecione o Tipo Pessoa</option>
              <?php foreach ($listaTipoPessoas as $item): ?>
                  <option value="<?= $item['id'] ?>" <?php if(isset($registro) && $registro['codigoTipoPessoa']==$item['id']) echo "selected";?> >
                    <?= $item['tipo']; ?>
                  </option>
                <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">Nome Completo</label>
            <input class="form-control" type="text" name="nome"
              value="<?php if(isset($registro)) echo $registro['nome']; ?>" required>
          </div>
          <div class="row">
            <div class="form-group col-lg-6">
              <label for="">CPF</label>
              <input class="form-control" type="text" name="cpf"
                value="<?php if(isset($registro)) echo $registro['cpf']; ?>" required>
            </div>
            <div class="form-group col-lg-6">
              <label for="">RG</label>
              <input class="form-control" type="text" name="rg"
                value="<?php if(isset($registro)) echo $registro['rg']; ?>" required>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-lg-5">
              <label for="">Data Nascimento</label>
              <input class="form-control" type="date" name="dataNascimento"
                value="<?php if(isset($registro)) echo $registro['dataNascimento']; ?>" required>
            </div>
            <div class="form-group col-lg-7">
              <label for="">Sexo</label>
              <input class="form-control" type="text" name="sexo"
                value="<?php if(isset($registro)) echo $registro['sexo']; ?>" required>
            </div>
          </div>  
          <div class="row">
            <div class="form-group col-lg-9">
              <label for="">Logradouro</label>
              <input class="form-control" type="text" name="logradouro"
                value="<?php if(isset($registro)) echo $registro['logradouro']; ?>" required>
            </div>
            <div class="form-group col-lg-3">
              <label for="">Nº</label>
              <input class="form-control" type="number" name="numero"
                value="<?php if(isset($registro)) echo $registro['numero']; ?>" required>
            </div>
          </div>  
          <div class="form-group">
            <label for="">Complemento</label>
            <input class="form-control" type="text" name="complemento"
              value="<?php if(isset($registro)) echo $registro['complemento']; ?>" required>
          </div>
          <div class="form-group">
            <label for="">Bairro</label>
            <input class="form-control" type="text" name="bairro"
              value="<?php if(isset($registro)) echo $registro['bairro']; ?>" required>
          </div>
          <div class="form-group">
            <label for="">Cidade</label>
            <input class="form-control" type="text" name="cidade"
              value="<?php if(isset($registro)) echo $registro['cidade']; ?>" required>
          </div>
          <div class="form-group">
            <label for="">E-mail</label>
            <input class="form-control" type="email" name="email"
              value="<?php if(isset($registro)) echo $registro['email']; ?>" required>
          </div>
          <div class="row">
            <div class="form-group col-lg-5">
              <label for="inputPassword">Senha</label>
              <input class="form-control" id="inputPassword" type="password" aria-describedby="passwordHelpBlock" 
                name="senha"value="<?php if(isset($registro)) echo $registro['senha']; ?>" required>
                <!-- <small id="passwordHelpBlock" class="form-text text-muted">
                  A senha deve possuir no mínimo 8 caracteres, possuir letras e número. Não pode ter 
                  caracteres especiais
                </small> -->
            </div>
            <div class="form-group col-lg-7">
              <label for="">Telefone</label>
              <input class="form-control" type="text" name="telefone"
                value="<?php if(isset($registro)) echo $registro['telefone']; ?>" required>
            </div>
          </div>
          <button class="btn btn-success" type="submit">Enviar</button>
          <button class="btn btn-warning" type="reset">Limpar</button>
        </form>
      </div>
    </div>
    <div class="col-lg-2"></div>
  </div>
</div>
<br><br><br><br>        