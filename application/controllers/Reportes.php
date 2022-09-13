<?php

class Reportes extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Reportes_model.php');
    }

    public function getReportes($id_pedido)
    {
        $resultado = $this->Reportes_model->get_reportes($id_pedido);
        echo json_encode($resultado);
    } 
}