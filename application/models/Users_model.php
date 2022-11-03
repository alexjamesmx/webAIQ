<?php
class Users_model extends CI_Model
{
    public function exist_user($email, $nombre = '', $more = '')
    {

        if ($more != '') {
            return
                $this->db->select('*')
                ->from('users')
                ->where('email =', $email)
                ->or_where('nombre =', $nombre)
                ->count_all_results() > 1;
        }
        $query = $this->db->get_where('users', array('email' => $email));
        if ($query->result() === [] && $nombre != '') {
            $query = $this->db->get_where('users', array('nombre' => $nombre));
        }
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
        return $this->db->set($data)
            ->insert('users');
    }
    public function get_users()
    {
        $rows = $this->db->count_all_results('users') > 0;
        if ($rows) {
            return $this->db->get_where('users', array('tipo >' => '1'))->result_array();
        } else {
            return false;
        }
    }
    public function update_user_status($id_user, $status)
    {

        $query = $this->db->set("status", $status)
            ->where("id_user", $id_user)
            ->update("users");
        if ($query) {
            return $this->db->select('status')
                ->where('id_user', $id_user)
                ->get('users')->result_array();
        } else {
            return false;
        }
    }
    public function update_user($id_user, $array)
    {
        return $this->db->set($array)
            ->where('id_user', $id_user)
            ->update('users');
    }
    public function delete_user($id_user)
    {
        $this->db->where('id_user', $id_user)
            ->delete('users');
        return $this->db->affected_rows();
    }
    public function imagen_where($data, $id)
    {
        $this->db->set($data);
        $this->db->where('id_user', $id);
        $this->db->update('users');
        $obj = $this->db->affected_rows() != 0;
        return $obj;
    }
    public function imagen($data)
    {
        return $this->db->insert('users', $data);
    }
}
