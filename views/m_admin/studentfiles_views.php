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
