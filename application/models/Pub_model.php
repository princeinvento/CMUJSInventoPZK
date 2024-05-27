<?php
class pub_model extends CI_Model {
    public function get_published_article() {
        $this->db->where('published', 1); // Filter by published volumes
        $query = $this->db->get('volume');
        $volumes = $query->result_array();
    
        return $volumes;
    }
//  get all articles from articles where volumeid from volume is equal to volume vol_id and published = 1
    public function get_published(){
            // Select all columns from the articles table
            $this->db->select('articles.*, users.complete_name as author_name');
            // From the articles table
            $this->db->from('articles');
            // Join the volume table where volumeid in articles matches vol_id in volume
            $this->db->join('volume', 'volume.vol_id = articles.volumeid');
            // Join the users table to get author information
            $this->db->join('users', 'articles.authorid = users.userid');
            // Where the articles are published
            $this->db->where('volume.published', 1);
            // Execute the query
            $query = $this->db->get();
            // Check if any rows are returned
            if ($query->num_rows() > 0) {
                // Return the result as an array
                return $query->result_array();
            } else {
                // Return false if no rows are returned
                return false;
            }
    }

    public function get_volume_by_id($volume_id) {
        $query = $this->db->get_where('volume', array('vol_id' => $volume_id));
        return $query->row_array(); // Return volume details as an array
    }

    public function get_articles_by_volume_id($volume_id) {
        // Select all columns from the articles table
        $this->db->select('articles.*, users.complete_name as author_name');
        // From the articles table
        $this->db->from('articles');
        // Join the volume table where volumeid in articles matches vol_id in volume
        $this->db->join('volume', 'volume.vol_id = articles.volumeid');
        // Join the users table to get author information
        $this->db->join('users', 'articles.authorid = users.userid');
        // Where the volume ID matches the provided volume ID
        $this->db->where('volume.vol_id', $volume_id);
        // Execute the query
        $query = $this->db->get();
        // Check if any rows are returned
        if ($query->num_rows() > 0) {
            // Return the result as an array
            return $query->result_array();
        } else {
            // Return false if no rows are returned
            return false;
        }
    }

    public function get_all_published_archived_volumes(){
        // Select all columns from the articles table
            $this->db->where('published !=', 0); // Filter by published volumes
            $query = $this->db->get('volume');
            $volumes = $query->result_array();
        
            return $volumes;
    }

    public function get_all_published_archived_articles() {
        $this->db->select('articles.*, users.complete_name as author_name');
        // From the articles table
        $this->db->from('articles');
        // Join the volume table where volumeid in articles matches vol_id in volume
        $this->db->join('volume', 'volume.vol_id = articles.volumeid');
        // Join the users table to get author information
        $this->db->join('users', 'articles.authorid = users.userid');
        // Where the articles are published
        $this->db->where('volume.published !=', 0);
        // Execute the query
        $query = $this->db->get();
        // Check if any rows are returned
        if ($query->num_rows() > 0) {
            // Return the result as an array
            return $query->result_array();
        } else {
            // Return false if no rows are returned
            return false;
        }
    }


}
?> 