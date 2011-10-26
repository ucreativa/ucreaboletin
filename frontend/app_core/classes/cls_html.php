﻿<?php
      
    class cls_HTML {

        function __construct(){}

        public function html_label_tag($text){
           return "<label>" . $text . "</label>" . "\n";
        }

        public function html_input_text($name, $id, $class, $maxlength, $size, $value, $title, $tabindex, $disabled, $event, $required){
           return "<input type='text' name='" . $name . "' id='" . $id . "' size= '" . $size . "' class='" . $class . "' value='" . $value . "' title='" . $title . "' tabindex='" . $tabindex . "' maxlength='"  . $maxlength . "' " . $disabled . " " . $event . " " . $required . " />" . "\n";
        }

        public function html_input_hidden($name, $value){
           return "<input type='hidden' name='" . $name . "' id='" . $name . "' value='" . $value . "' />" . "\n";
        }

        public function html_textarea($rows, $cols, $name, $id, $class, $value, $tabindex, $disabled, $event, $required){
           return "<textarea rows=" . $rows . " cols=" . $cols . " name='" . $name . "' id='" . $id . "' class='" . $class . "' value='" . $value . "' tabindex='" . $tabindex . "' " . $disabled . " " . $event . " " . $required . "></textarea>" . "\n";
        }

        public function html_input_password($name, $id, $class, $maxlength, $value, $title, $tabindex, $disabled, $event, $required){
           return "<input type='password' name='" . $name . "' id='" . $id . "' class='" . $class . "' value='" . $value . "' title='" . $title . "' tabindex='" . $tabindex . "' maxlength='"  . $maxlength . "' " . $disabled . " " . $event . " " . $required . " />" . "\n";
        }

        public function html_input_button($type, $name, $id, $class, $value, $tabindex, $disabled, $event){
           return "<input type='" . $type . "' name='" . $name . "' id='" . $id . "' class='" . $class . "' value='" . $value . "' tabindex='" . $tabindex . "' " . $disabled . " " . $event . " />" . "\n";
        }

        public function html_form_tag($name, $action, $target, $method){
           return "<form id='" . $name . "' name='" . $name . "' action='" . $action . "' target='" . $target . "'  method='" . $method . "' >" . "\n";
        }

        public function html_form_end(){
           return "</form>" . "\n";
        }

        public function html_link_tag($text, $id, $class, $href, $target, $title, $event){
           return "<a id='" . $id . "' class='" . $class . "' href='" . $href . "' target='" . $target . "' title='" . $title . "' ". $event . " >" . $text . " </a>" . "\n";
        }
        
        public function html_img_tag($src, $id, $class, $alt, $size){
           return "<img src='" . $src . "' id='" . $id . "' class='" . $class . "' alt='" . $alt . "' " . $size . " />" . "\n";
        }

        public function html_img_link($src, $href, $target, $title, $id, $class, $alt, $size, $event){
           return "<a href='" . $href . "' target='" . $target . "' title='" . $title . "'><img src='" . $src . "' id='" . $id . "' class='" . $class . "' alt='" . $alt . "' " . $size . " " . $event . " /></a>" . "\n";
        }
        
        public function html_input_email($name, $id, $class, $maxlength, $value, $tabindex, $disabled, $event, $required){
           return "<input type='email' name='" . $name . "' id='" . $id . "' class='" . $class . "' value='" . $value . "' tabindex='" . $tabindex . "' maxlength='"  . $maxlength . "' " . $disabled . " " . $event . " " . $required . " />" . "\n";
        }  
        
        public function html_input_number($name, $id, $class, $maxlength, $value, $tabindex, $disabled, $event){
           return "<input type='number' name='" . $name . "' id='" . $id . "' class='" . $class . "' value='" . $value . "' tabindex='" . $tabindex . "' maxlength='"  . $maxlength . "' " . $disabled . " " . $event . " />" . "\n";
        } 
        
        public function html_input_file($name,$accept, $id, $class, $maxlength, $value, $tabindex, $disabled, $event){
           return "<input type='file' accept='" . $accept . "' name='" . $name . "' id='" . $id . "' class='" . $class . "' value='" . $value . "' tabindex='" . $tabindex . "' maxlength='"  . $maxlength . "' " . $disabled . " " . $event . " />" . "\n";
        }  
        
        function html_select_db($name, $options = array(), $id, $class, $tabindex, $disabled, $event) {
				$html_select = "<select name='" . $name . "' id='" . $id . "' class='" . $class . "' tabindex='" . $tabindex . "' " . $disabled . " " . $event . " >";
							
				foreach ($options as $option) {
					$html_select.= '<option value='.$option[0].'>'.$option[1].'</option>';
				}
				$html_select.= '</select>';
				return $html_select;
		  } 
			
		  function html_select($name, $options = array(), $id, $class, $tabindex, $disabled, $event) {
				$html_select = "<select name='" . $name . "' id='" . $id . "' class='" . $class . "' tabindex='" . $tabindex . "' " . $disabled . " " . $event . " >";
							
				foreach ($options as $value => $text) {
					$html_select.= '<option value='.$value.'>'.$text.'</option>';
				}
				$html_select.= '</select>';
				return $html_select;
		  } 
			
		  function html_multiselect($name, $options = array(), $id, $class, $tabindex, $disabled, $event) {
				$html_select = "<select multiple name='" . $name . "' id='" . $id . "' class='" . $class . "' tabindex='" . $tabindex . "' " . $disabled . " " . $event . " >";
							
				foreach ($options as $value => $text) {
					$html_select.= '<option value='.$value.'>'.$text.'</option>';
				}
				$html_select.= '</select>';
				return $html_select;
		  }
        
        function html_js_header($file){
           return "<script src='" . $file . "' type='text/javascript'></script>" . "\n";
        }

        function html_css_header($file,$media){
           return "<link type='text/css' href='" . $file . "' rel='stylesheet' media='" . $media . "' />" . "\n";
        }
    }

?>