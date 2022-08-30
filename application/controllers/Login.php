<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Login extends CI_Controller {

public function index()
{
     //$data = array();
     $this->load->view('public/login_view');           
}

function recover()
    {
        $data = array();
        $this->load->view('public/recover_view', $data, FALSE);
        
    }

        
}
        
    /* End of file  Login.php */
     