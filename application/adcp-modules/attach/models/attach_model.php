<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Attach_model extends CI_Model {

    public $_table = "tbl_attach";   
    function __construct()
    {
        parent::__construct();
    }

}

?>