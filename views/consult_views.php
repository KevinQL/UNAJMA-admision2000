<!doctype html>
<html lang="en">
    <head>
        
        <?php
            include_once("./views/_partials/cdns_header.html");
        ?>

        <!-- hcatpcha API -->
        <script src="https://hcaptcha.com/1/api.js" async defer></script>

        <title>CONSULTA ADMISION 2000</title>
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

<section class="container k_sections">

    <div class="container text-center khead-consult">

            <h2>INGRESA TU NÚMERO DE DNI</h2>
            <!-- <input type="number" 
                placeholder="INGRESA TU DNI"
                class="txt_dni form-control w-50 m-auto"
            > -->
        
            <form class="form-floating w-50 m-auto">
                <input type="number" 
                    class="txt_dni form-control" 
                    id="floatingInputValue" placeholder="7451..." value=""
                >
                <label for="floatingInputValue">INGRESA TU DNI AQUÍ</label>
            </form>

            <!-- Elemento hCaptcha -->
            <div class="pt-2 text-center">
                <div class="h-captcha" data-sitekey="90541f3b-4b55-40ad-a480-1e07bf94bfdb">
                </div>
            </div>

            <input name="hcaptcha" type="hidden" class="hcaptcha" value=""/>
            <!--  -->
        
            <input type="button" 
                class="btn btn-primary btn-lg px-4 my-2"
                value="CONSULTAR" 
                onclick="exe_consult()"
            >
    </div>


    <!-- 
        HISTORIAL

        > pre inscripcion
        > Admisión te envió las indicaciones al correo 
        > Subir certificado de estudios, declaración jurada de no tener covid (Descargar archivo) y "documentos que acrediten la modalidad extraordinario al cual postula"
        > Subió firmas. 
        > Aceptar declaraciones juradas en el sistema. 
        > Descargar Constancia de inscripción personal
     -->



<div class="accordion accordion-flush" id="accordionFlushExample">
    
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                PRE INSCRIPCIÓN #1 
                <small class="res_preinscripcion text-danger px-3 fw-bold">
                    <span class="text-danger">(ESPERANDO...)</span>
                </small>
            </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                ...
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
               Admisión te envió las indicaciones al correo <span class="txt_email text-success px-2 text-lowercase">...</span> #2 
               <small class="res_correo text-danger px-3 fw-bold">
                    <span class="text-danger">(ESPERANDO...)</span>
                </small>
            </button>
        </h2>
        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                ...
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                Subir documentos en formato PDF #3 
                <small class="res_pdf text-danger px-3 fw-bold">
                    <span class="text-danger">(ESPERANDO...)</span>
                </small>
            </button>
        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                ...
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                Subir firmas en formato digital #4
                <small class="res_firma text-danger px-3 fw-bold">
                    <span class="text-danger">(ESPERANDO...)</span>
                </small>
            </button>
        </h2>
        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                ...
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingFive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                Aceptar Declaraciones juradas en el sistema #5
                <small class="res_dj text-danger px-3 fw-bold">
                    <span class="text-danger">(ESPERANDO...)</span>
                </small>
            </button>
        </h2>
        <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                ...
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingSix">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                Descargar Constancia de Inscripción #6
                <small class="res_constancia text-danger px-3 fw-bold">
                    <span class="text-danger">(ESPERANDO...)</span>
                </small>
            </button>
        </h2>
        <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                ...
            </div>
        </div>
    </div>

</div>

     



</section>


        




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
        <script src="./views/__js/js_consult.js"></script>



    </body>
</html>
