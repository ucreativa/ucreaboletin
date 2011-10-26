<?php
     require_once(__CTR_PATH . "ctr_new.php");
     $new_core=new ctr_New();

     $id_new=$_GET['idn'];
     $new_files=$new_core->get_newfiles($id_new,false);
     $new_data=$new_core->get_newdata($id_new);

     echo cls_HTML::html_css_header(__CSS_PATH . "news.css","screen");

     //  Seteamos el título de cada página por sección
     echo "<script> set_title('" . $new_data['title'] . "');</script>";
?>

<script>
  // Set up Sliders
  // **************
  $(function(){
    $('#section_slider').anythingSlider({resizeContents: false, // If true, solitary images/objects in the panel will expand to fit the viewport
      navigationFormatter : function(index, panel){ // Format navigation labels with text
     }});
  });
</script>

          <div id="banner">
          	<!-- AnythingSlider -->
  			<ul id="section_slider">

                  <?php
                      $i=0;
                      foreach($new_files as $value){
                            $src=__RSC_FLE_HOST_PATH . "news/new_" . $id_new . "/" . $value[1];
                            $size=getimagesize($src);
                            $tam=" width='".$size[0]."' height='".$size[1] ."'";

                            echo "<li class='panel'>"
                                     . cls_HTML::html_img_tag($src, "", "section_banner", $value[2], $tam) .
                                  "</li>";
                            $i++;
                      }
                  ?>

  			</ul>
  			<!-- END AnythingSlider  -->
         </div>

	    <div class="section_tab">
             <div class="icon_tab" id="icon_tab" onclick=""></div><span class="section_title" id="section_3">Noticias</span>
             <div title="open" class="content_tab">
                 <span class="section_text" id="section_text"><br/></span>
                 <div id="news_blocks">
                     <div id="news_content_box">
                     <span class="section_text" id="section_text"><div class="published_date"><span>Publicado:&nbsp;<? echo $new_data['created'];?></span></div></span>
                	    <div class="new_block">
                                <?php echo cls_HTML::html_link_tag("[índice]", "", "return", "?s=" . $array_sections[1], "", "índice", "") ?>
                 				<div id="icon_new_1"><p class="new_title"><?php echo $new_data['title']; ?></p></div>
                                <div id="content_new_1" title="open">
                                        <div class="news_description_full"><?php echo $new_data['text']; ?></div>
                                        <br/><br/>
                                </div>
                                <?php echo cls_HTML::html_link_tag("[índice]", "", "return", "?s=" . $array_sections[1], "", "índice", "") ?>
                        </div>
	             	</div>
                   </div>
              </div>
          </div>



