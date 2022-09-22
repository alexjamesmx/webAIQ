<?php

defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Menu extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model( 'Adminres_model' );
    }

    public function verifica() {
        $id = $this->input->post("id_res");

        $data = $this->Adminres_model->get_estado($id);
        $obj[ "res" ] = $data != NULL;
		$obj[ "mensaje" ]   = $obj[ "res" ] ?
		"El estado es ".count( $data )." " : "No existe el estado";
		$obj[ "estado" ]  = $data;

		echo json_encode( $obj );
    }
   
}