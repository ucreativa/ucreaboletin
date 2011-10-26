<?php

    require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreadmin/global.php");
    require_once(__CLS_PATH . "cls_html.php");
    require_once(__CLS_PATH . "cls_searchbox.php");
    require(__CTR_PATH . "ctr_section.php");
    require_once(__CTR_PATH . "ctr_file.php");

	 //Declaramos el controlador de la vista actual el cual contiene las acciones a ejecutar
    $ctr_Section=new ctr_Section();
?>

<html>
 <head>
	   <?php
	       echo cls_HTML::html_js_header(__JS_PATH . "jquery-1.6.2.min.js");
	       echo cls_HTML::html_js_header(__JS_PATH . "jquery-ui-1.8.6.custom.min.js");
	       echo cls_HTML::html_js_header(__JS_PATH . "jquery.betterTooltip.js");
	       echo cls_HTML::html_js_header(__JS_PATH . "functions.js");
           echo cls_HTML::html_js_header(__JS_PATH . "ckeditor/ckeditor_basic.js");
	       echo cls_HTML::html_css_header(__CSS_PATH . "style.css","screen");
	       echo cls_HTML::html_css_header(__CSS_PATH . "tooltip/theme/style_tooltip.css","screen");
	   ?>
	 <title><? echo $array_global_settings['sys_name'] . " " . $array_global_settings['sys_version']; ?></title>
 </head>

  <body>

	<div class="general_form_page">

	<!-- Elemento contenedor de mensajes de usuario -->
   <div id='msg_box_container'></div>
   
		<div id="userpage">
		    <?php //echo cls_HTML::html_form_tag("frm_file", "","","post"); ?>

		    <fieldset class="groupbox" id="fst_files"> <legend>ARCHIVOS</legend>
			    <div class="block_form" id="block_form_files">
			      <?php include_once(__PLG_PATH . "/upload_files/base/index.php"); ?>
				 </div>
                     <div id="inactive_base"></div>
			 </fieldset>
		    <?php // echo cls_HTML::html_form_end();?>
		</div>
	</div>
  </body>
 </html>
