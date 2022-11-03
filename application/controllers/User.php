<?php

class User extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model( 'users_model' );
    }

    public function existsUser() {
        $email = $this->input->post( 'email' );
        $password = $this->input->post( 'password' );
        $data = [];

        $res = $this->users_model->exist_user( $email );

        //USUARIO EXISTE?
        if ( !$res ) {
            $data[ 'message' ] = 'Este usuario no existe en la base de datos';
            $data[ 'res' ] = FALSE;
        } else {

            //ENTONCES VALIDALO
            $userData = $this->users_model->validate_user( $email, $password );
            if ( !$userData ) {
                $data[ 'message' ] = 'Tu correo o contraseña son incorrectos';
                $data[ 'res' ] = FALSE;
            } else {
                unset( $userData[ 'password' ] );
                $data[ 'user' ] = $userData;
                $data[ 'message' ] = 'Logueado correctamente';
                $data[ 'res' ] = TRUE;
                $this->session->set_userdata( $userData );
            }
        }
        echo json_encode( $data );
    }

    public function signout() {
        $this->session->sess_destroy();
    }

    public function getUsers() {
        $data = [];
        $res = $this->users_model->get_users();
        if ( $res ) {
            $data[ 'data' ] = $res;
            $data[ 'message' ] = 'Datos extraídos correctamente';
            $data[ 'res' ] = TRUE;
        } else {
            $data[ 'message' ] = 'No existen datos en la base de datos';
            $data[ 'res' ] = FALSE;
        }
        echo json_encode( $data );
    }

    public function updateUserStatus() {
        $id_user = $this->input->post( 'id_user' );
        $status = $this->input->post( 'status' ) == 1 ? 0 : 1;
        $res = $this->users_model->update_user_status( $id_user, $status );
        if ( $res ) {
            $data[ 'data' ] = $res;
            $data[ 'message' ] = 'Datos extraidos correctamente';
            $data[ 'res' ] = TRUE;
        } else if ( $res == false ) {
            $data[ 'data' ] = $res;
            $data[ 'message' ] = 'Hubo un problema con la peticion';
            $data[ 'res' ] = FALSE;
        }
        echo json_encode( $data );
    }

    public function updateUser() {
        $data = [];
        $id_user = $this->input->post( 'id_user' );
        $nombre = $this->input->post( 'nombre' );
        $email = $this->input->post( 'email' );
        $phone = $this->input->post( 'phone' );
        $password = $this->input->post( 'password' );
        $zona = $this->input->post( 'zona' );
        $tipo = $this->input->post( 'tipo' );
        $array = array(
            'nombre' => $nombre,
            'email' => $email,
            'phone' => $phone,
            'zona' => $zona,
            'tipo' => $tipo,
            'password' => $password,
        );

        $exists = $this->users_model->exist_user( $email, $nombre, 'more' );

        if ( $exists ) {
            $data[ 'message' ] = 'Este restaurante/usuario ya existe en la base de datos';
            $data[ 'res' ] = 'exists';
        } else {
            $res = $this->users_model->update_user( $id_user, $array );
            if ( $res ) {
                $data[ 'message' ] = ' actualizado exitosamente';
                $data[ 'res' ] = $res;
            } else {
                $data[ 'message' ] = 'No ha sido posible actualizar por el momento';
                $data[ 'res' ] = $res;
            }
        }
        echo json_encode( $data );
    }

    //ELIMINAR RESTAURANT

    public function deleteUser() {
        // $data = [];
        // $id_user = $this->input->post( 'id_user' );

        // $res = $this->users_model->delete_user( $id_user );
        // if ( $res == true ) {
        //     $data[ 'message' ] = ' eliminado correctamente';
        //     $data[ 'res' ] = true;
        // } else {
        //     $data[ 'res' ] = false;
        // }
        // echo json_encode( $data );

        $id_user = $this->input->post( 'id_user' );
        $status = 3;
        $res = $this->users_model->update_user_status( $id_user, $status );
        if ( $res ) {
            $data[ 'data' ] = $res;
            $data[ 'message' ] = ' eliminado correctamente';
            $data[ 'res' ] = TRUE;
        } else if ( $res == false ) {
            $data[ 'data' ] = $res;
            $data[ 'message' ] = 'Hubo un problema con la peticion';
            $data[ 'res' ] = FALSE;
        }
        echo json_encode( $data );
    }

    public function actualizarImagen() {
        $id_user = $this->input->post( 'id_user' );
        $id_user = intval( $id_user );

        $config[ 'upload_path' ] = 'static/img/';
        $config[ 'allowed_types' ] = 'jpg|png|jpeg';
        $config[ 'max_size' ] = '5000';

        $nuevoNombreImg = 'platillo' . ( $hoy = date( 'YmdHis' ) );
        $config[ 'file_name' ] = strtolower( $nuevoNombreImg );

        $this->load->library( 'upload', $config );

        if ( $this->upload->do_upload( 'fotos' ) ) {
            $file_info = $this->upload->data();
            $imagen = $file_info[ 'file_name' ];
            $array = [
                'avatar' => $imagen,
            ];
        }
        echo json_encode(
            $this->users_model->imagen_where( $array, $id_user )
        );
    }

    public function subirImagen() {
        $nombre = $this->input->post( 'nombre' );
        $email = $this->input->post( 'email' );
        $phone = $this->input->post( 'phone' );
        $password = $this->input->post( 'password' );
        $zona = $this->input->post( 'zona' );
        $tipo = $this->input->post( 'tipo' );

        $exists = $this->users_model->exist_user( $email, $nombre );
        if ( $exists ) {
            $data[ 'message' ] = 'Este restaurante/usuario ya existe en la base de datos';
            $data[ 'res' ] = 'exists';
        } else {
            $config[ 'upload_path' ] = 'static/img/';
            $config[ 'allowed_types' ] = 'jpg|png|jpeg';
            $config[ 'max_size' ] = '5000';

            $nuevoNombreImg = 'platillo' . ( date( 'YmdHis' ) );
            $config[ 'file_name' ] = strtolower( $nuevoNombreImg );

            $this->load->library( 'upload', $config );

            if ( !$this->upload->do_upload( 'avatar' ) ) {
                $error = array( 'error' => $this->upload->display_errors() );
                $data[ 'message' ] = $error;
                $data[ 'res' ] = FALSE;
            } else {
                $file_info = $this->upload->data();

                $imagen = $file_info[ 'file_name' ];
                $array = array(
                    'avatar' => $imagen,
                    'nombre' => $nombre,
                    'email' => $email,
                    'zona' => $zona,
                    'tipo' => $tipo,
                    'phone' => $phone,
                    'password' => $password,
                );
                $res = $this->users_model->imagen( $array );
                if ( $res ) {
                    $data[ 'message' ] = 'Restaurante agregado exitosamente.';
                    $data[ 'res' ] = TRUE;
                    $this->load->library( 'email' );
                    $this->email->from( 'verificacorreo@aiq.com', 'AIQ Developers' );
                    $this->email->to( $email );
                    $this->email->subject( 'Restaurante agregado' );
                    $stringpas = strval( $password );
                    $mensaje = "ya puedes ingresar con tu correo y la contraseña: ". $stringpas;
                    //var_dump( $mensaje );
                    $this->email->message( $mensaje );
                    if ( $this->email->send() ) {
                        return TRUE;
                    } else {
                        return FALSE;
                    }
                } else {
                    $data[ 'message' ] = 'No se pudo agregar un nuevo restaurante, consulte con sistemas';
                    $data[ 'res' ] = FALSE;
                }
            } 
        }

        echo json_encode( $data );
    }
} 
