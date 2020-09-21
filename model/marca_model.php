<?php

    //?ATENÇÃO
    require_once '../model/DAO.php';

    /**
     * Faz as operações no banco de dados, tudo o que é SQL
     */
    class Marca_Model extends DAO {

        function __construct() {
            parent::__construct();
        }

        //busca todos os dados
        public function get() {
            $query = $this->bd->query("SELECT * FROM marca");
            $lista = $query->fetchAll();
        
            return $lista;
        }

        //busca os dados pelo ID
        public function getById($id) {
            $query = $this->bd->query("SELECT * FROM marca WHERE id = " . $id);
            return $query->fetch();
        }

        //inserir ou alterar dados
        public function inserir($dados) {
            if($dados['id']){
                //se tem o id altera os dados
                $sql = "UPDATE marca SET nomeMarca = :nomeMarca, observacaoMarca = :observacaoMarca WHERE id = :id";
            }else{
                //se não tem insere os dados
                $sql = "INSERT INTO marca(nomeMarca, observacaoMarca) VALUES(:nomeMarca, :observacaoMarca)";
            }

            $query  = $this->bd->prepare($sql);
            $result =  $query->execute($dados);
            if(!$result){
                var_dump($query->errorInfo());
                die();
            }
            return true;
        }

        //remove o dado
        public function remover($id) {
            $query  = $this->bd->prepare("DELETE FROM marca WHERE id = :id");
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
