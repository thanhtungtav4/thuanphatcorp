<?php
class Models_footer extends CI_Model {
    
    public $_table = "tbl_lienhe";   
    function __construct()
    {
        parent::__construct();
    }
    
     public function insert($data){
    $this->db->insert($this->_table,$data);
} 
 }

?>