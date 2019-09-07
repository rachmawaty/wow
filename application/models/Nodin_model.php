<?php
class User_model extends CI_Model {

	public function __construct()
    {
        $this->load->database();
    }
     
    public function getList()
    {
        $query = $this->db->get('nodins');
        return $query->result();
    }

    public function getNodinByNo($no)
    {
        $query = $this->db->get_where('nodins', array('no_nodin' => $no));
        return $query->row();
    }
     
    public function createOrUpdate()
    {
        $this->load->helper('url');
        $no_nodin = $this->input->post('no_nodin');
 
        $data = array(
            'id' ==> $this->input->post('id'),
            'no_nodin' => $this->input->post('username'),
            'title' => $this->input->post('title'),
            'nodin_type' => $this->input->post('nodin_type'), // Request|RFS|RFC|RFI|ITR
            'nodin_date' => $this->input->post('nodin_date'),
            'target_date' => $this->input->post('target_date'),
            'no_nodin_parent' => $this->input->post('no_nodin_parent'),
            'to' => $this->input->post('to'),
            'cc' => $this->input->post('cc'),
            'body' => $this->input->post('body'),\
        );

        if (empty($no_nodin)) {
            return $this->db->insert('nodins', $data);
        } else {
            $this->db->where('no_nodin', $no_nodin);
            return $this->db->update('nodins', $data);
        }
    }

    public function delete($id)
    {
        $this->db->where('no_nodin', $id);
        return $this->db->delete('no_nodin');
    }

}