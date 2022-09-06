<?php
class User extends CI_Controller
{

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
