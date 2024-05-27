<?php
class Volume_model extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

	public function fetch_volume() {
        $this->db->order_by('vol_name', 'asc');
        $query = $this->db->get('volume');
        $volumes = $query->result_array();

        return $volumes;
    }

    public function get_archived_volume_count() {
        $this->db->where('published', 3); // Filter by archived volumes
        $this->db->from('volume');
        return $this->db->count_all_results();
    }

    public function get_published_volumes_with_articles() {
        $this->db->where('published', 1); // Filter by published volumes
        $query = $this->db->get('volume');
        $volumes = $query->result_array();
    
        foreach ($volumes as &$volume) {
            $volume['articles'] = $this->get_articles_by_volume_id($volume['vol_id']);
        }
    
        return $volumes;
    }

    public function fetch_authors() {
        $this->db->select('userid, complete_name');
        $this->db->from('users');
        $this->db->where('role', 2); // Assuming role 2 represents authors
        $query = $this->db->get();
        return $query->result_array();
    }

    public function search_volume($search) {
        $this->db->like('vol_name', $search);
        $query = $this->db->get('volume');
        return $query->result_array();
    }

    public function add_volume($data) {
        $this->db->insert('volume', $data);
    }

    public function update_volume($id, $data) {
        $this->db->where('vol_id', $id);
		$this->db->update('volume', $data);
    }

    public function delete_volume($id) {
        $this->db->where('vol_id', $id);
        $this->db->delete('volume');
        return $this->db->affected_rows() > 0;
    }

    public function get_volume_by_id($id) {
        $volume = $this->db->get_where('volume', array('vol_id' => $id))->row_array();
    
        if ($volume) {
            $volume['articles'] = $this->get_articles_by_volume_id($volume['vol_id']);
        }

        return $volume;
    }

    public function get_volume_by_id_with_raw_articles($id) {
        $volume = $this->db->get_where('volume', array('vol_id' => $id))->row_array();
        if ($volume) {
            $volume['articles'] = $this->get_articles_by_volume_id($volume['vol_id']);
        }
    
        return $volume;
        }

    public function get_articles_by_volume_id($id){
		$query = $this->db->get_where('articles', array('volumeid'=> $id));
		$articles = $query->result_array();
		foreach ($articles as &$article) {
			$articleauthors = $this->get_authors_by_article_id($article['articleid']);
			$article['authors'] = [];
			foreach ($articleauthors as &$author) {
					$article['authors'][] =  $this->get_authors_by_id($author['authid']);
			}
		}
		return $articles;
	}

    public function get_authors_by_article_id($id){
		$query = $this->db->get_where('article_author', array('article_id' => $id));
		return $query->result_array();
	}

    public function get_authors_by_id($id){
		$query = $this->db->get_where('authors', array('author_id'=> $id));
		return $query->row_array();
	}

    public function create_article($data) {
        $data = array(
            'title' => $this->input->post('title'),
            'keywords' => $this->input->post('keywords'),
            'abstract' => $this->input->post('abstract'),
            'doi' => $this->input->post('doi'),
            'published' => $this->input->post('published'),
            'volumeid' => $this->input->post('volumeid'),
            'authorid' => $this->input->post('authorid'), // Set author's ID
            'filename' => $this->input->post('filename')
        );
        // Insert article data into the database
        $this->db->insert('articles', $data);
        
        // Check if the insertion was successful
        return $this->db->affected_rows() > 0;
    }

}

