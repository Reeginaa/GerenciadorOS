<?php
  /*faz operações do banco de dados, tudo o que é SQL*/

  require_once '../Model/DAO.php';
  /**
    *
  */
  class StatusServico_Model extends DAO {

    function __construct(){
        parent::__construct(); //parent -> pega a classe pai a superclasse
    }

    public function get(){
      $query = $this->bd->query("SELECT * FROM statusservico");
      $lista = $query->fetchAll();//fetchAll -> recebe dados multidimensionais
      return $lista;
    }

    public function inserir($dados){
      if ($dados['idStatusServico']) {
        $sql = "UPDATE statusservico SET status = :status, descricaoStatus = :descricaoStatus WHERE idStatusServico = :idStatusServico";
      } else {
        $sql = "INSERT INTO statusservico(status, descricaoStatus) VALUES (:status, :descricaoStatus)";
      }

      $query = $this->bd->prepare($sql);
      $result = $query->execute($dados);
      if (!$result){
        var_dump($query->errorInfo());
        die();
      }
      return true;
    }

    public function remover($idStatusServico){
      $query = $this->bd->prepare("DELETE FROM statusservico WHERE idStatusServico = :idStatusServico");
      $query->bindParam('idStatusServico', $idStatusServico);
      $result = $query->execute();
      if (!$result){
        var_dump($query->errorInfo());
        die();
      }
      return true;
    }

    public function getById($idStatusServico){
      $query = $this->bd->query("SELECT * FROM statusservico WHERE idStatusServico = ". $idStatusServico);
      return $query->fetch();//fetch -> para um único registro
    }
  }

?>
