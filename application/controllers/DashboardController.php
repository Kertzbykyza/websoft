<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


class DashboardController extends CI_Controller
{



    public function index()
    {
        if (!file_exists(APPPATH . 'views/dashboard/dashboard.php')) {
			
            show_404();
        }

        $data['articles'] = $this->article_model->get_articles();
		$data['article_count'] = count($data['articles']);
		$authors = count($this->author_model->get_authors());
		$users = count($this->user_model->get_users());
		$data['user_count'] = $users + $authors;


		

        //Load Page sections header,Main, Footer
        $this->load->view('templates/userHeader', $data);
        $this->load->view('dashboard/dashboard' , $data);
        // $this->load->view('modals/authModal',$data);
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
