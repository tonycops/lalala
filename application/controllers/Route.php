<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Route extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->model('Model_item', 'm_item');
		$this->load->library('cart');
	  }


	  public function profile(){
		if(empty($this->session->userdata("loggedUser"))){
			$this->session->set_userdata("pageBefore", "profile");
			redirect("Route/login");
		 }
		$data['profile'] = $this->session->userdata("loggedUser")[0];
		//print_r($data['profile']->first_name);
		$this->load->view("halaman/profile",$data);
	  }

	  public function edit_profile(){
		$data['profile'] = $this->session->userdata("loggedUser")[0];
		$this->load->view("halaman/edit-profile",$data);
	  }

	  public function admin(){
			$data['notif'] = $this->m_item->get_array("*", "notification", "1=1");
		  $this->load->view("halaman/admin-notifications",$data);
		}
		
		public function admin_article(){
			$data['product'] = $this->m_item->get_array("*", "product","1=1");
			$this->load->view("halaman/admin-article", $data);
		}

		public function admin_report(){
			$data['h_trans_pembelian'] = $this->m_item->get_array("*", "h_trans_pembelian", "1=1");
			$data['d_trans_pembelian'] = $this->m_item->get_array("*", "d_trans_pembelian", "1=1");
			$data['h_trans'] = $this->m_item->get_array("*", "h_trans", "1=1");
			$data['d_trans'] = $this->m_item->get_array("*", "d_trans", "1=1");
			$data['product'] = $this->m_item->get_array("*", "product", "1=1");
			$this->load->view("halaman/admin-report", $data);
		}

		public function admin_pembelian(){
			$data['product'] = $this->m_item->get_array("*", "product","1=1");
			$this->load->view("halaman/admin-pembelian", $data);
		}

		public function admin_story(){
			$data['product'] = $this->m_item->get_array("*", "product","1=1");
			$this->load->view("halaman/admin-story", $data);
		}

	  public function admin_product(){
			$data['product'] = $this->m_item->get_array("*", "product","1=1");
			$this->load->view("halaman/admin-product",$data);
		}
		
		public function admin_chart(){
			$data['h_trans_pembelian'] = $this->m_item->get_array("*", "h_trans_pembelian h, d_trans_pembelian d", "d.id=h.id");
			$data['d_trans_pembelian'] = $this->m_item->get_array("*", "d_trans_pembelian", "1=1");
			$data['h_trans'] = $this->m_item->get_array("*", "h_trans h, d_trans d", "h.id = d.id");
			$data['d_trans'] = $this->m_item->get_array("*", "d_trans", "1=1");
			$data['h_trans_all'] = $this->m_item->get_report("*", "h_trans", "1=1");
			$data['product'] = $this->m_item->get_array("*", "product", "1=1");
			$this->load->view("halaman/admin-chart",$data);
	  }

	  public function admin_user(){
		  $data['user'] = $this->m_item->get_array("*", "users","1=1");
		$this->load->view("halaman/admin-user",$data);
	  }

	  public function checkout(){
		$data = $this->m_item->get_last_row("id,id_customer,total,date_format(date,'%Y-%m-%d %T') as date", "h_trans", "id_customer = 1");
		$data['d_trans'] = $this->m_item->get_array("*", "d_trans", "id = '". $data['id']. "'");
		if(!empty($data['total'])) $this->load->view("halaman/checkout",$data);
		else redirect("Route/home");
	  }

	  public function upload(){
		$data['kode'] = $this->m_item->get_array("id,id_customer,total,date_format(date,'%Y-%m-%d %T') as date", "h_trans", "id_customer = 1");
		$data['d_trans'] = $this->m_item->get_array("*", "d_trans", "id = '". $data["kode"][0]['id']. "'");
		$data['all_d_trans'] = $this->m_item->get_array("*", "d_trans", "1=1");
		if(!empty($data['kode'][0]['total'])) $this->load->view("halaman/upload",$data);  
		else redirect("Route/home");
	  }

	public function home()
	{
		$data = "";
		$this->load->view("halaman/home",$data);
	}


	public function login(){

		$this->load->view("user/login");
	}

	public function product(){

		$data['item_product'] = $this->m_item->get_Array("*", "product", "jenis = 'turtle'");
		$this->load->view("halaman/product", $data);
	}

	public function accessories(){

		$data['item_product'] = $this->m_item->get_Array("*", "product", "jenis = 'accessories'");
		$this->load->view("halaman/accessories", $data);
	}

	public function food(){

		$data['item_product'] = $this->m_item->get_Array("*", "product", "jenis = 'food'");
		$this->load->view("halaman/food", $data);
	}

	public function medicine(){

		$data['item_product'] = $this->m_item->get_Array("*", "product", "jenis = 'medicine'");
		$this->load->view("halaman/medicine", $data);
	}

	public function collection(){

		$data['item_product'] = $this->m_item->get_Array("*", "product", "jenis = 'collection'");
		$this->load->view("halaman/collection", $data);
	}

	public function shopping_cart(){

		$data['shopping_cart'] = $this->cart->contents();
		$total = 0;
		foreach($data['shopping_cart'] as $d){
			$total += $d['subtotal'];
		}
		$data['total'] = $total;
		$this->load->view("halaman/shopping-cart",$data);
	}
}
