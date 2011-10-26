<?php
    require_once("global.php");
    require_once(__CLS_PATH . "cls_html.php");
    require_once(__CLS_PATH . "cls_database.php");
    require_once(__CTR_PATH . "ctr_section.php");

    $main_connection=new cls_Database();
    $section_core=new ctr_Section();

    if($main_connection->is_connect()){
       echo "";
    }else{
       echo "conn failed!!";
    }

    //Inicializamos el llamado a la info de la BD de la sección
    $section_key=$array_sections[0];  //s=inicio
    $section_data=$section_core->get_sectiondata($section_key);
    $section_files=$section_core->get_sectionfiles($section_key);
?>

<!DOCTYPE HTML>
<html>
  <head>
      <?php
          echo "<link rel='shortcut icon' href='favicon.ico'> \n";
          echo "<meta charset='utf-8'/> \n";
          echo "<meta name='keywords' content='".$section_data['keyword']."'/> \n";
          echo "<meta name='description' content='".$section_data['description']."'/> \n";
          echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/> \n";
      	  echo "<meta http-equiv='reply-to' content='".$array_global_settings['site_contact_email']."'/> \n";
      	  echo "<meta http-equiv='Content-Language' content='es'/> \n";
      	  echo "<meta name='title' content='".$section_data['title']."'/> \n";
      	  echo "<meta name='classification' content='universidad'/> \n";
      	  echo "<meta name='generator' content='acore'/> \n";
      	  echo "<meta name='distribution' content='global'/> \n";
      	  echo "<meta name='robots' content='follow, all'/> \n";
      	  echo "<meta name='language' content='es'/> \n";
      	  echo "<meta name='author' content='ucreativa.com'/> \n";
      	  echo "<meta name='copyright' content='Universidad Creativa de Costa Rica'/> \n";
      	  echo "<meta name='country' content='Costa Rica'/> \n";

          echo cls_HTML::html_js_header(__JS_PATH . "jquery-1.6.2.min.js");
          echo cls_HTML::html_js_header(__JS_PATH . "jquery-ui-1.8.6.custom.min.js");
          echo cls_HTML::html_js_header(__JS_PATH . "jquery_general_adds.js");
          echo cls_HTML::html_js_header(__JS_PATH . "jquery_plugins/section_slider/js/jquery.anythingslider.js");
          echo cls_HTML::html_js_header(__JS_PATH . "functions.js");
          echo cls_HTML::html_css_header(__CSS_PATH . "style.css","screen");
          echo cls_HTML::html_css_header(__CSS_PATH . "general.css","screen");
          echo cls_HTML::html_css_header(__CSS_PATH . "header.css","screen");
          echo cls_HTML::html_css_header(__CSS_PATH . "content.css","screen");
          echo cls_HTML::html_css_header(__CSS_PATH . "footer.css","screen");
          echo cls_HTML::html_css_header(__CSS_PATH . "sections.css","screen");
          echo cls_HTML::html_css_header(__CSS_PATH . "init_banner.css","screen");
          echo cls_HTML::html_css_header(__JS_PATH . "jquery_plugins/section_slider/css/anythingslider.css","screen");
      ?>
     <title><?php echo $section_data['title']; ?></title>
  </head>

  <body onload="init_tabs($('#sections_tabs').children().length,'<?php echo __IMG_PATH ?>');
                init_tabs($('#sections_content_box').children().length,'<?php echo __IMG_PATH ?>');
                init_tabs_news($('#news_content_box').children().length,'<?php echo __IMG_PATH ?>');
                init_news_gallery(); $(document).ready(function() { $('div').attr('title','');}); ">

    <div id="page">

        <div id="header">
            <?php include_once(__VWS_PATH . "/header.php"); ?>
        </div>
        <div id="central_content">
            <?php
             if(isset($_GET['s'])){
                echo "<script>highlight_menu_item('".$_GET['s']."','".__IMG_PATH."');</script>";
                if($_GET['s']==$array_sections[1]){
                   include_once(__VWS_PATH . "sections/quienes_somos.php");
                }
                if($_GET['s']==$array_sections[2] && isset($_GET['idc'])){
                   include_once(__VWS_PATH . "sections/carrera.php");
                }elseif($_GET['s']==$array_sections[2]){
                   include_once(__VWS_PATH . "sections/carreras.php");
                }
                if($_GET['s']==$array_sections[3] && isset($_GET['idn'])){
                   include_once(__VWS_PATH . "sections/noticia.php");
                }elseif($_GET['s']==$array_sections[3]){
                   include_once(__VWS_PATH . "sections/noticias.php");
                }
                if($_GET['s']==$array_sections[4]){
                   include_once(__VWS_PATH . "sections/edificios.php");
                }
                if($_GET['s']==$array_sections[5]){
                   include_once(__VWS_PATH . "sections/vida_u.php");
                }
                if($_GET['s']==$array_sections[6]){
                   include_once(__VWS_PATH . "sections/convenios.php");
                }
                if($_GET['s']==$array_sections[7]){
                   include_once(__VWS_PATH . "sections/inversion.php");
                }
                if($_GET['s']==$array_sections[8]){
                   include_once(__VWS_PATH . "sections/preguntas.php");
                }
                if($_GET['s']==$array_microsites[0]){
                   include_once(__VWS_PATH . "sections/vecinos.php");
                }
                if($_GET['s']==$array_microsites[1]){
                   include_once(__VWS_PATH . "sections/eventos.php");
                }
                if($_GET['s']=="site_map"){
                   include_once(__VWS_PATH . "sitemap.php");
                }
             }else{
                 include_once(__VWS_PATH . "sections/inicio.php");
             }
            ?>
        </div>
        <div id="footer">
            <?php include_once(__VWS_PATH . "/footer.php"); ?>
            <div id="credits"><?php echo $array_global_settings['credits']; ?></div>
        </div>
        <?php echo cls_HTML::html_link_tag("", "to_top", "", "#", "", "ir arriba", "") ?>
    </div>

  </body>
</html>
