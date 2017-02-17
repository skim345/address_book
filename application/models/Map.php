<?php 

class Map extends CI_Model 

{
	public function get_single_contact($first_name, $last_name)
	{
		$query= "SELECT * FROM contacts 
				WHERE contacts.first_name=?
				AND contacts.last_name=?";
		$values=array($first_name, $last_name);
		return $this->db->query($query,$values)->row_array();
	}
	

}





 ?>
