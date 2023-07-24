<?php

if ($peticionAjax) {
    require_once "../modelos/usuarioModelo.php";
} else {
    require_once "./modelos/usuarioModelo.php";
}

class UsuarioControlador extends usuarioModelo
{
    /*---------Controlador agregar usuario--------*/
    public function agregar_usuario_controlador()
    {
    }
}