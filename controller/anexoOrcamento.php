<?php

    class AnexoOrcamento extends Controller_Base {
        private $nome;
        private $link;

        function __construct()
        {
            $this->nome = "anexoOrcamento";
            $this->link = '?controller=' . $this->nome;
            $this->loadModel('AnexoOrcamento_Model');
        }

        // public function cadastrar($id=null)
        // {
        //     $acao = $this->link . '&acao=gravar';
        //     if ($id !=null) {
        //         $registro = $this->modelo->getById($id);
        //     }

        //     require $GLOBALS['APPPATH'] . '/view/'.$this->nome.'/form_'.$this->nome.'.php';
        // }

        public function gravar(){
            $dados = $_POST;
            if ($_REQUEST['id']) {
              $dados['id'] = $_REQUEST['id'];
            }
            $r = $this->modelo->inserir($dados);
            $this->redirect('?controller='.$this->nome);
          }
    }
    
?>