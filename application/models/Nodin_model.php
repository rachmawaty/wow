<?php
class Nodin_model extends CI_Model {

	public function __construct()
    {
        $this->load->database();
    }
     
    public function getList()
    {
        $query = $this->db->get('nodins');
        return $query->result();
    }

    public function getNodinByNo($no_nodin)
    {
        $query = $this->db->get_where('nodins', array('no_nodin' => $no_nodin));
        return $query->row();
    }

    public function getAllParents()
    {
        $query = $this->db->get_where('nodins', 'no_nodin_parent'); //no_nodin_parent is null

        return $query->result();
    }

    public function getChildrenByParentId($no_nodin_parent)
    {
        $query = $this->db->get_where('nodins', array('no_nodin_parent' => $no_nodin_parent)); //no_nodin_parent is null

        return $query->result();
    }

    public function getNodinParent($no_nodin)
    {
        $query = $this->db->get_where('nodins', array('no_nodin' => $no_nodin));
        return $query->result();
    }


    public function isParent($no_nodin)
    {
        $query = $this->db->get_where('nodins');
        $nodin = $query->row();
        if ($nodin->no_nodin_parent === NULL)
            return true;

        // IF no_nodin_parent is NULL then return true;
        //return true;

    }

     
    public function createNodin($no_nodin,$title,$nodin_type,$nodin_date,$target_date,$no_nodin_parent,$body)
    {

        $this->load->helper('url');
        //$no_nodin = $this->input->post('no_nodin');
 
        $data = array(
            'no_nodin' => $no_nodin,
            'title' => $title,
            'nodin_type' => $nodin_type, // request|rfs|rfc|rfi|itr
            'nodin_date' => $nodin_date,
            'target_date' => $target_date,
            'no_nodin_parent' => $no_nodin_parent,
            'body' => $body,
        );
        
        return $this->db->insert('nodins', $data);
        
    }


    public function updateParent($no_nodin, $no_nodin_parent)
    {
        $data = [
            'no_nodin_parent' => $no_nodin_parent,
        ];

        $this->db->where('no_nodin', $no_nodin);
        return $this->db->update('nodins', $data);
        //echo 'Nodin Parent ID has successfully been updated';

    }

    public function delete($id)
    {
        $this->db->where('no_nodin', $id);
        return $this->db->delete('no_nodin');
    }

}