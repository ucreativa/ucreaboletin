<?php
 require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreasite/global.php");
 require_once(__CLS_PATH . "cls_html.php");
 require_once(__CTR_PATH . "ctr_new.php");
 $new_core=new ctr_New();

 if(isset($_GET['param'])){
    $row=$new_core->get_lastnews($_GET['param']);
 }else{
    $row=$new_core->get_lastnews(5);
 }

 $i=1;
 $content_news="";

 foreach($row as $value){
      $new_first_file="";
      if($new_core->get_newfiles($value[0],true)!=null){
         $new_first_file=$new_core->get_newfiles($value[0],true);
      }else{
         $new_first_file=null;
      }

      $content_news.= "<div class='new_block'>
                        <span class='section_text' id='section_text'><div class='published_date'><span>Publicado:&nbsp;" . $value[7] . "</span></div></span>
                            <div class='icon_new_tab' id='icon_new_".$i."' onclick=\"openclose_news(this,".$i.",'".__IMG_PATH."');\">
                              <p class='new_title'>". $value[1] ."</p>
                            </div>
                            <div id='content_new_".$i."' title='open'>
                                <a href='?s=".$array_sections[3]."&idn=".$value[0]."' title='".$value[1]."'><img class='new_image' src='" . __RSC_FLE_HOST_PATH . "news/new_" . $value[0] . "/thumbs/" . $new_first_file[0][1] . "' width='205' height='115'/></a>
                                <div class='news_description'>" . substr($value[4],0,400)  . "... </div><br/><a href='?s=".$array_sections[3]."&idn=".$value[0]."' class='see_more' title='ver más'>[+]</a>
                 				<div class='more_icon'></div>
                            </div>
          			   </div>";
      $i++;
 }
 echo $content_news;
?>