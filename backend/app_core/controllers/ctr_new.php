<?php

   /* Archivo controlador que contiene los llamados a las acciones de la vista
   de Usuarios (ADD,EDIT,DELETE,SEARCH) */
   
   require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreadmin/global.php");
   require_once(__CLS_PATH . "cls_new.php");
     
   class ctr_New {
   	
   	private $newdata;
      
      public function __construct()
	   {
		  $this->newdata=new cls_New();
	   }  

	   public function get_newdata($id_new)
	   {
		  return $this->newdata->get_newdata($id_new);
	   }  
	     	  
   	//Si se presiona el botón Agregar Usuario 
	   function btn_save_click() 
	   {
	      $newinfo=array();
	      $id_new=$_POST['txt_id'];

	      $newinfo[0]=$_POST['txt_id'];
	      $newinfo[1]=$_POST['txt_title'];
		  $newinfo[2]=$_POST['txt_subtitle'];
		  $newinfo[3]=$_POST['txt_description'];
          $newinfo[4]=$_POST['txt_info'];
          $newinfo[5]=$_POST['txt_source'];
          $newinfo[6]=$_POST['txt_author'];
	      $newinfo[7]=$_POST['cmb_status'];
	   	
	   	/*Si vamos a insertar un registro nuevo (_NEW) o actualizar en caso de que
	   	$_GET['id'] tenga un valor asignado desde el formulario de búsqueda*/   	
	   	if($id_new=="_NEW"){
		   	if(($this->newdata->insert_newdata($newinfo)==1)){
		      	cls_Message::show_message("","success","success_insert");
		      }
		   }else{
		   	if($this->newdata->update_newdata($newinfo,$id_new)){
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