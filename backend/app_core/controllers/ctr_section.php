<?php

   /* Archivo controlador que contiene los llamados a las acciones de la vista
   de Usuarios (ADD,EDIT,DELETE,SEARCH) */
   
   require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreadmin/global.php");
   require_once( __CLS_PATH . "cls_section.php"); 
     
   class ctr_Section {
   	
   	private $sectiondata;

      public function __construct()
	   {
			 $this->sectiondata=new cls_Section(); 
	   }
	   
	   public function get_sectiondata($id_section)
	   {
			 return $this->sectiondata->get_sectiondata($id_section);
	   }  
	     	  
   	//Si se presiona el botón Agregar Usuario 
	   function btn_save_click() 
	   { 	         
	      $sectioninfo=array();
	      $id_section=$_POST['txt_id'];
	            
	      $sectioninfo[0]=$_POST['txt_id'];
	      $sectioninfo[1]=$_POST['txt_key'];
	      $sectioninfo[2]=$_POST['txt_name'];
	      $sectioninfo[3]=$_POST['txt_title'];
		  $sectioninfo[4]=$_POST['txt_subtitle'];
		  $sectioninfo[5]=$_POST['txt_description'];
		  $sectioninfo[6]=$_POST['txt_info'];
		  $sectioninfo[7]=$_POST['cmb_showflag'];
	      $sectioninfo[8]=$_POST['txt_urlblog'];
	      $sectioninfo[9]=$_POST['txt_keywords'];
	      $sectioninfo[10]=$_POST['cmb_status']; 	
	   	
	   	/*Si vamos a insertar un registro nuevo (_NEW) o actualizar en caso de que
	   	$_GET['id'] tenga un valor asignado desde el formulario de búsqueda*/   	
	   	if($id_section=="_NEW"){	
		   	if(($this->sectiondata->insert_sectiondata($sectioninfo)==1)){  
		      	cls_Message::show_message("","success","success_insert");
		      }
		   }else{
		   	if($this->sectiondata->update_sectiondata($sectioninfo,$id_section)){ 
		      	cls_Message::show_message("","success","success_update");
		      	//Limpiamos las variables para inicializar la página con _NEW
		      	unset($_GET['id']);
               unset($_GET['edit']);
		      }
		   }
	   }
	   
	   function btn_new_click() {
   		//Limpiamos las variables para inicializar la página con _NEW
      	unset($_GET['id']);
         unset($_GET['edit']);
	   }
	   
	   function btn_delete_click() {

	   }
   }
	
?>