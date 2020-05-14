<?php
class Api extends MY_Controller {
    function __construct() {
        parent::__construct();
		$this->load->model("Api_model");
    }
    function index() {
       $this->load->view('api/index', $view_data);
    }
    function callAPI($method, $url, $data){
     $curl = curl_init();
     switch ($method){
      case "POST":
         curl_setopt($curl, CURLOPT_POST, 1);
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
         break;
      case "PUT":
         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
         break;
      default:
         if ($data)
            $url = sprintf("%s?%s", $url, http_build_query($data));
     }
     curl_setopt($curl, CURLOPT_URL, $url);
     $token=$this->GetToken();
     curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
	  'Accept: application/json',
      'Authorization: Bearer '.$token,
     ));
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
     $result = curl_exec($curl);
     if(!$result){die("Connection Failure");}
     curl_close($curl);
     return $result;
    }
	function callAPIToken($method, $url, $data){
     $curl = curl_init();
     switch ($method){
      case "POST":
         curl_setopt($curl, CURLOPT_POST, 1);
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
         break;
      case "PUT":
         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
         break;
      default:
         if ($data)
            $url = sprintf("%s?%s", $url, http_build_query($data));
     }
     curl_setopt($curl, CURLOPT_URL, $url);
     curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
	  'Accept: application/json',
      'Authorization: Bearer 907c762e069589c2cd2a229cdae7b8778caa9f07',
     ));
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
     $result = curl_exec($curl);
     if(!$result){die("Connection Failure");}
     curl_close($curl);
     return $result;
    }
	function GetToken(){
	 $data_array=array(
      "Username"=>"b_sav",
      "Password"=>"36PL623F5600A45FK97B3C17D9648CE35FCQ6471FDQ1GVCA3S9ARF37D99J9BT2",
     );
     $make_call=$this->callAPIToken('POST', 'https://www.saheam.ir/webapi/account/login', json_encode($data_array));
     $response=json_decode($make_call,true);
     $errors=$response['response']['errors'];
     return $data=$response['jwtToken'];
	 //echo json_encode(array("success" => true,'message' =>$response['jwtToken']));
	}
	function AddOrUpdateMember() {
     $Name=$this->input->post('Name');
     $Family=$this->input->post('Family');
     $NationalCode=$this->input->post('NationalCode');
     $MobileNo=$this->input->post('MobileNo');
     $data_array =  array(
      "NationalCode"=> $NationalCode,
      "Name"=> $Name,
      "Family"=> $Family,
      "MobileNo"=> $MobileNo,
    );
    $make_call = $this->callAPI('POST', 'https://www.saheam.ir/webapi/clubservices/AddOrUpdateMember',json_encode($data_array));
    $response = json_decode($make_call, true);
    $result   = $response['Desc'];  
    $respCode   = $response['respCode']; 
    if ($respCode==0) {
	 $save_id = $this->Api_model->save($NationalCode);
	 //if($save_id){
	   echo json_encode(array("success" => true,'message' =>$result)); 
	 /*}else{
	   echo json_encode(array("success" => false,'message' => "تراکنش با خطا مواجه شد")); 
	 }*/
    } else {
     echo json_encode(array("success" => false,'message' => "تراکنش با خطا مواجه شد"));
    }
   }
    function AddMemberCard() {
     $Pans=array($_POST['Pans']);
	 $pan=$_POST['Pans'];
     $NationalCode=$_POST['NationalCode'];
     $data_array =  array(
      "NationalCode"=> $NationalCode,
      "Pans"=> $Pans,
    );
    $make_call = $this->callAPI('POST', 'https://www.saheam.ir/webapi/clubservices/AddMemberCard/',json_encode($data_array));
    $response = json_decode($make_call, true);
    $result   = $response['Desc'];  
    $respCode   = $response['respCode']; 
    if ($respCode==0) {
	 $save_id = $this->Api_model->save_pans($pan);
	 echo json_encode(array("success" => true,'message' =>$result));	 
    } else {
     echo json_encode(array("success" => false,'message' => "تراکنش با خطا مواجه شد"));
    }
   }
   function test($pan) {
	 echo $this->Api_model->save_pans($pan);  
   }
}