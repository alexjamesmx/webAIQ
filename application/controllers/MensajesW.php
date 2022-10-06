<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class MensajesW extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model( 'Dasboard_model' );

    }

    public function sendTextMessage() {
        $celular = $this->input->post( 'numero' );
        $tipo = $this->input->post( 'tipo' );
        //var_dump( $tipo );
        $cuerpo = $this->input->post( 'mensaje' );
        $codigo = $this->input->post( 'codigo' );
        $nombre = $this->input->post('nombre');
        $idPedido = $this->input->post('idPedido');
        $status = $this->input->post('status');

        if ( $tipo == 'repartidor' ) {
            $exinum = $this->Dasboard_model->buscar_num( $celular );
            if ( $exinum != NULL ) {
                //var_dump( 'si existe el numero' );
                $PostData = array(
                    'messaging_product' => 'whatsapp',
                    'to'=>  $celular,
                    'type'=> 'text',
                    'text'=> array(
                        'preview_url'=>  'false',
                        'body' => $cuerpo
                    ) );

                    // 'template'=> array(
                    //     'name'=>  'hello_world',
                    //     'language' => array( 'code' => 'en_US' )
                    // ) );

                    $phone_number_id  = 101418996085917;
                    $token            = 'EAAPZC4sEiBQYBAE69ZBnwKEcllPFMbIRArVBSzHZA5cO1JY4PNYZCMZCUK8RPSeIOXZBAQPBPXVd4ESvktZAAwdZC7xk36Bk9KPdRblfTma70Slgw6sqGd2HZC46ZCuZCWv00e6WTdti9gnwSNOADBirZAuiH0FUZCpPte7NkWJZCqQVmmBb7ZATdkJpYabEUuzz3LhEyZC8cLGgJP4tVwZDZD';

                    $url              = 'https://graph.facebook.com/v14.0/101418996085917/messages';
                    $post_data        = json_encode( $PostData );
                    $conexion         = curl_init();
                    $arr              = array( 'Authorization:Bearer '.$token,
                    'Content-Type: application/json'
                );
                //var_dump( $arr );
                curl_setopt( $conexion, CURLOPT_HTTPHEADER, $arr );
                curl_setopt( $conexion, CURLOPT_URL, $url );
                curl_setopt( $conexion, CURLOPT_RETURNTRANSFER, true );
                curl_setopt( $conexion, CURLOPT_POST, true );
                //var_dump( '1eqeqeeqeqe' );
                curl_setopt( $conexion, CURLOPT_POSTFIELDS, $post_data );
                curl_setopt( $conexion, CURLOPT_SSL_VERIFYHOST, false );
                curl_setopt( $conexion, CURLOPT_SSL_VERIFYPEER, false );
                //var_dump( $conexion );
                $output = curl_exec( $conexion );

                //var_dump( $output );
                curl_close( $conexion );

                if ( curl_errno( $conexion ) ) {
                    //var_dump( 'true' );

                    //throw new Exception( curl_error( $conexion ) );

                    $result =  curl_errno( $conexion );
                    $obj[ 'res' ] = false;
                    $obj[ 'msg' ] = 'Error al enviar mensaje';
                    echo json_encode( $obj );
                    //   return $result;
                } else {
                    //var_dump( 'false' );

                    $result = json_decode( $output, true );
                    //var_dump( $result );
                    //  return $result;
                    curl_close( $conexion );
                    $obj[ 'res' ] = true;
                    $obj[ 'msg' ] = 'Se envio el mensaje correctamente al repartidor';
                    echo json_encode( $obj );

                }
            } else {
                $obj[ 'res' ] = false;
                $obj[ 'msg' ] = 'No existe el numero';
                echo json_encode( $obj );
            }

        } else if ( $tipo == 'cliente' ) {

            $exicod = $this->Dasboard_model->buscar_codigo( $codigo );

            if ( $exicod != null ) {
                $PostData = array(
                    'messaging_product' => 'whatsapp',
                    'to'=>  $celular,
                    'type'=> 'template',
                    'template'=> array(
                        'name'=>  'prueba',
                        'language' => array( 'code' => 'es_MX' ),
                        'components' => array(
                            array(
                                'type' => 'body',
                                'parameters' => array(
                                    array(
                                        'type' => 'text',
                                        'text' => $nombre
                                    ),
                                    array(
                                        'type' => 'text',
                                        'text' => $codigo
                                    )
                                )
                            )
                        )
                    ) );

                    $phone_number_id  = 101418996085917;
                    $token            = 'EAAPZC4sEiBQYBAE69ZBnwKEcllPFMbIRArVBSzHZA5cO1JY4PNYZCMZCUK8RPSeIOXZBAQPBPXVd4ESvktZAAwdZC7xk36Bk9KPdRblfTma70Slgw6sqGd2HZC46ZCuZCWv00e6WTdti9gnwSNOADBirZAuiH0FUZCpPte7NkWJZCqQVmmBb7ZATdkJpYabEUuzz3LhEyZC8cLGgJP4tVwZDZD';

                    $url              = 'https://graph.facebook.com/v14.0/101418996085917/messages';
                    $post_data        = json_encode( $PostData );
                    $conexion         = curl_init();
                    $arr              = array( 'Authorization:Bearer '.$token,
                    'Content-Type: application/json'
                );
                //var_dump( $arr );
                curl_setopt( $conexion, CURLOPT_HTTPHEADER, $arr );
                curl_setopt( $conexion, CURLOPT_URL, $url );
                curl_setopt( $conexion, CURLOPT_RETURNTRANSFER, true );
                curl_setopt( $conexion, CURLOPT_POST, true );
                //var_dump( '1eqeqeeqeqe' );
                curl_setopt( $conexion, CURLOPT_POSTFIELDS, $post_data );
                curl_setopt( $conexion, CURLOPT_SSL_VERIFYHOST, false );
                curl_setopt( $conexion, CURLOPT_SSL_VERIFYPEER, false );
                //var_dump( $conexion );
                $output = curl_exec( $conexion );

                //var_dump( $output );
                curl_close( $conexion );

                if ( curl_errno( $conexion ) ) {
                    //var_dump( 'true' );

                    //throw new Exception( curl_error( $conexion ) );

                    $result =  curl_errno( $conexion );
                    $obj[ 'res' ] = false;
                    $obj[ 'msg' ] = 'Error al enviar mensaje';
                    echo json_encode( $obj );
                    //   return $result;
                } else {
                    //var_dump( 'false' );

                    $result = json_decode( $output, true );
                    //var_dump( $result );
                    //  return $result;
                    curl_close( $conexion );
                    $obj[ 'res' ] = true;
                    $obj[ 'msg' ] = 'Se envio el mensaje correctamente al ';
                    echo json_encode( $obj );

                }
            } else {
                $obj[ 'res' ] = false;
                $obj[ 'msg' ] = 'No existe el codigo';
                echo json_encode( $obj );
            }

        } else if ( $tipo == 'nuevoR' ) {

            $PostData = array(
                'messaging_product' => 'whatsapp',
                'to'=>  $celular,
                'type'=> 'template',
                'template'=> array(
                    'name'=>  'nuevorepartidor',
                    'language' => array( 'code' => 'es_MX' )
                ) );

                $phone_number_id  = 101418996085917;
                $token            = 'EAAPZC4sEiBQYBAE69ZBnwKEcllPFMbIRArVBSzHZA5cO1JY4PNYZCMZCUK8RPSeIOXZBAQPBPXVd4ESvktZAAwdZC7xk36Bk9KPdRblfTma70Slgw6sqGd2HZC46ZCuZCWv00e6WTdti9gnwSNOADBirZAuiH0FUZCpPte7NkWJZCqQVmmBb7ZATdkJpYabEUuzz3LhEyZC8cLGgJP4tVwZDZD';

                $url              = 'https://graph.facebook.com/v14.0/101418996085917/messages';
                $post_data        = json_encode( $PostData );
                $conexion         = curl_init();
                $arr              = array( 'Authorization:Bearer '.$token,
                'Content-Type: application/json'
            );
            //var_dump( $arr );
            curl_setopt( $conexion, CURLOPT_HTTPHEADER, $arr );
            curl_setopt( $conexion, CURLOPT_URL, $url );
            curl_setopt( $conexion, CURLOPT_RETURNTRANSFER, true );
            curl_setopt( $conexion, CURLOPT_POST, true );
            //var_dump( '1eqeqeeqeqe' );
            curl_setopt( $conexion, CURLOPT_POSTFIELDS, $post_data );
            curl_setopt( $conexion, CURLOPT_SSL_VERIFYHOST, false );
            curl_setopt( $conexion, CURLOPT_SSL_VERIFYPEER, false );
            //var_dump( $conexion );
            $output = curl_exec( $conexion );

            //var_dump( $output );
            curl_close( $conexion );

            if ( curl_errno( $conexion ) ) {
                //var_dump( 'true' );

                //throw new Exception( curl_error( $conexion ) );

                $result =  curl_errno( $conexion );
                $obj[ 'res' ] = false;
                $obj[ 'msg' ] = 'Error al enviar mensaje';
                echo json_encode( $obj );
                //   return $result;
            } else {
                //var_dump( 'false' );

                $result = json_decode( $output, true );
                //var_dump( $result );
                //  return $result;
                curl_close( $conexion );
                $obj[ 'res' ] = true;
                $obj[ 'msg' ] = 'Se envio el mensaje correctamente al ';
                echo json_encode( $obj );

            }

        } else if ( $tipo == 'status' ) {

            $PostData = array(
                'messaging_product' => 'whatsapp',
                'to'=>  $celular,
                'type'=> 'template',
                'template'=> array(
                    'name'=>  'statuspedido',
                    'language' => array( 'code' => 'es_MX' ),
                    'components' => array(
                        array(
                            'type' => 'body',
                            'parameters' => array(
                                array(
                                    'type' => 'text',
                                    'text' => $nombre
                                ),
                                array(
                                    'type' => 'text',
                                    'text' => $idPedido
                                ),
                                array(
                                    'type' => 'text',
                                    'text' => $status
                                ),

                            )
                        )
                    )
                ) );

                $phone_number_id  = 101418996085917;
                $token            = 'EAAPZC4sEiBQYBAE69ZBnwKEcllPFMbIRArVBSzHZA5cO1JY4PNYZCMZCUK8RPSeIOXZBAQPBPXVd4ESvktZAAwdZC7xk36Bk9KPdRblfTma70Slgw6sqGd2HZC46ZCuZCWv00e6WTdti9gnwSNOADBirZAuiH0FUZCpPte7NkWJZCqQVmmBb7ZATdkJpYabEUuzz3LhEyZC8cLGgJP4tVwZDZD';

                $url              = 'https://graph.facebook.com/v14.0/101418996085917/messages';
                $post_data        = json_encode( $PostData );
                $conexion         = curl_init();
                $arr              = array( 'Authorization:Bearer '.$token,
                'Content-Type: application/json'
            );
            //var_dump( $arr );
            curl_setopt( $conexion, CURLOPT_HTTPHEADER, $arr );
            curl_setopt( $conexion, CURLOPT_URL, $url );
            curl_setopt( $conexion, CURLOPT_RETURNTRANSFER, true );
            curl_setopt( $conexion, CURLOPT_POST, true );
            //var_dump( '1eqeqeeqeqe' );
            curl_setopt( $conexion, CURLOPT_POSTFIELDS, $post_data );
            curl_setopt( $conexion, CURLOPT_SSL_VERIFYHOST, false );
            curl_setopt( $conexion, CURLOPT_SSL_VERIFYPEER, false );
            //var_dump( $conexion );
            $output = curl_exec( $conexion );

            //var_dump( $output );
            curl_close( $conexion );

            if ( curl_errno( $conexion ) ) {
                //var_dump( 'true' );

                //throw new Exception( curl_error( $conexion ) );

                $result =  curl_errno( $conexion );
                $obj[ 'res' ] = false;
                $obj[ 'msg' ] = 'Error al enviar mensaje';
                echo json_encode( $obj );
                //   return $result;
            } else {
                //var_dump( 'false' );

                $result = json_decode( $output, true );
                //var_dump( $result );
                //  return $result;
                curl_close( $conexion );
                $obj[ 'res' ] = true;
                $obj[ 'msg' ] = 'Se envio el mensaje correctamente al ';
                echo json_encode( $obj );

            }

        }
    }

}
