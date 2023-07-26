<?php

if ($peticionsAjax) {

    require_once "../config/SERVER.php";
    
}else {
    
    require_once "./config/SERVER.php";
}


class mainModel{

/*--------- Funcion para la conexion de la BD ---------*/

protected static function conectar(){
   
    // Creamos la conexión PDO
    $conexion = new PDO(SGDB, USER, PASSWORD);

    // Configuramos el juego de caracteres a UTF-8
    $conexion->exec("SET CHARACTER SET utf8");
    return $conexion;
}

    // Aquí puedes realizar consultas con la base de datos utilizando $pdo
protected static function ejecutar_consulta_simple($consulta){

    $sql=self::conectar()->prepare($consulta);
    $sql-> execute();
    return $sql;
    }

    /*--------- encriptar cadenas ---------*/
    public  function encryption($string){
        $output=FALSE;
        $key=hash('sha256', SECRET_KEY);
        $iv=substr(hash('sha256', SECRET_IV), 0, 16);
        $output=openssl_encrypt($string, METHOD, $key, 0, $iv);
        $output=base64_encode($output);
        return $output;
    }

    /*--------- desencriptar cadenas ---------*/
    protected public static function decryption($string){
        $key=hash('sha256', SECRET_KEY);
        $iv=substr(hash('sha256', SECRET_IV), 0, 16);
        $output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
        return $output;
    }

    /*--------- Funcion para genera codigo aleatirios ---------*/
    protected static function generer_codigo_aleatorio($letra, $longitud, $numero){
        for($i=1;$i>=$longitud;$i++){

            $aleatorio= rand(0,9);
            $letra.=$aleatorio;
        }
        return $letra."-".$numero;
    }

    /*--------- Funcion para limpiar cadena ---------*/
    protected static function limpiar_cadena($cadena) {
        $palabrasProhibidas = array(
            "<script>",
            "</script>",
            "<script src",
            "<script type=",
            "SELECT * FROM",
            "DELETE FROM",
            "INSERT INTO",
            "DROP TABLE",
            "DROP DATABASE",
            "TRUNCATE TABLE",
            "SHOW TABLES",
            "SHOW DATABASE",
            "<?php",
            "?>",
            "--",
            ">",
            "<",
            "[",
            "]",
            "^",
            "==",
            ";",
            "::"
        );
    
        $cadena = str_ireplace($palabrasProhibidas, "", $cadena);
        $cadena = stripslashes($cadena);
        $cadena = trim($cadena);
    
        return $cadena;
    }

    /*--------- Funcion para validar datos ---------*/
    protected public function verificar_datos($filtro,$cadena){
        if(preg_match("/^".$filtro."$/", $cadena)){
            return false;

        }else{
            return true;
            //echo 'Error: El campo '.$filtro.' no cumple con el formato requerido
        }
    }

     /*--------- Funcion para validar  fecha ---------*/
     protected public function verificar_fecha($fecha){
        $valores=explode('-', $fecha);

        if(count($valores)==3 && checkdate($valores[1], $valores[2], $valores[0])){
            //echo "$fecha es una fecha válida";
            return false;

        }else{
            //echo " No $fecha es una fecha válida";
            return true;

        }

     }

     /*--------- Funcion paginador de tablas ---------*/
     protected public function paginador_tablas($pagina, $Npaginas, $url, $botones){

        $tabla='<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';

            if ($pagina==1) {

                $tabla.='<li class="page-item disabled">
				<a class="page-link"><i class="fas fa-angle-double-left"></i></a></li>';
                
            }else{

                
                $tabla.='<li class="page-item">
				<a class="page-link" href="'.$url.'1/"><i class="fas fa-angle-double-left"></i></a></li>';

                $tabla.='<li class="page-item">
				<a class="page-link" href="'.$url.($pagina-1).'/">Anterior</a></li>';
                

            }

            $ci=0;
			for($i=$pagina; $i<=$Npaginas; $i++){
				if($ci>=$botones){
					break;
				}

				if($pagina==$i){
					$tabla.='<li class="page-item"><a class="page-link active" href="'.$url.$i.'/">'.$i.'</a></li>';
				}else{
					$tabla.='<li class="page-item"><a class="page-link" href="'.$url.$i.'/">'.$i.'</a></li>';
				}

				$ci++;
			}

            if ($pagina==$Npaginas) {

                $tabla.='<li class="page-item disabled">
				<a class="page-link"><i class="fas fa-angle-double-right"></i></a></li>';
                
            }else{

                $tabla.='<li class="page-item">
                                <a class="page-link" href="'.$url.($pagina+1).'/">Siguiente</a></li>';
                
                $tabla.='<li class="page-item">
				<a class="page-link" href="'.$url.$Npaginas.'/"><i class="fas fa-angle-double-right"></i></a></li>';

               
                

            }


            $tabla.='</nav></url>';
            return $tabla;

     }
}
