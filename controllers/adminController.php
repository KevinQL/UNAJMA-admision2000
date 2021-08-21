<?php

    $conAjax = is_null($conAjax)?false:$conAjax;
    if($conAjax){
        require_once "../models/adminModel.php";
    }else{
        require_once "./models/adminModel.php";
    }


    class adminController extends adminModel {


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
        public function verificarSessionController(){
            $session = (isset($_SESSION['start']) && !empty($_SESSION['start']) &&!is_null($_SESSION)) ? true:false;
            return $session;
        }


        /**
         * VERIFICADO
         * (IMPORTANTE)
         */
        public function administrarPaginasController($session){
            
            $pagina = isset($_GET['pg']) && !empty($_GET['pg']) ? $_GET['pg'] : "defecto";
            $pagina = strtolower(trim($pagina));

            $moduloTest = [ "m_test/main"];
            $arrayPaginas = [ "login", "registrate", "web"];

            $arrayPaginas = array_merge($arrayPaginas, $moduloTest);

            //Cuando la sessión sea VERDADERA
            if($session){

                //por si es 'login'. cambiamos a 'main'
                $pagina = ($pagina != "login")? $pagina : "redirect_default"; //Agregado ultimo

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
                
                /**
                 * Solo en caso de que esté logueado; verifica pagina seleccionada, y luego lo redirige.
                 * Si no coincide con ninguna página, te ridirecciona a la página de main.php
                 */
                if(in_array($pagina, $arrayPaginas, true)){
                    $pagina = $pagina ."_views.php";
                }else {
                    $pagina = $module . "main_views.php";
                }

            }else{
                //CUANDO LA SESSIÓN NO EXISTA
                //Presentación de la página principal  
                if(in_array($pagina, $arrayPaginas, true)){
                    $pagina = $pagina . "_views.php";
                }else {
                    $pagina = "web_views.php";
                }                
            
            }  

            return $pagina;
        }
        

    }

