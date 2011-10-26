<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreadmin/global.php");
    require_once(__CLS_PATH . "cls_html.php");
    require(__CTR_PATH . "ctr_login.php");
    
    //Declaramos el controlador de la vista actual el cual contiene las acciones a ejecutar
    $ctr_Login=new ctr_Login();
?>

<div id="login">
     
    <?php echo cls_HTML::html_form_tag("frm_login", "" ,"","post");	 ?>
    <?php echo cls_HTML::html_label_tag("USUARIO:"); ?>
    <?php echo cls_HTML::html_input_text("txt_user","txt_user","text",64,20,"","Nombre de Usuario",0,"","","required"); ?>
    <br /><br />
    <?php echo cls_HTML::html_label_tag("PASSWORD:"); ?>
    <?php echo cls_HTML::html_input_password("txt_pssw","txt_pssw","text",64,"","Contraseña del Usuario",0,"","","required"); ?>
    <br /><br />
    <?php echo cls_HTML::html_input_button("submit","btn_login","btn_login","button","Entrar",0,"",""); ?>
    <br /><br />
    <?php echo cls_HTML::html_form_end(); ?>
    
</div>

<div id="sub_login">
	<?php     
        //Parámetros del: html_link_tag($text, $id, $class, $href, $target, $title, $event)	     
	     echo cls_HTML::html_link_tag("¿Olvidaste tu contraseña?", "btn_forgot", "link", "#", "_self", "¿Olvidaste tu contraseña?","");
	     echo cls_HTML::html_link_tag("Registrarse", "btn_register", "link", "#", "_self", "Registrarse","");
	?>
</div>

 <?php
      //Eventos click de los botones de acción
      
	   if(isset($_POST['btn_login'])){
	   	$ctr_Login->btn_login_click();
	   }
 ?>
 