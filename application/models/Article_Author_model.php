<?php

class Article_Author_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        // Load the database library automatically within the constructor
        $this->load->database();
    }

    // Method to fetch article authors
    public function get_article_authors()
    {
        $query = $this->db->get('article_author');
        return $query->result_array(); // Return result as array
    }

    // Method to add article author relationship
    public function add_article($data)
    {
        $insert = $this->db->insert("article_author", $data);
        return $insert ? true : false; // Return boolean based on success
    }

    // Method to get articles by volume ID
    public function getArticlesById($volumeId)
    {
        $query = $this->db->select('*')
                          ->from('articles')
                          ->where('volumeid', $volumeId)
                          ->get();

        return ($query->num_rows() > 0) ? $query->result_array() : array();
    }

    // Method to update article author relationship
    public function update_article_author($articleId, $data)
    {
        $update = $this->db->set($data)
                           ->where('article_id', $articleId)
                           ->update('article_author');

        return $update ? true : false; // Return boolean based on success
    }
    
}
