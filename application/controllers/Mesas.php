<?php
class Mesas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mesas_model');
    }

    public function existsMesa()
    {
        $nombre = $this->input->post('nombre');
        $password = $this->input->post('password');

        $data = [];

        $res = $this->mesas_model->exist_mesa($nombre);

        //MESA EXISTE?
        if (!$res) {
            $data['message'] = "Esta  mesa no existe en la base de datos";
            $data['res'] = FALSE;
        } else {

            //ENTONCES VALIDALO
            $userData = $this->mesas_model->validate_table($nombre, $password);
            if (!$userData) {
                $data['message'] = 'El nombre o contraseña son incorrectos';
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
        $nombre = $this->input->post("nombre_mesa");
        $descripcion = $this->input->post("descripcion_mesas");
        $password = $this->input->post('password_mesas');
        $zona_mesas = $this->input->post('zona_mesas');
        $array = array(
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'password' => $password,
            'zona' => $zona_mesas,
        );
        $exists = $this->mesas_model->exist_mesa($nombre);

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
    public function updateMesa()
    {
        $data = [];
        $id_mesa = $this->input->post("id_mesa");
        $nombre = $this->input->post("nombre_mesa");
        $descripcion = $this->input->post("descripcion_mesas");
        $password = $this->input->post('password_mesas');
        $zona_mesas = $this->input->post('zona_mesas');
        $old_name = $this->input->post('old_name');
        $array = array(
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'password' => $password,
            'zona' => $zona_mesas,
        );
        if ($nombre != $old_name) {
            $exists = $this->mesas_model->exist_mesa($nombre, $old_name);
        }
        if ($nombre == $old_name) {
            $exists = $this->mesas_model->exist_mesa($nombre, '', 'camposIguales');
        }


        if ($exists) {
            $data['message'] = "Esta mesa/usuario ya existe en la base de datos";
            $data['res'] = 'exists';
        } else {

            $res = $this->mesas_model->update_mesa($id_mesa, $array);
            if ($res) {
                $data["message"] = " actualizado exitosamente";
                $data["res"] = $res;
            } else {
                $data["message"] = "No ha sido posible actualizar por el momento";
                $data["res"] = $res;
            }
        }
        echo json_encode($data);
    }

    public function deleteMesa()
    {
        $data = [];
        $id_mesa = $this->input->post("id_mesa");

        $res = $this->mesas_model->delete_mesa($id_mesa);
        if ($res == true) {
            $data["message"] = " eliminado correctamente";
            $data["res"] = true;
        } else {
            $data["res"] = false;
        }
        echo json_encode($data);
    }
}
