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
        $dni = mainModel::limpiar_cadena($_POST['usuario_dni_reg']);
        $nombre = mainModel::limpiar_cadena($_POST['usuario_nombre_reg']);
        $apellido = mainmodel::limpiar_cadena($_POST['usuario_apellido_reg']);
        $telefono = mainModel::limpiar_cadena($_POST['usuario_telefono_reg']);
        $direccion = mainModel::limpiar_cadena($_POST['usuario_direccion_reg']);

        $usuario = mainModel::limpiar_cadena($_POST['usuario_usuario_reg']);
        $email = mainModel::limpiar_cadena($_POST['usuario_email_reg']);
        $clave1 = mainModel::limpiar_cadena($_POST['usuario_clave1_reg']);
        $clave2 = mainModel::limpiar_cadena($_POST['usuario_clave2_reg']);

        $privilegio = mainModel::limpiar_cadena($_POST['usuario_privilegio_reg']);

        /*---------Controlador comprobar campo vacios--------*/

        if ($dni == "" || $nombre == "" || $apellido == "" || $usuario == "" || $clave1 == "" || $clave2 == "") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "ocurrio un error inesperado",
                "Texto" => "No has llenados todos los campos obligatorio",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit();
        }

    }
}