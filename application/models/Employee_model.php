<?php
class Employee_model extends CI_Model {

	public function __construct()
    {
        $this->load->database();
    }
     
    public function getList()
    {
        $query = $this->db->get('employees');
        return $query->result();
    }

    public function getEmployeeByEmail($email)
    {
        $query = $this->db->get_where('employees', array('email' => $email));
        return $query->row();
    }

    public function getEmployeeByTitle($title)
    {
        $query = $this->db->get_where('employees', array('title' => $title));
        return $query->row();
    }

    public function getEmployeeByName($employee_name)
    {
        $query = $this->db->get_where('employees', array('name' => $name));
        return $query->row();
    }
     
    public function createEmployee($email,$title,$name,$department,$division,$subdir)
    {
        $this->load->helper('url');
        //$id = $this->input->post('id');
 
        $data = array(
            'email' => $email,
            'title' => $title,
            'name' => $name,
            'department' => $department,
            'division' => $division,
            'subdir' => $subdir
        );

        return $this->db->insert('employees', $data);
        
    }

    public function updateEmployeeByEmail($email,$title,$name,$department,$division,$subdir)
    {

        $this->load->helper('url');
        //$id = $this->input->post('id');
 
        $data = array(
            'email' => $email,
            'title' => $title,
            'name' => $name,
            'department' => $department,
            'division' => $division,
            'subdir' => $subdir
        );

        if (!empty($email)) {
            $this->db->where('email', $email);
            return $this->db->update('employees', $data);
        }
    }


    public function delete($business_id)
    {
        $this->db->where('products', $business_id);
        return $this->db->delete('products');
    }

}