<?php
class Mesas_model extends CI_Model
{

    public function exist_table($id_mesa)
    {
        $query = $this->db->get_where('mesas', array('id_mesa' => $id_mesa));
        return $query->result() !== [];
    }

    public function validate_table($id_mesa, $password)
    {
        $query = $this->db->get_where('mesas', array('id_mesa' => $id_mesa, 'password' => $password));
        return $query->row_array();
    }
    public function get_mesas()
    {
        $rows = $this->db->count_all_results('mesas') > 0;
        if ($rows) {
            return $this->db->get('mesas')->result_array();
        } else {
            return false;
        }
    }
    public function add_mesa($data)
    {
        return $this->db->insert('mesas', $data);
    }
}
