<?php

   require_once(__CONN_PATH . "app_remconnection.php");

	class cls_RDatabase {

	   var $conn_RCdata; //Conexión remota a la bd del sitio a administrar
	   var $core_conn;
	   var $conn_status;
       var $core_database;

	   public function __construct(){
			$this->conn_RCdata=new app_RConnection("localhost","creativa_ucreasite","","root","123");
            require_once(__MOD_PATH . "mod_". $this->conn_RCdata->get_dbselected() . ".php");

            switch($this->conn_RCdata->get_dbselected()){
               case 'mysql':
                  $this->core_database=new mod_Mysql($this->conn_RCdata);
                  break;
               case 'postgre':
                  $this->core_database=new mod_Postgre($this->conn_RCdata);
                  break;
           }
   			$this->is_connect();
	   }

	   public function db_connect() {
		    try{
                    $this->core_conn=$this->core_database->db_connect();
			 }catch(Exception $e){
				   cls_Message::show_message($e->getMessage(),"error","");
			 }
			 return $this->core_conn;
 	   }

	   public function is_connect(){
	   	try{

				if (!$this->db_connect()) {
					$this->conn_status=false;
					exit;
				} else {
					$this->conn_status=true;
				}

	   	}catch(Exception $e){
	   		cls_Message::show_message($e->getMessage(),"error","");
	   	}

	      return $this->conn_status;
	   }

	   //Método para ejecutar una sentencia sql
	   public function sql_execute($sql){
		   try{
                $result=$this->core_database->sql_execute($sql);
			}catch(Exception $e){
		   		cls_Message::show_message($e->getMessage(),"error","");
		   }
		   return $result;
	   }

	   //Método para obtener los resultados de una sentencia sql en un array
	   public function sql_get_rows($result){
	      try{
	         $array=$this->core_database->sql_get_rows($result);
		   }catch(Exception $e){
		   		cls_Message::show_message($e->getMessage(),"error","");
		   }
		  return $array;
	   }

       //Método para obtener los resultados de una sentencia sql
	   public function sql_get_fetchassoc($result){
	      try{
			 $row=$this->core_database->sql_get_fetchassoc($result);
		   }catch(Exception $e){
		   	 cls_Message::show_message($e->getMessage(),"error","");
		   }
		  return $row;
	   }
	   
	}
	
?>