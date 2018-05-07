<?php
	class model_chat extends CI_Model {

    public function __construct() {
			parent::__construct();
			$this->load->database();
		}
 
    public function insert_chat($data){
        $this->db->insert("chat", $data);
    }

    public function update($data, $where, $table){
        $this->db->set($data)->where($where)->update($table);
    }

  }
?>
