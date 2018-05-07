<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cont_trans extends CI_Controller {

  function __construct(){
    parent::__construct();
    // $this->load->model('model_user', 'user');
    $this->load->model('Model_item', 'm_item');
    $this->load->model('model_post', 'post');
    $this->load->library('cart');
    $this->load->library('upload');
  }

  public function addToCart($back){
    $post = $this->input->post();
    $data = array(
        "id" => $post['id'], 
        "qty" => $post['qty'],
        "name" => $post['name'],
        "price" => $post['harga'],
        "options" =>array(
            "gambar" => $post['gambar'],
            "deskripsi" =>$post['deskripsi']
        )
    );
    $this->cart->insert($data);
    // echo $post['id'];
    redirect('Route/'.$back);
  }

  public function search($back){
    $kata = $this->input->post("search-bar"); //echo $kata;
    $jenis = $back;
    if ($jenis == 'product') $jenis = 'turtle';
    $data['item_product'] = $this->m_item->get_array("*", "product", "jenis = '".$jenis ."' and (nama like '%". $kata. "%')");
    // print_r($data['item_product']);
    $data['search'] = $kata;
    $this->load->view("halaman/". $back, $data);
  }

  public function ajaxSearch($jenis, $back){
    $kata = $back; //echo $kata;
    
    if ($jenis == 'product') $jenis = 'turtle';
    $data['item_product'] = $this->m_item->get_array("*", "product", "jenis = '".$jenis ."' and (nama like '%". $kata. "%')");
    // print_r($data['item_product']);
    $data['search'] = $kata;
    $hasil = "";
    foreach($data['item_product'] as $d){
      $hasil .= "<a><div class='hasil-search'> ". $d['nama']. "</div></a>";
    }
    echo $hasil;
  }


  public function updateAllCart(){  
      $cart = $this->cart->contents();
      foreach($cart as $c){
        $tmp = array("rowid" => $c['rowid'], "qty" => $this->input->post("qty". $c['rowid']));
        echo  $this->input->post("qty". $c['rowid']) . " asd ";
        $this->cart->update($tmp);
      }  
    // redirect('Route/shopping_cart');
  }

  public function updateCart(){  
    $post = $this->input->post();
    if($this->input->post("update")){
      $tmp = array("rowid" => $post['rowid'] , "qty" => $post['qty']);
      $this->cart->update($tmp);
      // echo "aa";
    }else{
      $tmp = array("rowid" => $post['rowid'] , "qty" => 0);
      $this->cart->update($tmp);
    }
    
    redirect('Route/shopping_cart');
  }

  public function checkout(){
    if(empty($this->session->userdata("loggedUser"))){
       $this->session->set_userdata("pageBefore", "shopping_cart");
       redirect("Route/login");
    }
    else {
      
      if($this->cart->total()){
        $total = $this->input->post("total");
        $id_customer = $this->session->userdata("loggedUser")[0]->id;
        $id = "P" . $this->session->userdata("loggedUser")[0]->id. str_pad($this->m_item->getNewId(),5,"0",STR_PAD_RIGHT);
        foreach($this->cart->contents() as $c){
          $data = array(
            "id" => $id,
            "nama" => $c['name'],
            "harga" => $c['price'],
            "subtotal" => $c['subtotal'],
            "jumlah" => $c['qty']
          );
          $this->m_item->insert_d_trans($data);
        }
        $this->m_item->insert_h_trans($id, $total);
        $this->cart->destroy();
        redirect("Route/checkout");
      }else{
        redirect("Route/upload");
      }
    }
  }

  public function upload(){
    $config['upload_path']          ='./assets/img/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 500;
    $config['overwrite'] = true;
    $this->upload->initialize($config);
    if($this->upload->do_upload('gambar')){
      $post = $this->input->post();
      $data = array(
        "gambar" => $this->upload->data("file_name"),
        "deskripsi" => $post['deskripsi'],
        "jumlah_transfer" => $post['jumlah'],
        "tgl_transfer" => $post['tgl'],
        "no_pembayaran" => $post['no']
      );
      $this->m_item->insert_notif($data);
      redirect("Route/upload");
    }
    else{
      echo $this->upload->display_errors();
      redirect("Route/upload");
    }
  }


}

?>