<?php
session_start();

class cls_ImageUploader
{

    function bme_ImageUploader($maxwidth, $maxheight, $max_filesize, $fieldname)
    {
       
        //config all values needed for image uploads
        $this->maxwidth = $maxwidth;
        $this->maxheight = $maxheight;
        $this->max_filesize = $max_filesize;
        $this->field = $_FILES[$fieldname]['name'];
        $this->field_type = $_FILES[$fieldname]['type'];
        $this->field_temp = $_FILES[$fieldname]['tmp_name'];
        $this->field_size = $_FILES[$fieldname]['size'];
        $this->max_filesize_kb = ($this->max_filesize / 1024);
        $this->types_array = array('image/gif','image/pjpeg','image/jpeg','image/jpg','image/x-png','image/png');

    }
   
    function uploadfolder()
    {
        return $this->upload_folder;
    }

    function upload_image_typecheck()
    {
        if(!in_array($this->field_type, $this->types_array))
        {
               $this->is_pic_error = "That file type is not allowed!<br />Allowed File Types: <b>jpg, gif, png</b><br />";
            $this->pic_error = TRUE;
        }
    }

    function upload_image_size()
    {
        $this->imagesize = getimagesize($this->field_temp);
        return $this->imagesize;
    }
   
    function upload_image_sizecheck()
    {
        if($this->field_size > $this->max_filesize)
        {
            $this->is_pic_error    = "Your image is too large at ".$this->field_size." kb<br /> Files may be up to ".$this->max_filesize_kb."kb<br />";
            $this->pic_error = TRUE;
        }
    }

    function upload_image_width()
    {
        $this->imagewidth = $this->imagesize[0];
        return $this->imagewidth;
    }

    function upload_image_height()
    {
        $this->imageheight = $this->imagesize[1];
        return $this->imageheight;
    }
   
    function upload_image_wh_check()
    {
        if($this->imagewidth > $this->maxwidth || $this->imageheight > $this->maxheight)
        {
            $this->is_pic_error = "Your image: ".$this->field." is too large at ".$this->imagewidth."px x ".$this->imageheight."px<br />Files may be up to ".$this->maxwidth."px x ".$this->maxheight."px in size<br />";
            $this->pic_error = TRUE;
        }
    }

    function upload_image($extension='', $folder='', $upload_name)
    {
        //Run error checks
        $this->upload_image_typecheck();
        $this->uploadfolder();
        $this->upload_image_size();
        $this->upload_image_width();
        $this->upload_image_height();
        $this->upload_image_sizecheck();
        $this->upload_image_wh_check();
        $this->upload_session_name = $upload_name;
       
        //If no errors are thrown and all is well, lets upload the image shall we?
        if($this->pic_error == FALSE)
        {
            //what extenstion are we adding before the image name?
            if($extension == FALSE){$this->uniq = date( "m-d-Y-G-i-s" )."_";}else{$this->uniq = $extension;}
            //what folder are we uploading image to?
            if($folder == FALSE){$this->upload_folder = "imgs";}else{$this->upload_folder = $folder;}
           
            $this->ext = strtolower($this->field);
            $this->ext = preg_replace('/\s\s+/', '', $this->ext);
            $this->ext = preg_replace('/\'/', '', $this->ext);
            $this->ext = str_replace ( ' ', '-', $this->ext );
            move_uploaded_file($this->field_temp, $this->upload_folder."/".$this->uniq.$this->ext ) or die ("Couldn't upload ".$this->field."<br />");
       
            //sweet! now the image is uploaded lets go ahead and tell ourselves the name of the new image
            $this->upload_image_url();

        //UH-OH! Something went wrong. The user was probably stupid, so we shall now tell them what they did wrong
        }else{
        echo "<div class=\"error\">".$this->is_pic_error."</div>";
        }
    }
   
    function upload_image_url()
    {
        $this->newimgurl = "{$this->uniq}{$this->ext}";

        $_SESSION['img_upload_success'] = TRUE;
        $_SESSION['img_upload_folder'] = $this->upload_folder;
        $_SESSION['img_upload_name'] = $this->newimgurl;
        $_SESSION[$this->upload_session_name] = $this->newimgurl;

     }

    function uploaded_image()
    {
   
        return $this->newimgurl;
           
    }
    function upload_image_reset()
    {
        $_SESSION['img_upload_success'] = FALSE;
        $_SESSION['img_upload_folder'] = FALSE;
        $_SESSION['img_upload_name'] = FALSE;
        $_SESSION[$this->upload_session_name] = FALSE;

    }
   
        function resizeImage($twidth="80", $theight="80", $text="thumb_")
        {
        
                if($this->pic_error == FALSE)
                {
                        $n_width = (int)$twidth;
                        $n_height =(int)$theight;
                        $tsrc = $this->upload_folder."/ss/".$text.$this->uniq.$this->ext;
                
                   
                        if($this->field_type=="image/pjpeg" || $this->field_type=="image/jpeg" || $this->field_type=="image/jpg")
                        {
                                $im=ImageCreateFromJPEG($this->upload_folder."/".$this->uniq.$this->ext);
                                $width=ImageSx($im); // Original picture width is stored
                                $height=ImageSy($im); // Original picture height is stored
                                $newimage=imagecreatetruecolor($n_width,$n_height);
                                imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
                                imagejpeg($newimage,$tsrc);
                        }elseif($this->field_type=="image/gif")
                        {
                                $im=ImageCreateFromGIF($this->upload_folder."/".$this->uniq.$this->ext);
                                $width=ImageSx($im); // Original picture width is stored
                                $height=ImageSy($im); // Original picture height is stored
                                $newimage=imagecreatetruecolor($n_width,$n_height);
                                imagecopyresampled($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
                                //imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
                                imagegif($newimage,$tsrc);
                        }elseif($this->field_type=="image/x-png" || $this->field_type=="image/png")
                        {
                                $im=ImageCreateFromPNG($this->upload_folder."/".$this->uniq.$this->ext);
                                $width=ImageSx($im); // Original picture width is stored
                                $height=ImageSy($im); // Original picture height is stored
                                $newimage=imagecreatetruecolor($n_width,$n_height);
                                imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
                                imagepng($newimage,$tsrc);
                        }
                }
        }
}
?>