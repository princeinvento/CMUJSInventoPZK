<?php
class Users_model extends CI_Model{
    public function fetch_users() {
        $this->db->where('role', 1);
        $this->db->order_by('complete_name', 'asc');
        $query = $this->db->get('users');
        $users = $query->result_array();

        return $users;
    }

    public function search_users($search) {
        $this->db->where('role', 1);
        $this->db->like('complete_name', $search);
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function count_users(){
        $this->db->where('role', 1);
        return $this->db->count_all_results('users');
    }

    public function count_authors(){
        $this->db->where('role', 2);
        return $this->db->count_all_results('users');
    }

    public function get_specific_user($id) {
        $users = $this->db->get_where('users', array('userid' => $id))->row_array();
        return $users;
    }

    public function create_user($data) {
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

    public function edit_user($data) { 
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

    public function delete_user($id) {
        $this->db->where('userid', $id);
        $this->db->delete('users');
        return $this->db->affected_rows() > 0;
    }
}
?>