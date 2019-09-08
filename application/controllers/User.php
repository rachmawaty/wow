<?php
class User extends CI_Controller {


		public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('User_model');
	        $this->load->helper('url_helper');
	        $this->load->helper('form');
	        $this->load->library('form_validation');
	    }

        public function index()
        {
        	$data['users'] = $this->User_model->getList();
       		$data['title'] = 'User List';
 
        	$this->load->view('users/list', $data);
        }

        public function create()
	    {
	        $data['title'] = 'Create User';
	        $this->load->view('users/create', $data);
	    }

	    public function edit($id)
	    {
	        $id = $this->uri->segment(3);
	        $data = array();
	 
	        if (empty($id))
	        { 
	         show_404();
	        }else{
	          $data['user'] = $this->User_model->getUserByUsername($id);
	          $this->load->view('users/edit', $data);
	        }
	    }

	    public function store()
	    {
	 
	        $this->form_validation->set_rules('username', 'Username', 'required');
	        $this->form_validation->set_rules('department', 'Department', 'required');
	 
	        $id = $this->input->post('username');
	 
	        if ($this->form_validation->run() === FALSE)
	        {  
	            if(empty($id)){
	              redirect( base_url('user/create') ); 
	            }else{
	             redirect( base_url('user/edit/'.$id) ); 
	            }
	        }
	        else
	        {
	            $data['user'] = $this->User_model->createOrUpdate();
	            redirect( base_url('user') ); 
	        }
	    }

	    public function delete()
	    {
	        $id = $this->uri->segment(3);
	         
	        if (empty($id))
	        {
	            show_404();
	        }
	                 
	        $notes = $this->User_model->delete($id);
	         
	        redirect( base_url('user') );        
	    }

}