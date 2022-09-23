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
        if ($obj['res'] == true) {
            $obj['cantidad'] = count($data);
        }
        $obj['pedidos'] = $data;
        echo json_encode($obj);
    }

    public function detalle_pedido()
    {
        $id_pedido = $this->input->post('id_pedido');
        $data = $this->Dasboard_model->detalle($id_pedido);
        $obj['res'] = $data != null;
        $obj['detalle'] = $data;
        echo json_encode($obj);
    }

    public function enpreparacion()
    {
        $id_res = $this->session->userdata('id_user');
        $data = $this->Dasboard_model->preparando($id_res);
        $obj['res'] = $data != null;
        if ($obj['res'] == true) {
            $obj['cantidad'] = count($data);
        }
        $obj['pedidos'] = $data;
        echo json_encode($obj);
    }

    public function espera()
    {
        $id_res = $this->session->userdata('id_user');
        $data = $this->Dasboard_model->enespera($id_res);
        $obj['res'] = $data != null;
        if ($obj['res'] == true) {
            $obj['cantidad'] = count($data);
        }
        $obj['pedidos'] = $data;
        echo json_encode($obj);
    }

    public function enviado()
    {
        $id_res = $this->session->userdata('id_user');
        $data = $this->Dasboard_model->yaenviados($id_res);
        $obj['res'] = $data != null;
        if ($obj['res'] == true) {
            $obj['cantidad'] = count($data);
        }
        $obj['pedidos'] = $data;
        echo json_encode($obj);
    }

    public function btn_aceptar()
    {
        $id_pedido = $this->input->post('id_pedido');
        $fecha_act = date('Y-m-d H:m:s');
        $obj['res'] = $this->Dasboard_model->pedido_aceptado($id_pedido, $fecha_act);
        $obj['mes'] = $obj['res']
            ? 'Status cambiado con éxito'
            : 'Imposible actualizar el status';

        echo json_encode($obj);
    }

    public function btn_declinar()
    {
        $id_pedido = $this->input->post('id_pedido');
        $fecha_act = date('Y-m-d H:m:s');
        $obj['res'] = $this->Dasboard_model->pedido_declinado($id_pedido, $fecha_act);
        $obj['mes'] = $obj['res']
            ? 'Status cambiado con éxito'
            : 'Imposible actualizar el status';

        echo json_encode($obj);
    }

    

}
 
/* End of file Dasboard.php and path /application/controllers/Daisboard/Dasboard.php */
