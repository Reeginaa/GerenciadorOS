<?php
  /*O que essa manutenção vai fazer, controla, tudo o que é REGRA DE NEGÓCIO*/

  require_once '../Model/statusServico_model.php';

  /**
   *
   */
  class StatusServico {
    private $modelo;

    function __construct(){
      $this->modelo = new StatusServico_Model();//instancia do objeto
    }

    public function listar(){
      $lista = $this->modelo->get();
      require '../View/StatusServico/list_statusServico.php';
    }

    public function cadastrar($idStatusServico=null){
      if ($idStatusServico!=null) {
        $registro = $this->modelo->getById($idStatusServico);
      }
      require '../View/StatusServico/form_statusServico.php';
    }

    public function gravar(){
      $dados = $_POST;
      if ($_REQUEST['idStatusServico']) {
        $dados['idStatusServico'] = $_REQUEST['idStatusServico'];
      }
      //print_r($dados); die();
      $r = $this->modelo->inserir($dados);
      header('location: ./statusServico.php');
    }

    public function remover($idStatusServico){
      //echo $id; die();
      $r = $this->modelo->remover($idStatusServico);
      header('location= ./statusServico.php');
    }
  }

  //instância do objeto
  $statusServico = new StatusServico();

  $acao = isset($_REQUEST['acao'])? $_REQUEST['acao'] : 'listar';
  $idStatusServico = isset($_REQUEST['idStatusServico'])? $_REQUEST['idStatusServico'] : null;
  $statusServico->{$acao}($idStatusServico);

?>
