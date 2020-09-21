<?php

    require_once '../model/tipoPessoa_model.php';
    
    /**
     * REGRA DE NEGÓCIO
     */
    class TipoPessoa{
        private $modelo;
        
        function __construct() {
            $this->modelo = new TipoPessoa_Model();
        }

        //função para listar
        public function listar(){
            $lista = $this->modelo->get();
            require '../view/tipoPessoa/list_tipoPessoa.php';
        }

        //função para cadastrar
        public function cadastrar($id = null){
            if ($id != null) {
                $registro = $this->modelo->getById($id);
            }
            require '../view/tipoPessoa/form_tipoPessoa.php';
        }

        //função para gravar
        public function gravar(){
            $dados = $_POST;
            if ($_REQUEST['id']) {
                $dados['id'] = $_REQUEST['id'];
            }
            //print_r($dados); die();
            $r = $this->modelo->inserir($dados);
            header('location: ./tipoPessoa.php');
        }

        //função para remover
        public function remover($id){
            $r = $this->modelo->remover($id);
            header('location: ./tipoPessoa.php');
        }
    }

    //instância do objeto
    $tipoPessoa = new TipoPessoa();

    $acao = isset($_REQUEST['acao'])? $_REQUEST['acao'] : 'listar';
    $id = isset($_REQUEST['id'])? $_REQUEST['id'] : null;
    $tipoPessoa->{$acao}($id);

 ?>
