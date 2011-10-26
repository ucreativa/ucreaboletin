<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreadmin/global.php");
    require_once(__CLS_PATH . "cls_html.php");
    require_once(__CLS_PATH . "cls_searchbox.php");
    require(__CTR_PATH . "ctr_new.php");
    	
	 //Declaramos el controlador de la vista actual el cual contiene las acciones a ejecutar
    $ctr_New=new ctr_New();
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

    <script>
      $(document).ready(function() {
		$('.text').betterTooltip({speed: 150, delay: 300});
      });
    </script>

	<div class="general_form_page">

	<!-- Elemento contenedor de mensajes de usuario -->
   <div id='msg_box_container'></div>
   
		<div id="userpage">
		    <?php echo cls_HTML::html_form_tag("frm_new", "","","post"); ?>
		    
		    <fieldset class="groupbox" ><legend>Noticias</legend>
			    <div class="block_form">							
			       <?php echo cls_HTML::html_input_hidden("txt_id",""); ?>
				    <?php echo cls_HTML::html_label_tag("Tag:"); ?>
				    <br />
				    <?php 
                //FALTA LLENAR DESDE BD				    
				    echo cls_HTML::html_multiselect("cmb_tags", array(0=>"Ucreativa",1=>"Eventos",2=>"News"), "cmb_groups", "combo", 1, "", ""); ?>
				    <br /><br />
				    <?php echo cls_HTML::html_label_tag("Título:"); ?>
				    <br />
				    <?php echo cls_HTML::html_input_text("txt_title","txt_title","text",128,20,"","Título",4,"","","required"); ?>
				    <br /><br />
				    <?php echo cls_HTML::html_label_tag("Subtítulo:"); ?>
				    <br />
				    <?php echo cls_HTML::html_input_text("txt_subtitle","txt_subtitle","text",128,20,"","Subtítulo",5,"","","required"); ?>
				    <br /><br />
				    <?php echo cls_HTML::html_label_tag("Descripción:"); ?>
				    <br />
				    <?php echo cls_HTML::html_input_text("txt_description","txt_description","text",256,20,"","Descripción",6,"","","required"); ?>
				    <br /><br />
                    <?php echo cls_HTML::html_label_tag("Fuente:"); ?>
				    <br />
				    <?php echo cls_HTML::html_input_text("txt_source","txt_source","text",128,20,"","Descripción",6,"","","required"); ?>
				    <br /><br />
                    <?php echo cls_HTML::html_label_tag("Autor:"); ?>
				    <br />
				    <?php echo cls_HTML::html_input_text("txt_author","txt_author","text",64,20,"","Descripción",6,"","","required"); ?>
				    <br /><br />
				 </div>
			    <div class="block_form">
				    <?php echo cls_HTML::html_label_tag("Estado:"); ?>
				    <?php echo cls_HTML::html_select("cmb_status", array('A' => 'Activa', 'I' => 'Inactiva'), "cmb_status", "combo", 9, "", ""); ?>
				    <br /><br />
				    <?php echo cls_HTML::html_label_tag("Texto:"); ?>
				    <br /><br />
				    <?php echo cls_HTML::html_textarea(4,30,"txt_info","txt_info","ckeditor","",11,20,"","",""); ?>
				</div>
			 </fieldset> 
	 		 <div id="action_buttons_form">
			    <?php echo cls_HTML::html_input_button("submit","btn_new","btn_new","button","Nuevo",9,"","onclick=\"$('#frm_new').attr('novalidate','novalidate');\""); ?>
			    <?php echo cls_HTML::html_input_button("submit","btn_save","btn_save","button","Guardar",10,"",""); ?>
			    <?php echo cls_HTML::html_input_button("submit","btn_search","btn_search","button","Buscar",12,"","onclick=\"$('#frm_new').attr('novalidate','novalidate');\""); ?>
			    <br />
		   </div>
		    <?php echo cls_HTML::html_form_end(); ?>
		</div>
		   
      <?php
	      //Eventos click de los botones de acción
	      
		   if(isset($_POST['btn_new'])){
		   	$ctr_New->btn_new_click();
		   }

		   if(isset($_POST['btn_save'])){
		   	$ctr_New->btn_save_click();
		   }
		   
		   if(isset($_POST['btn_search'])){
		   	   $search=new cls_Searchbox();
		       echo $search->show_searchbox(__VWS_HOST_PATH . "new.php", "Búsqueda de Noticias", "&nbsp;&nbsp;Digite el tag, la fecha o el Título de la Noticia:", "new.php", "frm_new");
		   }
		   
		   
		   /*Procedemos a llenar el formulario con los datos traídos del formulario
		    de búsqueda */

		  	if(isset($_GET['edit']) && isset($_GET['id'])){
		  		
		  		if($_GET['edit']=="1"){
		  			$new_data=$ctr_New->get_newdata($_GET['id']);

		  			echo "<script>
		  			         $('#txt_id').attr('value','" . $new_data[0][0] . "');
							 $('#txt_title').attr('value','" . $new_data[0][1] . "');
							 $('#txt_subtitle').attr('value','" . $new_data[0][2] . "');
							 $('#txt_description').attr('value'," . json_encode($new_data[0][3]) . ");
							 $('#txt_info').attr('value'," . json_encode($new_data[0][4]) . ");
                             $('#txt_source').attr('value','" . $new_data[0][5] . "');
                             $('#txt_author').attr('value','" . $new_data[0][6] . "');
							 $('#cmb_status').attr('value','" . $new_data[0][7] . "');
		  			     </script>";
		  		}
		  		
		   }else{
		  			echo "<script>$('#txt_id').attr('value','_NEW');</script>";
		  	}  

     ?>
	</div>
  </body>
 </html>
