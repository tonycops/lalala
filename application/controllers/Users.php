<?php
	class Users extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('user_model','user_model');
		}

		public function login(){
				// Get username
			$email = $this->input->post('email'); //echo $back;
				// Get and encrypt the password
				//$password = md5($this->input->post('password'));
        	$password = $this->input->post('password');
				// Login user
			if($email == "admin@admin.com" && $password =="admin"){
				redirect("Route/admin");
			}
        	$loggedUser = $this->user_model->login($email, $password);

				if($loggedUser){
					// Create session
          $this->session->set_userdata("loggedUser", $loggedUser);
					// Set message
					$this->session->set_flashdata('user_loggedin', 'You are now logged in');
					if($this->session->userdata("pageBefore")){
						$page = $this->session->userdata("pageBefore");
						$this->session->unset_userdata("pageBefore");
						redirect('Route/'. $page);
					}
					else  redirect('Route/home');
				} else {
					$this->load->view('user/login');
					$this->session->set_flashdata('login_failed', 'Login is invalid');
				}
		}

    public function register(){
  			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
  			$this->form_validation->set_rules('password', 'Password', 'required');
  			$this->form_validation->set_rules('password-repeat', 'Repeat Password', 'matches[password]');

  			if($this->form_validation->run() === FALSE){
          $this->session->set_flashdata('val_error', validation_errors());
          $this->load->view('user/register');
  			} else {
  				$this->user_model->register();
  				// Set message
  				$this->session->set_flashdata('user_registered', 'You are now registered and can log in');

  				redirect('users/login');
  			}
  		}
		// Log user out
		public function logout(){
			// Unset user data
			$this->session->unset_userdata('loggedUser');

			// Set message
			$this->session->set_flashdata('user_loggedout', 'You are now logged out');

			redirect('Route/home');
		}

		// Check if email exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');
			if($this->user_model->check_email_exists($email)){
				return true;
			} else {
				return false;
			}
		}

		public function edit_profile($id){
			
		}
	}
