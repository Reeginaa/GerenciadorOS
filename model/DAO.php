<?php

  /**
   * Conexão com o banco de dados
   */
  class DAO {
      private $dsn   = "mysql:host=localhost;dbname=projetointegrador";
      private $user  = "root";
      private $pass  = "";

      protected $bd;

      //construtor da classe
      function __construct() {
          $this->conectar();
      }

      public function conectar() {
          try {
              $this->bd = new PDO($this->dsn, $this->user, $this->pass);
          } catch (PDOException $e) {
              echo 'Connection failed: ' . $e->getMessage();
          }
      }

  }


 ?>
