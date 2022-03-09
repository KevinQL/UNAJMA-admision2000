console.log("CARGADO => js_consult.js");



function data_consult(){
    let txt_dni = document.querySelector(".txt_dni");

    let result_valid = document.querySelector(".result_valid");

    let res_preinscripcion = document.querySelector(".res_preinscripcion");
    let res_correo = document.querySelector(".res_correo");
    let res_pdf = document.querySelector(".res_pdf");
    let res_firma = document.querySelector(".res_firma");
    let res_dj = document.querySelector(".res_dj");
    let res_constancia = document.querySelector(".res_constancia");

    let txt_email = document.querySelector(".txt_email");

    let hcaptcha = document.querySelector(".hcaptcha");
    let h_captcha_response = document.querySelector("textarea[name=h-captcha-response]");



    return {
        elements : {
            txt_dni,

            result_valid,

            res_preinscripcion,
            res_correo,
            res_pdf,
            res_firma,
            res_dj,
            res_constancia,

            txt_email,

            hcaptcha,
            h_captcha_response
        },
        values : {
            txt_dniv : txt_dni.value
        }
    }
}

function eval_consult(){

    let result = true;

    let data = data_consult();
    let { txt_dni, h_captcha_response, hcaptcha } = data.elements;

    if(txt_dni.value.length === 0 || txt_dni.value.length < 8) result = false;

    // if( h_captcha_response.value.length === 0 ){
    //     result = false;
    //     hcaptcha.value = "";
    // }else{

    //     hcaptcha.value = h_captcha_response.value;
    // }

    return result;
}

function exe_consult(){

    let data = data_consult();
    let { txt_dniv } = data.values;
    let {
        txt_dni,

        result_valid,

        res_preinscripcion,
        res_correo,
        res_pdf,
        res_firma,
        res_dj,
        res_constancia,

        txt_email,

        hcaptcha

     } = data.elements;

    // console.log( data_consult() );
    // return null;

    if(eval_consult()){

        sweetModalCargando()

        // console.log(txt_dniv);

        fetchKev("POST",{
                id:"consult-inscripcion",
                txt_dniv,
                hcaptcha : hcaptcha.value
            },
            res => {

                console.log(res)

                /**
                 *
                 */
                 res_preinscripcion.innerHTML = `<span class="text-danger">(ESPERANDO...)</span>`;
                 res_correo.innerHTML = `<span class="text-danger">(ESPERANDO...)</span>`;
                 res_pdf.innerHTML = `<span class="text-danger">(ESPERANDO...)</span>`;
                 res_firma.innerHTML = `<span class="text-danger">(ESPERANDO...)</span>`;
                 res_dj.innerHTML = `<span class="text-danger">(ESPERANDO...)</span>`;
                 res_constancia.innerHTML = `<span class="text-danger">(ESPERANDO...)</span>`;

                 txt_email.innerText = `...`;



                if(res.eval){

                    /**
                     *
                     */
                     res_preinscripcion.innerHTML = `<span class="text-warning">(PENDIENTE...)</span>`;
                     res_correo.innerHTML = `<span class="text-warning">(PENDIENTE...)</span>`;
                     res_pdf.innerHTML = `<span class="text-warning">(PENDIENTE...)</span>`;
                     res_firma.innerHTML = `<span class="text-warning">(PENDIENTE...)</span>`;
                     res_dj.innerHTML = `<span class="text-warning">(PENDIENTE...)</span>`;
                     res_constancia.innerHTML = `<span class="text-warning">(PENDIENTE...)</span>`;

                     txt_email.innerText = `...`;


                    if(res.rowCount === 1){
                        // alert("Se encontró egistro")
                        sweetModal("Se encontró registro!", "center","success",1200);

                        let student = res.data[0];

                        console.log(student);

                        /**
                         *
                         */
                         txt_email.innerText = `${student.email}`;

                         res_preinscripcion.innerHTML = `<span class="text-success">(LISTO...)</span>`;

                         if(student.envioemail === "1") {
                             res_correo.innerHTML = `<span class="text-success">(LISTO...)</span>`;
                         }

                         if(student.dj === "1"){
                             res_dj.innerHTML = `<span class="text-success">(LISTO...)</span>`;
                             res_constancia.innerHTML = `<span class="text-success">(YA PUEDE DESCARAGARLO!)</span>`;
                         }

                        if(res.rs_pdf){
                            res_pdf.innerHTML = `<span class="text-success">(LISTO...)</span>`;                             
                        }

                        if(res.rs_firma){
                             res_firma.innerHTML = `<span class="text-success">(LISTO...)</span>`;
                        }

                         if(student.validado === "1"){
                             res_pdf.innerHTML = `<span class="text-success">(LISTO...)</span>`;
                             res_firma.innerHTML = `<span class="text-success">(LISTO...)</span>`;
                             res_constancia.innerHTML = `<span class="text-success">(YA PUEDE DESCARAGARLO!)</span>`;

                            result_valid.innerHTML = `ADMISIÓN TE INFORMA: <span class="text-success">Tu inscripción ya está validado. :D</span>`;
                         }else{
                            result_valid.innerHTML = `ADMISIÓN TE INFORMA: 
                            <span class="text-danger">Todavía no se validó tu inscripción. En breve el personal revisará tus datos y archivos. Tenga paciencia. Gracias.</span>`;
                         }



                    }else{
                        // alert("Tiene más de una pre inscripción. Comuniquese con Admisión");
                        sweetModal("Tiene más de un Registro para el proceso 2021-2. Comuniquese con Admisión urgente!", "center","error",4000);
                        
                    }

                }else{
                    // alert(res.msj);
                    sweetModal(res.msj, "center","warning",1200);

                    let cadena = res.msj;

                    let posicion = cadena.indexOf('captcha'); // check in the content of the result
                    if (posicion !== -1){
                        console.log("La palabra está en la posición " + posicion);
                        setTimeout(() => {
                            //reload the page because there is the word hcaptcha
                            location.reload();
                        }, 1300);
                    }

                }

            },
            URL_PROCESS_MAIN
        );


    }else{
        // alert("Complete los datos correctamente!!!");
        sweetModal("Ingrese DNI, o Compruebe que es un Postulante!!!", "center","warning",5000);
        setTimeout(() => {
            location.reload();
        }, 1300);
    }


}





/**
 * ANIMACIÓN PARA CARGA DE PÁGINA (INCLUIR)
 */
 window.addEventListener("load", function(){
    console.log("listoo!!")

    setTimeout(() => {

        function watching(){
            console.log("entro!")
            let valor = document.querySelector("textarea[name=h-captcha-response]").value;
            if(valor.length == 0){
                setTimeout(() => {
                    watching();
                }, 1000);
            }else{
                document.querySelector(".hcaptcha").value = valor;
                console.log("fin")
                return null;
            }
        }
        /**
        * Starting function for watch the captcha
        */
        // watching();

    }, 3000);
})
