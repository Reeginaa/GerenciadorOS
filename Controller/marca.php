<?php
  /*O que essa manutenção vai fazer, controla, tudo o que é REGRA DE NEGÓCIO*/

  require_once '../Model/marca_model.php';

  /**
   *
   */
  class Marca {
    private $modelo;

    function __construct(){
      $this->modelo = new Marca_Model();//instancia do objeto
    }

    public function listar(){
      $lista = $this->modelo->get();
      require '../View/Marca/list_marca.php';
    }

    public function cadastrar($idMarca=null){
      if ($idMarca!=null) {
        $registro = $this->modelo->getById($idMarca);
      }
      require '../View/Marca/form_marca.php';
    }

    public function gravar(){
      $dados = $_POST;
      if ($_REQUEST['idMarca']) {
        $dados['idMarca'] = $_REQUEST['idMarca'];
      }
      //print_r($dados); die();
      $r = $this->modelo->inserir($dados);
      header('location: ./marca.php');
    }

    public function remover($idMarca){
      //echo $id; die();
      $r = $this->modelo->remover($idMarca);
      header('location= ./marca.php');
    }
  }

  //instância do objeto
  $marca = new Marca();

  $acao = isset($_REQUEST['acao'])? $_REQUEST['acao'] : 'listar';
  $idMarca = isset($_REQUEST['idMarca'])? $_REQUEST['idMarca'] : null;
  $marca->{$acao}($idMarca);

?>
