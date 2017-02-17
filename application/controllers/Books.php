<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {

	public function index()
	{
		$this->load->model('Book');
		$contacts['contacts'] = $this->Book->get_contacts();
		$contacts['favorites']= $this->Book->get_favorites();
		$this->load->view('book', $contacts);
	}
	public function add_favs($contact_id)
	{
		$id=1;
		$this->load->model('Book');
		$this->Book->add_favs($contact_id,$id);
		redirect(base_url('/Books/index'));


	}
	public function add_contact(){
		$post=$this->input->post();
		$id=1;
		$this->load->model('Book');
		$result=$this->Book->contact_validate($post);
		if($result === "valid")
		{
			$this->Book->add_contact($post, $id);
			redirect(base_url('/Books/index'));
		}
		else
		{
			$messages=array('Form not complete. First and last name are required.');
				$this->session->set_flashdata('messages',$messages);
				redirect(base_url('/Books/index'));
		}
	}
	public function delete_contact($id){
		$this->load->model('Book');
		$this->Book->delete_contact($id);
		redirect(base_url('/Books/index'));

	}
	public function delete_favorite($id){
		$this->load->model('Book');
		$this->Book->delete_favorite($id);
		redirect(base_url('/Books/index'));
	}
	
}
