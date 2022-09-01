<?php
class User extends CI_Controller
{
    public function existsUser()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $data = [];

        $exist = $this->pagesControl_model->exist_user($email);

        //USUARIO EXISTE?
        if (!$exist) {
            $data['message'] = "User doesn't exit";
            $data['res'] = FALSE;
          
        } else {

            //ENTONCES VALIDALO
            $userData = $this->pagesControl_model->validate_user($email, $password);
            if (!$userData) {
                $data['message'] = 'Your email or password are incorrect';
                $data['res'] = FALSE;
              
            } else {
                $data['user'] = $userData;
                $data['message'] = 'Logged in succesfully';
                $data['res'] = TRUe;
            }
        }
        echo  json_encode($data);
    }
}
