<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Adminres_model extends CI_Model {
                        
public function get_estado($id){
    $this->db->select('status')
    ->from('users')
    ->where('id_user', $id);
    $rs = $this->db->get();
    return $rs->row();
}

public function change_status( $idres ) {
    $this->db->where('id_user', $idres);
    $this->db->set("status", "1 - status", FALSE);
    $this->db->update('users');
    return $this->db->affected_rows();
 }
                        
                            
                        
}
                        
/* End of file Adminres.php */
    
                        