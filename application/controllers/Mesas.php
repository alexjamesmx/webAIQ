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
    public function addMesa()
    {
        $id_mesa = $this->input->post("id_mesa");
        $descripcion = $this->input->post("descripcion_mesas");
        $password = $this->input->post('password_mesas');
        $array = array(
            'id_mesa' => $id_mesa,
            'descripcion' => $descripcion,
            'password' => $password,
        );
        $exists = $this->mesas_model->exist_table($id_mesa);
        //MESA EXISTE?
        if ($exists) {
            $data['message'] = "Esta mesa ya existe en la base de datos";
            $data['res'] = 'exists';
        } else {
            $res = $this->mesas_model->add_mesa($array);
            if ($res) {
                $data['message'] = 'Mesa agregada exitosamente.';
                $data['res'] = TRUE;
            } else {
                $data['message'] = 'No se pudo agregar una nueva mesa, consulte con sistemas';
                $data['res'] = FALSE;
            }
        }

        echo json_encode($data);
    }
}
