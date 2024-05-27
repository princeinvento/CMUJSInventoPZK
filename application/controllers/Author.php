<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->model('users_model');
        $this->load->helper('url'); // Load URL helper
    }

    public function index(){
        $search = $this->input->get('search'); // Get the search query

        if ($search) {
            // If there is a search query, fetch articles based on the search query
            $data['users'] = $this->author_model->search_author($search);
        } else {
            // Otherwise, fetch all articles
            $data['users'] = $this->author_model->fetch_users_authors();
        }
    
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navigation');
        $this->load->view('admin/authors/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function add(){
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navigation');
        $this->load->view('admin/authors/new');
        $this->load->view('admin/templates/footer');
    }

    public function view($id){
        $data['users'] = $this->author_model->get_specific_user($id);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navigation');
        $this->load->view('admin/authors/view', $data);
        $this->load->view('admin/templates/footer');
    }

    public function edit($id) {
        $data['users'] = $this->author_model->get_specific_user($id);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navigation');
        $this->load->view('admin/authors/edit', $data);
        $this->load->view('admin/templates/footer');
    }

    public function create_author(){
        $saved = $this->author_model->create_author($_POST);
        
        if ($saved) {
            // User saved successfully
            redirect('admin/authors'); // Redirect to a success page or the user listing page
        } else {
            // Handle error
        }
    }

    
    public function edit_author(){
        $saved = $this->author_model->edit_author($_POST);
        
        if ($saved) {
            // User saved successfully
            redirect('admin/authors'); // Redirect to a success page or the user listing page
        } else {
            // Handle error
        }
    }

    public function delete($id) {
        $this->author_model->delete_author($id);
        redirect('admin/authors');
    }
}