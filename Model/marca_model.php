<?php
  /*faz operações do banco de dados, tudo o que é SQL*/

  require_once '../Model/DAO.php';
  /**
    *
  */
  class Marca_Model extends DAO {

    function __construct(){
        parent::__construct(); //parent -> pega a classe pai a superclasse
    }

    public function get(){
      $query = $this->bd->query("SELECT * FROM marca");
      $lista = $query->fetchAll();//fetchAll -> recebe dados multidimensionais
      return $lista;
    }

    public function inserir($dados){
      if ($dados['idMarca']) {
        $sql = "UPDATE marca SET nomeMarca = :nomeMarca, observacaoMarca = :observacaoMarca WHERE idMarca = :idMarca";
      } else {
        $sql = "INSERT INTO marca(nomeMarca, observacaoMarca) VALUES (:nomeMarca, :observacaoMarca)";
      }

      $query = $this->bd->prepare($sql);
      $result = $query->execute($dados);
      if (!$result){
        var_dump($query->errorInfo());
        die();
      }
      return true;
    }

    public function remover($idMarca){
      $query = $this->bd->prepare("DELETE FROM marca WHERE idMarca = :idMarca");
      $query->bindParam('idMarca', $idMarca);
      $result = $query->execute();
      if (!$result){
        var_dump($query->errorInfo());
        die();
      }
      return true;
    }

    public function getById($idMarca){
      $query = $this->bd->query("SELECT * FROM marca WHERE idMarca = ". $idMarca);
      return $query->fetch();//fetch -> para um único registro
    }
  }

?>
