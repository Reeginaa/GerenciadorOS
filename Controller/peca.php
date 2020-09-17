<?php
  /*O que essa manutenção vai fazer, controla, tudo o que é REGRA DE NEGÓCIO*/

  require_once '../Model/peca_model.php';

  /**
   *
   */
  class Peca {
    private $modelo;

    function __construct(){
      $this->modelo = new Peca_Model();//instancia do objeto
    }

    public function listar(){
      $lista = $this->modelo->get();
      require '../View/Peca/list_peca.php';
    }

    public function cadastrar($idPeca=null){
      if ($idPeca!=null) {
        $registro = $this->modelo->getById($idPeca);
      }
      require '../View/Peca/form_peca.php';
    }

    public function gravar(){
      $dados = $_POST;
      if ($_REQUEST['idPeca']) {
        $dados['idPeca'] = $_REQUEST['idPeca'];
      }
      //print_r($dados); die();
      $r = $this->modelo->inserir($dados);
      header('location: ./peca.php');
    }

    public function remover($idPeca){
      //echo $id; die();
      $r = $this->modelo->remover($idPeca);
      header('location= ./peca.php');
    }
  }

  //instância do objeto
  $peca = new Peca();

  $acao = isset($_REQUEST['acao'])? $_REQUEST['acao'] : 'listar';
  $idPeca = isset($_REQUEST['idPeca'])? $_REQUEST['idPeca'] : null;
  $peca->{$acao}($idPeca);

?>
