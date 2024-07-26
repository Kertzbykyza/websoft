<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');


class VolumeController extends CI_Controller
{



	public function view()
	{
		if (!file_exists(APPPATH . 'views/volumes/volumes.php')) {

			show_404();
		}

		$data['volumes'] = $this->volume_model->get_volumes();
		$data['articles'] = $this->article_model->get_articles();

		//Load Page sections header,Main, Footer
		$this->load->view('templates/userHeader');
		$this->load->view('volumes/volumes', $data);
		// $this->load->view('modals/authModal',$data);
		$this->load->view('templates/footer');
	}

	public function create()
	{

		$this->load->view('templates/userHeader');
		$this->load->view('volumes/addVolume');
		$this->load->view('templates/footer');
	}

	public function add()
	{
		// Assume $_POST contains the volume data
		$data = array(
			'vol_name' => $this->input->post('volume_title'),
			'description' => $this->input->post('volume_description'),
			'published' => 0,
			'archived' => 0
		);

		// Attempt to add the volume
		if ($this->volume_model->add_volume($data)) {
			// Redirect to the volumes list after successful addition
			redirect('volumes');
		} else {
			// Show an error message if addition failed
			show_error('Failed to add the volume.');
		}
	}

	public function edit()
	{
		$id = $this->input->get('id');
		// Fetch the volume's data
		$volume = $this->volume_model->get_volume_by_id($id);

		// Check if the volume exists
		if (!$volume) {
			show_404();
		}

		// Load the edit page with the volume's data
		$data['volume'] = $volume;

		$this->load->view('templates/userHeader');
		$this->load->view('volumes/editVolume', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		// Assume $_POST['id'] contains the ID of the volume to be updated
		$id = $this->input->get('id');

		// Validate and sanitize the submitted data
		$data = array(
			'vol_name' => $this->input->post('volume_title'),
			'description' => $this->input->post('volume_description')
		);

		// Attempt to update the volume
		if ($this->volume_model->update_volume($id, $data)) {
			// Redirect to the volumes list after successful update
			redirect('volumes');
		} else {
			// Show an error message if update failed
			show_error('Failed to update the volume.');
		}
	}

	public function delete()
	{

		$id = $this->input->get('id');
		// Attempt to delete the volume
		if ($this->volume_model->delete_volume($id)) {
			// Redirect to the volumes list after successful deletion
			redirect('volumes');
		} else {
			// Show an error message if deletion failed
			show_error('Failed to delete the volume.');
		}
	}

	public function publish()
	{
		$id = $this->input->get('id');
		$this->volume_model->publish_volume($id);

		redirect('volumes');
	}

	public function archive()
	{
		$id = $this->input->get('id');
		// Attempt to archive the volume
		if ($this->volume_model->archive_volume($id)) {
			// Redirect to the volumes list after successful archiving
			redirect('volumes');
		} else {
			// Show an error message if archiving failed
			show_error('Failed to archive the volume.');
		}
	}






}
