<?php


class Article_model extends CI_Model
{
	// Model constructor


	// Method to fetch users based on a condition
	public function get_articles()
	{
		$this->db->get("articles");
		$this->db->order_by('articleid', 'desc');

		return $this->db->get('articles')->result_array(); // Assuming 'users' is your table name
	}

	public function get_article_by_id($id)
	{
		$this->db->where('articleid', $id);
		$query = $this->db->get('articles');

		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
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

	public function update_article($id, $data)
	{
		$this->db->where('articleid', $id);
		if ($this->db->update('articles', $data)) {
			return true;
		} else {
			return false;
		}
	}


	public function delete_article($id)
	{
		// Check if the ID exists
		if ($id != null && $id != '') {
			// Prepare the deletion query
			$this->db->where('articleid', $id);
			// Execute the deletion
			$this->db->delete('articles');
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
