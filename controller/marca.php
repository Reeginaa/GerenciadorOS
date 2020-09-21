<?php

    require_once '../model/marca_model.php';
    /**
     * O que essa manutenção vai fazer, controla, REGRA DE NEGÓCIO
     */
    class Marca{
        private $modelo;

        function __construct() {
            $this->modelo = new Marca_Model();
        }

        //função para listar
        public function listar(){
            $lista = $this->modelo->get();
            require '../view/marca/list_marca.php';
        }

        //função para cadastrar
        public function cadastrar($id = null){
            if($id != null){
                $registro = $this->modelo->getById($id);
            }
            require '../view/marca/form_marca.php';
        }

        //função para gravar
        public function gravar(){
            $dados = $_POST;
            if ($_REQUEST['id']) {
                $dados['id'] = $_REQUEST['id'];
            }
            //print_r($dados); die();
            $r = $this->modelo->inserir($dados);
            header('location: ./marca.php');
        }

        //função para remover
        public function remover($id){
            $r = $this->modelo->remover($id);
            header('location: ./marca.php');
        }
    }

    //instância do objeto
    $marca = new Marca();

    $acao = isset($_REQUEST['acao'])? $_REQUEST['acao'] : 'listar';
    $id = isset($_REQUEST['id'])? $_REQUEST['id'] : null;
    $marca->{$acao}($id);

 ?>
