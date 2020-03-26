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
        	$parents = $this->Nodin_model->getAllParents();
			$this->sync($data);
			
			//print_r($parents);
			
			
//			$this->sync($data);
			/*$this->show($parents);
			$result = array('parent' => '0', 'data' => array(
				array(
					'value' => '3512/MK.05/EN-01/IX/2019', 
					'nodin_title' => 'Permohonan Update Whitelist Upgrade Batas Pemakaian (CLS) kartuHalo periode September 2019', 
					'nodin_type' => 'Business Request', 
					'status' => 'In Progress 20%', 
					'from' => 'HVC Postpaid Core and Digital Proposition and Pricing', 
					'to' => 'HVC, Postpaid and Roaming Development', 'remarks' => '', 
					'data' => array(
						'id' => '3', 
						'has_kids' => '1', 
						'value' => '056/MK.05/PS-05/VII/2019', 
						'nodin_title' => 'RFS Update Whitelist Upgrade Batas Pemakaian (CLS) kartuHalo periode September 2019', 
						'nodin_type' => 'RFS', 
						'status' => '', 
						'from' => 'HVC, Postpaid and Roaming Development', 
						'to' => 'Legacy and Core Product Readiness', 
						'remarks' => '',
						'data' => array()
					), 
					'id' => '1'),
				array(
						'value' => '3212/MK.05/EN-01/VII/2019', 
						'nodin_title' => 'Permohonan Development Kartu HALO HVC Segment', 
						'nodin_type' => 'Business Request', 
						'status' => 'In Progress 20%', 
						'from' => 'HVC Postpaid Core and Digital Proposition and Pricing', 
						'to' => 'HVC, Postpaid and Roaming Development', 'remarks' => '', 
						'data' => array(
							'id' => '4', 
							'has_kids' => '1', 
							'value' => '067/MK.05/PS-05/VII/2019', 
							'nodin_title' => 'Pemberitahuan RFS Kartu HALO HVC Segment', 
							'nodin_type' => 'RFS', 
							'status' => '', 
							'from' => 'HVC, Postpaid and Roaming Development', 
							'to' => 'Legacy and Core Product Readiness', 
							'remarks' => '',
							'data' => array()
						), 
						'id' => '2'
					)
				)
			);
			
			
			$result2 = array('parent' => '0');
			$result2['data'][0]['value'] = '3512/MK.05/EN-01/IX/2019';
			$result2['data'][0]['nodin_title'] = 'Permohonan Update Whitelist Upgrade Batas Pemakaian (CLS) kartuHalo periode September 2019';
			$result2['data'][0]['nodin_type'] = 'Business Request';
			$result2['data'][0]['status'] = 'In Progress 20%';
			$result2['data'][0]['from'] = 'HVC Postpaid Core and Digital Proposition and Pricing';
			$result2['data'][0]['to'] = 'HVC, Postpaid and Roaming Development';
			$result2['data'][0]['remarks'] = ''; 
			$result2['data'][0]['data']['id'] = '3'; 
			$result2['data'][0]['data']['has_kids'] = '1'; 
			$result2['data'][0]['data']['value'] = '056/MK.05/PS-05/VII/2019';
			$result2['data'][0]['data']['nodin_title'] = 'RFS Update Whitelist Upgrade Batas Pemakaian (CLS) kartuHalo periode September 2019';
			$result2['data'][0]['data']['nodin_type'] = 'RFS'; 
			$result2['data'][0]['data']['status'] = '';
			$result2['data'][0]['data']['from'] = 'HVC, Postpaid and Roaming Development'; 
			$result2['data'][0]['data']['to'] = 'Legacy and Core Product Readiness';
			$result2['data'][0]['data']['remarks'] = '';
			$result2['data'][0]['data']['data'] = array();
			$result2['data'][0]['id'] = '1';
			$result2['data'][1]['value'] = '3212/MK.05/EN-01/VII/2019';
			$result2['data'][1]['nodin_title'] = 'Permohonan Development Kartu HALO HVC Segment';
			$result2['data'][1]['nodin_type'] = 'Business Request';
			$result2['data'][1]['status'] = 'In Progress 20%';
			$result2['data'][1]['from'] = 'HVC Postpaid Core and Digital Proposition and Pricing'; 
			$result2['data'][1]['to'] = 'HVC, Postpaid and Roaming Development';
			$result2['data'][1]['remarks'] = '';
			$result2['data'][1]['data']['id'] = '4'; 
			$result2['data'][1]['data']['has_kids'] = '1';
			$result2['data'][1]['data']['value'] = '067/MK.05/PS-05/VII/2019';
			$result2['data'][1]['data']['nodin_title'] = 'Pemberitahuan RFS Kartu HALO HVC Segment';
			$result2['data'][1]['data']['nodin_type'] = 'RFS';
			$result2['data'][1]['data']['status'] = '';
			$result2['data'][1]['data']['from'] = 'HVC, Postpaid and Roaming Development';
			$result2['data'][1]['data']['to'] = 'Legacy and Core Product Readiness';
			$result2['data'][1]['data']['remarks'] = '';
			$result2['data'][1]['data']['data'] = array();
			$result2['data'][1]['id'] = '2';
			
			echo json_encode($result);
			echo "<br><br>";
			echo json_encode($result2);
			echo "<br><br>samakah ? ".($result == $result2);
        	$this->load->view('nodins/sync', $result);
        	*/
        }
		/*
		$result = array('parent' => '0', 'data' => array(
				array(
					'value' => '3512/MK.05/EN-01/IX/2019', 
					'nodin_title' => 'Permohonan Update Whitelist Upgrade Batas Pemakaian (CLS) kartuHalo periode September 2019', 
					'nodin_type' => 'Business Request', 
					'status' => 'In Progress 20%', 
					'from' => 'HVC Postpaid Core and Digital Proposition and Pricing', 
					'to' => 'HVC, Postpaid and Roaming Development', 'remarks' => '', 
					'data' => array(
						'id' => '3', 
						'has_kids' => '1', 
						'value' => '056/MK.05/PS-05/VII/2019', 
						'nodin_title' => 'RFS Update Whitelist Upgrade Batas Pemakaian (CLS) kartuHalo periode September 2019', 
						'nodin_type' => 'RFS', 
						'status' => '', 
						'from' => 'HVC, Postpaid and Roaming Development', 
						'to' => 'Legacy and Core Product Readiness', 
						'remarks' => '',
						'data' => array()
					), 
					'id' => '1'),
				array(
						'value' => '3212/MK.05/EN-01/VII/2019', 
						'nodin_title' => 'Permohonan Development Kartu HALO HVC Segment', 
						'nodin_type' => 'Business Request', 
						'status' => 'In Progress 20%', 
						'from' => 'HVC Postpaid Core and Digital Proposition and Pricing', 
						'to' => 'HVC, Postpaid and Roaming Development', 'remarks' => '', 
						'data' => array(
							'id' => '4', 
							'has_kids' => '1', 
							'value' => '067/MK.05/PS-05/VII/2019', 
							'nodin_title' => 'Pemberitahuan RFS Kartu HALO HVC Segment', 
							'nodin_type' => 'RFS', 
							'status' => '', 
							'from' => 'HVC, Postpaid and Roaming Development', 
							'to' => 'Legacy and Core Product Readiness', 
							'remarks' => '',
							'data' => array()
						), 
						'id' => '2'
					)
				)
			);*/
		

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
				echo ++$i.". input body: ".$data_row->nodin_body."<br>";
				echo "output:";
				
				preg_match('/(\w+)\/(\w+.\w+)\/(\w+-\w+)\/(\w+)\/(\d+)/', $data_row->nodin_body, $matches);
				if (!empty($matches)) {
					echo "parent found <br>";
					$this->Nodin_model->setNoNodinParent($data_row->no_nodin, $matches[0]);
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
		
		public function show($parents){
			
			$i=0;
			$result = array('parent' => '0');
			foreach($parents as $parent){
				$result['data'][$i]['value'] = $parent->no_nodin;
				$result['data'][$i]['nodin_title'] = $parent->title;
				$result['data'][$i]['nodin_type'] = 'Business Request';
				$result['data'][$i]['status'] = 'In Progress 20%';
				$result['data'][$i]['from'] = $parent->from;
				$result['data'][$i]['to'] = $parent->to;
				$result['data'][$i]['remarks'] = '';
				print_r($parent);
				$children = $this->Nodin_model->getChildrenByParentId($parent->no_nodin);
				echo "<br><br>";
				print_r($children);
				echo "<br><br>";
				$j=0;
				if($children==null){
					$result['data'][$i]['data'] = array();
				}
				else{
					foreach($children as $child){
						$result['data'][$i]['data'][$j]['id'] = ($i+1).".".($j+1); 
						$result['data'][$i]['data'][$j]['has_kids'] = '1'; 
						$result['data'][$i]['data'][$j]['value'] = $child->no_nodin;
						$result['data'][$i]['data'][$j]['nodin_title'] = $child->title;
						$result['data'][$i]['data'][$j]['nodin_type'] = 'RFS'; 
						$result['data'][$i]['data'][$j]['status'] = ''; 
						$result['data'][$i]['status'] = 'In Progress 50%';
						$result['data'][$i]['data'][$j]['from'] = $child->from; 
						$result['data'][$i]['data'][$j]['to'] = $child->to;
						$result['data'][$i]['data'][$j]['remarks'] = '';
						$grandchildren = $this->Nodin_model->getChildrenByParentId($child->no_nodin);
						
						if($grandchildren==null){
							$result['data'][$i]['data'][$j]['data'] = array();
						}
						else{
							$k=0;
							foreach($grandchildren as $grandchild){
								$result['data'][$i]['data'][$j]['data'][$k]['id'] = ($i+1).".".($j+1).".".($k+1); 
								$result['data'][$i]['data'][$j]['data'][$k]['has_kids'] = '1'; 
								$result['data'][$i]['data'][$j]['data'][$k]['value'] = $grandchild->no_nodin;
								$result['data'][$i]['data'][$j]['data'][$k]['nodin_title'] = $grandchild->title;
								$result['data'][$i]['data'][$j]['data'][$k]['nodin_type'] = 'RFS'; 
								$result['data'][$i]['data'][$j]['data'][$k]['status'] = ''; 
								$result['data'][$i]['status'] = 'Done';
								$result['data'][$i]['data'][$j]['data'][$k]['from'] = $grandchild->from; 
								$result['data'][$i]['data'][$j]['data'][$k]['to'] = $grandchild->to;
								$result['data'][$i]['data'][$j]['data'][$k]['remarks'] = '';
								$result['data'][$i]['data'][$j]['data'][$k]['data'] = array();
								$k++;
							}
						}
						$j++;
					}					
				}
				$result['data'][$i]['id'] = ($i+1);
				$i++;
			}
			echo "<br><br>result:<br>";
			print_r($result);
			echo "<br><br>";
			print_r(json_encode($result));
			echo "<br><br>";
			
			$result2 = array('parent' => '0');
			$result2['data'][0]['value'] = '3512/MK.05/EN-01/IX/2019';
			$result2['data'][0]['nodin_title'] = 'Permohonan Update Whitelist Upgrade Batas Pemakaian (CLS) kartuHalo periode September 2019';
			$result2['data'][0]['nodin_type'] = 'Business Request';
			$result2['data'][0]['status'] = 'In Progress 20%';
			$result2['data'][0]['from'] = 'HVC Postpaid Core and Digital Proposition and Pricing';
			$result2['data'][0]['to'] = 'HVC, Postpaid and Roaming Development';
			$result2['data'][0]['remarks'] = ''; 
			$result2['data'][0]['data']['id'] = '3'; 
			$result2['data'][0]['data']['has_kids'] = '1'; 
			$result2['data'][0]['data']['value'] = '056/MK.05/PS-05/VII/2019';
			$result2['data'][0]['data']['nodin_title'] = 'RFS Update Whitelist Upgrade Batas Pemakaian (CLS) kartuHalo periode September 2019';
			$result2['data'][0]['data']['nodin_type'] = 'RFS'; 
			$result2['data'][0]['data']['status'] = '';
			$result2['data'][0]['data']['from'] = 'HVC, Postpaid and Roaming Development'; 
			$result2['data'][0]['data']['to'] = 'Legacy and Core Product Readiness';
			$result2['data'][0]['data']['remarks'] = '';
			$result2['data'][0]['data']['data'] = array();
			$result2['data'][0]['id'] = '1';
			$result2['data'][1]['value'] = '3212/MK.05/EN-01/VII/2019';
			$result2['data'][1]['nodin_title'] = 'Permohonan Development Kartu HALO HVC Segment';
			$result2['data'][1]['nodin_type'] = 'Business Request';
			$result2['data'][1]['status'] = 'In Progress 20%';
			$result2['data'][1]['from'] = 'HVC Postpaid Core and Digital Proposition and Pricing'; 
			$result2['data'][1]['to'] = 'HVC, Postpaid and Roaming Development';
			$result2['data'][1]['remarks'] = '';
			$result2['data'][1]['data']['id'] = '4'; 
			$result2['data'][1]['data']['has_kids'] = '1';
			$result2['data'][1]['data']['value'] = '067/MK.05/PS-05/VII/2019';
			$result2['data'][1]['data']['nodin_title'] = 'Pemberitahuan RFS Kartu HALO HVC Segment';
			$result2['data'][1]['data']['nodin_type'] = 'RFS';
			$result2['data'][1]['data']['status'] = '';
			$result2['data'][1]['data']['from'] = 'HVC, Postpaid and Roaming Development';
			$result2['data'][1]['data']['to'] = 'Legacy and Core Product Readiness';
			$result2['data'][1]['data']['remarks'] = '';
			$result2['data'][1]['data']['data'] = array();
			$result2['data'][1]['id'] = '2';
			
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