<?php
$peticionsAjax = true;
require_once "../config/APP.php";

if(){

    /*---------Instancia al controlador--------*/
    require_once "../controladores/usuarioControlador.php";
    $ins_usuario = new usuarioControlador();

}else{
    session_start(['name'=>'SPM']);
    session_unset();
    session_destroy();
    header("Location: ".SERVERURL."login/");
    exit();
}