<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Model Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/config.html
 */
class CI_Model {

	/**
	 * Constructor
	 *
	 * @access public
	 */
	function __construct()
	{
		log_message('debug', "Model Class Initialized");
	}

	/**
	 * __get
	 *
	 * Allows models to access CI's loaded classes using the same
	 * syntax as controllers.
	 *
	 * @param	string
	 * @access private
	 */
	function __get($key)
	{
		$CI =& get_instance();
		return $CI->$key;
	}


	/*
	Ham select all
	Du lieu truyen vao neu co:
		***** Chi Tiet *****
		$where['id'] = 123;    

		***** Theo Ngay *****
		$where['create_date >='] = '2015-07-01';
		$where['create_date <='] = '2015-08-02 23:59:59';
	
		***** Tim Kiem *****
		$like = " name LIKE '%abc%' and email LIKE '%abcccc%' ..... "; 

		***** Sap Xep *****
		$order_by = " create_date DESC , id ASC .... "; 

		***** Group *****
		$group_by = "email, name ,.... "; 

		***** Lien Ke Tbl khac *****
		$join['tbl_category'] = 'tbl_category.id = tbl_mathang.id';
		$join['tbl_admin'] = 'tbl_admin.id = tbl_mathang.admin_id';

	*/
	public function getList($where = false , $like = false , $order_by = false , $group_by = false , $join = false , $select = false ,$limit = false){
		// Check select orther
		if($select != false){
			$this->db->select($select);
		}else{
			$this->db->select('*');
		} 
		// Table query
		$this->db->from($this->_table); 
		// Check have join
		if($join != false){
			foreach($join as $k=>$v){
				$this->db->join($k , $v);
			}
		} 
		// Check where orther
		if($where != false){
			$this->db->where($where);
		}  
		// Check search
		if($like != false){
			$this->db->where($like);
		} 
        if($limit != false){
			$this->db->limit($limit['num'] , $limit['start']);
		} 
		// Check order by
		if($order_by != false){
			$this->db->order_by($order_by);
		} 
		// Check group by
		if($group_by != false){
			$this->db->group_by($group_by);
		} 
		$result = $this->db->get()->result(); 
		return $result;
	}
    public function getListPage($where = false , $like = false , $order_by = false , $group_by = false , $join = false , $select = false ,$limit = false ,$option=array()){
 
		if($select != false){
			$this->db->select($select);
		}else{
			$this->db->select('*');
		}  
		$this->db->from($this->_table);  
		if($join != false){
			foreach($join as $k=>$v){
				$this->db->join($k , $v);
			}
		}  
		if($where != false){
			$this->db->where($where);
		}   
		if($like != false){
			$this->db->where($like);
		} 
        if($order_by != false){
			$this->db->order_by($order_by);
		} 
        $pagination=$this->load->library("Pagination");
        $result['total']=$config['total_rows'] = $this->db->count_all_results();;
		$config['per_page'] = $limit;
        $option['base']?$option['base']=trim($option['base'],"/")."/":"latest";
        $config['base_url']=base_url().$option['base'];
        $config['use_page_numbers']=true;
        $config['uri_segment']=$option['uri_segment']?$option['uri_segment']:2;
        $pagination->initialize($config);
        $result['paging']=$pagination->create_links();
        
        
        // ======================================================
        // ======================================================
        // ======================================================
        // ======================================================
        // ======================================================
        if($select != false){
			$this->db->select($select);
		}else{
			$this->db->select('*');
		}  
		$this->db->from($this->_table);  
		if($join != false){
			foreach($join as $k=>$v){
				$this->db->join($k , $v);
			}
		}  
		if($where != false){
			$this->db->where($where);
		}   
		if($like != false){
			$this->db->where($like);
		} 
        if($order_by != false){
			$this->db->order_by($order_by);
		} 
         
        if($limit != false){
            $this->db->limit($limit,$pagination->cur_page>1?($pagination->cur_page-1)*$limit:0); 
		}  
		 
		if($group_by != false){
			$this->db->group_by($group_by);
		}  
        $result['cur_page']=$pagination->cur_page;
        $plist=$this->db->get()->result();
        $result['pageList']=array();
        $pids=array();
        foreach ($plist as $p){
            $result['pageList'][$p->id]=$p;
             $pids[]=$p->id;
        }
		// print_r($result);exit;

        return $result;
         
          
        
	}
    
    
    
    
    
    

	// Ham update DB
	public function update($data , $where){ 
        $this->db->where($where);
        $this->db->update($this->_table, $data); 
    } 

    // Ham insert DB , tra ve id vua them
    public function insert($data){
        $this->db->insert($this->_table, $data); 
        return $this->db->insert_id();
    }
    public function delete($data){
        $this->db->delete($this->_table, $data);  
    }
    public function insert_id(){ 
        return $this->db->insert_id();
    }

}
// END Model Class

/* End of file Model.php */
/* Location: ./system/core/Model.php */