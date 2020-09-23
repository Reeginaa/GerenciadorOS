<?php

    /**
     *
     */
    class Controller_Base {
        protected $modelo;

        function __construct() { }

        public function loadModel($model) {
            $nome = strtolower($model);
            if(FILE_EXISTS($GLOBALS['APPPATH'] . '/model/'.$nome.'.php')){
                require_once $GLOBALS['APPPATH'] . '/model/'.$nome.'.php';
                $this->modelo = new $model();
            }else{
                die("Model não existe! :()");
            }
          // code...
        }

        public function redirect($local) {
            header('Location: ' . $local);
        }
    }

 ?>
