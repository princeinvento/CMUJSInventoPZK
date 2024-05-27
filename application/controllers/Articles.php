<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->model('volume_model');
        $this->load->model('article_model');
        $this->load->helper('url'); // Load URL helper
        $this->load->library('upload'); // Load Upload library
    }

    public function index(){
        $search = $this->input->get('search'); // Get the search query
        $volume_filter = $this->input->get('volume_filter'); // Get the volume filter value
    
        // Fetch articles based on search query and volume filter
        if ($search || $volume_filter) {
            $data['articles'] = $this->article_model->search_articles($search, $volume_filter);
        } else {
            // Fetch all articles
            $data['articles'] = $this->article_model->fetch_article();
        }
    
        // Fetch volumes to populate the volume filter dropdown
        $data['volumes'] = $this->volume_model->fetch_volume();
    
        // Fetch authors to populate author names in the view
        $data['authors'] = $this->article_model->fetch_authors();
    
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navigation');
        $this->load->view('admin/articles/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function view($id){
        $data['articles'] = $this->article_model->get_specific_article($id);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navigation');
        $this->load->view('admin/articles/view', $data);
        $this->load->view('admin/templates/footer');
    }

    public function add(){
        $data['volumes'] = $this->volume_model->fetch_volume();
        $data['authors'] = $this->article_model->fetch_authors(); // Fetch authors

        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navigation');
        $this->load->view('admin/articles/new', $data);
        $this->load->view('admin/templates/footer');
    }

    public function edit($id){
        $data['volumes'] = $this->volume_model->fetch_volume();
        $data['authors'] = $this->article_model->fetch_authors();

        $data['articles'] = $this->article_model->get_specific_article($id);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navigation');
        $this->load->view('admin/articles/edit', $data);
        $this->load->view('admin/templates/footer');
    }

    public function create_article(){
        // Set validation rules
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('keywords', 'Keywords', 'required');
        $this->form_validation->set_rules('abstract', 'Abstract', 'required');
        $this->form_validation->set_rules('authorid', 'Author', 'required');
        $this->form_validation->set_rules('volumeid', 'Volume', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed
            $this->add();
        } else {
            // File upload configuration
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 500000; // Set a max size for the file (in KB)

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('filename')) {
                // File upload failed
                $data['error'] = $this->upload->display_errors();
                $this->add();
            } else {
                // File upload succeeded
                $fileData = $this->upload->data();
                $data = array(
                    'title' => $this->input->post('title'),
                    'keywords' => $this->input->post('keywords'),
                    'abstract' => $this->input->post('abstract'),
                    'doi' => $this->input->post('doi'),
                    'published' => $this->input->post('published'),
                    'volumeid' => $this->input->post('volumeid'),
                    'authorid' => $this->input->post('authorid'),
                    'filename' => $fileData['file_name']
                );

                // Save article
                $saved = $this->article_model->create_article($data);
                if ($saved) {
                    // Article saved successfully
                    redirect('admin/articles'); // Redirect to a success page or the article listing page
                } else {
                    // Handle error
                }
            }
        }
    }

    public function edit_article(){
        $saved = $this->article_model->edit_article($_POST);
        
        if ($saved) {
            // User saved successfully
            redirect('admin/articles'); // Redirect to a success page or the user listing page
        } else {
            // Handle error
        }
    }

    public function delete($id) {
        $this->article_model->delete_article($id);
        redirect('admin/articles');
    }
}
