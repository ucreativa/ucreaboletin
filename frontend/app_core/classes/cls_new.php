<?php

   require_once(__CLS_PATH . "cls_database.php");

	class cls_New {
	
	   private $data_provide;
	 	 
	   public function __construct(){
			$this->data_provide=new cls_Database();
	   }

	   public function get_newdata($id_new){

			$result=$this->data_provide->sql_execute($sql="SELECT tbl_news.new_id AS id,
                                              				      tbl_news.new_title AS title,
                                              					  tbl_news.new_subtitle AS subtitle,
                                              					  tbl_news.new_description AS description,
                                              					  tbl_news.new_text AS text,
                                              					  tbl_news.new_source AS source,
                                              					  tbl_news.new_author AS author,
                                                                  DATE_FORMAT(tbl_news.new_created, '%d/%m/%Y') AS created,
                                              					  tbl_news.new_status AS status
                                              					  FROM tbl_news
                                              					  WHERE tbl_news.new_status = 'A'
                                                                  AND tbl_news.new_id = ".$id_new);

			return $this->data_provide->sql_get_fetchassoc($result);
      }

      public function get_lastnews($num_news){

			$result=$this->data_provide->sql_execute($sql="SELECT tbl_news.new_id AS id,
                                                                  tbl_news.new_title AS title,
                                                                  tbl_news.new_subtitle AS subtitle,
                                                                  tbl_news.new_description AS description,
                                                                  tbl_news.new_text AS text,
                                                                  tbl_news.new_source AS source,
                                                                  tbl_news.new_author AS author,
                                                                  DATE_FORMAT(tbl_news.new_created, '%d/%m/%Y') AS created,
                                                                  tbl_news.new_status AS status
                                                                  FROM tbl_news
                                                                  WHERE tbl_news.new_status = 'A'
                                                                  ORDER BY tbl_news.new_created DESC
                                                                  LIMIT ".$num_news);

			return $this->data_provide->sql_get_rows($result);
      }

      public function get_newfiles($id_new,$first){

            $first_stm="";
            if($first){
               $first_stm=" AND tbl_files.file_first = 'Y'";
            }

			$result=$this->data_provide->sql_execute($sql="SELECT tbl_files.file_id AS id,
                                              				      tbl_files.file_name AS filename,
                                              					  tbl_files.file_description AS description,
                                              					  tbl_files.file_author AS author,
                                              					  tbl_files.file_date AS date,
                                              					  tbl_files.file_type AS type,
                                              					  tbl_files.file_first AS first,
                                              					  tbl_files.file_status AS status
                                              					  FROM tbl_files,tbl_files_news,tbl_news
                                              					  WHERE tbl_files_news.file_fk = tbl_files.file_id
                                                                  AND tbl_files.file_status = 'A'
                                                                  AND tbl_files_news.new_fk = tbl_news.new_id
                                                                  AND tbl_news.new_id = ".$id_new . $first_stm .
                                                                  " ORDER BY tbl_files.file_first DESC");

			return $this->data_provide->sql_get_rows($result);
      }

      public function get_lastnewfile(){

			$result=$this->data_provide->sql_execute($sql="SELECT tbl_news.new_id AS id,
                                                           tbl_news.new_status AS status,
                                                           tbl_files.file_id AS id_file,
                                              			   tbl_files.file_name AS filename,
                                              			   tbl_files.file_description AS description
                                                           FROM tbl_news, tbl_files, tbl_files_news
                                                           WHERE tbl_news.new_status = 'A'
                                                           AND tbl_files.file_status = 'A'
                                                           AND tbl_files_news.new_fk = tbl_news.new_id
                                                           AND tbl_files_news.file_fk = tbl_files.file_id
                                                           AND tbl_files.file_first = 'Y'
                                                           ORDER BY tbl_news.new_created DESC
                                                           LIMIT 1");

			return $this->data_provide->sql_get_fetchassoc($result);
      }

	}

?>