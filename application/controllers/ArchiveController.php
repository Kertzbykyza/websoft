<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class ArchiveController extends CI_Controller
{
    public function view()
    {
        if (!file_exists(APPPATH . 'views/archives/archives.php')) {
            show_404();
        }

        $this->load->model('archive_model');
        $this->load->model('article_model');
        
        $data['volumes'] = $this->archive_model->get_archives();
        $data['articles'] = $this->article_model->get_articles();

        // Load Page sections header, Main, Footer
        $this->load->view('templates/userHeader', $data);
        $this->load->view('archives/archives', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add($data)
    {
        // $data = array(
        //     'complete_name' => 'John Dy',
        //     'email' => 'john.doe@example.com',
        //     'password' => 'password1',
        // );

        // // Call the model's add_user method
        // $this->user_model->add_user($data);
        // redirect('user');
    }
}
