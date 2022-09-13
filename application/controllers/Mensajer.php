<?php
class Whats extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Debug
        	$this->output->enable_profiler(TRUE);
    }

    public function recive()
    {
       $this->load->view ('webhook');
       
    }
}