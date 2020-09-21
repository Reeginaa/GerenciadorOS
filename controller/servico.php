<?php

    require_once '../model/servico_model.php';
    
    /**
     * REGRA DE NEGÓCIO
     */
    class Servico{
        private $modelo;

        function __construct() {
            $this->modelo = new Servico_Model();
        }

        //função para listar
        public function listar(){
            $lista = $this->modelo->get();
            require '../view/servico/list_servico.php';
        }

        //função para cadastrar
        public function cadastrar($id = null){
            if ($id != null) {
                $registro = $this->modelo->getById($id);
            }
            require '../view/servico/form_servico.php';
        }

        //função para gravar
        public function gravar(){
            $dados = $_POST;
            if ($_REQUEST['id']) {
                $dados['id'] = $_REQUEST['id'];
            }
            //print_r($dados); die();
            $r =$this->modelo->inserir($dados);
            header('location: ./servico.php');
        }

        //função para remover
        public function remover($id){
            $r = $this->modelo->remover($id);
            header('location: ./servico.php');
        }
        
    }

    //instância do objeto
    $servico = new Servico();

    $acao = isset($_REQUEST['acao'])? $_REQUEST['acao'] : 'listar';
    $id = isset($_REQUEST['id'])? $_REQUEST['id'] : null;
    $servico->{$acao}($id);
 ?>
