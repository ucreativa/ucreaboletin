<?php

   /* Archivo controlador que contiene los llamados a las acciones de la vista */

   //require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreasite/global.php");
   require_once(__CLS_PATH . "cls_section.php");

   class ctr_Section {

   	private $sectiondata;

       public function __construct()
	   {
			 $this->sectiondata=new cls_Section();
	   }

	   public function get_sectiondata($key_section)
	   {
			 return $this->sectiondata->get_sectiondata($key_section);
	   }

       public function get_sections()
	   {
			 return $this->sectiondata->get_sections();
	   }

       public function get_sectionfiles($key_section)
	   {
			 return $this->sectiondata->get_sectionfiles($key_section);
	   }

    }
	
?>