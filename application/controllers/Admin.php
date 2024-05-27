<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function dashboard($page = "dashboard")
{
    if (file_exists(APPPATH.'views/admin/'.$page.'.php'))
    {
        // Fetch the count of registered users
        $data['cusers'] = $this->users_model->count_users();
        $data['cauthors'] = $this->users_model->count_authors();
        
        // Fetch the count of published articles
        $data['pubart'] = $this->article_model->count_published_articles();

        $data['archived'] = $this->volume_model->get_archived_volume_count();

        // Fetch the articles of published volumes
        $data['published_volumes'] = $this->volume_model->get_published_volumes_with_articles();

             $data['articles'] = $this->article_model->fetch_article();
             $data['volumes'] = $this->volume_model->fetch_volume();
             $data['authors'] = $this->article_model->fetch_authors();

        // Load the dashboard view with the data
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navigation');
        $this->load->view('admin/'.$page, $data);
        $this->load->view('admin/templates/footer');
        $data['title'] = ucfirst($page);
    }
    
    else {
        // Whoops, we don't have a page for that!
        show_404();
    }
}

}
?>
