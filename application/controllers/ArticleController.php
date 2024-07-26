<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ArticleController extends CI_Controller
{

	public function view($page = 'articles')
	{
		if (!file_exists(APPPATH . 'views/articles/' . $page . '.php')) {
			show_404();
		}

		$data['articles'] = $this->article_model->get_articles();
		$data['volumes'] = $this->volume_model->get_volumes();
		$data['submission'] = $this->article_submission_model->get_article_submissions();
		$data['authors'] = $this->author_model->get_authors();
		$data['article_authors'] = $this->article_author_model->get_article_authors();
		$data['keywords'] = $this->article_submission_model->get_article_submissions();

		$data['title'] = ucfirst($page); // Capitalize the first letter

		// Load Page sections header, Main, Footer
		$this->load->view('templates/userHeader', $data);
		$this->load->view('articles/' . $page, $data);
		$this->load->view('templates/footer', $data);
	}

	public function create_article()
	{
		$data['volumes'] = $this->volume_model->get_volumes();
		$data['authors'] = $this->author_model->get_authors();

		$this->load->view('templates/userHeader');
		$this->load->view('articles/addSubmission', $data);
		$this->load->view('templates/footer');
	}

	public function submit_article()
	{
		// Get selected authors as an array
		$authors = $this->input->post('authors');
		

		// Initialize an empty array to store author IDs
		$author_ids = array();

		// Check if $authors is an array and not empty
		if (is_array($authors) && !empty($authors)) {
			// Loop through each author array and extract the author ID
			foreach ($authors as $author) {
				// Check if 'auid' key exists in $author
				if (isset($author['auid'])) {
					$author_ids[] = $author['auid'];
				}
			}
		}

		// Prepare data to be inserted into the database
		$data = array(
			'title' => $this->input->post('title'),
			'abstract' => $this->input->post('abstract'),
			'filename' => $this->input->post('filename'),
			'volumeid' => $this->input->post('volumeid'),
			'keywords' => $this->input->post('keywords'), 
			'published' => 0 
		);

		// Call the model method to add article submission to the database
		$articleID = $this->article_submission_model->add_article_submission($data);

		if (is_array($author_ids)) {
			foreach ($author_ids as $auid) {
				$authorData = array(
					'article_id' => $articleID,
					'audid' => $auid
				);
				$this->article_author_model->add_article($authorData);
			}
		}

		// Redirect to articles page after submission
		redirect('articles');
	}


	public function edit()
	{
		$id = $this->input->get('id');
		$article = $this->article_model->get_article_by_id($id);
		$data['article'] = $article;
		$data['volumes'] = $this->volume_model->get_volumes();
		$data['authors'] = $this->author_model->get_authors();
		$data['articleid'] = $id; // Pass the article ID to the view
		$data['author_article'] = $this->article_author_model->get_article_authors();
		$data['keywords'] = $this->article_submission_model->get_article_submissions();

		$this->load->view('templates/userHeader');
		$this->load->view('articles/editarticle', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$id = $this->input->post('articleid'); // Retrieve the article ID from POST data
		$data = array(
			'title' => $this->input->post('title'),
			'abstract' => $this->input->post('abstract'),
			'filename' => $this->input->post('filename'),
			'volumeid' => $this->input->post('volumeid'),
			'keywords' => $this->input->post('keywords'),

		);

		if ($this->article_model->update_article($id, $data)) {
			$authorData = array(
				'audid' => $this->input->post("author")
			);
			$author_id = $this->input->post("article_autor_id");
			$this->article_author_model->update_article_author($author_id, $authorData);
			redirect('articles');
		} else {
			redirect('articles/error');
		}
	}

	public function delete()
	{
		$id = $this->input->get('id');
		$this->article_model->delete_article($id);
		redirect('articles');
	}

	public function publishArticle()
	{
		$id = $this->input->get('id');
		$article = $this->article_submission_model->getArticleSubmissionById($id);

		// Mark the article as published
		$this->article_submission_model->publishArticle($id);

		// Prepare data to be inserted into the articles table
		$data = array(
			'title' => $article['title'],
			'abstract' => $article['abstract'],
			'filename' => $article['filename'],
			'volumeid' => $article['volumeid'],
			'keywords' => $article['keywords']

		);
		// Add the article to the articles table and get the new article ID
		$articleID = $this->article_model->add_article($data);

		$authorData = array(
			'article_id' => $articleID,
		);
		$this->article_author_model->update_article_author($article["submission_id"], $authorData);
		// Redirect to articles page
		redirect('articles');
	}

	public function edit_submission()
	{
		$id = $this->input->get('id');
		$article = $this->article_submission_model->getArticleSubmissionById($id);
		$data['article'] = $article;
		$data['volumes'] = $this->volume_model->get_volumes();
		$data['authors'] = $this->author_model->get_authors();

		$this->load->view('templates/userHeader');
		$this->load->view('articles/editarticle', $data);
		$this->load->view('templates/footer');
	}

	public function update_submission()
	{
		$id = $this->input->get('id');
		$data = array(
			'title' => $this->input->post('title'),
			'abstract' => $this->input->post('abstract'),
			'filename' => $this->input->post('filename'),
			'volumeid' => $this->input->post('volumeid'),
		);

		$this->article_submission_model->update_article_submission($id, $data);
		redirect('articles');
	}

	public function delete_submission()
	{
		$id = $this->input->get('id');
		if ($this->article_submission_model->delete_article_submission($id)) {
			redirect('articles');
		} else {
			redirect('some_error_page');
		}
	}
}
