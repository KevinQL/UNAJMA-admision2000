<?php
    // var_dump(isset($_GET['admin']));

    $evalsession = $_SESSION['vtipo'] !== "S"? true:false;
    $evalsession = isset($_GET['adminkev'])? false: $evalsession;
    
    if( $evalsession ){
        echo "ADMISIÓN UNAJMA DICEs";
        echo "<br>";
        echo "No tiene una sessión activa!!!";
        echo "<br>";
        echo "comuniquese con los de sistemas :D";
        die();
    }
?>

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
        
        <!-- NAVEGACIÓN DE LAPAGINA -->
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
        <input type="number" class="form-control" id="exampleFormControlInput1" 
            placeholder="DNI"
            value="<?=$_GET['codedni']?>"
            readonly
        >
        <label for="exampleFormControlInput1" class="form-label">NOMBRE POSTULANTE</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" 
            placeholder="NOMBRE POSTULANTE"
            value="<?=$_GET['namepost']?>"
            readonly
        >
    </div>



    <div class="mb-1">
        <label for="formFile" class="form-label">FOTO ROSTRO</label>
        <form class="row g-2">
            <div class="col-auto">
                <input class="form-control" type="file" id="formFile"
                    multiple="false" accept=".jpg, .jpeg, .png"
                    onchange = "readImage(this,'.img_rostro','#preview_new1','#base641', 150, 150);"
                >
            </div>
            <div class="col-auto">
                <button type="submit" 
                    class="btn btn-primary mb-3"
                    onclick="upload_filestudent('img','foto_postulante', '<?=$_GET['codedni']?>', '#base641');"
                >
                    SUBIR
                </button>
            </div>

            <!-- base de codificacion para cargar archivo -->
              <div class="container container-event" style="display:none">
                <h5>Base de codificación de verificando de voucher</h5>
                <textarea name="base64" id="base641" rows='8' cols='40' style="display:" disabled required></textarea>
                <div id="img_otro">
                <img src="" alt="Image preview" id="preview_new1" style="display:" disabled required>
                </div>
            </div>
            <!-- base de codificacion para cargar archivo -->
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
                    multiple="false" accept=".jpg, .jpeg, .png" 
                    onchange = "readImage(this,'.img_dni','#preview_new2','#base642', 450, 370,'w');"
                >
            </div>
            <div class="col-auto">
                <button type="submit" 
                    class="btn btn-primary mb-3"
                    onclick="upload_filestudent('img','foto_dni', '<?=$_GET['codedni']?>','#base642');"
                >
                    SUBIR
                </button>
            </div>
            <!-- base de codificacion para cargar archivo -->
            <div class="container container-event" style="display:none">
                <h5>Base de codificación de verificando de voucher</h5>
                <textarea name="base64" id="base642" rows='8' cols='40' style="display:" disabled required></textarea>
                <div id="img_otro">
                <img src="" alt="Image preview" id="preview_new2" style="display:" disabled required>
                </div>
            </div>
            <!-- base de codificacion para cargar archivo -->
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
                    multiple="false" accept=".jpg, .jpeg, .png"
                    onchange = "readImage(this,'.img_firma1','#preview_new3','#base643', 200, 150,'w');"
                >
            </div>
            <div class="col-auto">
                <button type="submit" 
                    class="btn btn-primary mb-3"
                    onclick="upload_filestudent('img','foto_ing_firma', '<?=$_GET['codedni']?>','#base643');"
                >
                    SUBIR
                </button>
            </div>
            <!-- base de codificacion para cargar archivo -->
            <div class="container container-event" style="display:none">
                <h5>Base de codificación de verificando de voucher</h5>
                <textarea name="base64" id="base643" rows='8' cols='40' style="display:" disabled required></textarea>
                <div id="img_otro">
                <img src="" alt="Image preview" id="preview_new3" style="display:" disabled required>
                </div>
            </div>
            <!-- base de codificacion para cargar archivo -->
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
                    multiple="false" accept=".jpg, .jpeg, .png"
                    onchange = "readImage(this,'.img_firma2','#preview_new4','#base644', 200, 150,'w');"
                >
            </div>
            <div class="col-auto">
                <button type="submit" 
                    class="btn btn-primary mb-3"
                    onclick="upload_filestudent('img','foto_ing_firma', '<?=$_GET['codedni']?>AP','#base644');"
                >
                    SUBIR
                </button>
            </div>
            <!-- base de codificacion para cargar archivo -->
            <div class="container container-event" style="display:none">
                <h5>Base de codificación de verificando de voucher</h5>
                <textarea name="base64" id="base644" rows='8' cols='40' style="display:" disabled required></textarea>
                <div id="img_otro">
                <img src="" alt="Image preview" id="preview_new4" style="display:" disabled required>
                </div>
            </div>
            <!-- base de codificacion para cargar archivo -->
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
                    multiple="false" accept=".jpg, .jpeg, .png" 
                    onchange = "readImage(this,'.img_voucher','#preview_new5','#base645', 400, 650);">
            </div>
            <div class="col-auto">
                <button type="submit" 
                    class="btn btn-primary mb-3"
                    onclick="upload_filestudent('img','foto_voucher', '<?=$_GET['codeproc']?><?=$_GET['codedni']?>','#base645');"
                >
                    SUBIR
                </button>
            </div>
            <!-- base de codificacion para cargar archivo -->
            <div class="container container-event" style="display:none">
                <h5>Base de codificación de verificando de voucher</h5>
                <textarea name="base64" id="base645" rows='8' cols='40' style="display:" disabled required></textarea>
                <div id="img_otro">
                <img src="" alt="Image preview" id="preview_new5" style="display:" disabled required>
                </div>
            </div>
            <!-- base de codificacion para cargar archivo -->
        </form>
        <img 
            src="https://i.ibb.co/Tm3hb97/image.png"
            class="img_voucher" alt="" 
            width="300px" 
            height="400px" 
                >
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
        <script src="./views/__js/<?=getNameJs()?>"></script>



    </body>
</html>
