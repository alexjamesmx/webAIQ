<?php

defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Adminres extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model( 'Adminres_model' );
    }

    public function verifica() {
        $id = $this->input->post("id_res");
        $data = $this->Adminres_model->get_estado($id);
		echo json_encode( $data );
    }

    public function cambiarstatus()
    {
        $id_res = $this->input->post('id_res');
        $obj['res'] = $this->Adminres_model->change_status($id_res);
        $obj['mes'] = $obj['res']
            ? 'Se cambio el status'
            : 'No se pudo cambiar el status';

        echo json_encode($obj);
    }
   
}