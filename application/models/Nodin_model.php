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

    public function getNodinParent($no_nodin)
    {
        $sql = "SELECT * FROM nodins WHERE no_nodin = $no_nodin";

        $result = $conn->query($sql);

        return $result;
    }

    public function getAllParents()
    {
        $sql = "SELECT * FROM nodins WHERE no_nodin_parent IS NULL";

        $result = $conn->query($sql);

        return $result;
    }

    public function getChildrenByParentId($no_nodin_parent)
    {
        $sql = "SELECT * FROM nodins WHERE no_nodin_parent = $no_nodin_parent";

        $result = $conn->query($sql);

        return $result;
    }



    public function isParent($no_nodin)
    {
        $sql = "SELECT no_nodin, no_nodin_parent FROM nodins WHERE no_nodin = $no_nodin";
        $result = $conn->query($sql);

        // IF no_nodin_parent is NULL then return true;
        return true;

    }

     
    public function createNodin($no_nodin,$title,$nodin_type,$nodin_date,$target_date,$no_nodin_parent,$body)
    {

        $sql = "INSERT INTO nodins (no_nodin, title, nodin_type, nodin_date, target_date, no_nodin_parent, body)
                VALUES ($no_nodin, $title, $nodin_type, $nodin_date, $target_date, $no_nodin_parent, $body)";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // $this->load->helper('url');
        // $no_nodin = $this->input->post('no_nodin');
 
        // $data = array(
        //     'id' => $this->input->post('id'),
        //     'no_nodin' => $this->input->post('username'),
        //     'title' => $this->input->post('title'),
        //     'nodin_type' => $this->input->post('nodin_type'), // request|rfs|rfc|rfi|itr
        //     'nodin_date' => $this->input->post('nodin_date'),
        //     'target_date' => $this->input->post('target_date'),
        //     'no_nodin_parent' => $this->input->post('no_nodin_parent'),
        //     'to' => $this->input->post('to'),
        //     'cc' => $this->input->post('cc'),
        //     'body' => $this->input->post('body'),
        // );

        // if (empty($no_nodin)) {
        //     return $this->db->insert('nodins', $data);
        // } else {
        //     $this->db->where('no_nodin', $no_nodin);
        //     return $this->db->update('nodins', $data);
        // }
        
    }


    public function updateParent($no_nodin, $no_nodin_parent)
    {
        $sql = "UPDATE nodins SET no_nodin_parent = $no_nodin_parent WHERE $no_nodin = $no_nodin";
        if ($conn->query($sql) === TRUE) {
            echo "Record has been updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    public function delete($id)
    {
        $this->db->where('no_nodin', $id);
        return $this->db->delete('no_nodin');
    }

}