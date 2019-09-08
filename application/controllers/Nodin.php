<?php
class Nodin extends CI_Controller {


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
			//print_r($data);
			
			$this->sync($data);
			
        	$this->load->view('nodins/sync', $data);
        	
        }

        public function create()
	    {

	    }

        public function sync($data)
	    {
			// get host name from URL


			/* This also works in PHP 5.2.2 (PCRE 7.0) and later, however 
			 * the above form is recommended for backwards compatibility */
			// preg_match('/(?<name>\w+): (?<digit>\d+)/', $str, $matches);
			$i=0;
			foreach($data["nodins"] as $data_row){
				echo ++$i.". input body: ".$data_row->body."<br>";
				echo "output:";
				
				preg_match('/(\w+)\/(\w+.\w+)\/(\w+-\w+)\/(\w+)\/(\d+)/', $data_row->body, $matches);
				if (!empty($matches)) {
					echo "parent found <br>";
					print_r($matches);
					echo "<br><br>";
				}
				else{
					echo "parent not found <br><br>";
				}
			}
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

		public function sychronization()
	    {
			$data['nodins'] = $this->Nodin_model->getList();
			
			print_r($data);
			
        	$this->load->view('nodins/synchronization', $data);
			

	    }

		
		
		
}