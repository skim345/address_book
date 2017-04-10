<?php 

class Book extends CI_Model 

{
	public function get_contacts()
	{
		$query= "SELECT * FROM contacts 
				ORDER BY last_name ASC";
		return $this->db->query($query)->result_array();
	}
	public function get_favorites()
	{
		$query="SELECT contacts.id,
				contacts.first_name, 
				contacts.last_name, 
				contacts.phone, 
				contacts.email, 
				contacts.address1, 
				contacts.address2, 
				contacts.city, 
				contacts.state, 
				contacts.zip 
				FROM contacts 
				JOIN favorites 
				ON contacts.id=favorites.contact_id
				ORDER BY last_name ASC";
		return $this->db->query($query)->result_array();
	}
	public function add_favs($contact_id, $user_id){
		$query= "INSERT INTO favorites
				(user_id,
				contact_id,
				created_at,
				updated_at)
				VALUES(?,?,NOW(),NOW())";
		$values=array($user_id,$contact_id);
		$this->db->query($query,$values);
	}
	public function contact_validate($post)
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("first_name", "First Name", "trim|required");
		$this->form_validation->set_rules("last_name", "Last Name", "trim|required");
		$this->form_validation->set_rules("phone", "Phone Number", "trim");
		$this->form_validation->set_rules("address1", "Address", "trim");
		$this->form_validation->set_rules("address2", "Address cont", "trim");
		$this->form_validation->set_rules("city", "City", "trim");
		$this->form_validation->set_rules("state", "State", "trim|strtoupper");
		$this->form_validation->set_rules("zip", "Zip Code", "trim|numeric");
		if($this->form_validation->run())
		{
			// if validation rules passes, then okay to move forward
			return "valid";
		}
		else
		{
			// not all rules were met for validation
			return array(validation_errors());
		}
	}
	public function add_contact($post,$id)
	{
		$query= "INSERT INTO contacts
				(first_name, 
				last_name, 
				phone, 
				email, 
				address1, 
				address2, 
				city, 
				state, 
				zip, 
				created_at, 
				updated_at,
				user_id) 
				VALUES (?,?,?,?,?,?,?,?,?,NOW(), NOW(),?)";
		$values= array($post['first_name'],
				$post['last_name'],
				$post['phone'],
				$post['email'],
				$post['address1'],
				$post['address2'],
				$post['city'],
				$post['state'],
				$post['zip'],
				$id);
		$this->db->query($query, $values);
	}
	public function delete_contact($id)
	{
		$query="DELETE FROM contacts
				WHERE contacts.id=?";
		$values=array($id);
		$this->db->query($query, $values);
	}
	public function delete_favorite($id){
		$query="DELETE FROM favorites WHERE favorites.contact_id=?";
		$values=array($id);
		$this->db->query($query,$values);
	}

}






 ?>
