<?php
  /*faz operações do banco de dados, tudo o que é SQL*/

  require_once '../Model/DAO.php';
  /**
    *
  */
  class Peca_Model extends DAO {

    function __construct(){
        parent::__construct(); //parent -> pega a classe pai a superclasse
    }

    public function get(){
      $query = $this->bd->query("SELECT * FROM peca");
      $lista = $query->fetchAll();//fetchAll -> recebe dados multidimensionais
      return $lista;
    }

    public function inserir($dados){
      if ($dados['idPeca']) {
        $sql = "UPDATE peca SET item = :item, quantidade = :quantidade, valorCompra = :valorCompra, valorVenda = :valorVenda, desconto = :desconto WHERE idPeca = :idPeca";
      } else {
        $sql = "INSERT INTO peca(item, quantidade, valorCompra, valorVenda, desconto) VALUES (:item, :quantidade, :valorCompra, :valorVenda, :desconto)";
      }

      $query = $this->bd->prepare($sql);
      $result = $query->execute($dados);
      if (!$result){
        var_dump($query->errorInfo());
        die();
      }
      return true;
    }

    public function remover($idPeca){
      $query = $this->bd->prepare("DELETE FROM peca WHERE idPeca = :idPeca");
      $query->bindParam('idPeca', $idPeca);
      $result = $query->execute();
      if (!$result){
        var_dump($query->errorInfo());
        die();
      }
      return true;
    }

    public function getById($idPeca){
      $query = $this->bd->query("SELECT * FROM peca WHERE idPeca = ". $idPeca);
      return $query->fetch();//fetch -> para um único registro
    }
  }

?>
