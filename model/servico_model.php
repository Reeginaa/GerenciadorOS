<?php

    //?ATENÇÃO
    require_once '../model/DAO.php';

    /**
     * faz as operações de banco de dados, tudo o que é SQL
     */
    class Servico_Model extends DAO {

        function __construct() {
            parent::__construct();
        }

        //busca todos os dados
        public function get() {
            $query = $this->bd->query("SELECT * FROM servico");
            $lista = $query->fetchAll();
        
            return $lista;
        }

        //busca os dados pelo id
        public function getById($id) {
            $query = $this->bd->query("SELECT * FROM servico WHERE id = " . $id);
            return $query->fetch();
        }

        //inserir ou alterar os dados
        public function inserir($dados) {
            if($dados['id']){
                //se tem o id altera os dados
                $sql = "UPDATE servico SET servico = :servico, valor = :valor, desconto = :desconto WHERE id = :id";
            }else{
                //se não tem o id insere os dados
                $sql = "INSERT INTO servico(servico, valor, desconto) VALUES(:servico, :valor, :desconto)";
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
            $query  = $this->bd->prepare("DELETE FROM servico WHERE id = :id");
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
