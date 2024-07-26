<?php


class Archive_model extends CI_Model
{
	// Model constructor


	// Method to fetch users based on a condition
	public function get_archives()
	{
		$this->db->select('*');
		$this->db->from('volume');
		$this->db->where('archived', true);
		
		// Execute the query
		$query = $this->db->get();
		

		// Check if any results were returned
		if ($query->num_rows() > 0) {
			// Return the result as an array of objects
			return $query->result_array();
		} else {
			// Return an empty array if no results were found
			return array();
		}
	}

	public function add_article($data)
	{
		// Check if the $data array is not empty
		if (!empty($data)) {
			// Insert the data into the 'articles' table
			if ($this->db->insert('articles', $data)) {
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


	public function getArticlesById($id)
	{
		$this->db->select('*');
		$this->db->from('articles');
		$this->db->where('volumeid', $id);

		$query = $this->db->get();

		// Check if any results were returned
		if ($query->num_rows() > 0) {
			// Return the result as an array of objects
			return $query->result_array();
		} else {
			// Return an empty array if no results were found
			return array();
		}


	}
}
