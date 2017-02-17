<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mains extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}
	public function login()
	{
		$post=$this->input->post();
		$this->load->model('Main');
		$result= $this->Main->login_validate($post);
		if($result === "valid"){
			$email=$this->input->post('email');
			$password=$this->input->post('password');
			$check_user=$this->Main->check_user($email,$password);
			if($check_user === TRUE)
			{
				$messages=array('Incorrect login information. Please use login credentials provided below to login');
				$this->session->set_flashdata('messages',$messages);
				redirect(base_url('/'));
			}
			else
			{
				redirect(base_url('/Books/index'));
			}
		}
		else
		{
			$errors=array(validation_errors());
			$this->session->set_flashdata('errors',$errors);
			redirect(base_url('/'));
		}
		
	}
	public function logoff()
	{
		$this->session->sess_destroy();
		redirect(base_url('/'));
	}
}
