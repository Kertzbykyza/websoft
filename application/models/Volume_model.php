<?php


class Volume_model extends CI_Model
{
	// Model constructor


	// Method to fetch users based on a condition
	public function get_volumes()
	{
		$this->db->get("volume");
		$this->db->order_by('volumeid', 'desc');

		return $this->db->get('volume')->result_array(); // Assuming 'users' is your table name
	}

	public function get_volume_by_id($id)
	{
		// Check if the ID exists
		if ($id != null && $id != '') {
			// Prepare the selection query
			$this->db->where('volumeid', $id); // Assuming 'id' is the primary key of your volume table
			// Execute the query
			$query = $this->db->get('volume');
			// Check if any results were returned
			if ($query->num_rows() > 0) {
				// Fetch the first result as an associative array
				$row = $query->row_array();
				// Return the volume data
				return $row;
			}
		}
		// Return an empty array if no results were found
		return array();
	}


	public function add_volume($data)
	{
		// Check if the $data array is not empty
		if (!empty($data)) {
			// Attempt to insert the volume into the 'volume' table
			if ($this->db->insert('volume', $data)) {
				// On successful insertion, return the ID of the newly inserted volume
				return $this->db->insert_id();
			} else {
				// Return false if the insert operation fails
				return false;
			}
		} else {
			// Return a message if no data was provided
			return 'No data provided to insert';
		}
	}

	public function update_volume($id, $data)
	{
		// Check if the ID exists
		if ($id != null && $id != '') {
			// Prepare the update query
			$this->db->where('volumeid', $id); // Assuming 'id' is the primary key of your volume table
			// Execute the update
			if ($this->db->update('volume', $data)) {
				// Return true if the update was successful
				return true;
			}
		}
		// Return false if the ID does not exist or the update failed
		return false;
	}

	public function delete_volume($id)
	{
		// Check if the ID exists
		if ($id != null && $id != '') {
			// Prepare the deletion query
			$this->db->where('volumeid', $id); // Assuming 'id' is the primary key of your volume table
			// Execute the deletion
			if ($this->db->delete('volume')) {
				// Return true if the deletion was successful
				return true;
			}
		}
		// Return false if the ID does not exist or the deletion failed
		return false;
	}

	public function publish_volume($id)
	{
		// Check if the ID exists
		if ($id != null && $id != '') {
			// Prepare the update query to set the volume as published
			$this->db->set('published', TRUE); // Set the published flag to TRUE
			$this->db->where('volumeid', $id); // Assuming 'id' is the primary key of your volume table 
			
			// Execute the update
			if ($this->db->update('volume')) {
				// Return true if the update was successful
				return true;
			}
		}
		// Return false if the ID does not exist or the update failed
		return false;
	}

	public function archive_volume($id)
    {
		if ($id != null && $id != '') {
			// Prepare the update query to set the volume as published
			$this->db->set('archived', TRUE); // Set the published flag to TRUE
			$this->db->set('published', FALSE);
			$this->db->where('volumeid', $id); // Assuming 'id' is the primary key of your volume table
			// Execute the update
			if ($this->db->update('volume')) {
				// Return true if the update was successful
				return true;
			}
		}
		// Return false if the ID does not exist or the update failed
		return false;
    }



}
