<?php
class User extends CI_Controller {


		public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Nodin_model');
	        $this->load->helper('url_helper');
	        $this->load->helper('form');
	        $this->load->library('form_validation');
	    }

        public function index()
        {
        	$data['nodins'] = $this->Nodin_model->getList();
        	

        }

        public function create()
	    {

	    }

	    public function edit($id)
	    {

	    }

	    public function store()
	    {
	 

	    }

	    public function delete()
	    {

	    }

}