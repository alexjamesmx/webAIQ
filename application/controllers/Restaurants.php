<?php
class Restaurants extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('restaurantes_model');
    }
}
