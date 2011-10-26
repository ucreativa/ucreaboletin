 <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/ucreadmin/security.php"); ?>
 <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreadmin/global.php"); ?>
 <?php require_once(__CLS_PATH . "cls_html.php");

  $plugin_name="upload_files";
 ?>

<!DOCTYPE HTML>
<!--
/*
 * jQuery File Upload Plugin HTML Example 5.0.5
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://creativecommons.org/licenses/MIT/
 */
-->
<html lang="en" class="no-js">
<head>
<meta charset="utf-8">
<title>jQuery File Upload</title>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/base/jquery-ui.css" id="theme">
<?php echo cls_HTML::html_css_header(__PLG_HOST_PATH . $plugin_name . "/jquery.fileupload-ui.css","screen"); ?>
<?php echo cls_HTML::html_css_header(__PLG_HOST_PATH . $plugin_name . "/base/style.css","screen"); ?>
<?php $uploadfile_path=__PLG_HOST_PATH . $plugin_name . "/base/upload.php";
      echo cls_HTML::html_js_header(__JS_PATH . "functions.js"); ?>
</head>
<body>
<div id="fileupload">
	<!-- Elemento contenedor de mensajes de usuario -->
   <div id='msg_box_container'></div>

    <form id="frm_file" action="<?php echo $uploadfile_path . "?form=".$_GET['form']."&id=".$_GET['id'];?>" method="POST" enctype="multipart/form-data">

        <div class="fileupload-buttonbar">
            <label class="fileinput-button">
                <span>Agregar Archivos...</span>
                <input type="file" name="files[]" multiple>
            </label>
            <label><? echo cls_HTML::html_input_checkbox("chk_delete", "check", "0", 6, "", "onchange='enable_delete(this);'");?><span>Habilitar opción de eliminar</span></label>
            <!--<button type="submit" class="start">Iniciar</button>
            <button type="reset" class="cancel">Cancelar</button>
            <button type="button" class="delete">Eliminar</button> -->
        </div>
    </form>
    <div class="fileupload-content">
        <table class="files"></table>
        <div class="fileupload-progressbar"></div>
    </div>
</div>

<script id="template-upload" type="text/x-jquery-tmpl">
    <tr class="template-upload{{if error}} ui-state-error{{/if}}">
        <td class="preview"></td>
        <td class="name">${name}</td>
        <td class="size">${sizef}</td>
        {{if error}}
            <td class="error" colspan="2">Error:
                {{if error === 'maxFileSize'}}Archivo demasiado grande
                {{else error === 'minFileSize'}}Archivo demasiado pequeño
                {{else error === 'acceptFileTypes'}}Tipo de archivo no permitido
                {{else error === 'maxNumberOfFiles'}}Máximo número de archivos permitidos
                {{else}}${error}
                {{/if}}
            </td>
        {{else}}
            <td class="progress"><div></div></td>
            <td class="start"><button id=${name.replace(' ','_').replace('.','_')+''} style="visibility:hidden;">Iniciar</button></td>
            <td class="data"><button title=${name} class="btn_data" id=${name.replace(' ','_').replace('.','_')+'_data'} onclick="showclose_form_datafile(this,1,this.title);"></button></td>
        {{/if}}
        <td class="cancel"><button id=${name.replace(' ','_').replace('.','_')+'_cancel'} >Cancelar</button></td>
    </tr>
</script>
<script id="template-download" type="text/x-jquery-tmpl">
    <tr class="template-download{{if error}} ui-state-error{{/if}}">
        {{if error}}
            <td></td>
            <td class="name">${name}</td>
            <td class="size">${sizef}</td>
            <td class="error" colspan="2">Error:
                {{if error === 1}}File exceeds upload_max_filesize (php.ini directive)
                {{else error === 2}}File exceeds MAX_FILE_SIZE (HTML form directive)
                {{else error === 3}}File was only partially uploaded
                {{else error === 4}}No File was uploaded
                {{else error === 5}}Missing a temporary folder
                {{else error === 6}}Failed to write file to disk
                {{else error === 7}}File upload stopped by extension
                {{else error === 'maxFileSize'}}File is too big
                {{else error === 'minFileSize'}}File is too small
                {{else error === 'acceptFileTypes'}}Filetype not allowed
                {{else error === 'maxNumberOfFiles'}}Max number of files exceeded
                {{else error === 'uploadedBytes'}}Uploaded bytes exceed file size
                {{else error === 'emptyResult'}}Empty file upload result
                {{else}}${error}
                {{/if}}
            </td>
        {{else}}
            <td class="preview">
                {{if thumbnail_url}}
                    <a href="${url}" target="_blank"><img src="${thumbnail_url}"></a>
                {{/if}}
            </td>
            <td class="name">
                <a href="${url}"{{if thumbnail_url}} target="_blank"{{/if}}>${name}</a>
            </td>
            <td class="size">${sizef}</td>
            <td colspan="2"></td>
        {{/if}}
        <td class="data"><button title=${name} class="btn_data_edit" id=${name.replace(' ','_').replace('.','_')+'_data_edit'} onclick="showclose_form_datafile(this,1,this.title);"></button></td>
        <td class="delete">
            <button class="delete_button" title=${name} style="visibility:hidden;" data-type="${delete_type}" data-url="${delete_url+'&id=<? echo $_GET['id'];?>&form=<? echo $_GET['form'];?>'}" onclick="delete_img(this.title);" >Delete</button>
        </td>
    </tr>
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js"></script>
<script>

 //Activamos la validación del formulario
 $(document).ready(function(){
   $("#inactive_base").css("display","block");
   $("#inactive_base").css("visibility","hidden");
  });

var id_button=null;
var edit_new=null;

function showclose_form_datafile(element,flag,filename){
 if(flag==1){
    $("#txt_id").attr('value','_NEW');

    $("input#txt_filename").attr('value','');
    $("input#txt_author").attr('value','');
    $("input#txt_date").attr('value','');
    $("input#txt_type").attr('value','');
    $("#txt_description").attr('value','');
    $("#cmb_status").attr('value','A');
    $("#cmb_first").attr('value','N');

    //Si hacemos click en el botón de datos de imagen para actualizar
    if($(element).attr('class')=="btn_data_edit"){
        $("#file_process").load("processfile.php", {filename: filename}, function(){
        });
        //Cambiamos el valor del campo de referencia para saber si insertamos o actualizamos
        $("#txt_id").attr('value','_EDIT');
        edit_new='_EDIT';
    }else{
        edit_new='_NEW';
    }

    switch(filename.substr(-3)){
      case 'jpg':
         $("input#txt_type").attr('val','image/jpg');
      break;
      case 'peg':
         $("input#txt_type").attr('val','image/jpg');
      break;
      case 'png':
         $("input#txt_type").attr('val','image/png');
      break;
      case 'gif':
         $("input#txt_type").attr('val','image/gif');
      break;
      case 'doc':
         $("input#txt_type").attr('val','image/doc');
      break;
      case 'pdf':
         $("input#txt_type").attr('val','image/pdf');
      break;
    }

    $("#file_data_box").css("visibility","visible");
    $("#inactive_base").css("visibility","visible");
    $("#block_form_files").css("overflow","hidden");
    $("#txt_filename").attr('value',filename);
    id_button=element.id;

 }else{
    $("#file_data_box").css("visibility","hidden");
    $("#inactive_base").css("visibility","hidden");
    $("#block_form_files").css("overflow","auto");
 }
}

function apply_datafile(){
    var id = $("input#txt_id").val();
    var filename = $("input#txt_filename").val();
    var author = $("input#txt_author").val();
    var date = $("input#txt_date").val();
    var type = $("input#txt_type").attr('val');
    var description = $("#txt_description").val();
    var status = $("#cmb_status").val();
    var first = $("#cmb_first").val();
    var form = $("#txt_form").val();
    var id_fk = $("#txt_id_fk").val();
    var edit=edit_new;

    if(author=="" || date=="" || description==""){
       alert('Se deben llenar todos los campos');
    }else{
        $("#file_data_box").css("visibility","hidden");
        $("#inactive_base").css("visibility","hidden");
        $("#block_form_files").css("overflow","auto");
        $("#file_process").load("processfile.php", {edit: edit_new, txt_id_fk: id_fk, txt_form: form, txt_id: id, txt_filename: filename, txt_author: author, txt_date: date, txt_type: type, txt_description: description, cmb_status: status, cmb_first: first}, function(){
        });
    }
}

function enable_delete(element){
   if(element.checked){
       $('.delete_button').css('visibility','visible');
    }else{
       $('.delete_button').css('visibility','hidden');
    }
}

function delete_img(filename){
   var form = $("#txt_form").val();
   $("#file_process").load("processfile.php", {txt_filename: filename, txt_form: form, delete_file:'delete'}, function(){
   });
}

$(function() {
  $("#btn_save").click(function() {
    // validate and process form here
     apply_datafile();
  });
});

</script>
<?php echo cls_HTML::html_js_header(__PLG_HOST_PATH . $plugin_name . "/jquery.iframe-transport.js","screen"); ?>
<?php echo cls_HTML::html_js_header(__PLG_HOST_PATH . $plugin_name . "/jquery.fileupload.js","screen"); ?>
<?php echo cls_HTML::html_js_header(__PLG_HOST_PATH . $plugin_name . "/jquery.fileupload-ui.js","screen"); ?>
<?php echo cls_HTML::html_js_header(__PLG_HOST_PATH . $plugin_name . "/base/application.js","screen"); ?>

    <div class="form_data_box" id="file_data_box">
          	<div id="userpage">
            <br /><br />
		    <?php echo cls_HTML::html_form_tag("frm_file", "","","post"); ?>
		    <fieldset class="groupbox" ><legend>DATOS DE ARCHIVO</legend>
			    <div class="block_form">
                    <?php echo cls_HTML::html_input_hidden("txt_form",$_GET['form']); ?>
                    <?php echo cls_HTML::html_input_hidden("txt_id",""); ?>
                    <?php echo cls_HTML::html_input_hidden("txt_id_fk",$_GET['id']); ?>
                    <?php echo cls_HTML::html_input_hidden("txt_filename",""); ?>
                    <?php echo cls_HTML::html_label_tag("Autor:"); ?>
				    <br />
				    <?php echo cls_HTML::html_input_text("txt_author","txt_author","required text",64,20,"","Autor",1,"","",""); ?>
				    <br /><br />
                    <?php echo cls_HTML::html_label_tag("Fecha:"); ?>
				    <br />
                    <?php echo cls_HTML::html_input_text("txt_date","txt_date","required text",10,10,"","Fecha",2,"","",""); ?>
				    <br /><br />
                    <?php echo cls_HTML::html_input_hidden("txt_type",""); ?>
                    <?php echo cls_HTML::html_label_tag("Descripción:"); ?>
				    <br />
				    <?php echo cls_HTML::html_textarea(4,35,"txt_description","txt_description","textarea","",3,"","",""); ?>
				    <br /><br />
				    <?php echo cls_HTML::html_label_tag("Estado:"); ?>
				    <?php echo cls_HTML::html_select("cmb_status", array('A' => 'Activa', 'I' => 'Inactiva'), "cmb_status", "combo", 4, "", ""); ?>
				    &nbsp;&nbsp;&nbsp;
				    <?php echo cls_HTML::html_label_tag("Mostrar de primero:"); ?>
				    <?php echo cls_HTML::html_select("cmb_first", array('N' => 'No', 'Y' => 'Sí'), "cmb_first", "combo", 5, "", ""); ?>
				    <br />
                </div>
			 </fieldset>
	 		 <div id="action_buttons_form">
			    <?php echo cls_HTML::html_input_button("button","btn_save","btn_save","button","Guardar",9,"",""); ?>
			    <?php echo cls_HTML::html_input_button("button","btn_cancel","btn_cancel","button","Cancelar",12,"","onclick=\"$('#frm_file').attr('novalidate','novalidate');showclose_form_datafile(this,0,'');\""); ?>
			    <br />
		     </div>
		    <?php echo cls_HTML::html_form_end(); ?>
		</div>
    </div>
    <div style="visibility:hidden;"id='file_process'></div>
</body>
</html>