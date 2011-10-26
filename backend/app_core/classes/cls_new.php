<?php

   require_once( __CLS_PATH . "cls_remdatabase.php");

	class cls_New {
	
	   private $data_provide;
	 	 
	   public function __construct(){
			$this->data_provide=new cls_RDatabase();
	   } 	
	 
	   public function get_newdata($id_new){

			$result=$this->data_provide->sql_execute("SELECT tbl_news.new_id,
															tbl_news.new_title,
															tbl_news.new_subtitle,
															tbl_news.new_description,
															tbl_news.new_text,
															tbl_news.new_source,
															tbl_news.new_author,
															tbl_news.new_status
															FROM tbl_news
															WHERE tbl_news.new_id = " . $id_new);

			return $this->data_provide->sql_get_rows($result);
      } 
      
      public function insert_newdata($newdata = array()){
      
	      $success=false; 
			$result=$this->data_provide->sql_execute("INSERT INTO tbl_news
														   (new_title,
															new_subtitle,
															new_description,
															new_text,
                                                            new_source,
                                                            new_author,
                                                            new_status,
                                                            new_created,
                                                            new_modified)
															VALUES ('" . $newdata[1] . "','" . $newdata[2] . "','" . $newdata[3] . "',
																	'" . $newdata[4] . "','" . $newdata[5] . "','" . $newdata[6] . "',
															        '" . $newdata[7] . "','" . date('Y-m-d H:i:s') . "',
                                                                    '" . date('Y-m-d') . "')");
			if($result){
				$success=true;
			}
			
			 return $success;
      }
      
      public function update_newdata($newdata = array(),$id_new){
	   
	        $success=false;
			$result=$this->data_provide->sql_execute("UPDATE tbl_news
														    SET new_title = '" . $newdata[1] . "',
															new_subtitle = '" . $newdata[2] . "',
															new_description = '" . $newdata[3] . "',
															new_text = '" . $newdata[4] . "',
                                                            new_source = '" . $newdata[5] . "',
                                                            new_author = '" . $newdata[6] . "',
                                                            new_status = '" . $newdata[7] . "',
                                                            new_modified = '" . date('Y-m-d') . "'
															WHERE tbl_news.new_id = " . $id_new);
			if($result){
				$success=true;
			}
			
	      return $success;                      		                          
      }     

	}
	
?>