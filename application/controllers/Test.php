<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
 
class Test extends REST_Controller{
	
	function __construct() { 
        parent::__construct(); 
		 
    }
	function index_get(){
		echo 'Not Access' ;
	}
	 
	public function getSN_get(){
		
			
		
		$serial_number = $this->input->get('serial_number'); 
		
		$data = array();
		$status = 0 ;
		$sql = "select * from mytable where serial_number = '$serial_number'" ;
		$Q = $this->db->query($sql);
		if ($Q->num_rows() > 0){
			$data = $Q->result_array() ;
			$status = 1 ;
		}					
		$Q->free_result();				 	
	 
		$message = array(
			 'status' =>$status,
            'data_id' => $serial_number  ,
            'data' => $data  ,
			 
			);
			
		$this->response($message, 200);
		 
		 
	}
	
	public function getSN_post(){
		 
		$serial_number = $this->input->post('serial_number'); 
		
		$data = array();
		$status = 0 ;
		$sql = "select * from mytable where serial_number = '$serial_number'" ;
		$Q = $this->db->query($sql);
		if ($Q->num_rows() > 0){
			$data = $Q->result_array() ;
			$status = 1 ;
		}					
		$Q->free_result();				 	
	 
	 
		$message = array(
			 'status' =>$status,
            'data_id' => $serial_number  ,
            'data' => $data  ,
			 
			);
			
		$this->response($message, REST_Controller::HTTP_OK);
		 
	}
	 
}
?>