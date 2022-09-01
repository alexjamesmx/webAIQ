<?php
class User extends CI_Controller
{
    public function existsUser()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $data = [];
        
        $exist = $this->pagesControl_model->exist_user($email,$password);
        if ($exist == false) {
            $data['message'] = 'User Not Found';
            $data['res'] = FALSE;
            echo  json_encode($data);
            die();
        }
     
            $data['message'] = 'User Found';
            $data['res'] = TRUE;
        
        echo json_encode($data);
    }
}
