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

    public function getChildrenByParent($no_nodin_parent)
    {
        $query = $this->db->get_where('nodins', array('no_nodin_parent' => $no_nodin_parent)); //no_nodin_parent is null

        return $query->result();
    }

    public function getNodinParent($no_nodin)
    {
        $query_child = $this->db->get_where('nodins', array('no_nodin' => $no_nodin));
        $nodin_child = $query_child->row();

        $query_parent = $this->db->get_where('nodins', array('no_nodin' => $nodin_child->no_nodin_parent));
        return $query_parent->row();
    }

    public function getNodinByProduct($business_id)
    {
        $query = $this->db->get_where('nodins_products', array('business_id' => $business_id));
        return $query->result();
    }

    public function getNodinByEmpTitle($employee_title)
    {
        $query = $this->db->get_where('nodins_employees', array('employee_title' => $employee_title));
        return $query->result();
    }

    public function getNodinByEmpEmail($employee_email)
    {
        $query = $this->db->get_where('nodins_employees', array('employee_email' => $employee_email));
        return $query->result();
    }

    public function isParent($no_nodin)
    {
        $isParent = false;

        $options = array('no_nodin' => $no_nodin);
        $query = $this->db->get_where('nodins', $options);
        $nodin = $query->row();
        if ($nodin->no_nodin_parent === NULL)
            $isParent = true;
        //IF no_nodin_parent is NULL then return true;
        return $isParent;
    }

    public function setNoNodinParent($no_nodin, $no_nodin_parent)
    {
        $data = [
            'no_nodin_parent' => $no_nodin_parent
        ];

        $this->db->where('nodins', $no_nodin);
        return $this->db->update('nodins', $data);
        //echo 'No Nodin Parent has successfully been updated';

    }

    public function setNodinToEmployee($no_nodin, $employee_title, $employee_email, $employee_as)
    {
        $data = [
            'no_nodin' => $no_nodin,
            'employee_title' => $employee_title,
            'employee_email' => $employee_email,
            'employee_as' => $employee_as //enum : Sender, Recipient, Cc
        ];

        return $this->db->insert('nodins_employees', $data);
    }

    public function setNodinToProduct($no_nodin, $business_id)
    {
        $data = [
            'no_nodin' => $no_nodin,
            'business_id' => $business_id
        ];

        return $this->db->insert('nodins_products', $data);
    }
     
    public function createNodin($no_nodin,$no_nodin_parent,$nodin_title,$nodin_sender,$nodin_recipient,$nodin_cc,$nodin_body,$nodin_type,$nodin_date,$target_date)
    {

        $this->load->helper('url');
        //$no_nodin = $this->input->post('no_nodin');
 
        $data = array(
            'no_nodin' => $no_nodin,
            'no_nodin_parent' => $no_nodin_parent,
            'nodin_title' => $nodin_title,
            'nodin_sender' => $nodin_sender,
            'nodin_recipient' => $nodin_recipient,
            'nodin_cc' => $nodin_cc,
            'nodin_body' => $nodin_body,
            'nodin_type' => $nodin_type, // enum: request|rfs|rfc|rfi|itr
            'nodin_date' => $nodin_date,
            'target_date' => $target_date
        );
        
        return $this->db->insert('nodins', $data);
    }

    public function updateNodin($no_nodin,$no_nodin_parent,$nodin_title,$nodin_sender,$nodin_recipient,$nodin_cc,$nodin_body,$nodin_type,$nodin_date,$target_date)
    {

        $this->load->helper('url');
        //$no_nodin = $this->input->post('no_nodin');
 
        $data = array(
            'no_nodin' => $no_nodin,
            'no_nodin_parent' => $no_nodin_parent,
            'nodin_title' => $nodin_title,
            'nodin_sender' => $nodin_sender,
            'nodin_recipient' => $nodin_recipient,
            'nodin_cc' => $nodin_cc,
            'nodin_body' => $nodin_body,
            'nodin_type' => $nodin_type, // enum: request|rfs|rfc|rfi|itr
            'nodin_date' => $nodin_date,
            'target_date' => $target_date
        );
        
        if (!empty($no_nodin)) {
            $this->db->where('no_nodin', $no_nodin);
            return $this->db->update('nodins', $data);
        }
    }

    public function delete($no_nodin)
    {
        $this->db->where('no_nodin', $no_nodin);
        return $this->db->delete('no_nodin');
    }

}