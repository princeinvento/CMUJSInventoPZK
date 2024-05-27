<?php
class Article_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function fetch_article() {
        $this->db->select('articles.*, volume.vol_name');
        $this->db->from('articles');
        $this->db->join('volume', 'articles.volumeid = volume.vol_id');
        $this->db->order_by('articles.title', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetch_authors() {
        $this->db->select('userid, complete_name');
        $this->db->from('users');
        $this->db->where('role', 2); // Assuming role 2 represents authors
        $query = $this->db->get();
        return $query->result_array();
    }

    public function search_articles($search, $volume_filter) {
        $this->db->select('articles.*, volume.vol_name');
        $this->db->from('articles');
        $this->db->join('volume', 'articles.volumeid = volume.vol_id');
        $this->db->group_start();
        $this->db->like('articles.title', $search);
        $this->db->or_like('articles.keywords', $search);
        $this->db->group_end();
        
        // Apply volume filter if provided
        if ($volume_filter) {
            $this->db->where('articles.volumeid', $volume_filter);
        }
        
        $this->db->order_by('articles.title', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function count_published_articles() {
        $this->db->where('published', 1); // Adding where clause to filter published articles
        $this->db->from('articles');
        return $this->db->count_all_results(); // Counting the results
    }

    public function count_unpublished_articles() {
        $this->db->where('published', 0); // Adding where clause to filter published articles
        $this->db->from('articles');
        return $this->db->count_all_results(); // Counting the results
    }

    public function get_specific_article($id) {
        $this->db->select('articles.*, GROUP_CONCAT(users.complete_name) as authors');
        $this->db->from('articles');
        $this->db->join('users', 'articles.authorid = users.userid');
        $this->db->where('articles.articleid', $id);
        $this->db->where('users.role', 2); // Fetch only authors
        $query = $this->db->get();
    
        return $query->row_array();
    }

    public function add_article($data) {
        $this->db->insert('article', $data);
    }

    public function create_article($data) {
        // Insert article data into the database
        $this->db->insert('articles', $data);
        
        // Check if the insertion was successful
        return $this->db->affected_rows() > 0;
    }

    public function edit_article($data) {
        $articleid = array(
            'articleid' => $this->input->post('articleid')
        );
        $data = array(
            'title' => $this->input->post('title'),
            'keywords' => $this->input->post('keywords'),
            'abstract' => $this->input->post('abstract'),
            'doi' => $this->input->post('doi'),
            'published' => $this->input->post('published'),
            'volumeid' => $this->input->post('volumeid'),
            'authorid' => $this->input->post('authorid'),
        );
        // Insert user data into the database
        $this->db->where('articleid', $_POST['articleid']);
        $this->db->update('articles', $data);

        // Check if the insertion was successful
        return $this->db->affected_rows() > 0;
    }


    public function delete_article($id) {
        $this->db->where('articleid', $id);
        $this->db->delete('articles');
        return $this->db->affected_rows() > 0;
    }
}

?>