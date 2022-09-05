<?php

class MovilR extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MovilR_model');
    }
 
    public function getRestaurantes()
    {
        $resultado = $this->MovilR_model->getRestaurant();
        echo json_encode($resultado);
    }
    
    public function getMenu($id = NULL)
    {   
        $id = 2;
        $resultado = $this->MovilR_model->getMenu($id);
        echo json_encode($resultado);
    }
}