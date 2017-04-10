<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {

	public function index()
	{
		// Loading model getting all contacts and favorites
		$this->load->model('Book');
		$contacts['contacts'] = $this->Book->get_contacts();
		$contacts['favorites']= $this->Book->get_favorites();
		$this->load->view('book', $contacts);
	}
	public function add_favs($contact_id)
	{
		// adding a favorite
		$id=1;
		$this->load->model('Book');
		$this->Book->add_favs($contact_id,$id);
		redirect(base_url('/Books/index'));


	}
	public function add_contact(){
		// adding contact
		$post=$this->input->post();
		$id=1;
		$this->load->model('Book');
		$result=$this->Book->contact_validate($post);
		if($result === "valid")
		{
			// valid results mean all inputs from form passed all form validation rules
			$this->Book->add_contact($post, $id);
			redirect(base_url('/Books/index'));
		}
		else
		{
			// user did not enter all or did not meet validation rules
			$messages=array('Form not complete. First and last name are required.');
				$this->session->set_flashdata('messages',$messages);
				redirect(base_url('/Books/index'));
		}
	}
	public function delete_contact($id){
		// delete a contact
		$this->load->model('Book');
		$this->Book->delete_contact($id);
		redirect(base_url('/Books/index'));

	}
	public function delete_favorite($id){
		// delete a favorite contact
		$this->load->model('Book');
		$this->Book->delete_favorite($id);
		redirect(base_url('/Books/index'));
	}
	
}
