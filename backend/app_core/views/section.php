<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreadmin/global.php");
    require_once(__CLS_PATH . "cls_html.php");
    require_once(__CLS_PATH . "cls_searchbox.php");
    require(__CTR_PATH . "ctr_section.php");
    	
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

    <script>
      $(document).ready(function() {
		$('.text').betterTooltip({speed: 150, delay: 300});
      });
    </script>

	<div class="general_form_page">

	<!-- Elemento contenedor de mensajes de usuario -->
   <div id='msg_box_container'></div>

		<div id="userpage">
		    <?php echo cls_HTML::html_form_tag("frm_section", "","","post"); ?>
		    
		    <fieldset class="groupbox" ><legend>SECCIONES</legend>
			    <div class="block_form">							
			       <?php echo cls_HTML::html_input_hidden("txt_id",""); ?>
				    <?php echo cls_HTML::html_label_tag("Tag:"); ?>
				    <br />
				    <?php 
                //FALTA LLENAR DESDE BD				    
				    echo cls_HTML::html_multiselect("cmb_tags", array(0=>"Ucreativa",1=>"Eventos",2=>"News"), "cmb_groups", "combo", 1, "", ""); ?>
				    <br /><br />
				    <?php echo cls_HTML::html_label_tag("Clave:"); ?>
				    <br />
				    <?php echo cls_HTML::html_input_text("txt_key","txt_key","text",2,5,"","clave",2,"","","required"); ?>
				    <br /><br />
				    <?php echo cls_HTML::html_label_tag("Nombre:"); ?>
				    <br />
				    <?php echo cls_HTML::html_input_text("txt_name","txt_name","text",32,20,"","Nombre",3,"","","required"); ?>
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
				    <?php echo cls_HTML::html_label_tag("URL blog:"); ?>
				    <br />
				    <?php echo cls_HTML::html_input_text("txt_urlblog","txt_urlblog","text",128,20,"","URL BLOG",7,"","",""); ?>
                <br />
				 </div>
			    <div class="block_form">
				    <?php echo cls_HTML::html_label_tag("Key Words:"); ?>
				    <br />
				    <?php echo cls_HTML::html_input_text("txt_keywords","txt_keywords","text",128,20,"","Keywords",8,"","","required"); ?>
				    <br /><br />
				    <?php echo cls_HTML::html_label_tag("Estado:"); ?>
				    <?php echo cls_HTML::html_select("cmb_status", array('A' => 'Activa', 'I' => 'Inactiva'), "cmb_status", "combo", 9, "", ""); ?>
				    &nbsp;&nbsp;&nbsp;
				    <?php echo cls_HTML::html_label_tag("Mostrar abierta al inicio:"); ?>
				    <?php echo cls_HTML::html_select("cmb_showflag", array(0 => 'No', 1 => 'Sí'), "cmb_showflag", "combo", 10, "", ""); ?>
				    <br /><br />
				    <?php echo cls_HTML::html_label_tag("Texto:"); ?>
				    <br /><br />
				    <?php echo cls_HTML::html_textarea(4,30,"txt_info","txt_info","ckeditor","",11,20,"","",""); ?>
				 </div>
			 </fieldset> 
	 		 <div id="action_buttons_form">
			    <?php echo cls_HTML::html_input_button("submit","btn_new","btn_new","button","Nuevo",9,"","onclick=\"$('#frm_section').attr('novalidate','novalidate');\""); ?>
			    <?php echo cls_HTML::html_input_button("submit","btn_save","btn_save","button","Guardar",10,"",""); ?>
			    <?php echo cls_HTML::html_input_button("submit","btn_search","btn_search","button","Buscar",12,"","onclick=\"$('#frm_section').attr('novalidate','novalidate');\""); ?>
			    <br />
		   </div>
		    <?php echo cls_HTML::html_form_end(); ?>
		</div>
		   
      <?php
	      //Eventos click de los botones de acción

		   if(isset($_POST['btn_new'])){
		   	$ctr_Section->btn_new_click();
		   }

		   if(isset($_POST['btn_save'])){
		   	$ctr_Section->btn_save_click();
		   }

		   if(isset($_POST['btn_search'])){
		   	 $search=new cls_Searchbox();
		       echo $search->show_searchbox(__VWS_HOST_PATH . "section.php", "Búsqueda de Secciones", "&nbsp;&nbsp;Digite el nombre de la Sección:", "section.php", "frm_section");
		   }
		   
		   
		   /*Procedemos a llenar el formulario con los datos traídos del formulario
		    de búsqueda */
		    
		  	if(isset($_GET['edit']) && isset($_GET['id'])){
		  		
		  		if($_GET['edit']=="1"){
		  			$section_data=$ctr_Section->get_sectiondata($_GET['id']);

		  			echo "<script>
		  			         $('#txt_id').attr('value','" . $section_data[0][0] . "');
		  			         $('#txt_key').attr('value','" . $section_data[0][1] . "');
		  			         $('#txt_name').attr('value','" . $section_data[0][2] . "');
								$('#txt_title').attr('value','" . $section_data[0][3] . "');
								$('#txt_subtitle').attr('value','" . $section_data[0][4] . "');
								$('#txt_description').attr('value'," . json_encode($section_data[0][5]) . ");
								$('#txt_info').attr('value'," . json_encode($section_data[0][6]) . ");
		            		$('#cmb_showflag').attr('value','" . $section_data[0][7] . "');
								$('#txt_urlblog').attr('value','" . $section_data[0][8] . "');
								$('#txt_keywords').attr('value','" . $section_data[0][9] . "');
								$('#cmb_status').attr('value','" . $section_data[0][10] . "');
		  			      </script>";	  
		  		}
		  		
		   }else{
		  			echo "<script>$('#txt_id').attr('value','_NEW');</script>";
		  	}  

     ?>
	</div>
  </body>
 </html>
