<?php

	require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreadmin/global.php");
    require_once( __CLS_PATH . "cls_database.php");
    
    class cls_Login {
    	
	   var $auth_db;
	   var $conn_status;
       private $data_provide;
       private $user_id;

		 function __construct(){
         $this->auth_db=new cls_Database();
			$this->data_provide=new cls_Database();
		 }
		 
		 function get_user_id(){
		 	return $this->user_id;
		 }
		 
		 //Verifica la conexión con postgre y la autentificación
		 public function login($user, $pssw){
 
		 	if($this->auth_db->is_connect() && cls_Login::authenticate($user, $pssw)){
		 		$this->conn_status=true;
		   }else{
		   	$this->conn_status=false;
		   }
		 } 
		 
		 
		 //Verfica si el usuario y el password suministrados son correctos
		 public function authenticate($user, $pssw){
	      
	      $success=false;
	      $value="";
	      
			$result=$this->data_provide->sql_execute("SELECT tbl_users.user_id
																	FROM tbl_users
																	WHERE tbl_users.user_name = '" . $user . "'
																	AND tbl_users.user_password = '" . md5($pssw) . "'
																	AND tbl_users.user_status = 'A'");
			
			$value=$this->data_provide->sql_get_rows($result);

         if($value){
            $success=true;
            $this->user_id=$value[0][0];
         } 			
			                      		                          
			return $success;
		 } 
		 
		public function logout(){ 
           session_name("UCREADMIN");
           $_SESSION['AUTH']="NO";
           session_destroy();
           unset($this->auth_pg);
  	       $this->conn_status=false;
  	       header("Location:" . __SITE_PATH);
		}
		  
    }

	
?>