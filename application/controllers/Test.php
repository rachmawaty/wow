<?php
class Test extends CI_Controller {


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
        	// Nodin Model Function test

        	// GetList()

        	$data['nodins'] = $this->Nodin_model->getList();
			//print_r($data);
			//foreach($data["nodins"] as $nodin){
				// echo $nodin->no_nodin.'\n';
				// echo $nodin->nodin_type.'\n';
			//}

			// getNodinByNo()
			$data2 = $this->Nodin_model->getNodinByNo('01270/MK.05/EN-01/VI/2019');
			//print_r($data2);
		
			// getAllParents()
			$data3 = $this->Nodin_model->getAllParents();
        	//print_r($data3);


        	$data4 = $this->Nodin_model->getChildrenByParentId("test");
        	// print_r($data4);

        	// isParent 002/BO
        	$data5 = $this->Nodin_model->isParent("002/BO");
        	//print_r($data5);

        	//$this->Nodin_model->updateParent("002/BO", "LALALA");

        	$this->Nodin_model->createNodin("A","B","C","2019-09-19","E","F","body","G");

        }
}