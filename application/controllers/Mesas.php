<?php
class Mesas extends CI_Controller
{
    public function __construct()
    {
        $this->load->model('mesas_model');
        
    }

    public function existsUser()
    {
        $id_mesa = $this->input->post('id_mesa');
        $password = $this->input->post('password');

        $data = [];

        $res = $this->mesas_model->exist_table($id_mesa);

        //MESA EXISTE?
        if (!$res) {
            $data['message'] = "Esta mesa no existe en la base de datos";
            $data['res'] = FALSE;
        } else {

            //ENTONCES VALIDALO
            $userData = $this->users_model->validate_table($id_mesa, $password);
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

    public function updateAvatar()
    {
        $data = [];
        $email = $this->input->post('email');
        $avatar =  $this->input->post('avatar');
        $res = $this->users_model->update_avatar($email, $avatar);
        if(!!$res){
            $data['message'] = 'Foto de perfil actualizada';
            $data['res'] = $res;
        }
        else{
            $data['message'] = 'No ha sido posible actualizar por el momento';
            $data['res'] = $res;
        }
        echo json_encode($data);
    }

    public function signout()
    {
        $this->session->sess_destroy();
    }
}
