<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Menu_model extends CI_Model {
                        
public function insert_menu( $data ){
    $this->db->where("id_res", $data[ "id_res" ]);
    $this->db->insert("menu", $data);
    $obj[ "resultado" ] = $this->db->affected_rows() !=0;
    $obj[ "mensaje" ]     = $obj[ "resultado" ] ?
				"Platillo insertado" : "No fue posible insertar el platillo";
    return $obj;
}
                                     
                        
}
                        
/* End of file Menu_model.php */
    
        