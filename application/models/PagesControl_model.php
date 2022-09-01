<?php
class PagesControl_model extends CI_Model
{

    public function exist_user($email, $password = '')
    {
        $query = $this->db->get_where('users', array('correo' => $email));
        if( $query->result() == []) {
            return false;
        }
        $query = $this->db->get_where('users', array('correo' => $email,'password'=> $password));
        return 'hola';
    }
}
