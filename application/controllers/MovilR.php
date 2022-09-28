<?php

class MovilR extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MovilR_model');
    }
 
    public function getRestaurantes()
    {
        $zona = $this->input->post('zona');
        $resultado = $this->MovilR_model->getRestaurant($zona);
        echo json_encode($resultado);
    }
    
    public function getMenu($id_user = NULL)
    {   
       
        // $id_menu = $this->input->post('id_user');
        // var_dump($id_menu);
        $resultado = $this->MovilR_model->getMenu($id_user);
        echo json_encode($resultado);
    }
    
    
    // menus especificos
    
        public function getComidas($id_user = NULL)
    {   
       
        // $id_menu = $this->input->post('id_user');
        // var_dump($id_menu);
        $resultado = $this->MovilR_model->getComidas($id_user);
        echo json_encode($resultado);
    }
        public function getBebidas($id_user = NULL)
    {   
       
        // $id_menu = $this->input->post('id_user');
        // var_dump($id_menu);
        $resultado = $this->MovilR_model->getBebidas($id_user);
        echo json_encode($resultado);
    }
        public function getCombos($id_user = NULL)
    {   
       
        // $id_menu = $this->input->post('id_user');
        // var_dump($id_menu);
        $resultado = $this->MovilR_model->getCombos($id_user);
        echo json_encode($resultado);
    }
    
    // fin menus

    public function getRepartidor()
    {   
        $resultado = $this->MovilR_model->getRepartidor();
        echo json_encode($resultado);
    }

    public function getPublicidad()
    {   
        $resultado["Publicidad"] = $this->MovilR_model->getPublicidad();
        echo json_encode($resultado); 
    }

    public function getBuscadorPalabra($palabra = NULL)
    {   
        $palabra = "ha";
        $resultado = $this->MovilR_model->getBuscadorPalabra($palabra);
        echo json_encode($resultado);
    }

}