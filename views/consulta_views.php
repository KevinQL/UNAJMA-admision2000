<!doctype html>
<html lang="en">
    <head>
        
        <?php
            include_once("./views/_partials/cdns_header.html");
        ?>

        <title>WEB ADMISION 2000</title>
    </head>
    <body>

        <!-- SECCIÓN DE INDICADOR DE PAGINA DE CARGA (PRE LOADER) -->
        <?php
            include_once("./views/_components/presentacion-precarga.html");
        ?>
        
        <!-- NAVEGACIÓN DE LAPAGINA DE ITEC -->
        <?php
            include_once( "./views/_secctions/nav_default.html");
        ?>


        <!-- PAGINA CONTENIDO -->

        <h1>PAGE FOR CONSULT THE STATE INSCRIPTION</h1>




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
        <script src="./views/__js/js_consulta.js"></script>



    </body>
</html>
