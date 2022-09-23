<?php

class WebHook extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('MovilR_model');
    }

    public function whatsappWH()

    {
        
        $data = file_get_contents("php://input");
        $event = json_decode($data, true);
        if(isset($event)){
        //Here, you now have event and can process them how you like e.g Add to the database or generate a response
        $file = 'log.txt';  
        $data =json_encode($event)."\n";  
        file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
        
        $my_verify_token = "19f913c8794c737dede42be76020dac5";

    
        }
    }
}