<?php
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
    }
    public function existsUser()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $data = [];

        $res = $this->users_model->exist_user($email);

        //USUARIO EXISTE?
        if (!$res) {
            $data['message'] = "Este usuario no existe en la base de datos";
            $data['res'] = FALSE;
        } else {

            //ENTONCES VALIDALO
            $userData = $this->users_model->validate_user($email, $password);
            if (!$userData) {
                $data['message'] = 'Tu correo o contraseña son incorrectos';
                $data['res'] = FALSE;
            } else {
                unset($userData['password']);
                $data['user'] = $userData;
                $data['message'] = 'Logueado correctamente';
                $data['res'] = TRUE;
                $this->session->set_userdata($userData);
            }
        }
        echo json_encode($data);
    }

    public function signout()
    {
        $this->session->sess_destroy();
    }
    public function addUser()
    {
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
        $exists = $this->users_model->exist_user($email, $nombre);

        if ($exists) {
            $data['message'] = "Este restaurante/usuario ya existe en la base de datos";
            $data['res'] = 'exists';
        } else {
            $res = $this->users_model->add_user($array);
            if ($res) {
                $data['message'] = 'Restaurante agregado exitosamente.';
                $data['res'] = TRUE;
            } else {
                $data['message'] = 'No se pudo agregar un nuevo restaurante, consulte con sistemas';
                $data['res'] = FALSE;
            }
        }
        echo json_encode($data);
    }

    public function getUsers()
    {
        $data = [];
        $res = $this->users_model->get_users();
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

    public function updateUserStatus()
    {
        $id_user = $this->input->post('id_user');
        $status = $this->input->post('status') == 1 ? 0 : 1;
        $res = $this->users_model->update_user_status($id_user, $status);
        if ($res) {
            $data['data'] = $res;
            $data['message'] = 'Datos extraidos correctamente';
            $data['res'] = TRUE;
        } else if ($res == false) {
            $data['data'] = $res;
            $data['message'] = 'Hubo un problema con la peticion';
            $data['res'] = FALSE;
        }
        echo json_encode($data);
    }
    public function updateUser()
    {
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

        $exists = $this->users_model->exist_user($email, $nombre, 'more');

        if ($exists) {
            $data['message'] = "Este restaurante/usuario ya existe en la base de datos";
            $data['res'] = 'exists';
        } else {
            $res = $this->users_model->update_user($id_user, $array);
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
    public function deleteUser()
    {
        $data = [];
        $id_user = $this->input->post("id_user");

        $res = $this->users_model->delete_user($id_user);
        if ($res == true) {
            $data["message"] = " eliminado correctamente";
            $data["res"] = true;
        } else {
            $data["res"] = false;
        }
        echo json_encode($data);
    }
}
