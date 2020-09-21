<?php

    //?ATENÇÃO
    require_once '../model/DAO.php';

    /**
     * operações no banco de dados, SQL
     */
    class Peca_Model extends DAO{

        function __construct() {
            parent::__construct();
        }

        //busca todos os dados
        public function get() {
            $query = $this->bd->query("SELECT * FROM peca");
            $lista = $query->fetchAll();
        
            return $lista;
        }

        //busca os dados pelo ID
        public function getById($id) {
            $query = $this->bd->query("SELECT * FROM peca WHERE id = " . $id);
            return $query->fetch();
        }

        //inserir ou alterar os dados
        public function inserir($dados) {
            if($dados['id']){
                //se tem o id altera os dados
                $sql = "UPDATE peca SET item = :item, quantidade = :quantidade, valorCompra = :valorCompra, valorVenda = :valorVenda, desconto = :desconto WHERE id = :id";
            }else{
                //se nao tem o id insere os dados
                $sql = "INSERT INTO peca(item, quantidade, valorCompra, valorVenda, desconto) VALUES(:item, :quantidade, :valorCompra, :valorVenda, :desconto)";
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
            $query  = $this->bd->prepare("DELETE FROM peca WHERE id = :id");
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
