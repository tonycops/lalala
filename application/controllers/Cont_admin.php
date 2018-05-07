<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cont_admin extends CI_Controller {
    function __construct(){
        parent::__construct();
        // $this->load->model('model_user', 'user');
        $this->load->model('Model_item', 'm_item');
        // $this->load->model('model_post', 'post');
        $this->load->library('upload');
      }

      public function insert_product(){
        $config['upload_path']          ='./assets/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 500;
        $config['overwrite'] = true;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $this->upload->initialize($config);
        if ( $this->upload->do_upload('gambar'))
        {
            $post = $this->input->post();
            $data = array(
                "nama" => $post['nama'],
                "stok" => $post['stok'],
                "harga" => $post['harga'],
                "deskripsi" => $post['deskripsi'],
                "jenis" => $post['jenis'],
                "gambar" => $this->upload->data("file_name")
            );
            // echo $data['jenis']. "asd";
            $this->m_item->insert_product($data);
            redirect("Route/admin_product");
        }
        else {
            echo $config['upload_path'];
            echo $this->upload->display_errors();
        }
      }

      public function delete_product($id){
        $this->m_item->delete_product($id);
        redirect("Route/admin_product");
      }

      public function update_product($id){
            $config['upload_path']          ='./assets/img/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 500;
            $config['overwrite'] = true;
            $this->upload->initialize($config);
            if ( $this->upload->do_upload('gambar'))
            {
                $post = $this->input->post();
                $data = array(
                    "nama" => $post['nama'],
                    "stok" => $post['stok'],
                    "harga" => $post['harga'],
                    "deskripsi" => $post['deskripsi'],
                    "jenis" => $post['jenis'],
                    "gambar" => $this->upload->data("file_name")
                );
                // echo $data['jenis']. "asd";
                $this->m_item->update_product($data, $id);
                // echo "a";
                redirect("Route/admin_product");
            }
            else {
                $post = $this->input->post();
                $data = array(
                    "nama" => $post['nama'],
                    "stok" => $post['stok'],
                    "harga" => $post['harga'],
                    "deskripsi" => $post['deskripsi'],
                    "jenis" => $post['jenis']
                );
                // echo $data['jenis']. "asd";
                $this->m_item->update_product($data, $id);
                // echo $this->upload->display_errors();
                redirect("Route/admin_product");
            }
      }

      public function deleteNotification($id){
        $this->m_item->delete("notification", "id =". $id);
        redirect("Route/admin");
      }

      public function insert_pembelian($ctr){
        $post = $this->input->post();
        //var_dump($post); echo "<br><br>asdsadasd<br><br>";
        $arr_h = array(
            "tanggal" => $post['tanggal'],
            "pemasok" => $post['pemasok'],
            "total" => $post['total']
        );
        $id_h_trans = $this->m_item->insert_h_trans_pembelian($arr_h);
        for($i=0; $i<$ctr; $i++){
            if($post['id'.$i]){
                $tmp = array(
                    "id" => $id_h_trans,
                    "id_product" => $post['id'. $i],
                    "nama_product" => $post['nama'. $i],
                    "jumlah" => $post['jumlah'. $i],
                    "harga" => $post['harga'. $i],
                    "subtotal" => $post['subtotal'.$i]
                );
                $update = array(
                    "stok" => $this->m_item->get("*","product","id_product =". $post['id'. $i])['stok'] + $post['jumlah'. $i]
                );
                $this->m_item->update_product($update, $post['id'. $i]);
                $this->m_item->insert_d_trans_pembelian($tmp);
            }
        }
        redirect("Route/admin_pembelian");
      }
                

}

?>