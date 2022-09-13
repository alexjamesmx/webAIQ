<?php
class Cuenta extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model( 'Cuenta_model' );
    }

    public function getCuenta() {
        $id_user = $this->session->userdata('id_user');
        $data = [];
        // $id_user = $this->input->post('id_user');
        $res = $this->Cuenta_model->get_cuenta($id_user);
        if ($res) {
            $data['data'] = $res;
            $data['message'] = 'Datos extraídos correctamente';
            $data['res'] = TRUE;
        } else {
            $data['message'] = "No existen datos en la base de datos";
            $data['res'] = FALSE;
        }
        echo json_encode($data);
    }

    public function updateCuenta() {
        $data = [];
        $id_user = $this->input->post("id_user");
        $nombre = $this->input->post("nombre");
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $password = $this->input->post('password');
        $array = array(
            'nombre' => $nombre,
            'email' => $email,
            'phone' => $phone,
            'password' => $password,
        );
        $res = $this->users_model->update_cuenta($id_user, $array);
        if ($res) {
            $data["message"] = "Restaurante actualizado exitosamente";
            $data["res"] = $res;
        } else {
            $data["message"] = "No ha sido posible actualizar por el momento";
            $data["res"] = $res;
        }
        echo json_encode($data);
    }

} 
