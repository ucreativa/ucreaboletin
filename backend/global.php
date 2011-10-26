﻿<?php
/*          _\|/_
            (0 0)
--------o00o-{_}-o00o-----------------------

UCREASITE v1.0 (2011)
Universidad Creativa 2011
ARCHIVO DE CONFIGURACIÓN GLOBAL.
--------------------------------------------
*/

  // ------ Variables que definen el nombre actual del hosting -------

  //$myhost="http://localhost";
  $myhost="http://10.20.30.105";   
  //$myhost="http://ucreativa.com";
  $myproject="ucreadmin";
  $mysite=$myhost . "/" . $myproject;

   // ------ Variables estáticas que definen las rutas absolutas del proyecto -------
  define('__ROOT__', $_SERVER["DOCUMENT_ROOT"]);
  define('__HOST__', "http://10.50.1.138");
  define('__SITE_PATH', $mysite);

  define('__CLS_PATH', __ROOT__ . "/" . $myproject . "/app_core/classes/");
  define('__PLG_PATH', __ROOT__ . "/" . $myproject . "/app_core/plugins/");
  define('__PLG_HOST_PATH', $mysite . "/app_core/plugins/");
  define('__MOD_PATH', __ROOT__ . "/" . $myproject . "/app_core/modules/");
  define('__VWS_PATH', __ROOT__ . "/" . $myproject . "/app_core/views/");
  define('__VWS_HOST_PATH', $mysite . "/app_core/views/");
  define('__CTR_PATH', __ROOT__ . "/" . $myproject . "/app_core/controllers/");
  define('__CTR_HOST_PATH', $mysite . "/app_core/controllers/");

  define('__RSC_PATH', __ROOT__ . "/app_core/resources/");
  define('__RSC_HOST_PATH', $mysite . "/app_core/resources/");
  define('__RSC_PHO_HOST_PATH', $mysite . "/app_core/resources/photos/");
  define('__RSC_FLE_HOST_PATH', $mysite . "/app_core/resources/files/");
  define('__RSC_FLE_PATH',  __ROOT__  . "/" . $myproject . "/app_core/resources/files/");
  define('__RSC_TBN_HOST_PATH', $mysite . "/app_core/resources/thumbnails/");
  define('__RSC_IMG_HOST_PATH', $mysite . "/app_core/resources/images/");

  define('__CONN_PATH', __ROOT__ . "/" . $myproject . "/app_conn/");

  define('__JS_PATH', $mysite . "/app_design/js/");
  define('__CSS_PATH', $mysite . "/app_design/css/");
  define('__IMG_PATH', $mysite . "/app_design/img/");


// ************************* GLOBAL FUNCTIONS *********************** //

  set_error_handler("my_error_handler", E_ALL);

  require_once(__CLS_PATH . "cls_message.php");

  /*my_error_handler: Maneja globalmente los warnings y excepciones de PHP y los muestra en
  un message box personalizado.*/

  function my_error_handler($errno, $errstr, $errfile, $errline, $errcontext)
  {
	   try{
			throw new Exception($errstr);
	   }catch(Exception $e){
		   	cls_Message::show_message($e->getMessage(),"warning","");
	   }
  }

  function get_all_strings_between($string,$start,$end)
  {
      //Returns an array of all values which are between two tags in a set of data
      $strings = array();
      $startPos = 0;
      $i = 0;
      //echo strlen($string)."\n";
      while($startPos < strlen($string) && $matched = get_string_between(substr($string,$startPos),$start,$end))
      {
        if ($matched == null || $matched[1] == null || $matched[1] == '') break;
        $startPos = $matched[0]+$startPos+1;
        array_push($strings,$matched[1]);
        $i++;
      }
      return $strings;
  }

  function get_string_between($string, $start, $end){
      //$string = " ".$string;
      $ini = strpos($string,$start);
      if ($ini == 0) return null;
      $ini += strlen($start);
      $len = strpos($string,$end,$ini) - $ini;
      return array($ini+$len,substr($string,$ini,$len));
  }


  function string_between($string, $start, $end){
    	$string = " ".$string;
    	$ini = strpos($string,$start);
    	if ($ini == 0) return "";
    	$ini += strlen($start);
    	$len = strpos($string,$end,$ini) - $ini;
    	return substr($string,$ini,$len);
  }


  //listado de parámetros globales
  $array_global_settings=array();

  $array_global_settings['sys_name']="UCREADMIN";
  $array_global_settings['sys_version']="v1.0";

?>