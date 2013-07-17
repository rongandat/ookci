<?php
  class upload {
    var $file, $filename, $destination, $permissions, $extensions, $tmp_filename, 
			$rulefilename, $message_location, $errors, $messages;

    function upload($file = '', $destination = '', $permissions = '777', $extensions = '') {
      $this->set_file($file);
      $this->set_destination($destination);
      $this->set_permissions($permissions);
      $this->set_extensions($extensions);


      if (tep_not_null($this->file) && tep_not_null($this->destination)) {

        if ( ($this->parse() == true) && ($this->save() == true) ) {
          return true;
        } else {
          return false;
        }
      }
    }

    function parse() {

      if (isset($_FILES[$this->file])) {
        $file = array('name' => $_FILES[$this->file]['name'],
                      'type' => $_FILES[$this->file]['type'],
                      'size' => $_FILES[$this->file]['size'],
                      'tmp_name' => $_FILES[$this->file]['tmp_name']);
      } elseif (isset($GLOBALS['HTTP_POST_FILES'][$this->file])) {
        global $HTTP_POST_FILES;

        $file = array('name' => $HTTP_POST_FILES[$this->file]['name'],
                      'type' => $HTTP_POST_FILES[$this->file]['type'],
                      'size' => $HTTP_POST_FILES[$this->file]['size'],
                      'tmp_name' => $HTTP_POST_FILES[$this->file]['tmp_name']);
      } else {
        $file = array('name' => (isset($GLOBALS[$this->file . '_name']) ? $GLOBALS[$this->file . '_name'] : ''),
                      'type' => (isset($GLOBALS[$this->file . '_type']) ? $GLOBALS[$this->file . '_type'] : ''),
                      'size' => (isset($GLOBALS[$this->file . '_size']) ? $GLOBALS[$this->file . '_size'] : ''),
                      'tmp_name' => (isset($GLOBALS[$this->file]) ? $GLOBALS[$this->file] : ''));
      }

      if ( tep_not_null($file['tmp_name']) && ($file['tmp_name'] != 'none') && is_uploaded_file($file['tmp_name']) ) {
        if (sizeof($this->extensions) > 0) {
          if (!in_array(strtolower(substr($file['name'], strrpos($file['name'], '.')+1)), $this->extensions)) {
                     
              $this->errors[]	='File Type is not allowed!';
            return false;
          }
        }

        $this->set_file($file);
		
        if (!tep_not_null($this->rulefilename) ) 
			$this->set_filename($file['name']);
		else 
			$this->set_filename($this->rulefilename.$file['name']);
			
        if (!tep_not_null($this->tmp_filename) )
			$this->set_tmp_filename($file['tmp_name']);

        return $this->check_destination();
      } else {       
           $this->errors[]	= 'No File Uploaded!';

       		 return false;
      }
    }

    function save() {
		
      if (substr($this->destination, -1) != '/') $this->destination .= '/';

      if (move_uploaded_file($this->file['tmp_name'], $this->destination . $this->filename)) {
        chmod($this->destination . $this->filename, $this->permissions);

          $this->messages[]	= 'File uploaded successfuly!';
        

        return true;
      } else {       
           $this->errors[]	= 'File not uploaded!';

        return false;
      }
    }

    function set_file($file) {
      $this->file = $file;
    }

    function set_destination($destination) {
      $this->destination = $destination;
    }

    function set_permissions($permissions) {
      $this->permissions = octdec($permissions);
    }

    function set_filename($filename) {
      $this->filename = $filename;
    }

    function set_rulefilename($rulefilename) {
      $this->rulefilename = $rulefilename;
    }
	
    function set_tmp_filename($filename) {
      $this->tmp_filename = $filename;
    }

    function set_extensions($extensions) {
      if (tep_not_null($extensions)) {
        if (is_array($extensions)) {
          $this->extensions = $extensions;
        } else {
          $this->extensions = array($extensions);
        }
      } else {
        $this->extensions = array();
      }
    }

    function check_destination() {

      if (!is_writeable($this->destination)) {
        if (is_dir($this->destination)) {
            $this->errors[]	='File destination not writeable!';	
         
        } else {      
            $this->errors[]	= 'File destination dose not exist!';		  
        }

        return false;
      } else {
        return true;
      }
    }

    
  }
?>
