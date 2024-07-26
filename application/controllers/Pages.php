<?php

class Pages extends CI_Controller
{

    

    public function view($page = "home")
    {
        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

      
		$data['articles'] = $this->article_model->get_articles();
		$data['authors'] = $this->author_model->get_authors();
		$data['volumes'] = $this->volume_model->get_volumes();
		
		$data['article_authors'] = $this->article_author_model->get_article_authors();
        // $data['title'] = ucfirst($page); // Capitalize the first letter
        //Load Page sections header,Main, Footer
        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $page, $data);
        // $this->load->view('modals/authModal',$data);
        // $this->load->view('templates/footer', $data);

		// var_dump($data);
    }

}
