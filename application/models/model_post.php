<?php
	class model_post extends CI_Model {

    public function __construct() {
			parent::__construct();
			$this->load->database();
		}

		//ambil id user dari Post
		public function apalah($id_post)
		{
			return $this->db->where('id_post', $id_post)->get('post')->row();
		}

		//notif
		public function insert_notif($data)
		{
			$this->db->insert('notif', $data);
		}

    //Reaction
    public function select_reaction($id_post,$id_user,$type)
    {
      $hasil = $this->db->query("select count(*) as tot from reaction where id_post = ".$id_post." and id_user = ".$id_user." ");
       return $hasil->row_array();
    }

    public function get_all_reaction()
    {
       $hasil = $this->db->query("SELECT reaction.id_post,reaction.type,COUNT(type) as tot FROM `reaction`, post WHERE post.id_post = reaction.id_post GROUP BY reaction.type, reaction.id_post ORDER BY reaction.id_post DESC");
       return $hasil->result_array();
    }

    public function insert_reaction($id_post,$id_user,$type)
    {
       $m_insert = array(
        'id' => 0,
        'id_post' => $id_post,
        'id_user' => $id_user,
        'type' => $type
       );
       $this->db->insert('reaction',$m_insert);
       return 1;
    }

		//Post
    public function get_all_post()
    {
      return $this->db->order_by('created_at', 'desc')->get('post')->result();
    }

    public function get_post_where($where){
      return $this->db->where($where)->order_by('created_at', 'desc')->get('post')->result();
    }

	public function get_all_post_arr()
    {
      return $this->db->order_by('created_at', 'desc')->get('post')->result_array();
    }

    public function insert_post($data)
    {
			$data['created_at'] = date('y-m-d h:i:s');
      $this->db->insert('post', $data);
    }

    public function get_photo($id_user){
      $hasil = $this->db->query(
        "select * from user u, post p
        where p.id_user = u.id_user and p.id_user =". $id_user. " and p.gambar != ''"
      );
      return $hasil->result();
    }

		//comment
		public function get_all_comment()
		{
			$hasil = $this->db->query(
        "select u.nama_depan, u.nama_belakang, u.id_user, u.gambar, c.id_post, c.id_comment, c.isi_comment, c.total_like, c.total_comment
        from user u, comment c
        where u.id_user=c.id_user "
      );
      return $hasil->result();
		}

		public function insert_comment($data)
    {
      $this->db->insert('comment', $data);
    }

    public function get_post($id_user){
      $hasil = $this->db->query(
        "select u.nama_depan, u.nama_belakang, u.id_user, u.gambar, p.id_post, p.isi_post, p.total_like, p.total_comment, p.gambar as gambar_post,p.created_at
        from user u, post p
        where u.id_user=p.id_user and p.id_user =". $id_user . "
				order by p.created_at desc"
      );
      return $hasil->result();
    }

    public function get_post_group($id_group){
      $hasil = $this->db->query(
        "select u.nama_depan, u.nama_belakang, u.id_user, u.gambar, p.id_post, p.isi_post, p.total_like, p.total_comment, p.gambar as gambar_post,p.created_at
        from user u, post p
        where  u.id_user=p.id_user and p.id_user in (select x.id_user from member_group x where x.id_group =". $id_group. ")
				order by p.created_at desc"
      );
      return $hasil->result();
    }

		public function delete_post($id_post)
		{
			$this->db->where('id_post', $id_post)->delete('post');
			$this->db->where('id_post', $id_post)->delete('comment');
		}

  }
?>
