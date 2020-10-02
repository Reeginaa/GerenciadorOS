<?php

  /**
   *
   */
  class Equipamento_Model extends DAO {

    function __construct(){
      parent::__construct('equipamento');
    }

    public function get() {
      $sql   = "SELECT e.id, e.nomeEquipamento, e.modelo, e.numeroSerie, e.observacoesEquipamento, m.nomeMarca AS marca 
        FROM equipamento e INNER JOIN marca m 
        ON m.id=e.codigoMarca";
      $query = $this->bd->query($sql);
      $lista = $query->fetchAll();

      return $lista;
    }
  }

?>
