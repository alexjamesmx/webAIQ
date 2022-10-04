<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class MensajesW extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model( 'Dasboard_model' );

    }

    public  function sendTextMessage()
 {
        $celular = $this->input->post( 'numero' );
        $tipo = $this->input->post( 'tipo' );
        //var_dump( $celular );
        $cuerpo = $this->input->post( 'mensaje' );
        $codigo = $this->input->post( 'codigo' );

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

                    //   'template'=> array(
                    //     'name'=>  'hello_world',
                    //     'language' => array( 'code' => 'en_US' )
                    // ) );

                    $phone_number_id  =    101418996085917;
                    $token            = 'EAAPZC4sEiBQYBAEOScrr2VZB8dRnAAsmgCxUJ3JIGZCpsNSIFwVZBZCkRZBt1gePiFcgiDs2Q65iifpuGWsbIY6zPHWZCKG3XfqwsUVOZBbI37okHKbS82IJiW2XFV6dAne2ZC0Vgjk6CRPC869gsfIlQq37ZA1tsv6TPOsZB0LNGZCmbEkpA1cAc5a0v5QS4AEPgZAveOQ70Yxne2SrCMb4g4g4y';

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

        }
        else if ($tipo == 'cliente') {

            $exicod = $this->Dasboard_model->buscar_codigo( $codigo );

            if ($exicod != null) {
                $PostData = array(
                    'messaging_product' => 'whatsapp',
                    'to'=>  $celular,
                    'type'=> 'text',
                    'text'=> array(
                        'preview_url'=>  'false',
                        'body' => $cuerpo
                    ) );
    
                    //   'template'=> array(
                    //     'name'=>  'hello_world',
                    //     'language' => array( 'code' => 'en_US' )
                    // ) );
    
                    $phone_number_id  = 101418996085917;
                    $token            = 'EAAPZC4sEiBQYBAEOScrr2VZB8dRnAAsmgCxUJ3JIGZCpsNSIFwVZBZCkRZBt1gePiFcgiDs2Q65iifpuGWsbIY6zPHWZCKG3XfqwsUVOZBbI37okHKbS82IJiW2XFV6dAne2ZC0Vgjk6CRPC869gsfIlQq37ZA1tsv6TPOsZB0LNGZCmbEkpA1cAc5a0v5QS4AEPgZAveOQ70Yxne2SrCMb4g4g4y';
    
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

    }

}
