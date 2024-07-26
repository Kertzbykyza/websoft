<?php


class User_model extends CI_Model
{
	// Model constructor
	public function __construct()
	{
		// $this->load->database(); // Load the database library
	}

	// Method to fetch users based on a condition
	public function get_users()
	{
		$this->db->get("users");

		return $this->db->get('users')->result_array(); // Assuming 'users' is your table name
	}

	public function get_user_by_id($id)
	{
		$this->db->where('userid', $id);
		$query = $this->db->get('users');
		return $query->row_array();
	}


	public function add_user($data)
	{


		if (!empty($data)) {
			// Insert the data into the 'articles' table
			if ($this->db->insert('users', $data)) {
				// Return the ID of the newly inserted article
				return $this->db->insert_id();
			} else {
				// Return false if the insert operation failed
				return false;
			}
		} else {
			// Return a message if no data was provided
			return 'No data provided to insert';
		}
	}

	public function update_user($id, $data)
	{
		$this->db->where('userid', $id);
		return $this->db->update('users', $data);
	}


	public function delete_user($id)
	{
		// Delete the user with the given ID
		$this->db->where('userid', $id);
		return $this->db->delete('users');
	}

}
