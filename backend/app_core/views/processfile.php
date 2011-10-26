<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/ucreadmin/global.php");
    require_once(__CTR_PATH . "ctr_file.php");

    $ctr_File=new ctr_File();

    if(isset($_POST['txt_author'])){
      $filedata_tmp=$ctr_File->get_filedata($_POST['txt_filename']);

      //Si la imagen ya existe impide registrarla
      if($_POST['txt_filename']!=$filedata_tmp['name'] || $_POST['edit']=='_EDIT'){
          if($ctr_File->btn_save_click()){
            //Realizamos un click virtual en el botón de subir imagen
            echo "<script>$('#'+id_button.replace('_data', '')).click();</script>";
          }
      }else{
         cls_Message::show_message("El nombre de la imagen ya existe.","warning","");
         echo "<script>$('#'+id_button.replace('_data', '_cancel')).click();</script>";
      }
    }

    if(isset($_POST['filename'])){
        $file_data=$ctr_File->get_filedata($_POST['filename']);
        //Realizamos un click virtual en el botón de subir imagen
        echo "<script>$('#txt_author').attr('value','".$file_data['author']."');</script>
              <script>$('#txt_date').attr('value','".$file_data['date']."');</script>
              <script>$('#txt_description').attr('value','".$file_data['description']."');</script>
              <script>$('#cmb_first').attr('value','".$file_data['first']."');</script>
              <script>$('#cmb_status').attr('value','".$file_data['status']."');</script>";
    }

    if(isset($_POST['delete_file'])){
       $ctr_File->btn_delete_click();
    }

?>