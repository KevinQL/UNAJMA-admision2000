<?php


    var_dump($argv);
    var_dump($argc);


    if($argc === 3){
        echo "se creo en ./views/{$argv[1]}/{$argv[2]}_views.php";
        echo "\n";
        echo "se creo en ./__js/js_{$argv[2]}.js";
    }
    elseif ($argc === 2) {
        # code...
        echo "se creo en ./views/{$argv[1]}_views.php";
        echo "\n";
        echo "se creo en ./__js/js_{$argv[1]}.js";
    }
    else{ 
        echo "no se ejecuto ninguna acción";
    }


    // die();

    
    /**
     * FUNCIONES BASICAS
     */
    function create_file($dir_file){
        
        $msj = [];

        $archivo = fopen($dir_file, "w+b");    // Abrir el archivo, creándolo si no existe

        if( $archivo == false )
            $msj = "Error al crear el archivo";
        else
            $msj = "El archivo ha sido creado";

        fclose($archivo);   // Cerrar el archivo   

        return ["eval"=>$archivo,"msj"=> $msj];
    }