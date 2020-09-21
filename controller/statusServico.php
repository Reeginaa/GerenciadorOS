<?php

    require_once '../model/statusServico_model.php';
    
    /**
     * REGRA DE NEGÓCIO
     */
    class StatusServico{
        private $modelo;
        
        function __construct() {
            $this->modelo = new StatusServico_Model();
        }

        public function listar(){
            $lista = $this->modelo->get();
            require '../view/statusServico/list_statusServico.php';
        }
      
        public function cadastrar($id=null){
            if ($id!=null) {
              $registro = $this->modelo->getById($id);
            }
            require '../view/statusServico/form_statusServico.php';
        }     
        
        public function gravar(){
            $dados = $_POST;
            if ($_REQUEST['id']) {
              $dados['id'] = $_REQUEST['id'];
            }
            //print_r($dados); die();
            $r = $this->modelo->inserir($dados);
            header('location: ./statusServico.php');
        }
      
        public function remover($id){
            echo $id; die();
            $r = $this->modelo->remover($id);
            header('location: ./statusServico.php');
        }
    }

    //instância do objeto
    $statusServico = new StatusServico();

    $acao = isset($_REQUEST['acao'])? $_REQUEST['acao'] : 'listar';
    $id = isset($_REQUEST['id'])? $_REQUEST['id'] : null;
    $statusServico->{$acao}($id);


 ?>
