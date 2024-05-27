<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->model('users_model');
        $this->load->helper('url'); // Load URL helper
    }
    public function index(){
        $search = $this->input->get('search'); // Get the search query

        if ($search) {
            $data['users'] = $this->users_model->search_users($search);
        } else {
            $data['users'] = $this->users_model->fetch_users();
        }
    
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navigation');
        $this->load->view('admin/users/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function add() {
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navigation');
        $this->load->view('admin/users/new');
        $this->load->view('admin/templates/footer');
    }

    public function view($id){
        $data['users'] = $this->users_model->get_specific_user($id);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navigation');
        $this->load->view('admin/users/view', $data);
        $this->load->view('admin/templates/footer');
    }

    public function edit($id){
        $data['users'] = $this->users_model->get_specific_user($id);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navigation');
        $this->load->view('admin/users/edit', $data);
        $this->load->view('admin/templates/footer');
    }

    public function create_user(){
        $saved = $this->users_model->create_user($_POST);
        
        if ($saved) {
            // User saved successfully
            redirect('admin/users'); // Redirect to a success page or the user listing page
        } else {
            // Handle error
        }
    }

    public function edit_user(){
        $saved = $this->users_model->edit_user($_POST);
        
        if ($saved) {
            // User saved successfully
            redirect('admin/users'); // Redirect to a success page or the user listing page
        } else {
            // Handle error
        }
    }

    public function delete($id) {
        $this->users_model->delete_user($id);
        redirect('admin/users');
    }
}