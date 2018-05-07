<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cont_api extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('model_item', 'm_item');
    // $this->load->model('model_post', 'post');
  }

  public function get_product_turtle(){
    $turtle = $this->m_item->get_Array("*", "product", "jenis = 'turtle'");
    // $hasil = [];
    echo json_encode($turtle);
  }

  public function get_product_accessories(){
    $turtle = $this->m_item->get_Array("*", "product", "jenis = 'accessories'");
    // $hasil = [];
    echo json_encode($turtle);
  }

  public function get_product_food(){
    $turtle = $this->m_item->get_Array("*", "product", "jenis = 'food'");
    // $hasil = [];
    echo json_encode($turtle);
  }

  public function get_product_medicine(){
    $turtle = $this->m_item->get_Array("*", "product", "jenis = 'medicine'");
    // $hasil = [];
    echo json_encode($turtle);
  }

  public function get_product_collection(){
    $turtle = $this->m_item->get_Array("*", "product", "jenis = 'collection'");
    // $hasil = [];
    echo json_encode($turtle);
  }

  public function get_ajax_name($nama){
    if($nama)
      $hasil = $this->m_item->get_Array("*", "product", "nama like '%". $nama. "%'");
    echo json_encode($hasil);
  }

  public function get_product_name($nama){
    $nama = urldecode($nama);
    $hasil = $this->m_item->get("*", "product", "nama = '". $nama. "'");
    echo json_encode($hasil);
    // echo urldecode($nama);
  }

  public function get_product($id){
    $data = $this->m_item->get("*", "product", "id_product =". $id);
    echo json_encode($data);
  }

  public function get_all_article(){
    $data = $this->m_item->get_array("*", "article", "1 = 1");
    echo json_encode($data);
  }

  public function get_article($id){
    $data = $this->m_item->get("*", "article", "id = ". $id);
    echo json_encode($data);
  }

}

?>