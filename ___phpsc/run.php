<?php



    
    /**
     * FUNCIONES BASICAS
     */
    function create_file($dir_file, $t){
        
        $msj = [];

        $archivo = fopen($dir_file, "w+b");    // Abrir el archivo, creándolo si no existe

        if( $archivo == false )
            $msj = "Error al crear el archivo";
        else {
            $msj = "El archivo ha sido creado";

            if($t === "js"){
                fwrite($archivo, <<<EOT
console.log('loading $dir_file');

EOT

                );
            }else{
                // fwrite($archivo, "<?php\r\n");
                // fwrite($archivo, "  echo 'hola mundo';\r\n");
                fwrite($archivo, <<<EOT
<!doctype html>
<html lang="en">
    <head>
        
        <?php
            include_once("./views/_partials/cdns_header.html");
        ?>

        <!-- hcatpcha API -->
        <script src="https://hcaptcha.com/1/api.js" async defer></script>

        <title>ADMISION 2000</title>
    </head>
    <body class="consult_views">

        <!-- SECCIÓN DE INDICADOR DE PAGINA DE CARGA (PRE LOADER) -->
        <?php
            include_once("./views/_components/presentacion-precarga.html");
        ?>
        
        <!-- NAVEGACIÓN DE LAPAGINA DE ITEC -->
        <?php
            include_once( "./views/_secctions/nav_default.html");
        ?>


        <!-- PAGINA CONTENIDO -->

        <!-- NAV DEFEAULT -->

        <nav class="navbar navbar-light k_bg-transparent py-2">
            <div class="container">
            <a class="navbar-brand" href="#">
                <img src="./views/__assets/icons/check.png" alt="" width="30" height="24">
            </a>
            </div>
        </nav>




<!-- PAGINA CONTENIDO MODULO -->

<?php

    var_dump(getNameJs());

?>









        <!-- SOCIAL MENSAJERIA -->
        <?php
            include_once("./views/_components/social.html");
        ?>


        <!-- FOOTER DE LA PÁGINA -->
        <?php
            include_once("./views/_secctions/footer_default.html");
        ?>


        <!-- cdns con los links de la página -->
        <?php
            include_once("./views/_partials/cdns_footer.html");
        ?>
        <!-- SCRIPTS FOR THIS PAGE -->
        <script src="./views/__js/<?=getNameJs()?>"></script>



    </body>
</html>

EOT
            );
                // fwrite($archivo, "  echo 'hola mundo';\r\n");
                
            }

        }

        fclose($archivo);   // Cerrar el archivo   

        return ["eval"=>$archivo,"msj"=> $msj];
    }




    //-------------------------------------------------------------------------------
    //-------------------------------------------------------------------------------
    //-------------------------------------------------------------------------------

    var_dump($argv);
    var_dump($argc);


    if($argc === 3){
        $dir = "./views/{$argv[1]}/{$argv[2]}_views.php";
        $estructura = "./views/{$argv[1]}/";
        if(!mkdir($estructura, 0777, true)) {
            echo ('Fallo al crear las carpetas...');
        }
        $cf = create_file($dir, "php");
        echo "se creo en {$dir}";
        echo "\n";

        $dir = "./views/__js/js_{$argv[2]}.js";
        $cf = create_file($dir, "js");
        echo "se creo en {$dir}";
        echo "\n";
    }

    
    elseif ($argc === 2) {
        # code...
        $dir = "./views/{$argv[1]}_views.php";
        $cf = create_file($dir, "php");
        echo "se creo en {$dir}";
        echo "\n";

        $dir = "./views/__js/js_{$argv[1]}.js";
        $cf = create_file($dir, "js");
        echo "se creo en {$dir}";
        echo "\n";
    }
    else{ 
        echo "no se ejecuto ninguna acción";
    }


    // die();