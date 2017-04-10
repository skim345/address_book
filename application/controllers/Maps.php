<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maps extends CI_Controller {

	public function index()
	{
		// get all contacts and load on this page
		$this->load->model('Book');
		$contacts['contacts']=$this->Book->get_contacts();
		$this->load->view('map',$contacts);
	}
	public function directions()
	{
		// getting directions from user input
		$post=$this->input->post();
		$full_name=$post['contact'];
		$split= explode(" ",$full_name);
		$first_name= $split[0];
		$last_name=$split[1];
		$this->load->Model('Map');
		$data['single_contact']=$this->Map->get_single_contact($first_name,$last_name);
		$address1=array($data['single_contact']['address1']);
		$address2=array($data['single_contact']['address2']);
		$city=array($data['single_contact']['city']);
		$state=array($data['single_contact']['state']);
		$zip=array($data['single_contact']['zip']);
		
		$combine=array_merge($address1,$address2,$city,$state,$zip);
		$string=implode(" ",$combine);

		$this->load->library('googlemaps');
		$config['zoom'] = 'auto';
		$config['directions'] = TRUE;
		$config['directionsStart'] = $post['starting_address'];
		$config['directionsEnd'] = $string;
		$config['directionsDivID'] = 'directionsDiv';
		$this->googlemaps->initialize($config);
		$data['map'] = $this->googlemaps->create_map();
		$this->load->view('direction', $data);
	}

	
	
}
