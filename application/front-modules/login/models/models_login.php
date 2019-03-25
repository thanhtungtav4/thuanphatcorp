<?php
class Models_login extends CI_Model {
    
    private $_table = "tbl_users"; 
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function getList($where = false , $limit = false){
        $this->db->select("*");
        $this->db->from($this->_table); 
        if($where)
            $this->db->where($where);
        if($limit)    
            $this->db->limit($limit['per_page'] , $limit['start'] );
        return $this->db->get()->result();
    } 
    
}

?>