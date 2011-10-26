<?php

   /* Archivo controlador que contiene los llamados a las acciones de la vista
   de Usuarios (ADD,EDIT,DELETE,SEARCH) */
   
   require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreadmin/global.php");
   require_once( __CLS_PATH . "cls_file.php");
     
   class ctr_File {
   	
   	private $filedata;
      
      public function __construct()
	  {
			 $this->filedata=new cls_File();
	  }

	   public function get_filedata($name_file)
	   {
			 return $this->filedata->get_filedata($name_file);
	   }
	     	  
   	//Si se presiona el botón Guardar
	   function btn_save_click()
	   {
	      $success=false;
	      $fileinfo=array();
	      $id_file=$_POST['txt_id'];
          $name_file=$_POST['txt_filename'];
          $table="";
          $id_fk=$_POST['txt_id_fk'];

          switch($_POST['txt_form'])
          {
            case "frm_career":
              $table="tbl_files_careers";
            break;
            case "frm_event":
              $table="tbl_files_events";
            break;
            case "frm_new":
              $table="tbl_files_news";
            break;
            case "frm_section":
              $table="tbl_files_sections";
            break;
          }
	            
	      $fileinfo[0]=$_POST['txt_id'];
	      $fileinfo[1]=$_POST['txt_filename'];
	      $fileinfo[2]=$_POST['txt_description'];
	      $fileinfo[3]=$_POST['txt_author'];
		  $fileinfo[4]=$_POST['txt_date'];
		  $fileinfo[5]=$_POST['txt_type'];
		  $fileinfo[6]=$_POST['cmb_first'];
	      $fileinfo[7]=$_POST['cmb_status'];
	   	
	   	/*Si vamos a insertar un registro nuevo (_NEW) o actualizar en caso de que
	   	$_GET['id'] tenga un valor asignado desde el formulario de búsqueda*/
	   	if($id_file=="_NEW"){
		   if(($this->filedata->insert_filedata($fileinfo, $table, $id_fk)==1)){
		      	cls_Message::show_message("","success","success_insert");
                $success=true;
		      }
		   }else{
		   	if($this->filedata->update_filedata($fileinfo,$name_file,$table, $id_fk)){
		      	cls_Message::show_message("","success","success_update");
		      	//Limpiamos las variables para inicializar la página con _NEW
		      	unset($_GET['id']);
                unset($_GET['edit']);
                $success=true;
		      }
		   }
           return $success;
	   }
	   
	   function btn_new_click() {
   		//Limpiamos las variables para inicializar la página con _NEW
         unset($_GET['id']);
         unset($_GET['edit']);
	   }

	   function btn_delete_click() {
	      $name_file=$_POST['txt_filename'];
          $table="";

          switch($_POST['txt_form'])
          {
            case "frm_career":
              $table="tbl_files_careers";
            break;
            case "frm_event":
              $table="tbl_files_events";
            break;
            case "frm_new":
              $table="tbl_files_news";
            break;
            case "frm_section":
              $table="tbl_files_sections";
            break;
          }

	       $filedata_tmp=$this->filedata->get_filedata($name_file);
           if($this->filedata->delete_filedata($name_file,$table, $filedata_tmp['id'])){
		      	cls_Message::show_message("","success","success_delete");
                $success=true;
		   }
	   }
   }
	
?>