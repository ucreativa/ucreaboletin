﻿<?php
 
  // require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreasite/global.php");

   class app_Connection {

	   private $host;
	   private $dbname;
	   private $port;
	   private $user;
	   private $password;
	   private $str_conn;
	   static $_instance;
       private $selected_location;
       private $selected_database;
       private $database=array();

 	   public function __construct(){
          $this->set_dbsupported();

          $this->selected_location="local";   //set 'local' para pruebas locales
          $this->selected_database=$this->database[0]; //[0] mysql, [1] postgre ...

 	      if($this->selected_location=="local"){
     		   $this->host="localhost";
    		   $this->dbname="bd_ucreanewsrh";
    		   $this->port="";
    		   $this->user="root";
    		   $this->password="123";
           }else{
               $this->host="localhost";
    		   $this->dbname="creativa_ucreasite";
    		   $this->port="";
    		   $this->user="creativa_admin";
    		   $this->password="ucreasite_admin";
           }

           switch($this->selected_database){
             case 'mysql':
                $this->str_conn="host=".$this->host." dbname=".$this->dbname . " port=".$this->port." user=".$this->user." password=".$this->password;
                break;
             case 'postgre':
                $this->str_conn="host=".$this->host." dbname=".$this->dbname . " port=".$this->port." user=".$this->user." password=".$this->password;
                break;
           }
    	}

	   private function __clone(){ }

	   public static function getInstance(){ 
	      if (!(self::$_instance instanceof self)){
	         self::$_instance=new self(); 
	      }
	      return self::$_instance;
	   }

       private function set_dbsupported(){
	      $this->database[0]="mysql";
          $this->database[1]="postgre";
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

       public function get_dbselected(){
	      return $this->selected_database;
	   }

   }

?>