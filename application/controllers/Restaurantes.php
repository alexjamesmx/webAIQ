<?php

class Restaurantes extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Restaurantes_model');
        $this->load->helper('url_helper');
    }

    public function showRestaurant() {
        
    }

}