<?php	
      require_once("global.php");  
	   require_once( __CLS_PATH . "cls_html.php");
?>

<html>

  <head>
      <?php
          echo cls_HTML::html_js_header("//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js");
          echo cls_HTML::html_js_header(__JS_PATH . "jquery-ui-1.8.6.custom.min.js");
          echo cls_HTML::html_js_header(__JS_PATH . "functions.js");
          echo cls_HTML::html_js_header(__JS_PATH . "jquery.betterTooltip.js");
          echo cls_HTML::html_css_header(__CSS_PATH . "style.css","screen");
          echo cls_HTML::html_css_header(__CSS_PATH . "tooltip/theme/style_tooltip.css","screen");
      ?>

    <title>UCREADMIN v 1.0</title>
  </head>

  <body id="login_page">
  
  <!-- Elemento contenedor de mensajes de usuario -->
  <div id='msg_box_container'></div>
   
	  <div>
		    <?php
			    include_once(__VWS_PATH . "/login.php");
		    ?>
	 </div>
	
  </body>

</html>
