<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreadmin/global.php");
    require_once(__CLS_PATH . "cls_html.php");
    require_once(__CLS_PATH . "cls_message.php");
    require_once(__CLS_PATH . "cls_searchbox.php");
    
    $searchcore= new cls_Searchbox;
    $process_listview=false;
    
    if(isset($_GET['form']) && isset($_GET['param'])){
    	$data_set=$searchcore->show_data($_GET['form'],$_GET['param']);
    	$process_listview=true;
    }
?>

<html>
 <head>
	   <?php
	       echo cls_HTML::html_js_header("//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js");
	       echo cls_HTML::html_js_header(__JS_PATH . "jquery-ui-1.8.6.custom.min.js");
	       echo cls_HTML::html_js_header(__JS_PATH . "functions.js");
	       echo cls_HTML::html_css_header(__CSS_PATH . "style.css","screen");
	   ?>
	 <title>Search Core</title>   
 </head>

  <body>
     <table id="search_results">
         <?php 

         if($process_listview && count($data_set)!=0){
            try{
                $a=0;
                $b=0;
                $class_row="";
                         
                foreach($data_set as $dataset){
                	
                        if($b % 2 == 0){
                            $class_row="tr_par";
                        }else{
                            $class_row="tr_impar";
                        }
                        $a = 0;
                        while($a < count($dataset)){
                            if($a==0){ ?>
                               <tr class=<?php echo "'" . $class_row . "'"; ?> >
                               <td><a target="_parent" href="<?php echo __VWS_HOST_PATH . 'fileupload.php'; ?>?id=<?php echo $dataset[0]; ?>&edit=1&return=<?php echo $_GET['path']; ?>&form=<?php echo $_GET['form']; ?>" title="Administrar Archivos"><?php echo cls_HTML::html_img_tag(__IMG_PATH . "files.png" , "", "r_icon", "file", "WIDTH=24"); ?></a></td>
                               <td><a target="_parent" href="<?php echo $_GET['path']; ?>?id=<?php echo $dataset[0]; ?>&edit=1"><?php echo $dataset[$a]; ?></a></td>
                      <?php }else{ ?>
                               <td><a target="_parent" href="<?php echo $_GET['path']; ?>?id=<?php echo $dataset[0]; ?>&edit=1"><?php echo $dataset[$a]; ?></a></td>
                          <?php  } ?>
                             <?php  $a++;
                        } ?>
                               </tr> 
					       <?php  
					            $b++;
					       }
                      ?>
    <?php }catch(Exception $e){
    	       cls_Message::show_message($e->getMessage(),"error","");
    	    } 
    }else{
    	  echo "<div class='doc_box'><span><b>No hay resultados que coincidan.</b></span></div>";
    }?>       
    </table>
  </body>
 </html>
