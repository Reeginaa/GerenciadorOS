<?php

    require_once './main.php';
    $App = new APP();

    if(isset($_REQUEST['controller'])){
        $App->dispatcher($_REQUEST['controller']);
    }else{
        require_once ($GLOBALS['APPPATH'] . '/view/home.php');
    }
?>
