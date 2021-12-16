<?php 

    /**
     * INICIANDO LA VARIABLE GLOBAL SESSION[];
     */
    session_start();

    /**
     * Desactiva todos los warinings del proyecto, (las notificaciónes PHP)
     * Ojo. Esto solo se debe habilitar en producción
     */
    // error_reporting(1);
    
    // Configura la fecha de america lima 
    date_default_timezone_set("America/Lima");
    setlocale(LC_ALL,"es_ES");
    
    /**
     * Esta variable servirá para controlar que claes puedo traer
     * desde el archivo principal del proyecto. 
     * si es true, se puede iniciar desde el archivo principal
     * si es false, se puede iniciar desde un archivo alterno como procesarAjax
     */
    $conAjax = false;

    /**
     * Scripts main PHP 
     */
    require_once("./main_scripts.php");

    /**
     * Requerimos los archivos con las clases y los metodos necesarios para la elaboración 
     * del depurado, logica y conexiones a databases
     */
    require_once("./core/appRoutes.php"); // RUTAS 
    require_once("./controllers/adminController.php");
    // require_once("controllers/{ejemplo}Controller.php");
    // require_once("controllers/webItecController.php");
    // require_once("controllers/virtualController.php");