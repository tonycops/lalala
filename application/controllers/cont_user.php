<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cont_user extends CI_Controller {

  function __construct(){
    parent::__construct();
    // $this->load->model('model_user', 'user');
    // $this->load->model('model_post', 'post');
  }

  public function post()
  {
    $get_data = $this->input->post();
    $ada_gambar = false;

    $config['upload_path'] = './assets/gambar';
		$config['allowed_types'] = '*';
		$config['max_size'] = '50000000';
    $config['encrypt_name'] = true;

		$this->load->library('upload', $config);

		$namafile = "";
		if (!$this->upload->do_upload("gambar"))
		{
      $this->session->set_flashdata('valid_photo', $this->upload->display_errors());
		}
		else
		{
      $te = $this->upload->data();
			$data['gambar'] = $te["file_name"];
      $ada_gambar = true;
    }

    if($get_data['isi_post'] != "" || $ada_gambar)
    {
      $data['isi_post'] = $get_data['isi_post'];
      $data['isi_post'] = $this->mention($data['isi_post'] );
      $data['isi_post'] = $this->hashtag($data['isi_post'] );
      $data['id_user'] = $this->session->userdata('user_login');
      $this->post->insert_post($data);
      redirect('page/newsfeed');
    }
  }

  public function comment()
  {
    $get_data = $this->input->post();
    if($get_data['isi_comment'] != "")
    {
      $data['isi_comment'] = $get_data['isi_comment'];
      $data['id_user'] = $this->session->userdata('user_login');
      $data['id_post'] = $get_data['id_post'];

      $asd = $this->post->apalah($data['id_post']);
      $dsa = $this->user->get_user($this->session->userdata('user_login'));
      $temp['id_user'] = $asd->id_user;
      $temp['isi'] = "<a href='". base_url("page/timelineOther/". $dsa->id_user). "'>". $dsa->nama_depan. "</a> comment at your post";
      $this->post->insert_notif($temp);

      $this->post->insert_comment($data);
      redirect('page/newsfeed');
    }
  }

  public function add_friend($id_user){
    $data = $this->user->get_user($this->session->userdata('user_login'));
    $temp['id_user'] = $id_user;
    $temp['isi'] = "<a href='". base_url("page/timelineOther/". $data->id_user). "'>". $data->nama_depan. "</a> add you as his/her friend";
    $this->post->insert_notif($temp);
    $this->user->insert_pending($this->session->userdata("user_login"), $id_user);
    redirect("page/timelineOther/". $id_user);
  }

  public function unfriend($id_user){
    $data = $this->user->get_user($this->session->userdata('user_login'));
    $temp['id_user'] = $id_user;
    $temp['isi'] = "<a href='". base_url("page/timelineOther/". $data->id_user). "'>". $data->nama_depan. "</a> remove you from his/her friend";
    $this->post->insert_notif($temp);
    $id_login = $this->session->userdata("user_login");
    $this->user->delete_friend($id_user, $id_login);
    $this->user->delete_friend($id_login, $id_user);
    redirect("page/timelineOther/". $id_user);
  }

  public function accept($id_user){
    $data = $this->user->get_user($this->session->userdata('user_login'));
    $temp['id_user'] = $id_user;
    $temp['isi'] = "<a href='". base_url("page/timelineOther/". $data->id_user). "'>". $data->nama_depan. "</a> has accepted your friend request";
    $this->post->insert_notif($temp);
    $this->user->delete_pending($id_user, $this->session->userdata("user_login"));
    $id_chatroom = $this->user->get_chatroom();
    $this->user->insert_friend($id_user, $this->session->userdata("user_login"), $id_chatroom);
    $this->user->insert_friend($this->session->userdata("user_login"), $id_user, $id_chatroom);
    redirect("page/timelineOther/". $id_user);
  }

  public function cancel_req($id_user){
    $this->user->delete_pending($this->session->userdata("user_login"), $id_user);
    redirect("page/timelineOther/". $id_user);
  }

  public function reject($id_user){
    $data = $this->user->get_user($this->session->userdata('user_login'));
    $temp['id_user'] = $id_user;
    $temp['isi'] = "<a href='". base_url("page/timelineOther/". $data->id_user). "'>". $data->nama_depan. "</a> has rejected your friend request";
    $this->post->insert_notif($temp);
    $this->user->delete_pending($id_user, $this->session->userdata("user_login"));
    redirect("page/timelineOther/". $id_user);
  }

  public function edit_profile()
  {
    $get_data = $this->input->post();
    $valid = true;
    if($get_data['nama_depan'] == "" || $get_data['nama_belakang'] == "")
    {
      $this->session->set_flashdata('valid_nama', 'You must fill your name');
      $valid = false;
    }
    if($get_data['email'] == "")
    {
      $this->session->set_flashdata('valid_email', 'You must fill your email');
      $valid = false;
    }
    if($get_data['kota'] != "")
    {
      $data['kota'] = $get_data['kota'];
    }
    if($get_data['no_hp'] != "")
    {
      $data['no_hp'] = $get_data['no_hp'];
    }
    if($get_data['alamat'] != "")
    {
      $data['alamat'] = $get_data['alamat'];
    }
    $config['upload_path'] = './assets/gambar';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size'] = '500';
    $config['encrypt_name'] = true;

		$this->load->library('upload', $config);

		$namafile = "";
		if (!$this->upload->do_upload("gambar"))
		{
      $this->session->set_flashdata('valid_photo', $this->upload->display_errors());
		}
		else
		{
      $te = $this->upload->data();
			$data['gambar'] = $te["file_name"];
    }
    if($valid)
    {
      $data['nama_depan'] = $get_data['nama_depan'];
      $data['nama_belakang'] = $get_data['nama_belakang'];
      $data['email'] = $get_data['email'];
      $this->user->update_user($data);
      redirect('page/edit_profile');
    }
    else {
      redirect('page/edit_profile');
    }

  }

  public function update_password()
  {
    $get_data = $this->input->post();
    $user_login = $this->user->get_user($this->session->userdata('user_login'));
    if(md5($get_data['old_password']) == $user_login->password)
    {
      if($get_data['new_password'] == $get_data['conf_password'])
      {
        $data['password'] = md5($get_data['new_password']);
        $this->user->update_user($data);
        $this->session->set_flashdata('sukses', "Your password has been updated !");
        redirect('page/change_password');
      }
      else
      {
        $this->session->set_flashdata('valid_password', "Your new password doesn't match with confirm password !");
        redirect('page/change_password');
      }
    }
    else {
      $this->session->set_flashdata('valid_old_password', "Your password is wrong !");
      redirect('page/change_password');
    }
  }

  public function delete_post($id_post)
  {
    $this->post->delete_post($id_post);
    redirect('page/timeline');
  }

  public function search($key){
    $user = $this->user->getAjax($key);
    $hasil ="";
    foreach($user as $u){
      if($hasil != "") $hasil.= "<br>";
      $nama = $u->nama_depan. " ". $u->nama_belakang;
      $hasil.= "<a id='ajax' href='".base_url("page/timelineOther/". $u->id_user). "'>". $nama. "</a>";
    }
    $group = $this->user->getAjax_group($key);
    foreach($group as $g){
      if($hasil != "") $hasil.= "<br>";
      $nama = $g->nama_group;
      $hasil.= "<a id='ajax' href='".base_url("page/group/". $g->id_group). "'>". $nama. "</a>";
    }
    echo $hasil;
  }

  public function mention($text)
  {
      $data = $this->user->get_user($this->session->userdata('user_login'));
   $kata = "";
   $temp = explode(' ', $text);
   for($i=0;$i<count($temp);$i++)
   {
    if($temp[$i][0] == '@')
    {
     $temp2 = explode('@',$temp[$i]);
     $dataUser = $this->user->getArray("*", "user", "1 = 1");
     $ada = false;
     foreach($dataUser as $user)
     {
         $namaDepan = $user->nama_depan;
      if($temp2[1] == $namaDepan)
      {
          $kata .= " <a id='mention'  href='". base_url("page/timelineOther/". $user->id_user). "'>" . $temp[$i] . "</a>";
          $ada = true;
          $arr = array(
              "id_user" => $user->id_user,
              "isi" => "<a href='". base_url("page/timelineOther/". $data->id_user). "'>". $data->nama_depan. "</a> mention you in his/her post"
          );
          $this->post->insert_notif($arr);
          break;
      }
     }
     if(!$ada)
     {
      $kata .= " " . $temp[$i];
     }
    }
    else
    {
     $kata .= " " . $temp[$i];
    }
   }
   return $kata;
  }

  public function hashtag($text)
  {
      $data = $this->user->get_user($this->session->userdata('user_login'));;
   $kata = "";
   $temp = explode(' ', $text);
   for($i=0;$i<count($temp);$i++)
   {
    if($temp[$i][0] == '#')
    {
     $temp2 = explode('#',$temp[$i]);
     $kata .= " <a id='mention'  href='". base_url("page/newsfeed_hashtag/". $temp2[1]). "'>" . $temp[$i] . "</a>";
    }
    else
    {
     $kata .= " " . $temp[$i];
    }
   }
   return $kata;
  }

  public function join_group($id_group){
    $user = $this->user->get("*", "user", "id_user =". $this->session->userdata("user_login"));
    $data = array("id_group" => $id_group,
    "id_user" => $user->id_user
  );
    $this->user->insert("member_group", $data);
    redirect("page/group/". $id_group);
  }

  public function leave_group($id_group){
    $user = $this->user->get("*", "user", "id_user =". $this->session->userdata("user_login"));
    $this->user->delete("member_group", "id_user =". $this->session->userdata("user_login"));
    redirect("page/group/". $id_group);
  }

  public function report($id_post){
    $this->session->set_userdata("msg", "Your report has been sent !");
    redirect("page/newsfeed");
  }

  public function Api()
  {
    echo $this->input->post('content');
  }
}
