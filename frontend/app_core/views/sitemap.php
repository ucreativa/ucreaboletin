 <div class="section_tab">
         <div class="icon_section_tab" id="icon_new_1" onclick=""><p class="section_title"><?php echo "Mapa del Sitio" ?></p></div>
         <div title="" class="content_tab">
             <span class="section_text" id="section_text"><br/></span>
             <div id="sections_blocks">
                 <div id="sections_content_box">
                    <div class="section_block">
                      <?php
                          require_once(__CTR_PATH . "ctr_new.php");
                          require_once(__CTR_PATH . "ctr_event.php");
                          require_once(__CTR_PATH . "ctr_career.php");

                          $section_data=$section_core->get_sections();
                          $new_core=new ctr_New();
                          $new_data=$new_core->get_lastnews(10);
                          $event_core=new ctr_Event();
                          $event_data=$event_core->get_lastevents(10);
                          $career_core=new ctr_Career();
                          $career_data=$career_core->get_careers();

                          foreach($section_data as $value){
                            //evaluamos si es igual a "inicio"
                            if($value[1]==$array_sections[0]){
                               $href="?";
                            }else{
                               $href="?s=" . $value[1];
                            }
                            echo cls_HTML::html_link_tag($value[2], "", "link_sitemap", $href, "_self", $value[3], "") . "<br/>";

                            //evaluamos si es igual a "noticias"
                            if($value[1]==$array_sections[3]){
                                foreach($new_data as $new_value){
                                   echo "<div class='tab_sitemap'>" . cls_HTML::html_link_tag($new_value[1], "", "link_sitemap","?s=".$value[1]."&idn=".$new_value[0], "_self", $new_value[3], "") . "</div>";
                                }
                            }

                            //evaluamos si es igual a "eventos"
                            if($value[1]==$array_microsites[1]){
                                foreach($event_data as $event_value){
                                   echo "<div class='tab_sitemap'>" . cls_HTML::html_link_tag($event_value[1], "", "link_sitemap","?s=".$value[1]."&idn=".$event_value[0], "_self", $event_value[2], "") . "</div>";
                                }
                            }

                            //evaluamos si es igual a "carreras"
                            if($value[1]==$array_sections[2]){
                                foreach($career_data as $career_value){
                                   echo "<div class='tab_sitemap'>" . cls_HTML::html_link_tag($career_value[1], "", "link_sitemap","?s=".$value[1]."&idn=".$career_value[0], "_self", $career_value[2], "") . "</div>";
                                }
                            }
                          }
                      ?>
                    </div>
          	    </div>
           </div>
         </div>
  </div>