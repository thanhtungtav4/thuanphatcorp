<?php
class Models_login extends CI_Model {
    
    private $_table = "tbl_admin"; 
    
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
    
//    public function phanquyen($admin_id){
//        $link = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//        $arr = explode("/", $_SERVER['REQUEST_URI']); 
//        $so = 0; 
//        if (strpos(base_url(), 'admin') == TRUE && (strpos($link, 'admin/login/logout') == FALSE && strpos($link, 'admin/login') == FALSE)) {
//          
//            $this->db->select('except_id');
//            $this->db->from('tbl_admin_permission_except');
//            $this->db->where("INSTR('http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "' , url_except ) > 0 AND admin_id = " . $admin_id);
//            $rs1 = $this->db->get()->result();
//            
//            if(count($rs1)){
//                return false;
//            }
//            return true;   
//        }
//    }
//    
//    public function listphanquyen($admin_id){
//       
//            $this->db->select('*');
//            $this->db->from('tbl_admin_permission_except');
//            $this->db->where("admin_id" , $admin_id);
//            $rs1 = $this->db->get()->result();
//            return $rs1; 
//        
//    }
    
    
}

?>