<?php

   require_once( __CLS_PATH . "cls_database.php");

	class cls_Section {
	
	   private $data_provide;
	 	 
	   public function __construct(){
			$this->data_provide=new cls_Database();
	   } 	

	   public function get_sectiondata($key_section){

			$result=$this->data_provide->sql_execute($sql="SELECT tbl_sections.section_id AS id,
                                              				      tbl_sections.section_key AS secc_key,
                                              					  tbl_sections.section_name AS name,
                                              					  tbl_sections.section_title AS title,
                                              					  tbl_sections.section_subtitle AS subtitle,
                                              					  tbl_sections.section_description AS description,
                                              					  tbl_sections.section_text AS text,
                                              					  tbl_sections.section_showflag AS flag,
                                              					  tbl_sections.section_urlblog AS urlblog,
                                              					  tbl_sections.section_keywords AS keyword,
                                              					  tbl_sections.section_status AS status
                                              					  FROM tbl_sections
                                              					  WHERE tbl_sections.section_key = '".$key_section."'");

			return $this->data_provide->sql_get_fetchassoc($result);
      }

      public function get_sections(){

			$result=$this->data_provide->sql_execute($sql="SELECT tbl_sections.section_id AS id,
                                              				      tbl_sections.section_key AS secc_key,
                                              					  tbl_sections.section_name AS name,
                                              					  tbl_sections.section_description AS description
                                              					  FROM tbl_sections");

			return $this->data_provide->sql_get_rows($result);
      }

      public function get_sectionfiles($key_section){

			$result=$this->data_provide->sql_execute($sql="SELECT tbl_files.file_id AS id,
                                              				      tbl_files.file_name AS filename,
                                              					  tbl_files.file_description AS description,
                                              					  tbl_files.file_author AS author,
                                              					  tbl_files.file_date AS date,
                                              					  tbl_files.file_type AS type,
                                              					  tbl_files.file_first AS first,
                                              					  tbl_files.file_status AS status
                                              					  FROM tbl_files,tbl_files_sections,tbl_sections
                                              					  WHERE tbl_files_sections.file_fk = tbl_files.file_id
                                                                  AND tbl_files_sections.section_fk = tbl_sections.section_id
                                                                  AND tbl_files.file_status = 'A'
                                                                  AND tbl_sections.section_key = '".$key_section."'
                                                                  ORDER BY tbl_files.file_first DESC");

			return $this->data_provide->sql_get_rows($result);
      }

	}
	
?>