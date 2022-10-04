<?php
class Cuenta extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cuenta_model');
    }

    public function getCuenta()
    {
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

    public function updateCuenta()
    {
        $id_user  = $this->session->userdata('id_user');
        $nombre   = $this->input->post('cuenta_nombre');
        $password = $this->input->post('cuenta_password');
        $email    = $this->input->post('cuenta_email');
        $phone    = $this->input->post('cuenta_phone');

        $data = array(
            'id_user'  => $id_user,
            'nombre'   => $nombre,
            'password' => $password,
            'email'    => $email,
            'phone'    => $phone
        );

        $res = $this->Cuenta_model->update_cuenta($data);
        if ($res) {
            $obj["message"] = "Se actualizaron los datos de la cuenta";
            $obj["res"] = $res;
        } else {
            $obj["message"] =  "No se pudieron actualizar los datos de la cuenta";
            $obj["res"] = $res;
        }

        echo json_encode($obj);

        if ($obj['res']) {
            $this->session->set_userdata("email", $data["email"]);
            $this->session->set_userdata("nombre", $data["nombre"]);
        }
    }

    public function update_avatar()
    {
        $id_res = $this->session->userdata('id_user');
        $id_init = intval($id_res);

        $config['upload_path'] = 'static/img/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '5000';
        $hoy = date('YmdHis');

        $nuevoNombreImg = 'avatar' . ($hoy = date('YmdHis'));
        $config['file_name'] = strtolower($nuevoNombreImg);

        $regreso = $this->load->library('upload', $config);

        if (!$this->upload->do_upload('avatar')) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        } else {
            $file_info = $this->upload->data();
            $imagen = $file_info['file_name'];
            var_dump($imagen);
            $ima = [
                'avatar' => $imagen,
            ];
            var_dump($ima);
            echo json_encode(
                $res = $this->Cuenta_model->avatar_img($ima, $id_init)
            );
            if ($res) {
                $this->session->set_userdata("avatar", $ima["avatar"]);
            }
        }
    }
}
