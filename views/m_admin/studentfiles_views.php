<!doctype html>
<html lang="en">
    <head>
        
        <?php
            include_once("./views/_partials/cdns_header.html");
        ?>

        <!-- hcatpcha API -->
        <script src="https://hcaptcha.com/1/api.js" async defer></script>

        <title>FILES ADMISION 2000</title>
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

<div class="container mt-3 py-3 bg-light">
    
    <div class="mb-5">
      <label for="exampleFormControlInput1" class="form-label">DNI POSTULANTE</label>
      <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="DNI">
      <label for="exampleFormControlInput1" class="form-label">DNI POSTULANTE</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="NOMBRE POSTULANTE">
    </div>



    <div class="mb-1">
        <label for="formFile" class="form-label">FOTO ROSTRO</label>
        <form class="row g-2">
            <div class="col-auto">
                <input class="form-control" type="file" id="formFile"
                    onchange = "readImage(this,'.img_rostro','#base64', 150, 150);"
                >
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">SUBIR</button>
            </div>
        </form>
        <img src="https://i.ibb.co/Tm3hb97/image.png" alt="" 
            class="img_rostro"
            width="150px" 
            height="150px"
        >
    </div>

    <div class="mb-1">
        <label for="formFile" class="form-label">FOTO DNI</label>
        <form class="row g-2">
            <div class="col-auto">
                <input class="form-control" type="file" id="formFile"
                    onchange = "readImage2(this,'.img_dni','#base64', 400, 320);"
                >
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">SUBIR</button>
            </div>
        </form>
        <img src="https://i.ibb.co/Tm3hb97/image.png" alt="" 
            class="img_dni"
            width="350px" 
            height="200px">
    </div>

    <div class="mb-1">
        <label for="formFile" class="form-label">FOTO FIRMA POSTULANTE</label>
        <form class="row g-2">
            <div class="col-auto">
                <input class="form-control" type="file" id="formFile"
                    onchange = "readImage(this,'.img_firma1','#base64', 200, 150);"
                >
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">SUBIR</button>
            </div>
        </form>
        <img src="https://i.ibb.co/Tm3hb97/image.png" alt="" 
            class="img_firma1"
            width="150px"  
            height="100px">
    </div>
    
    <div class="mb-1">
        <label for="formFile" class="form-label">FOTO FIRMA APODERADO</label>
        <form class="row g-2">
            <div class="col-auto">
                <input class="form-control" type="file" id="formFile"
                    onchange = "readImage(this,'.img_firma2','#base64', 200, 150);"
                >
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">SUBIR</button>
            </div>
        </form>
        <img src="https://i.ibb.co/Tm3hb97/image.png" alt="" 
            class="img_firma2"
            width="150px"  
            height="100px">
    </div>

    <div class="mb-1">
        <label for="formFile" class="form-label">FOTO VOUCHER</label>
        <form class="row g-2">
            <div class="col-auto">
                <input class="form-control" type="file" id="formFile" 
                    onchange = "readImage(this,'.img_voucher','#base64', 400, 650);">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">SUBIR</button>
            </div>
        </form>
        <img 
            src="https://i.ibb.co/Tm3hb97/image.png"
            class="img_voucher" alt="" 
            width="300px" 
            height="400px" 
                >
    </div>    


        <div class="col-12 col-md-6 col-lg-4 mb-4">
            <label for="imageImport">Voucher</label>
            <input id="imageImport" type="file" multiple="false" accept=".jpg, .jpeg, .png" class="form-control" required>
            
            <img id="blah" src="https://i.ibb.co/Br8tf3Y/Whats-App-Image-2020-09-26-at-12-50-00-PM.jpg" 
            alt="Tu imagen" style="width: 100%; height: 200px;" />

        </div>


</div>




  <div class="container container-event">
    <h5>Base de codificación de verificando de voucher</h5>
    <textarea name="base64" id="base64" rows='8' cols='40' disabled required></textarea>
    <div id="img_otro">
      <img src="" alt="Image preview" id="preview_new" style="display:">
    </div>
  </div>







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
        <script>

            function dat(fn){
                setTimeout(() => {
                    let res = {"res":22};
                    fn(res);
                }, 1200);
            }

            async function ok1(d){
                console.log("listoo")
                console.log(d)
            }
            

            dat(ok1);

        </script>

        <script src="./views/__js/<?=getNameJs()?>"></script>



    </body>
</html>
