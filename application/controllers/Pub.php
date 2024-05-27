<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pub extends CI_Controller {
    public function view($page = "home")
    {
        if (file_exists(APPPATH.'views/pub/'.$page.'.php'))
        {
            $data['volumes'] = $this->pub_model->get_published_article();
            $data['articles'] = $this->pub_model->get_published();
            $this->load->view('templates/header');
            $this->load->view('pub/'.$page, $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/footer');
            $data['title'] = ucfirst($page);
        }
        
        else {
            // Whoops, we don't have a page for that!
            show_404();
        }
    }

    public function current($page = "current")
    {
        if (file_exists(APPPATH.'views/pub/'.$page.'.php'))
        {
            $data['volumes'] = $this->pub_model->get_published_article();
            $data['articles'] = $this->pub_model->get_published();
            $this->load->view('templates/header');
            $this->load->view('pub/'.$page, $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/footer');
            $data['title'] = ucfirst($page);
        }
        
        else {
            // Whoops, we don't have a page for that!
            show_404();
        }
    }

    public function articles($page = "articles")
    {
        if (file_exists(APPPATH.'views/pub/'.$page.'.php'))
        {
            $data['volumes'] = $this->pub_model->get_published_article();
            $data['articles'] = $this->pub_model->get_all_published_archived_articles();
            $this->load->view('templates/header');
            $this->load->view('pub/'.$page, $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/footer');
            $data['title'] = ucfirst($page);
        }
        
        else {
            // Whoops, we don't have a page for that!
            show_404();
        }
    }

    public function archives($page = "archives")
    {
        if (file_exists(APPPATH.'views/pub/'.$page.'.php'))
        {
            $data['volumes'] = $this->pub_model->get_published_article();
            $data['volumesarchived'] = $this->pub_model->get_all_published_archived_volumes();
            $this->load->view('templates/header');
            $this->load->view('pub/'.$page, $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/footer');
            $data['title'] = ucfirst($page);
        }
        
        else {
            // Whoops, we don't have a page for that!
            show_404();
        }
    }

    public function about($page = "about")
    {
        if (file_exists(APPPATH.'views/pub/'.$page.'.php'))
        {
            $data['volumes'] = $this->pub_model->get_published_article();
            $this->load->view('templates/header');
            $this->load->view('pub/'.$page, $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/footer');
            $data['title'] = ucfirst($page);
        }
        
        else {
            // Whoops, we don't have a page for that!
            show_404();
        }
    }
    
    public function article($id) {
        $data['volumes'] = $this->pub_model->get_published_article();
        $data['articles'] = $this->article_model->get_specific_article($id);
        $this->load->view('templates/header');
        $this->load->view('pub/article', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/footer');
    }

    public function volart($id){
        $data['volumes'] = $this->pub_model->get_published_article();
        $data['volume'] = $this->pub_model->get_volume_by_id($id);
        // Get articles for the volume
        $data['articles'] = $this->pub_model->get_articles_by_volume_id($id);
        $this->load->view('templates/header');
        $this->load->view('pub/volumearticle', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/footer');
    }

    public function login($page = "login")
    {
        if (file_exists(APPPATH.'views/pub/'.$page.'.php'))
        {
            $this->load->view('templates/header');
            $this->load->view('pub/'.$page);
            $data['title'] = ucfirst($page);
        }
        
        else {
            // Whoops, we don't have a page for that!
            show_404();
        }
    }
}
?>