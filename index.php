<?php
    

    /**
     * Se incluyen las configuraciones principales para 
     * el archivo principal del proyecto
     */
    include_once('./configIndex.php');

    /**
     * Instancias de objetos de la capa intermedia
     */
    $obj_admin = new adminController();
    
    /**
     * Evalua si se inicion la variable global SESSION[]
     */
    $session = $obj_admin->verificarSessionController();
    
    /**
     * metodo de la clase adminController
     * administra las paginas que se mostrarán para los usuarios en funcion de la url
     */
    $paginaResult = $obj_admin->administrarPaginasController($session);
    
    // var_dump($_SESSION); Eliminar está linea 
    
    /**
     * Despliega la selección de la página. 
     */
    include_once("./views/" . $paginaResult);     
