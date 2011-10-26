<?php
 
   require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreadmin/global.php");

   class app_RConnection {   
   
	   private $host;
	   private $dbname;
	   private $port;
	   private $user;
	   private $password;
	   private $str_conn;
	   static $_instance;
	   
 	   public function __construct($host, $dbname, $port, $user, $password){
 			$this->host=$host;
		   $this->dbname=$dbname;
		   $this->port=$port;
		   $this->user=$user;
		   $this->password=$password;
		   $this->str_conn="host=".$this->host." dbname=".$this->dbname . " port=".$this->port." user=".$this->user." password=".$this->password;   	
    	}
    	 	 
	   private function __clone(){ } 
	 
	   public static function getInstance(){ 
	      if (!(self::$_instance instanceof self)){ 
	         self::$_instance=new self(); 
	      } 
	      return self::$_instance; 
	   }
	   
	   public function get_strconn(){
    		return $this->str_conn;
    	}	 
	 
	   public function get_dbuser(){  
	      return $this->user; 
	   } 
	 
	   public function get_dbhost(){ 
	      return $this->host; 
	   } 
	 
	   public function get_dbpassw(){ 
	      return $this->password; 
	   } 
	 
	   public function get_dbname(){ 
	      return $this->dbname; 
	   } 

   }
 	 
?>