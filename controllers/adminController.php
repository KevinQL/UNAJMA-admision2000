<?php

    $conAjax = is_null($conAjax)?false:$conAjax;
    if($conAjax){
        require_once "../models/adminModel.php";
    }else{
        require_once "./models/adminModel.php";
    }


    class adminController extends adminModel {


        /**
         * 
         */
        public function consultaInscripcion_Controller($data){
            $dataModel = new StdClass;
            $dataModel->numerodocumento = trim($data->txt_dniv);
            /** 
             * Estos procesos se desactivan a medida que se van dando cada proceso
            */
            $dataModel->proceso[] = '0030'; // proceso ordinario 20221
            $dataModel->proceso[] = '0031'; // proceso extraordinario 20221
            $dataModel->proceso[] = '0032'; // proceso cepre 20221 CERRADO

            $res = self::consultaInscripcion_Model($dataModel);
            return $res;
        }

        /**
         * 
         */
        public function loginUsuario_Controller($data){
            $dataModel = new stdClass;
            $dataModel->email = $data->emailv;
            $dataModel->password = $data->passwordv;

            $res = self::loginUsuario_Model($dataModel);


            return $res;
        }


        public function registrarUsuario_Controller($data){
            $dataModel = new stdClass;
            $dataModel->email = $data->emailv;
            $dataModel->password = $data->passwordv;

            $res_email = self::compruebaEmail_Model($dataModel->email);
            if(!$res_email["eval"]){
                $res = self::registrarUsuario_Model($dataModel);
            }else{
                $res = $res_email;
                $res["eval"] = false; //modificando el valor para ser tratado en el front end
            }
            unset($dataModel);
            unset($res_email);
            return $res;
        }
        

        /**
         * VERIFICADO
         * (IMPORTANTE)
         */
        public function verificarSessionController($isexecute){
            // var_dump($isexecute);
            if($isexecute){
                $session = (isset($_SESSION['start']) && !empty($_SESSION['start']) &&!is_null($_SESSION)) ? true:false;
                return $session;

            }else{
                return true;
            }
        }


        /**
         * VERIFICADO
         * (IMPORTANTE)
         */
        public function administrarPaginasController($session){
            
            $pagina = isset($_GET['pg']) && !empty($_GET['pg']) ? $_GET['pg'] : "defecto";
            $pagina = strtolower(trim($pagina));

            $moduloTest = [ "m_test/main"];
            $arrayPaginas = [ "login", "registrate", "web", "consult"];

            $arrayPaginas = array_merge($arrayPaginas, $moduloTest);

            //Cuando la sessi??n sea VERDADERA
            if($session){

                //por si es 'login'. cambiamos a 'main'
                $pagina = ($pagina != "login")? $pagina : "redirect_default"; //Agregado ultimo

                $mod_admin = ["m_admin/studentfiles"];

                $arrayPaginas = array_merge($arrayPaginas, $mod_admin);

                //Validando niveles de seguridad. 
                if($_SESSION['data']['tipo_usuario'] == 1){
                    //[1]:NIVEL ADMINISTRADOR
                    $module = "m_admin/";
                    $arr_modules = [ "closed","m_admin/main", "m_admin/plantilla" ];
                }
                elseif ($_SESSION['data']['tipo_usuario'] == 2) {
                    //[2]:NIVEL ESTUDIANTE
                    $module = "m_student/";
                    $arr_modules = [ "closed","m_student/main", "m_student/plantilla" ];
                }
                else{
                    //[0]: NIVEL INVITADO 
                    $module = "";
                    $arr_modules = [ "closed","main", "plantilla"  ];    
                }

                
                $arrayPaginas = array_merge($arrayPaginas, $arr_modules);
                
                // var_dump($arrayPaginas);
                // var_dump($pagina);

                /**
                 * Solo en caso de que est?? logueado; verifica pagina seleccionada, y luego lo redirige.
                 * Si no coincide con ninguna p??gina, te ridirecciona a la p??gina de main.php
                 */
                if(in_array($pagina, $arrayPaginas, true)){
                    $pagina = $pagina ."_views.php";
                }else {
                    $pagina = $module . "main_views.php";
                }

            }else{
                //CUANDO LA SESSI??N NO EXISTA
                //Presentaci??n de la p??gina principal  
                if(in_array($pagina, $arrayPaginas, true)){
                    $pagina = $pagina . "_views.php";
                }else {
                    $pagina = "web_views.php";
                }                
            
            }  

            return $pagina;
        }
        

    }

