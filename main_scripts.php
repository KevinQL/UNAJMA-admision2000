<?php 

/**
 * Retunrs the file js name for load in the module (page)
 */
function getNameJs(){

    $namejs = explode("/", $_GET["pg"]);

    if(count($namejs)>1){
        $namejs = "js_{$namejs[1]}.js";
    }else{
        $namejs = "js_{$_GET['pg']}.js";
    }

    return $namejs;
}