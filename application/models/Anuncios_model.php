<?php
class Anuncios_model extends CI_Model
{

    public function exist_anuncio($imagen, $old_anuncio = '', $camposIguales = '')
    {
        if ($camposIguales != '') {
            $this->db->where('imagen', $imagen)
                ->from('publicidad');
            return $this->db->count_all_results() > 1;
        }
        if ($old_anuncio != '') {
            $this->db->where('imagen', $imagen)
                ->where('imagen !=', $old_anuncio)
                ->from('publicidad');
            return $this->db->count_all_results() > 0;
        }

        $query = $this->db->get_where('publicidad', array('imagen' => $imagen));
        return $query->result() !== [];
    }

    public function get_anuncios()
    {
        $rows = $this->db->count_all_results('publicidad') > 0;
        if ($rows) {
            return $this->db->get('publicidad')->result_array();
        } else {
            return false;
        }
    }
    public function add_anuncio($data)
    {
        return $this->db->insert('publicidad', $data);
    }
    public function delete_anuncio($id_ad)
    {
        $this->db->where('id_ad', $id_ad)
            ->delete('publicidad');
        return $this->db->affected_rows();
    }
    public function update_anuncio($id_ad, $array)
    {
        return $this->db->set($array)
            ->where('id_ad', $id_ad)
            ->update('publicidad');
    }
    public function update_anuncio_status($id_ad, $activo)
    {

        $query = $this->db->set("activo", $activo)
            ->where("id_ad", $id_ad)
            ->update("publicidad");
        if ($query) {
            return $this->db->select('activo')
                ->where('id_ad', $id_ad)
                ->get('publicidad')->result_array();
        } else {
            return false;
        }
    }
    public function update_anuncio_fecha($id_ad, $array)
    {
        return $this->db->set($array)
            ->where('id_ad', $id_ad)
            ->update('publicidad');
    }
    public function select_id_imagen()
    {
        $this->db->select('id_comida');
        $this->db->from('menu');
        $this->db->order_by('id_comida', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row();
    }
    public function imagen($data)
    {
        return $this->db->insert('publicidad', $data);
    }

    public function imagen_where($data, $id)
    {
        $this->db->set($data);
        $this->db->where('id_ad', $id);
        $this->db->update('publicidad');
        $obj = $this->db->affected_rows() != 0;
        return $obj;
    }
}
