<?php
   require_once( __CLS_PATH . "cls_remdatabase.php");

	class cls_File { 
	
	   private $data_provide;
	 	 
	   public function __construct(){
			$this->data_provide=new cls_RDatabase();
	   } 	

	   public function get_filedata($name_file){
	   
			$result=$this->data_provide->sql_execute("SELECT tbl_files.file_id AS id,
														     tbl_files.file_name AS name,
															 tbl_files.file_description AS description,
															 tbl_files.file_author AS author,
															 tbl_files.file_date AS date,
															 tbl_files.file_type AS type,
															 tbl_files.file_first AS first,
															 tbl_files.file_status AS status
															 FROM tbl_files
															 WHERE tbl_files.file_name = '" . $name_file . "'");

			return $this->data_provide->sql_get_fetchassoc($result);
      }

      public function insert_filedata($filedata = array(), $table, $id_fk){

	       $success=false;

            //Actualizamos las demás imagenes a N en first en caso de que la actual sea indicada como first
           if($filedata[6]=='Y'){
                $result_update=$this->data_provide->sql_execute("UPDATE tbl_files, ".$table." SET file_first = 'N'
													             WHERE " . $table . "."
                                                                 . substr(str_replace("tbl_files_","",$table), 0, -1) . "_fk = " . $id_fk
                                                                 . " AND " . $table . ".file_fk = tbl_files.file_id");
            }else{
              $result_update=true;
            }

            if($result_update){
		             $result_insert=$this->data_provide->sql_execute("INSERT INTO tbl_files
																    (file_name,
																	 file_description,
																	 file_author,
																	 file_date,
																	 file_type,
																	 file_first,
																	 file_status,
                                                                     file_created,
                                                                     file_modified)
																	 VALUES ('" . $filedata[1] . "','" . $filedata[2] . "','" . $filedata[3] . "',
																			 '" . $filedata[4] . "','" . $filedata[5] . "','" . $filedata[6] . "',
																	         '" . $filedata[7] . "','" . date('Y-m-d') . "','" . date('Y-m-d') . "')");
            }

            if($result_insert){
               $result=$this->data_provide->sql_execute("INSERT INTO " . $table . "
														 VALUES ('', last_insert_id() ," . $id_fk . ")");
            }

			if($result){
				$success=true;
			}
			
			 return $success;
      }

      public function update_filedata($filedata = array(),$name_file,$table,$id_fk){

	        $success=false;
            $result=false;
            $result_update=false;

            //Actualizamos las demás imagenes a N en first en caso de que la actual sea indicada como first
            if($filedata[6]=='Y'){
                $result_update=$this->data_provide->sql_execute("UPDATE tbl_files, ".$table." SET file_first = 'N'
													             WHERE " . $table . "."
                                                                 . substr(str_replace("tbl_files_","",$table), 0, -1) . "_fk = " . $id_fk
                                                                 . " AND " . $table . ".file_fk = tbl_files.file_id");
            }else{
              $result_update=true;
            }

            if($result_update){
		           $result=$this->data_provide->sql_execute("UPDATE tbl_files
            												 SET file_name = '" . $filedata[1] . "',
            												 file_description = '" . $filedata[2] . "',
            												 file_author = '" . $filedata[3] . "',
            												 file_date = '" . $filedata[4] . "',
                                                             file_type = '" . $filedata[5] . "',
                                                             file_first = '" . $filedata[6] . "',
                                                             file_status = '" . $filedata[7] . "',
                                                             file_modified = '" . date('Y-m-d') . "'
            												 WHERE tbl_files.file_name = '" . $name_file . "'");
            }

			if($result){
				$success=true;
			}

	      return $success;
      }

      public function delete_filedata($name_file,$table,$id){

	        $success=false;

            $result_delete=$this->data_provide->sql_execute("DELETE FROM ".$table."
													         WHERE ".$table.".file_fk = " . $id);


            if($result_delete){
		           $result=$this->data_provide->sql_execute("DELETE FROM tbl_files
            												 WHERE tbl_files.file_name = '" . $name_file . "'");
            }

			if($result){
				$success=true;
			}

	      return $success;
      }

	}

?>