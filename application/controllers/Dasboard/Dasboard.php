<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dasboard_model');
    }

    public function poraceptar()
    {
        $id_res = $this->session->userdata('id_user');
        $data = $this->Dasboard_model->select_poraceptar($id_res);
        $obj['res'] = $data != null;
        $obj['cantidad'] = count($data);
        $obj['mensaje'] = $obj['res']
            ? 'Se recuperaron ' . count($data) . ' pedidos'
            : 'No hay pedidos';
        $obj['pedidos'] = $data;
        echo json_encode($obj);
    }

}
 
/* End of file Dasboard.php and path /application/controllers/Daisboard/Dasboard.php */
