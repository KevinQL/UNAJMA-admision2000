<?php 

    $conAjax = is_null($conAjax)?false:$conAjax;
    if($conAjax){
        require_once "../core/mainModel.php";
    }else{
        require_once "./core/mainModel.php";
    }


    class adminModel extends mainModel{


        /**
         * 
         */
        protected function consultaInscripcion_Model($data){

            $eval = false;
            $msj = "Usted No Está registrado!";
            $data_res = [];

            $query = "SELECT * 
                        FROM adm_proceso_postulante p 
                        WHERE p.numerodocumento LIKE '%{$data->numerodocumento}%' 
                        AND p.proceso IN ('{$data->proceso[1]}','{$data->proceso[2]}') 
                    ";

            $res = mainModel::ejecutar_una_consulta($query);
            $rowCount = $res->rowCount();
            if($res->rowCount() >= 1){
                $msj = "Usted está registrado!";
                $eval = true;
                while ($register = $res->fetch(PDO::FETCH_ASSOC)) {
                    # code...
                    $data_res[] = $register;
                }
            }

            return ["eval"=>$eval, "data"=>$data_res, "msj"=>$msj, "rowCount"=>$rowCount];
        }


        /**
         * 
         */
        protected function loginUsuario_Model($data){
            $eval = false;
            $msj = "Error en el Login!";
            $data_res = [];

            $query = "SELECT * FROM usuario 
                        WHERE email = '{$data->email}' 
                        LIMIT 1";
            $res = mainModel::ejecutar_una_consulta($query);
            if($res->rowCount() >= 1){
                $data_res = $res->fetch(PDO::FETCH_ASSOC);
                if( self::encriptar_desencriptar($data->password, $data_res["password"]) ){
                    $eval = true;
                    $msj = "Login correcto!"; 
                    // load data to array $_SESSION
                    $_SESSION["data"] = $data_res;
                    $_SESSION["start"] = true;
                }

            }

            return ["eval"=>$eval,"data"=>$data_res, "msj"=>$msj];
        }


        /**
         * Registro de la persona para ingresar como administrador
         */
        protected function compruebaEmail_Model($email){
            $eval = false;
            $msj = "El correo no se registró";

            $query = "SELECT * FROM usuario 
                        WHERE email = '{$email}'";
            $res = mainModel::ejecutar_una_consulta($query);
            if($res->rowCount() >= 1){
                $eval = true;
                $msj = "El correo ya se registró"; 
            }

            return ["eval"=>$eval, "msj"=>$msj];
        }

        /**
         * 
         */
        protected function registrarUsuario_Model($data){
            $eval = false;
            $msj = "No se registro el usuario";
            $password_encript = self::encriptar_desencriptar($data->password, '');

            $query = "INSERT INTO usuario 
                        SET email = '{$data->email}',
                            password = '{$password_encript}' ";
            $res = mainModel::ejecutar_una_consulta($query);
            if($res->rowCount() >= 1){
                $eval = true;
                $msj = "Usuario registrado"; 
            }

            return ["eval"=>$eval, "msj"=>$msj];
        }




    }

