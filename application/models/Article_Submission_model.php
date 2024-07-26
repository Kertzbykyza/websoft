<?php


class Article_Submission_model extends CI_Model
{
	// Model constructor


	// Method to fetch users based on a condition
	public function get_article_submissions()
	{
		$this->db->get("article_submission");

		return $this->db->get('article_submission')->result_array(); // Assuming 'users' is your table name
	}

	public function add_article_submission($data)
    {
        // Check if the $data array is not empty
        if (!empty($data)) {
            // Insert the data into the 'article_submission' table
            if ($this->db->insert('article_submission', $data)) {
                // Return the ID of the newly inserted article submission
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


	public function getArticleSubmissionById($id)
	{
		$this->db->where('submission_id', $id);
		$query = $this->db->get('article_submission');

		// Check if any results were returned
		if ($query->num_rows() > 0) {
			// Fetch the first result as an associative array
			$row = $query->row_array();

			// Convert the row array to an associative array
			$article = (array) $row;

			return $article;
		} else {
			// Return an empty array if no results were found
			return array();
		}

	}

	public function update_article_submission($id, $data)
	{
		// Check if the ID exists
		if ($id != null && $id != '') {
			// Prepare the update query
			$this->db->where('submission_id', $id);
			// Execute the update
			if ($this->db->update('article_submission', $data)) {
				// Return true if the update was successful
				return true;
			}
		}
		// Return false if the ID does not exist or the update failed
		return false;
	}

	public function delete_article_submission($id)
	{
		// Check if the ID exists
		if ($id != null && $id != '') {
			// Prepare the deletion query
			$this->db->where('submission_id', $id);
			// Execute the deletion
			if ($this->db->delete('article_submission')) {
				// Return true if the deletion was successful
				return true;
			}
		}
		// Return false if the ID does not exist or the deletion failed
		return false;
	}


	public function publishArticle($id)
	{
		$this->db->where('submission_id', $id);
		return $this->db->update('article_submission', array('published' => 1));

	}
}
