<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Volumes extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->model('volume_model');
        $this->load->helper('url'); // Load URL helper
    }

    public function index(){
        $search = $this->input->get('search'); // Get the search query

        if ($search) {
            // If there is a search query, fetch articles based on the search query
            $data['volumes'] = $this->volume_model->search_volume($search);
        } else {
            // Otherwise, fetch all articles
            $data['volumes'] = $this->volume_model->fetch_volume();
        }

        $data['authors'] = $this->article_model->fetch_authors();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navigation');
        $this->load->view('admin/volumes/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function add(){
        $this->form_validation->set_rules('vol_name', 'Volume Name', 'required');
    	$this->form_validation->set_rules('description', 'Volume Description', 'required');
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('admin/templates/header');
            $this->load->view('admin/templates/navigation');
            $this->load->view('admin/volumes/new');
            $this->load->view('admin/templates/footer');
		} else {
			$data = array (
				'vol_name'=> $this->input->post('vol_name'),
				'description'=> $this->input->post('description'),
				'published' => $this->input->post('published') ? 1 : 0, 
				'archived' => $this->input->post('archived') ? 1 : 0, 
			);

			$this->volume_model->add_volume($data);

			redirect('volumes');
		}
    }

    public function view($id){
        $data['authors'] = $this->volume_model->fetch_authors();
        $data['volume'] = $this->volume_model->get_volume_by_id_with_raw_articles($id);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navigation');
        $this->load->view('admin/volumes/view', $data);
        $this->load->view('admin/templates/footer');
    }

    public function edit($id) {
        $data['volume'] = $this->volume_model->get_volume_by_id($id);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navigation');
        $this->load->view('admin/volumes/edit', $data);
        $this->load->view('admin/templates/footer');
    }

    public function delete($id) {
        $this->volume_model->delete_volume($id);
        redirect('volumes');
    }

    public function update_volume($id) {
        $this->form_validation->set_rules('vol_name', 'Volume Name', 'required');
        $this->form_validation->set_rules('description', 'Volume Description', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['volume'] = $this->volume_model->get_volume_by_id($id);
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/navigation');
            $this->load->view('admin/volumes/edit', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = array(
                'vol_name' => $this->input->post('vol_name'),
                'description' => $this->input->post('description'),
            );
            $this->volume_model->update_volume($id, $data);
            redirect('volumes');
        }
    }

    public function publish($id) {
        $this->volume_model->update_volume($id, array('published' => 1, 'archived' => 0));
        redirect('volumes');
    }

    public function unpublish($id) {
        $this->volume_model->update_volume($id, array('published' => 0, 'archived' => 1));
        redirect('volumes');
    }

    public function archive($id) {
        $this->volume_model->update_volume($id, array('published' => 3, 'archived' => 1));
        redirect('volumes');
    }

    public function addarticle($id){
        $volumeId = $this->uri->segment(3);
        $data['volumeid'] = $volumeId;
        $data['authors'] = $this->article_model->fetch_authors(); // Fetch authors

        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/navigation');
        $this->load->view('admin/volumes/addarticle', $data);
        $this->load->view('admin/templates/footer');
    }

    public function create_article(){
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
                    redirect('volumes'); // Redirect to a success page or the article listing page
                } else {
                    // Handle error
                }
            }
        }
    }

}