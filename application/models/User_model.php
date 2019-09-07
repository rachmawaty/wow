<?php
class User_model extends CI_Model {

	public function __construct()
    {
        $this->load->database();
    }
     
    public function getUsers()
    {
        $query = $this->db->get('users');
        return $query->result();
    }

    public function getUserByUsername($id)
    {
        $query = $this->db->get_where('users', array('username' => $id));
        return $query->row();
    }
     
    public function createOrUpdate()
    {
        $this->load->helper('url');
        $username = $this->input->post('username');
 
        $data = array(
            'username' => $this->input->post('username'),
            'department' => $this->input->post('department')
        );
        if (empty($id)) {
            return $this->db->insert('users', $data);
        } else {
            $this->db->where('username', $username);
            return $this->db->update('users', $data);
        }
    }

    public function delete($id)
    {
        $this->db->where('username', $id);
        return $this->db->delete('users');
    }

}