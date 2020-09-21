<?php

    //?ATENÇÃO
    require_once '../model/DAO.php';

    /**
     *
     */
    class StatusServico_Model extends DAO {

        function __construct() {
            parent::__construct();
        }

        public function get() {
            $query = $this->bd->query("SELECT * FROM statusservico");
            $lista = $query->fetchAll();
        
            return $lista;
        }

        public function getById($id) {
            $query = $this->bd->query("SELECT * FROM statusservico WHERE id = " . $id);
            return $query->fetch();
        }

        public function inserir($dados) {
            if($dados['id']){
                $sql = "UPDATE statusservico SET status = :status, descricaoStatus = :descricaoStatus WHERE id = :id";
            }else{
                $sql = "INSERT INTO statusservico(status, descricaoStatus) VALUES(:status, :descricaoStatus)";
            }

            $query  = $this->bd->prepare($sql);
            $result =  $query->execute($dados);
            if(!$result){
                var_dump($query->errorInfo());
                die();
            }
            return true;
        }

        public function remover($id) {
            $query  = $this->bd->prepare("DELETE FROM statusservico WHERE id = :id");
            $query->bindParam('id', $id);
            $result = $query->execute();
            if(!$result){
                var_dump($query->errorInfo());
                die();
            }
            return true;
        }
    }

 ?>
