<?php
  /*O que essa manutenção vai fazer, controla, tudo o que é REGRA DE NEGÓCIO*/

  require_once '../Model/tipoPessoa_model.php';

  /**
   *
   */
  class TipoPessoa {
    private $modelo;

    function __construct(){
      $this->modelo = new TipoPessoa_Model();//instancia do objeto
    }

    public function listar(){
      $lista = $this->modelo->get();
      require '../View/TipoPessoa/list_tipoPessoa.php';
    }

    public function cadastrar($idTipoPessoa=null){
      if ($idTipoPessoa!=null) {
        $registro = $this->modelo->getById($idTipoPessoa);
      }
      require '../View/TipoPessoa/form_tipoPessoa.php';
    }

    public function gravar(){
      $dados = $_POST;
      if ($_REQUEST['idTipoPessoa']) {
        $dados['idTipoPessoa'] = $_REQUEST['idTipoPessoa'];
      }
      //print_r($dados); die();
      $r = $this->modelo->inserir($dados);
      header('location: ./tipoPessoa.php');
    }

    public function remover($idTipoPessoa){
      //echo $id; die();
      $r = $this->modelo->remover($idTipoPessoa);
      header('location= ./tipoPessoa.php');
    }
  }

  //instância do objeto
  $tipoPessoa = new TipoPessoa();

  $acao = isset($_REQUEST['acao'])? $_REQUEST['acao'] : 'listar';
  $idTipoPessoa = isset($_REQUEST['idTipoPessoa'])? $_REQUEST['idTipoPessoa'] : null;
  $tipoPessoa->{$acao}($idTipoPessoa);

?>
