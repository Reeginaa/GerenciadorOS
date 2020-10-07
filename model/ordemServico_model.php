<?php

  /**
   *
   */
  class OrdemServico_Model extends DAO {

    function __construct(){
      parent::__construct('ordemServico');
    }

    // public function get() {
    //   $sql   = "SELECT p.id, p.nome, p.cpf, p.rg, p.dataNascimento, p.sexo, p.logradouro, p.numero, p.complemento, p.bairro, p.cidade, p.email, p.senha, p.telefone, tp.tipo AS tipoPessoa 
    //     FROM pessoa p INNER JOIN tipoPessoa tp 
    //     ON tp.id=p.codigoTipoPessoa";
    //   $query = $this->bd->query($sql);
    //   $lista = $query->fetchAll();

    //   return $lista;
    // }
  }

?>
