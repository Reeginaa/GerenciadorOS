<?php
  /*O que essa manutenção vai fazer, controla, tudo o que é REGRA DE NEGÓCIO*/

  require_once '../Model/servico_model.php';

  /**
   *
   */
  class Servico {
    private $modelo;

    function __construct(){
      $this->modelo = new Servico_Model();//instancia do objeto
    }

    public function listar(){
      $lista = $this->modelo->get();
      require '../View/Servico/list_servico.php';
    }

    public function cadastrar($idServico=null){
      if ($idServico!=null) {
        $registro = $this->modelo->getById($idServico);
      }
      require '../View/Servico/form_servico.php';
    }

    public function gravar(){
      $dados = $_POST;
      if ($_REQUEST['idServico']) {
        $dados['idServico'] = $_REQUEST['idServico'];
      }
      //print_r($dados); die();
      $r = $this->modelo->inserir($dados);
      header('location: ./servico.php');
    }

    public function remover($idServico){
      //echo $idServico; die();
      $r = $this->modelo->remover($idServico);
      header('location= ./servico.php');
    }
  }

  //instância do objeto
  $servico = new Servico();

  $acao = isset($_REQUEST['acao'])? $_REQUEST['acao'] : 'listar';
  $idServico = isset($_REQUEST['idServico'])? $_REQUEST['idServico'] : null;
  $servico->{$acao}($idServico);

?>
