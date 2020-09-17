<?php
  /*faz operações do banco de dados, tudo o que é SQL*/

  require_once '../Model/DAO.php';
  /**
    *
  */
  class TipoPessoa_Model extends DAO {

    function __construct(){
        parent::__construct(); //parent -> pega a classe pai a superclasse
    }

    public function get(){
      $query = $this->bd->query("SELECT * FROM tipopessoa");
      $lista = $query->fetchAll();//fetchAll -> recebe dados multidimensionais
      return $lista;
    }

    public function inserir($dados){
      if ($dados['idTipoPessoa']) {
        $sql = "UPDATE tipopessoa SET tipo = :tipo, descricao = :descricao WHERE idTipoPessoa = :idTipoPessoa";
      } else {
        $sql = "INSERT INTO tipopessoa(tipo, descricao) VALUES (:tipo, :descricao)";
      }

      $query = $this->bd->prepare($sql);
      $result = $query->execute($dados);
      if (!$result){
        var_dump($query->errorInfo());
        die();
      }
      return true;
    }

    public function remover($idTipoPessoa){
      $query = $this->bd->prepare("DELETE FROM tipopessoa WHERE idTipoPessoa = :idTipoPessoa");
      $query->bindParam('idTipoPessoa', $idTipoPessoa);
      $result = $query->execute();
      if (!$result){
        var_dump($query->errorInfo());
        die();
      }
      return true;
    }

    public function getById($idTipoPessoa){
      $query = $this->bd->query("SELECT * FROM tipopessoa WHERE idTipoPessoa = ". $idTipoPessoa);
      return $query->fetch();//fetch -> para um único registro
    }
  }

?>
