<?php
 
   class app_RConnection {

	   private $host;
	   private $dbname;
	   private $port;
	   private $user;
	   private $password;
	   private $str_conn;
	   static $_instance;
       private $selected_database;
       private $database=array();

 	   public function __construct($host, $dbname, $port, $user, $password){
          $this->set_dbsupported();

          $this->selected_database=$this->database[0]; //[0] mysql, [1] postgre ...

     	   $this->host=$host;
		   $this->dbname=$dbname;
		   $this->port=$port;
		   $this->user=$user;
		   $this->password=$password;

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
