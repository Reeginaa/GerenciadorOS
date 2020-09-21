<?php

    //?ATENÇÃO
    require_once '../model/DAO.php';

    /**
     * Faz as operações no banco de dados, tudo o que é SQL
     */
    class TipoPessoa_Model extends DAO {

        function __construct() {
            parent::__construct();
        }

        //busca todos os dados
        public function get() {
            $query = $this->bd->query("SELECT * FROM tipopessoa");
            $lista = $query->fetchAll();
        
            return $lista;
        }

        //busca os dados pelo id
        public function getById($id) {
            $query = $this->bd->query("SELECT * FROM tipopessoa WHERE id = " . $id);
            return $query->fetch();
        }

        //inserir ou alterar os dados
        public function inserir($dados) {
            if($dados['id']){
                //se o dado tem id, altera ele
                $sql = "UPDATE tipopessoa SET tipo = :tipo, descricao = :descricao WHERE id = :id";
            }else{
                //se não tem o id, inclui ele
                $sql = "INSERT INTO tipopessoa(tipo, descricao) VALUES(:tipo, :descricao)";
            }

            $query  = $this->bd->prepare($sql);
            $result =  $query->execute($dados);
            if(!$result){
                var_dump($query->errorInfo());
                die();
            }
            return true;
        }

        //remover o dado
        public function remover($id) {
            $query  = $this->bd->prepare("DELETE FROM tipopessoa WHERE id = :id");
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
