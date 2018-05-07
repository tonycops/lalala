<?php
	class Model_item extends CI_Model {

    public function __construct() {
			parent::__construct();
			$this->load->database();
		}

		//ambil id user dari Post
		public function apalah($id_post)
		{
			return $this->db->where('id_post', $id_post)->get('post')->row();
		}

		

    //Reaction
    public function select_reaction($id_post,$id_user,$type)
    {
      $hasil = $this->db->query("select count(*) as tot from reaction where id_post = ".$id_post." and id_user = ".$id_user." ");
       return $hasil->row_array();
    }

    public function get($select, $from,$where){
        return $this->db->select($select)->where($where)->get($from)->row_array();
    }

    public function get_last_row($select, $from,$where){
        return $this->db->select($select)->where($where)->order_by("date desc")->get($from)->row_array();
    }

    public function get_array($select, $from,$where){
        return $this->db->select($select)->where($where)->get($from)->result_array();
    }

    public function get_report($select, $from,$where){
        $this->db->order_by("date asc");
        return $this->db->select($select)->where($where)->get($from)->result_array();
    }

    // public function get_Array($select, $from,$where){
    //     return $this->db->select($select)->where($where)->get($from)->result_array();
    // }

    public function getNewId(){
        $number = $this->db->query("SELECT random_num
        FROM (
          SELECT FLOOR(RAND() * 99999) AS random_num 
          UNION
          SELECT FLOOR(RAND() * 99999) AS random_num
        ) AS numbers_mst_plus_1
        WHERE `random_num` NOT IN (SELECT convert(substr(id,2),unsigned) FROM h_trans)
        LIMIT 1")->row_array()['random_num'];
        return $number;
    }

    public function insert_h_trans($id, $total){
        date_default_timezone_set("Asia/Jakarta");
        $data = array(
            "id" => $id,
            "id_customer" => $this->session->userdata("loggedUser")[0]->id,
            "date" => date('Y-m-d H:i:s'),
            "total" => $total
        );
        $this->db->insert("h_trans", $data);
        $this->db->insert("h_trans_history", $data);
    }

    public function insert_product($data){
        // print_r($data['jenis']);
        $this->db->insert("product", $data);
    }

    public function delete($table, $where){
        $this->db->where($where)->delete($table);
    }

    public function insert_h_trans_pembelian($data){
        $this->db->insert("h_trans_pembelian", $data);
        return $this->db->insert_id();
    }

    public function insert_d_trans_pembelian($data){
        $this->db->insert("d_trans_pembelian", $data);
    }

    public function update_product($data, $id){
        $this->db->where("id_product", $id)->update("product", $data);
        $tmp = array("nama" => $data['nama']);
        $this->db->where("id_product", $id)->update("d_trans", $tmp);
        $this->db->where("id_product", $id)->update("d_trans_pembelian", $tmp);
    }

    public function delete_product($id){
        $this->db->where("id_product", $id)->delete("product");
    }

    public function insert_d_trans($data){
        $this->db->insert("d_trans", $data);
    }

    public function insert_notif($data){
        $this->db->insert("notification", $data);
    }
    

  }
?>
