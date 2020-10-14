<form action="<?php echo $acao; ?>" method="post">
    <h4 class="text-center text-white">Adicionar Orçamento</h4>
    <div class="row">
        <div class="form-group col-lg-6 text-white">
            <input type="file" name="arquivo" 
                value="<?php if(isset($registro)) echo $registro['arquivo'];?>">
        </div>
        <div class="form-group col-lg-6">
            <input type="text" class="form-control" name="descricaoAnexo" placeholder="Descrição"
                value="<?php if(isset($registro)) echo $registro['descricaoAnexo'];?>">
        </div>
    </div>
</form>
