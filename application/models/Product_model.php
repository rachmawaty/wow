<?php
class Product_model extends CI_Model {

	public function __construct()
    {
        $this->load->database();
    }
     
    public function getList()
    {
        $query = $this->db->get('products');
        return $query->result();
    }

    public function getProductById($business_id)
    {
        $query = $this->db->get_where('products', array('business_id' => $business_id));
        return $query->row();
    }

    public function getProductByDeliveryStatus($business_id)
    {
        $query = $this->db->get_where('products', array('delivery_status' => $delivery_status));
        return $query->result();
    }

    public function getProductByNodin($no_nodin)
    {
        $query = $this->db->get_where('nodins_products', array('no_nodin' => $no_nodin));
        return $query->result();
    }

    public function getProductByEmployeeEmail($employee_email)
    {
        $query = $this->db->get_where('products_employees', array('employee_email' => $employee_email));
        return $query->result();
    }

    public function getProductByEmployeeTitle($employee_title)
    {
        $query = $this->db->get_where('products_employees', array('employee_email' => $employee_email));
        return $query->result();
    }    

    public function setProductToEmployee($business_id, $employee_title, $employee_email, $employee_as)
    {
        $data = [
            'business_id' => $business_id,
            'employee_title' => $employee_title,
            'employee_email' => $employee_email,
            'employee_as' => $employee_as //enum : Product Owner, Product Dev
        ];

        return $this->db->insert('nodins_employees', $data);
    }
     
    public function createProduct($business_id,$cpn,$eff_start_date,$eff_end_date,$avail_start_date,$avail_end_date,$delivery_status)
    {
        $this->load->helper('url');
        //$id = $this->input->post('id');
 
        $data = array(
            'business_id' => $business_id,
            'cpn' => $cpn,
            'effective_start_date' => $eff_start_date,
            'effective_end_date' => $eff_end_date,
            'available_start_date' => $avail_start_date,
            'available_end_date' => $avail_end_date,
            'delivery_status' => $delivery_status
        );

        return $this->db->insert('products', $data);
        
    }

    public function updateProduct($business_id,$cpn,$eff_start_date,$eff_end_date,$avail_start_date,$avail_end_date,$delivery_status)
    {

        $this->load->helper('url');
        //$id = $this->input->post('id');
 
        $data = array(
            'business_id' => $business_id,
            'cpn' => $cpn,
            'effective_start_date' => $eff_start_date,
            'effective_end_date' => $eff_end_date,
            'available_start_date' => $avail_start_date,
            'available_end_date' => $avail_end_date,
            'delivery_status' => $delivery_status
        );

        if (!empty($business_id)) {
            $this->db->where('business_id', $business_id);
            return $this->db->update('products', $data);
        }
    }

    public function delete($business_id)
    {
        $this->db->where('products', $business_id);
        return $this->db->delete('products');
    }

}