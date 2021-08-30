    console.log('loading ./views/__js/js_studentfiles.js');



    function upload_filestudent(typefile, urldir, namefile) {
        /**
         * type file
         * url dir
         * FILE 
         * ID - namefile : (proceso - dni ).[.jpg||.png]
         * 
         */

        event.preventDefault();

        let filestudent = document.querySelector("#base64");

        filestudent = filestudent.value;

        fetchFileKev("POST",
            {
                id:"saved-studentfiles",
                filestudent,
                typefile,
                urldir,
                namefile
            },{

            },
            res => {
                console.log(res)
            },
            URL_PROCESS_MAIN
        );
    }








    /**
     * 
     * @param {Element} input elemento input file img
     * @param {String} $img identificador css del elemento img principal donde se previsualizará la imagen
     * @param {String} $imgpreview identificador css del elemento img secundario donde se previsualizará la imagen en su tamano normal. Necesario para realizar el calculo del alto y ancho de la imagen (este elemento debe estar oculto para una mejor vista)
     * @param {String} $base64 identificador css del elemento donde se genrará el codigo base64 de la imagen. Esta cadena de texto se enviará al servidor para que eventualmente se guarde en formato img en un a carpeta (este elemento debe estar oculto para una mejor vista)
     * @param {string} maxWidth Es el ancho máximo al que se le redimensionará la imagen, solo en el caso de que la imagen principal tenga un ancho mayor
     * @param {string} maxHeight Es el alto máximo al que se le redimensionará la imagen, solo en el caso de que la imagen principal tenga un alto mayor
     * @param {string} orientacion definimos la orientación para realizar el recorte (h:recortar imagenes que tienen el alto más grande que el anco, w:recorte para el ancho) 
     */
    // PROGRAMACION TEMPORAL 
                        // img , "#blah", "#base64", 400, 650
    function readImage (input, $img, $imgpreview='#preview_new', $base64, maxWidth, maxHeight, orientacion = 'h') {

        let bgimg_default = "https://i.ibb.co/Br8tf3Y/Whats-App-Image-2020-09-26-at-12-50-00-PM.jpg";
        let img_preview = document.querySelector($imgpreview); //se debe crear este elemento
        let img_view = document.querySelector($img);
        let txt_base64 = document.querySelector($base64);
        
        console.log({orientacion})
        
        sweetModalCargando();

        txt_base64 .value = "";
        
        if (input.files && input.files[0]) {
            let k = "";
            let reader = new FileReader();
            reader.onload = function (e) {
                k = reader.result;
                // Renderizamos la imagen con su tamanio normla
                img_preview.setAttribute("src", k); 
                img_view.setAttribute("src", k)
                //console.log("ok->", k);
                setTimeout(() => {
                    console.log("img in preview: ",{w: img_preview.width, h: img_preview.height});
                    console.log("img in principal: ",{w: img_view.width, h: img_view.height});

                    if(orientacion === "h"){
                        
                        if(img_preview.height >= img_preview.width){
                            if(img_preview.height >= maxHeight || img_preview.width >= maxWidth){
                                k = _resize(img_preview, maxWidth, maxHeight, function(k) {

                                    /**
                                    * EL CODIGO DE ABAJO PODRÍA SER PARTE DE UN CALLBACK :D (mejorar...)
                                    * ESTO ES UN CALLBACK   
                                    */
                                    //generamos el base64 de la imagen
                                    txt_base64.value = k; 
                                    // imprimimos la imagen en la imagen de previsualización
                                    img_view.setAttribute("src", k); 
            
                                    // imprimimos la imagen en la imagen de previsualización
                                    img_preview.setAttribute("src", k); 
                                    img_view.setAttribute("src", k)

                                    setTimeout(() => {
                                        console.log("img out preview: ",{w: img_preview.width, h: img_preview.height});
                                        console.log("img out principal: ",{w: img_view.width, h: img_view.height});
                                        
                                    }, 500);
            
                                    sweetModalMin("Cargado con exito 1!!","center",2000,"success");
                                }); // me devuelve el base64 de la imagen renderizada, reescalado.
    
                            }else{
    
                                //generamos el base64 de la imagen
                                txt_base64.value = k; 
                                // imprimimos la imagen en la imagen de previsualización
                                img_view.setAttribute("src", k); 
        
                                // imprimimos la imagen en la imagen de previsualización
                                img_preview.setAttribute("src", k); 
                                img_view.setAttribute("src", k)

                                console.log("img out preview: ",{w: img_preview.width, h: img_preview.height});
                                console.log("img out principal: ",{w: img_view.width, h: img_view.height});
        
                                sweetModalMin("Cargado con exito 0!!","center",2000,"success");
    
                            }
                            
                        }else{
                            
                            sweetModalMin("Por favor editar foto!!","center",2500,"error");
                            input.value = "";
                            img_preview.setAttribute("src", "");
                            img_view.setAttribute("src", );
                        }
                    }
                    else if(orientacion === "w"){
                        if( img_preview.width >= img_preview.height ){
                            if(img_preview.height >= maxHeight || img_preview.width >= maxWidth){
                                k = _resize(img_preview, maxWidth, maxHeight, function(k) {
                                    /**
                                    * EL CODIGO DE ABAJO PODRÍA SER PARTE DE UN CALLBACK :D (mejorar...)
                                    * ESTO ES UN CALLBACK   
                                    */
                                    //generamos el base64 de la imagen
                                    txt_base64.value = k; 
                                    // imprimimos la imagen en la imagen de previsualización
                                    img_view.setAttribute("src", k); 
            
                                    // imprimimos la imagen en la imagen de previsualización
                                    img_preview.setAttribute("src", k); 
                                    img_view.setAttribute("src", k)

                                    setTimeout(() => {
                                        console.log("img out preview: ",{w: img_preview.width, h: img_preview.height});
                                        console.log("img out principal: ",{w: img_view.width, h: img_view.height});  
                                    }, 500);
            
                                    sweetModalMin("Cargado con exito 11!!","center",2000,"success");
                                }); // me devuelve el base64 de la imagen renderizada, reescalado.
    
                            }else{
    
                                //generamos el base64 de la imagen
                                txt_base64.value = k; 
                                // imprimimos la imagen en la imagen de previsualización
                                img_view.setAttribute("src", k); 
        
                                // imprimimos la imagen en la imagen de previsualización
                                img_preview.setAttribute("src", k); 
                                img_view.setAttribute("src", k)
                                console.log("img out preview: ",{w: img_preview.width, h: img_preview.height});
                                console.log("img out principal: ",{w: img_view.width, h: img_view.height});
                                // setTimeout(() => {
                                // }, 400);
        
                                sweetModalMin("Cargado con exito 000!!","center",2000,"success");
    
                            }
                            
                        }else{
                            
                            sweetModalMin("Por favor editar foto!!","center",2500,"error");
                            input.value = "";
                            img_preview.setAttribute("src", bgimg_default);
                            img_view.setAttribute("src", bgimg_default);
                        }
                    }else{

                        alert("the function is not define for this operation!! :D call to kev :v")
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
    /**
     * 
     * @param {element} img Elemento img el cual se quiere redimencionar
     * @param {String} maxWidth 
     * @param {String} maxHeight 
     * @param {Function} fn Función callback. Se pasa a la función el resultado de la img redimencionada.
     * @returns Retorna el code64 de la imagen redimensionada. ''
     */
    function _resize(img, maxWidth, maxHeight, fn) 
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

        
        // function callback
        fn(dataURL);

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
    