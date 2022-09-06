<?php
class Users_model extends CI_Model
{

    public function exist_user($email)
    {
        $query = $this->db->get_where('users', array('correo' => $email));
        return $query->result() !== [];
    }

    public function validate_user($email, $password)
    {
        $query = $this->db->get_where('users', array('correo' => $email, 'password' => $password));
        return $query->row_array();
    } 
    public function update_avatar($email, $avatar){

        $query = $this->db->set('avatar', $avatar)
        ->where('correo', $email)
        ->update('users');
        return $query;

    }
}
