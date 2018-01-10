<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register_model extends CI_Model {

	public function insertUser($data)
	{
		// insert data to the database
		$this->db->insert('users', $data);
	}

}

/* End of file Register_model.php */
/* Location: ./application/models/Register_model.php */