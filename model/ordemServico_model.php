<?php

  /**
   *
   */
  class OrdemServico_Model extends DAO {

    function __construct(){
      parent::__construct('ordemServico');
    }

    public function get(){
      $sql = "SELECT os.id, os.dataInicio, os.dataTermino, os.defeito, os.valorTotal,
        p.nome AS cliente, e.nomeEquipamento AS equipamento, ss.status AS status
        FROM pessoa p INNER JOIN ordemServico os
        ON p.id = os.codigoPessoa
        INNER JOIN equipamento e
        ON e.id = os.codigoEquipamento
        INNER JOIN statusServico ss
        ON ss.id = os.codigoStatusServico";
      $query = $this->bd->query($sql);
      $lista = $query->fetchAll();

      return $lista;
    }
    
  }

?>
