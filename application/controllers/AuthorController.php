<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');


class AuthorController extends CI_Controller
{



	// public function view($page= 'authors')
	// {
	//     if (!file_exists(APPPATH . 'views/user/' . $page . '.php')) {

	//         show_404();
	//     }

	//     $data['authors'] = $this->author_model->get_authors();

	//     $data['title'] = ucfirst($page); // Capitalize the first letter
	//     //Load Page sections header,Main, Footer
	//     $this->load->view('templates/userHeader', $data);
	//     $this->load->view('user/' . $page, $data);
	//     // $this->load->view('modals/authModal',$data);
	//     $this->load->view('templates/footer', $data);
	// }

	// public function add($data)
	// {
	// $data = array(
	//     'complete_name' => 'John Dy',
	//     'email' => 'john.doe@example.com',
	//     'password' => 'password1',
	// );

	// // Call the model's add_user method
	// $this->user_model->add_user($data);
	// redirect('user');
	// }

	public function edit()
	{
		$id = $this->input->get("id");
		// Fetch the author's data
		$author = $this->author_model->get_author_by_id($id);

		// Check if the author exists
		if (!$author) {
			show_404();
		}

		// Load the edit page with the author's data
		$data['author'] = $author;
		$data['title'] = 'Edit Author';

		$this->load->view('templates/userHeader');
		$this->load->view('user/edituser', $data);
		$this->load->view('templates/userFooter');
	}

	public function update()
	{
		// Assume $_POST['id'] contains the ID of the author to be updated
		$id = $this->input->get('id');
		$complete_name = $this->input->post('completeName');
		$email = $this->input->post('email');
		$contact = $this->input->post('contact_num');
		$title = $this->input->post('title');

		// Validate and sanitize the submitted data
		$authordata = array(
			'author_name' => $complete_name,
			'email' => $email,
			'contact_num' => $contact,
			'title' => $title
		);

		$this->author_model->update_author($id, $authordata);
		redirect('user');

	}



	public function delete()
	{
		$id = $this->input->get('id');
		// Attempt to delete the author
		if ($this->author_model->delete_author($id)) {
			// Redirect to the authors list after successful deletion
			redirect('user');
		} else {
			// Show an error message if deletion failed
			show_error('Failed to delete the author.');
		}
	}


}
