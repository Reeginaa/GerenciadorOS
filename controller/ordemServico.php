<?php

  /**
   *
   */
  class OrdemServico extends Controller_Base{

    private $nome;
    private $link;

    function __construct() {
      $this->nome = "ordemServico"; //nome da classe genérico
      $this->link = '?controller=' . $this->nome;
      $this->loadModel('OrdemServico_Model');
    }

    public function index(){
      $link = $this->link;
      //print_r(10); exit();
      $lista = $this->modelo->get();
      require $GLOBALS['APPPATH'] . '/view/header.php';
      require $GLOBALS['APPPATH'] . '/view/'.$this->nome.'/list_'.$this->nome.'.php';
      require $GLOBALS['APPPATH'] . '/view/footer.php';
    }

    public function cadastrar($id=null){
      //print_r(10); exit;
      $listaCliente = $this->modelo->getLista('pessoa'); //recebe os dados da tabela tipo pessoa
      $listaEquipamento = $this->modelo->getLista('equipamento'); 
      $listaStatus = $this->modelo->getLista('statusServico'); 

      $acao = $this->link . '&acao=gravar';
      if ($id != null) {
        $registro = $this->modelo->getById($id);
      }
      require $GLOBALS['APPPATH'] . '/view/header.php';
      require $GLOBALS['APPPATH']. '/view/'.$this->nome.'/form_'.$this->nome.'.php';
      require $GLOBALS['APPPATH'] . '/view/footer.php';
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
