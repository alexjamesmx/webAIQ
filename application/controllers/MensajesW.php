<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MensajesW extends CI_Controller {

	public function __construct(){
		parent::__construct();
	
	}


	
public  function sendTextMessage()
  {
    $celular = 524427408410;
        $data = [];
        $cuerpo = 'dadad';
        $data  = [];
     
          
                    $PostData = array(
                    "messaging_product" => "whatsapp",
                    "to"=>  $celular,
                    "type"=> "text",
                    "recipient_type"=> "individual",
                    "text"=> array(
                    "body"=>  $cuerpo  )
                    );
     //var_dump($PostData);
          //        $PostData = array(
           //       "messaging_product" => "whatsapp",
             //     "to"=>   4427408410,
               //   "type"=> "text",
                 // "text"=> array(
                  //"body"=>  'ddddddddadad'
                  //));
           
            

      $phone_number_id  =    110096128392170;
      $token            = 'EAAMYWllJ1tEBAMFE4GbDUrfQLQqsKbeQ2aZAvc0h3FOQPG3qdzZBm6LqoW5KGd8A94WFlX5f6Enc0UuwfGKPQvIfwoFJYzw1rFuABa6Epv7J9kc66lwagQp1OjZCafz8KN0ByZBekW5XX7ydGTLm4Ms8oaPt90tocBbK4NImBlPE5OkuD5IugKf99HIDkG2UgNKoZA2eDJgZDZD';
      $ruta             = ("/v12.0/".$phone_number_id. "/messages?access_token=".$token);
      //$tujen            = "EAANZBaKZCdBFwBAJZAcxnAfPDc8ZBWpaKls9cNEt8EHoZBCbE196XCXUZCBpUqBjqXiIGV33rqLx1r3faGRZBYtiqYT33qFK0GFMj7NyRcclwCMOZAvFdlfqLvfGQc5J15XAiGzclpm7KpRgiGaYQyRlhGf9bdHA2oFY12gNN37vu3GAPqr9xv2FZCUBKnHx6jrkdfa5tZB0doHSWC2RYZC7LNW"; 
      $url              = "https://graph.facebook.com/v13.0/110096128392170/messages?access_token=". $token;
      $post_data        = json_encode($PostData);
      $conexion         = curl_init();
      $arr              = array('Content-Type:application/json',
                                'Authorization:Bearer '.$token);
     //var_dump( $arr);
      curl_setopt($conexion, CURLOPT_HTTPHEADER, $arr);
      curl_setopt($conexion, CURLOPT_URL, $url);
      curl_setopt($conexion, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($conexion, CURLOPT_POST, 1);
      //var_dump( '1eqeqeeqeqe');
      curl_setopt($conexion, CURLOPT_POSTFIELDS, $post_data);
      curl_setopt($conexion, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($conexion, CURLOPT_SSL_VERIFYPEER, 0);
     
      $output = curl_exec($conexion);
      
    //  var_dump( $output);
      if (curl_errno($conexion)) {
       //  var_dump('true'); 
          //throw new Exception(curl_error($conexion));    
           $result =  curl_errno($conexion);
          //   return $result;
      } else {
       //  var_dump('false'); 
          $result = json_decode($output, true);
            var_dump(  $result);
        //  return $result;
          curl_close($conexion);
         
        }
        //var_dump($result);
  }

}