<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title><?php echo COMPANY; ?></title>

         <?php
            include "./vistas/inc/links.php";
        ?>
</head>
<body>

    <?php 
         $peticionsAjax=false;
        require_once "./controladores/vistas.controlador.php";
        $IV = new vistasControlador();

        $vistas=$IV->vistas_Controlador();

        if($vistas=="login" || $vistas=="404"){

            require_once "./vistas/contenidos/".$vistas."-view.php";
        }else{
    ?>
	 <!-- Main container -->
        <main class="full-box main-container">
                <!-- Nav lateral -->
                <?php
                    include "./vistas/inc/navLateral.php";
                ?>
                <!-- Page content -->
                <section class="full-box page-content">
                <?php
                    include "./vistas/inc/navbar.php";

                    include $vistas;
                ?>
                </section>
                
        </main>
                  <?php
        }
                    include "./vistas/inc/script.php";
                ?>
	
        
</body>
</html>