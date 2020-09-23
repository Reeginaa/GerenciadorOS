<?php

  /**
   *
   */
  class Peca extends Controller_Base{

    private $nome;
    private $link;

    function __construct() {
      $this->nome = "peca";
      $this->link = '?controller=' . $this->nome;
      $this->loadModel('Peca_Model');
    }

    public function index(){
      $link = $this->link;
      $lista = $this->modelo->get();
      require $GLOBALS['APPPATH'] . '/view/'.$this->nome.'/list_'.$this->nome.'.php';
    }

    public function cadastrar($id=null){
      $acao = $this->link . '&acao=gravar';
      if ($id != null) {
        $registro = $this->modelo->getById($id);
      }
      require $GLOBALS['APPPATH']. '/view/'.$this->nome.'/form_'.$this->nome.'.php';
    }

    public function gravar(){
      $dados = $_POST;
      if ($_REQUEST['id']) {
        $dados['id'] = $_REQUEST['id'];
      }
      $r = $this->modelo->inserir($dados);
      $this->redirect('?controller='.$this->nome);
    }

    public function remover($id){
      $r = $this->modelo->remover($id);
      $this->redirect('?controller='.$this->nome);
    }
  }

?>
