<?php

    $APPPATH = basename('.');
    require_once $APPPATH . '/controller/controller_base.php';
    require_once $APPPATH . '/model/DAO.php';
    /**
     *
     */
    class APP {

        function __construct() {}

        public function dispatcher($rota) {

            if(FILE_EXISTS($GLOBALS['APPPATH'] . '/controller/'.$rota.'.php')){
                //faz o import do controlador
                require_once($GLOBALS['APPPATH'] . '/controller/'.$rota.'.php');

                $str_controlador = ucfirst($rota);

                //instância do objeto
                $controller = new $str_controlador();

                $acao = $_REQUEST['acao']?? 'index';
                $id   = isset($_REQUEST['id'])? $_REQUEST['id'] : null;
                $controller->$acao($id);
            }
        }


    }

 ?>
