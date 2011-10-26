    <script>
       $(document).ready(function() {
             $('#external_link_1_hover').mouseenter(function(){
                 $('#external_link_1_hover').stop(true,true).animate({top: '-70'},400);
             }).mouseleave(function(){
                 $('#external_link_1_hover').stop(true,true).animate({top: '0'});
             });

             $('#external_link_2_hover').mouseenter(function(){
                 $('#external_link_2_hover').stop(true,true).animate({top: '-70'},400);
             }).mouseleave(function(){
                 $('#external_link_2_hover').stop(true,true).animate({top: '0'});
             });

             $('#external_link_3_hover').mouseenter(function(){
                 $('#external_link_3_hover').stop(true,true).animate({top: '-70'},400);
             }).mouseleave(function(){
                 $('#external_link_3_hover').stop(true,true).animate({top: '0'});
             });

             $('#external_link_4_hover').mouseenter(function(){
                 $('#external_link_4_hover').stop(true,true).animate({top: '-70'},400);
             }).mouseleave(function(){
                 $('#external_link_4_hover').stop(true,true).animate({top: '0'});
             });

             $('#external_link_5_hover').mouseenter(function(){
                 $('#external_link_5_hover').stop(true,true).animate({top: '-70'},400);
             }).mouseleave(function(){
                 $('#external_link_5_hover').stop(true,true).animate({top: '0'});
             });
       });
    </script>


    <div id="links_box">
       <div id="external_links_box_hover">
    	   <div class="external_link" id="external_link_1_hover"><?php echo cls_HTML::html_img_link(__IMG_PATH . "facebook_hover.png", "http://www.facebook.com/UcreativaCR", "_blank", "facebook", "fb", "", "facebook", "", ""); ?></div>
    	   <div class="external_link" id="external_link_2_hover"><?php echo cls_HTML::html_img_link(__IMG_PATH . "twitter_hover.png", "http://twitter.com/ucreativa", "_blank", "twitter", "tw", "", "twitter", "", ""); ?></div>
    	   <div class="external_link" id="external_link_3_hover"><?php echo cls_HTML::html_img_link(__IMG_PATH . "flickr_hover.png", "http://www.flickr.com/photos/ucreativa", "_blank", "flickr", "fk", "", "flickr", "", ""); ?></div>
           <div class="external_link" id="external_link_4_hover"><?php echo cls_HTML::html_img_link(__IMG_PATH . "youtube_hover.png", "http://www.youtube.com/ucreativa", "_blank", "youtube", "yb", "", "youtube", "", ""); ?></div>
           <div class="external_link" id="external_link_5_hover"><?php echo cls_HTML::html_img_link(__IMG_PATH . "vecinos_hover.png", "?s=vecinos", "_self", "amigos", "am", "", "amigos", "", ""); ?></div>
	   </div>
    </div>

     <div id="credits"><?php echo $array_global_settings['credits']; ?></div> 
     <div id="site_map_link"><?php echo cls_HTML::html_img_link(__IMG_PATH . "site_map_icon.png", "?s=site_map", "_self", "mapa del sitio", "site_map", "", "mapa del sitio", "", ""); ?></div>




