<?php 

class Main extends CI_Model 

{
	public function login_validate($post)
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("email", "Email", "trim|valid_email|required");
		$this->form_validation->set_rules("password", "Password", "trim|required");
		if($this->form_validation->run())
		{
			return "valid";
		}
		else
		{
			return array(validation_errors());
		}
	}
	public function check_user($email,$password)
	{
		$query="SELECT * FROM users 
				WHERE users.email=? 
				AND users.password=?";
		$values=array($email,$password);
		$check=$this->db->query($query,$values)->row_array();
		if(empty($check))
		{
			// no user has been found. ok to create
			return TRUE;
		}
		else
		{
			// user has been found
			return FALSE;
		}
	}

}






 ?>
