<?php
  /*faz operações do banco de dados, tudo o que é SQL*/

  require_once '../Model/DAO.php';
  /**
    *
  */
  class Servico_Model extends DAO {

    function __construct(){
        parent::__construct(); //parent -> pega a classe pai a superclasse
    }

    public function get(){
      $query = $this->bd->query("SELECT * FROM servico");
      $lista = $query->fetchAll();//fetchAll -> recebe dados multidimensionais
      return $lista;
    }

    public function inserir($dados){
      if ($dados['idServico']) {
        $sql = "UPDATE servico SET servico = :servico, valor = :valor, desconto = :desconto WHERE idServico = :idServico";
      } else {
        $sql = "INSERT INTO servico(servico, valor, desconto) VALUES (:servico, :valor, :desconto)";
      }

      $query = $this->bd->prepare($sql);
      $result = $query->execute($dados);
      if (!$result){
        var_dump($query->errorInfo());
        die();
      }
      return true;
    }

    public function remover($idServico){
      $query = $this->bd->prepare("DELETE FROM servico WHERE idServico = :idServico");
      $query->bindParam('idServico', $idServico);
      $result = $query->execute();
      if (!$result){
        var_dump($query->errorInfo());
        die();
      }
      return true;
    }

    public function getById($idServico){
      $query = $this->bd->query("SELECT * FROM servico WHERE idServico = ". $idServico);
      return $query->fetch();//fetch -> para um único registro
    }
  }

?>
