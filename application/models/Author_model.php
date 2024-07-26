<?php


class Author_model extends CI_Model
{
	// Model constructor

	public function get_authors()
	{
		$query = $this->db->get("authors");
		return $query->result_array();
	}
		public function add_article_author($data)
		{
			return $this->db->insert('article_author', $data);
		}
	
		public function get_authors_by_submission_id($submission_id)
		{
			$this->db->select('auid');
			$this->db->from('article_author');
			$this->db->where('submission_id', $submission_id);
			$query = $this->db->get();
			return array_column($query->result_array(), 'auid');
		}
	
		public function update_article_author($author_id, $data)
		{
			$this->db->where('id', $author_id);
			return $this->db->update('article_author', $data);
		}
	
		public function get_article_authors()
		{
			// Implement method to fetch article authors
		}
	
	public function get_author_by_id($id)
	{
		// Check if the ID exists
		if ($id != null && $id != '') {
			// Prepare the selection query
			$this->db->where('auid', $id); // Assuming 'id' is the primary key of your authors table
			// Execute the query
			$query = $this->db->get('authors');
			// Check if any results were returned
			if ($query->num_rows() > 0) {
				// Fetch the first result as an associative array
				$row = $query->row_array();
				// Return the author data
				return $row;
			}
		}
		// Return an empty array if no results were found
		return array();
	}


	public function update_author($id, $data)
	{
		// Check if the ID exists
		if ($id != null && $id != '') {
			// Prepare the update query
			$this->db->where('auid', $id); // Assuming 'id' is the primary key of your authors table
			// Execute the update
			if ($this->db->update('authors', $data)) {
				// Return true if the update was successful
				return true;
			}
		}
		// Return false if the ID does not exist or the update failed
		return false;
	}

	public function delete_author($id)
	{
		// Check if the ID exists
		if ($id != null && $id != '') {
			// Prepare the deletion query
			$this->db->where('auid', $id); // Assuming 'id' is the primary key of your authors table
			// Execute the deletion
			if ($this->db->delete('authors')) {
				// Return true if the deletion was successful
				return true;
			}
		}
		// Return false if the ID does not exist or the deletion failed
		return false;
	}
	public function add_author($authorData) {
        $query = $this->db->insert('authors', $authorData);
        return $query ? true : false;
    }


}
