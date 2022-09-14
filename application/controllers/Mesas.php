<?php
class Mesas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mesas_model');
    }

    public function existsTable()
    {
        $id_mesa = $this->input->post('id_mesa');
        $password = $this->input->post('password');

        $data = [];

        $res = $this->mesas_model->exist_table($id_mesa);

        //MESA EXISTE?
        if (!$res) {
            $data['message'] = "Esta  mesa no existe en la base de datos";
            $data['res'] = FALSE;
        } else {

            //ENTONCES VALIDALO
            $userData = $this->mesas_model->validate_table($id_mesa, $password);
            if (!$userData) {
                $data['message'] = 'El id o contraseña son incorrectos';
                $data['res'] = FALSE;
            } else {

                unset($userData['password']);
                $data['user'] = $userData;
                $data['message'] = 'Logueado correctamente';
                $data['res'] = TRUE;
            }
        }
        echo json_encode($data);
    }

    public function signout()
    {
        $this->session->sess_destroy();
    }
    public function getMesas()
    {
        $data = [];
        $res = $this->mesas_model->get_mesas();
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
}
