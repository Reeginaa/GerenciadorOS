<?php

  /**
   *
   */
  class DAO {
      private $dsn   = "mysql:host=localhost;dbname=projetointegrador";
      private $user  = "root";
      private $pass  = "";

      private $tabela;
      protected $bd;

      //construtor da classe
      function __construct($tabela) {
          $this->tabela = $tabela; //variavel da classe (this) recebendo variavel local
          $this->conectar();
      }

      public function conectar() {
          try {
              $this->bd = new PDO($this->dsn, $this->user, $this->pass);
          } catch (PDOException $e) {
              echo 'Connection failed: ' . $e->getMessage();
          }
      }

      public function get() {
          $query = $this->bd->query("select * from " . $this->tabela);
          $lista = $query->fetchAll();

          return $lista;
      }

      public function getById($id) {
          $query = $this->bd->query("select * from " . $this->tabela . " where id = " . $id);
          return $query->fetch();
      }

      public function remover($id) {
          $query  = $this->bd->prepare("delete from " . $this->tabela . " where id = :id");
          $query->bindParam('id', $id);
          $result = $query->execute();
          if(!$result){
              var_dump($query->errorInfo());
              die();
          }
          return true;
      }

      public function inserir($dados) {
          if(isset($dados['id'])){
              $tmp = $dados;
              unset($tmp['id']);
              $sql = "update " . $this->tabela . " set ";
              $cont=0;
              foreach($tmp as $key => $value){
                  if($cont++) $sql .= ', ';
                  $sql .= $key . ' = :' . $key;
              }
              $sql .= " where id = :id";

          }else{
              $keys   = implode(",", array_keys($dados));
              $cont   = 0;
              $tmp    = array_keys($dados);
              $values = "";
              foreach($tmp as $value){
                  if($cont++) $values .= ",";
                  $values .= ":".$value;
              }
              $sql = "insert into ".$this->tabela."(".$keys.") values(".$values.")";
              // echo $sql; exit;
          }

          $query  = $this->bd->prepare($sql);
          $result =  $query->execute($dados);
          if(!$result){
              var_dump($query->errorInfo());
              die();
          }
          return true;
      }

  }


 ?>
