<?php
class Users_model extends CI_Model
{

    public function exist_user($email)
    {
        $query = $this->db->get_where('users', array('email' => $email));
        return $query->result() !== [];
    }

    public function validate_user($email, $password)
    {
        $query = $this->db->get_where('users', array('email' => $email, 'password' => $password));
        return $query->row_array();
    }
    public function update_avatar($email, $avatar)
    {

        $query = $this->db->set('avatar', $avatar)
            ->where('email', $email)
            ->update('users');
        return $query;
    }

    public function add_user($data)
    {
        $query = $this->db->set($data)
            ->insert('users');
        return $query;
    }
}
