  <div id="main_menu">
      <!--html_link_tag($text, $id, $class, $href, $target, $title, $event) -->
      <?php
        if(!isset($_GET['s'])){
            //echo cls_HTML::html_link_tag("&nbsp;&nbsp;&nbsp;&nbsp;Quiénes Somos", "quienes_somos", "menu_item", "", "", "Quiénes Somos", "onclick=\"highlight_menu(this,1,'" . __IMG_PATH ."');\"");
        }else{
            //echo cls_HTML::html_link_tag("&nbsp;&nbsp;&nbsp;&nbsp;Quiénes Somos", "quienes_somos", "menu_item", "?s=".$array_sections[1], "", "Quiénes Somos", "");
        }
      ?>
  </div>