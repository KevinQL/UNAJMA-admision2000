<?php
    // configuracion de cabecera para peticiones Ajax
    
    if(!is_null($_POST['data'])){
        
        include_once("./configProcess.php");

        //Instancias del objeto controller
        $obj = new adminController();

        
        //
        if ($data->id === "consult-inscripcion") {
            # code...

            if( !empty($data->hcaptcha) || true){

                /**
                 * code of the captcha by KLEBXY
                 */
                // $data_hc = [
                //     "secret" => "0x28899D6c004BBBB2489d955c4F2514cc94940a73",
                //     "response" => $data->hcaptcha
                // ];
        
                // $verify = curl_init();
                // curl_setopt($verify, CURLOPT_URL, "https://hcaptcha.com/siteverify");
                // curl_setopt($verify, CURLOPT_POST, true);
                // curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data_hc));
                // curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        
                // $response = curl_exec($verify);
                // $responseData = json_decode($response);
            

                /**
                 * Consulta de estado de inscripción del postulante
                 */
                $res = $obj -> consultaInscripcion_Controller($data);

            }else{
                $res = ["eval"=>false, "msj"=> "No se resolvió el captcha!!"];
            }
            // $response->msj_sys[] = $res["msj"]; 
            // $response->eval = $res["eval"]; 
            // $response->data = $res["data"];
            echo json_encode($res);
        }

        elseif ($data->id === "closed") {
            # code...
            // $res = $obj->closed_Controller($data); 
            if(session_destroy()){
                $res["eval"] = true;
                $res["msj"] = "Saliendo del sistema Admin ITEC!!";
            }else{
                $res["msj"] = "No se proceso la solicitud!!";
            }
            
            echo json_encode($res);
        }


        elseif ($data->id === "saved-studentfiles") {
            # code...
            /**
             * file type (img or pdf) 
             * route to saved img (name dir put img or pdf)
             * the elemento - img $_FILE
             * 
             */
            $file_img = explode(",",$data->filestudent);
            $file_img = $file_img[1];
            $file_img = base64_decode($file_img);
            $ruta_name = "../../zetadmision/{$data->urldir}/{$data->namefile}.jpg";
            
            file_put_contents($ruta_name, $file_img);
            
            echo json_encode(["eval"=>true, "data"=>$data]);

        }

        /** funcionality basic */
        elseif ($data->id === "login") {
            # code...
            $res = $obj->loginUsuario_Controller($data); //
            
            echo json_encode($res);
        }


        elseif ($data->id === "registrate") {
            # code...
            $res = $obj->registrarUsuario_Controller($data);
            echo json_encode($res);
        }


        elseif ($data->id === "exe-info") {
            # code...
            // $res["eval"] = true;
            // $res["msj"] = "Success response Ajax!!";
            // echo json_encode($res);
            echo json_encode($data);
        }

        else {
            echo json_encode("ERROR!!");
        }

    }else{
        echo json_encode("ERROR!!");
    }
    