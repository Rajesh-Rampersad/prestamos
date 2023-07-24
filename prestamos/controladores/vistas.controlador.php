<?php

require_once "./modelos/vistasModelo.php";

class vistasControlador extends vistasModelo{
    /* -------Controlador para obterner las plantillas----- */
    public function plantillaControlador(){
        return require_once "./vistas/plantilla.php";

    }

    /* -------Controlador para obterner las vistas----- */
    public function vistas_Controlador(){
        
        if(isset($_GET['views'])){

            $ruta=explode("/", $_GET['views']);
            $respuesta=vistasModelo::obtener_vistas_modelo($ruta[0]);

        }else{
            $respuesta="login";

        }
        return $respuesta;

    }
}