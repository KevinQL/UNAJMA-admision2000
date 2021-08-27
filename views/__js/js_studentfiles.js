console.log('loading ./views/__js/js_studentfiles.js');







    /**
     * 
     * 
     */
    // PROGRAMACION TEMPORAL 
                        // img , "#blah", "#base64", 400, 650
    function readImage (input, $img, $base64, maxWidth, maxHeight) {

        sweetModalCargando();

        document.querySelector($base64).value = "";
        
        if (input.files && input.files[0]) {
            let k = "";
            let reader = new FileReader();
            reader.onload = function (e) {
                document.querySelector("#preview_new").setAttribute("src", reader.result); // Renderizamos la imagen con su tamanio normla
                k = reader.result;
                //console.log("ok->", k);
                setTimeout(() => {
                    let img = document.querySelector("#preview_new"); // capturamos la imagen renderiada en su tamanio normal
                    console.log("img principal: ",{w: img.width, h: img.height});

                    if(img.height >= img.width){
                        if(img.width > maxWidth || img.height > maxHeight)
                            k = _resize(img, maxWidth, maxHeight); // me devuelve el base64 de la imagen renderizada, reescalado.
                        //console.log("ok2->",k);
                        document.querySelector($base64).value = k; // imprimimos el base 64 de la imgen redimensionada
                        document.querySelector($img).setAttribute("src", k); // imprimimos la imagen en la imagen de previsualización

                        setTimeout(() => {
                            document.querySelector("#preview_new").setAttribute("src", k); // imprimimos la imagen en la imagen de previsualización
                            console.log("img final: ",{w:img.width, h:img.height});
                        }, 700);

                        sweetModalMin("Voucher Cargado con exito!!","center",2000,"success");
                    }else{
                        
                        sweetModalMin("Por favor Subir otra foto del voucher!!","center",2500,"error");
                        input.value = "";
                        document.querySelector("#preview_new").setAttribute("src", "");
                        document.querySelector($img).setAttribute("src", "https://i.ibb.co/Br8tf3Y/Whats-App-Image-2020-09-26-at-12-50-00-PM.jpg");
                    }
                }, 500);
                //imprime valor base64 
                //renderiza la img en la img principal
            }
            reader.readAsDataURL(input.files[0]);
        
        }
    }
    
    function readImage2 (input, $img, $base64, maxWidth, maxHeight) {

        sweetModalCargando();

        document.querySelector($base64).value = "";
        
        if (input.files && input.files[0]) {
            let k = "";
            let reader = new FileReader();
            reader.onload = function (e) {
                document.querySelector("#preview_new").setAttribute("src", reader.result); // Renderizamos la imagen con su tamanio normla
                k = reader.result;
                //console.log("ok->", k);
                setTimeout(() => {
                    let img = document.querySelector("#preview_new"); // capturamos la imagen renderiada en su tamanio normal
                    console.log("img principal: ",{w: img.width, h: img.height});

                    if(img.width >= img.height){
                        if(img.width > maxWidth || img.height > maxHeight)
                            k = _resize2(img, maxWidth, maxHeight); // me devuelve el base64 de la imagen renderizada, reescalado.
                        //console.log("ok2->",k);
                        document.querySelector($base64).value = k; // imprimimos el base 64 de la imgen redimensionada
                        document.querySelector($img).setAttribute("src", k); // imprimimos la imagen en la imagen de previsualización

                        setTimeout(() => {
                            document.querySelector("#preview_new").setAttribute("src", k); // imprimimos la imagen en la imagen de previsualización
                            console.log("img final: ",{w:img.width, h:img.height});
                        }, 700);

                        sweetModalMin("Voucher Cargado con exito!!","center",2000,"success");
                    }else{
                        
                        sweetModalMin("Por favor Subir otra foto del voucher!!","center",2500,"error");
                        input.value = "";
                        document.querySelector("#preview_new").setAttribute("src", "");
                        document.querySelector($img).setAttribute("src", "https://i.ibb.co/Br8tf3Y/Whats-App-Image-2020-09-26-at-12-50-00-PM.jpg");
                    }
                }, 500);
                //imprime valor base64 
                //renderiza la img en la img principal
            }
            reader.readAsDataURL(input.files[0]);
        
        }
    }
    
    //----------------------------------------------------------
    //----------------- CODIGO DE IMAGEN -----------------------
    //----------------------------------------------------------
    //----------------------------------------------------------

    function _resize(img, maxWidth, maxHeight) 
    {
        let ratio = 1;
        let canvas = document.createElement("canvas");
        canvas.style.display="block";
        document.body.appendChild(canvas);

        let canvasCopy = document.createElement("canvas");
        canvasCopy.style.display="block";
        document.body.appendChild(canvasCopy);

        let ctx = canvas.getContext("2d");
        let copyContext = canvasCopy.getContext("2d");

        if(img.width > maxWidth)
            ratio = maxWidth / img.width;
        else if(img.height > maxHeight)
            ratio = maxHeight / img.height;
        else{
            ratio = 1;
        }

        canvasCopy.width = img.width;
        canvasCopy.height = img.height;
        try {
            copyContext.drawImage(img, 0, 0);
        } catch (e) { 
            //document.getElementById('loader').style.display="none";
            alert("Aquí fue el problema - Porfavor tome otra foto, o suba otra foto");
            return false;
        }
        canvas.width = img.width * ratio;
        canvas.height = img.height * ratio;
        // the line to change
        //ctx.drawImage(canvasCopy, 0, 0, canvasCopy.width, canvasCopy.height, 0, 0, canvas.width, canvas.height);
        // the method signature you are using is for slicing
        ctx.drawImage(canvasCopy, 0, 0, canvas.width, canvas.height);
        let dataURL = canvas.toDataURL("image/jpg");
        document.body.removeChild(canvas);
        document.body.removeChild(canvasCopy);

        //return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
        return dataURL;
    };


    function _resize2(img, maxWidth, maxHeight) 
    {
        let ratio = 1;
        let canvas = document.createElement("canvas");
        canvas.style.display="block";
        document.body.appendChild(canvas);

        let canvasCopy = document.createElement("canvas");
        canvasCopy.style.display="block";
        document.body.appendChild(canvasCopy);

        let ctx = canvas.getContext("2d");
        let copyContext = canvasCopy.getContext("2d");

        if(img.height > maxHeight)
            ratio = maxHeight / img.height;
        else if(img.width > maxWidth)
            ratio = maxWidth / img.width;
        else{
            ratio = 1;
        }

        canvasCopy.width = img.width;
        canvasCopy.height = img.height;
        try {
            copyContext.drawImage(img, 0, 0);
        } catch (e) { 
            //document.getElementById('loader').style.display="none";
            alert("Aquí fue el problema - Porfavor tome otra foto, o suba otra foto");
            return false;
        }
        canvas.width = img.width * ratio;
        canvas.height = img.height * ratio;
        // the line to change
        //ctx.drawImage(canvasCopy, 0, 0, canvasCopy.width, canvasCopy.height, 0, 0, canvas.width, canvas.height);
        // the method signature you are using is for slicing
        ctx.drawImage(canvasCopy, 0, 0, canvas.width, canvas.height);
        let dataURL = canvas.toDataURL("image/jpg");
        document.body.removeChild(canvas);
        document.body.removeChild(canvasCopy);

        //return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
        return dataURL;
    };




    //--------------------//
    /**
     * CODING IN THIS PROJECT
     */
    //--------------------//

    document.querySelector("#imageImport").addEventListener('change', e => {
        // alert('cambios');
        console.log("this: ", this, "eel", e)
        console.log("this: ",e.target)
        readImage(e.target,"#blah","#base64", 900, 1700);
    })
    