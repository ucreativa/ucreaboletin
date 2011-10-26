<?php

   /* Archivo controlador que contiene los llamados a las acciones de la vista */

   //require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreasite/global.php");
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

       public function get_lastnews($num_news)
	   {
			 return $this->newdata->get_lastnews($num_news);
	   }

       public function get_newfiles($id_new,$first)
	   {
			 return $this->newdata->get_newfiles($id_new,$first);
	   }

       public function get_lastnewfile()
	   {
			 return $this->newdata->get_lastnewfile();
	   }

    }
	
?>