<?php
class Author_model extends CI_Model {
    public function fetch_users_authors() {
        // Apply the filter to fetch only users with role value 3
        $this->db->where('role', 2);
        // Order the results by complete_name in ascending order
        $this->db->order_by('complete_name', 'asc');
        // Execute the query on the users table
        $query = $this->db->get('users');
        // Convert the result to an array
        $users = $query->result_array();

        // Return the filtered users
        return $users;
    }

    public function fetch_authors() {
        $this->db->select('user_id, username');
        $this->db->from('users');
        $this->db->where('role', 2); // Assuming role 2 represents authors
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_specific_user($id) {
        $users = $this->db->get_where('users', array('userid' => $id))->row_array();
        return $users;
    }

    public function search_author($search) {
        $this->db->where('role', 2);
        $this->db->like('complete_name', $search);
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function edit_author($data) { 
        $data = array(
            'complete_name' => $this->input->post('complete_name'),
            'email' => $this->input->post('email'),
            'pword' => $this->input->post('pword'),
            'role' => $this->input->post('role'),
            'status' => $this->input->post('status')
        );
        // Insert user data into the database
        $this->db->where('userid', $_POST['userid']);
        $this->db->update('users', $data);
        
        // Check if the insertion was successful
        return $this->db->affected_rows() > 0;
    }

    public function create_author($data) {
        $data = array(
            'complete_name' => $this->input->post('complete_name'),
            'email' => $this->input->post('email'),
            'pword' => $this->input->post('pword'),
            'role' => $this->input->post('role'),
            'status' => $this->input->post('status')
        );
        // Insert user data into the database
        $this->db->insert('users', $data);
        
        // Check if the insertion was successful
        return $this->db->affected_rows() > 0;
    }

    public function delete_author($id) {
        $this->db->where('userid', $id);
        $this->db->delete('users');
        return $this->db->affected_rows() > 0;
    }
}