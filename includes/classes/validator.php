<?php
class Validator {

    var $errors; // A variable to store a list of error messages
	var $invalidfields	=	array();
    // Validate something's been entered
    // NOTE: Only this method does nothing to prevent SQL injection
    // use with addslashes() command
    function validateGeneral($fieldname='',$theinput,$description = '', $invalidfieldname=''){
        if (trim($theinput) != "") {
            return true;
        }else{
            $this->errors[] = array('field'=>$fieldname,'message'=>$description);
			$this->invalidfields[]	=	$invalidfieldname;
            return false;
        }
    }
    
    // Validate text only
    function validateTextOnly($fieldname='', $theinput,$description = '', $invalidfieldname=''){
        $result = ereg ("^[A-Za-z0-9\ ]+$", $theinput );
        if ($result){
            return true;
        }else{
            $this->errors[] = array('field'=>$fieldname,'message'=>$description);
			$this->invalidfields[]	=	$invalidfieldname;
			
            return false;
        }
    }

    // Validate text only, no spaces allowed
    function validateTextOnlyNoSpaces($fieldname='', $theinput,$description = '', $invalidfieldname=''){
        $result = ereg ("^[A-Za-z0-9]+$", $theinput );
        if ($result){
            return true;
        }else{
            $this->errors[] = array('field'=>$fieldname,'message'=>$description);
			$this->invalidfields[]	=	$invalidfieldname;
			
            return false;
        }
    }
        
    // Validate email address
    function validateEmail($fieldname='',$themail,$description = '', $invalidfieldname=''){
        $result = ereg ("^[^@ ]+@[^@ ]+\.[^@ \.]+$", $themail );
        if ($result){
            return true;
        }else{
            $this->errors[] = array('field'=>$fieldname,'message'=>$description);
			$this->invalidfields[]	=	$invalidfieldname;
			
            return false;
        }
            
    }
    
    // Validate numbers only
    function validateNumber($fieldname='',$theinput,$description = '',$invalidfieldname=''){
        if (is_numeric($theinput)) {
            return true; // The value is numeric, return true
        }else{
            $this->errors[] = array('field'=>$fieldname,'message'=>$description);
			$this->invalidfields[]	=	$invalidfieldname;
			
 // Value not numeric! Add error description to list of errors
            return false; // Return false
        }
    }
    
    // Validate date
    function validateDate($fieldname='', $thedate,$description = '',$invalidfieldname=''){

        if (strtotime($thedate) === -1 || $thedate == '') {
			$this->errors[] = array('field'=>$fieldname,'message'=>$description);
			$this->invalidfields[]	=	$invalidfieldname;
			
			return false;
        }else{
            return true;
        }
    }
    
 // Validate max length of a string
    function validateMaxLength($fieldname='',$theinput,$maxlength,$description = '',$invalidfieldname=''){
        if (strlen($theinput)<=$maxlength) {
            return true; 
        }else{
            $this->errors[] = array('field'=>$fieldname,'message'=>$description);
			$this->invalidfields[]	=	$invalidfieldname;
			
            return false; // Return false
        }
    }
		
 // Validate min length of a string
     function validateMinLength($fieldname='',$theinput,$minlength,$description = '',$invalidfieldname=''){
        if (strlen($theinput)>=$minlength) {//edit by donghp 28/03/2012
            return true; 
        }else{
            $this->errors[] = array('field'=>$fieldname,'message'=>$description);
			$this->invalidfields[]	=	$invalidfieldname;
			
            return false; // Return false
        }
    }
		
 // Validate min length of a string
     function validateLength($fieldname='',$theinput,$minlength,$maxlength, $description = '',$invalidfieldname=''){
        if ( (strlen($theinput)>=$minlength) && (strlen($theinput)<=$maxlength) ) {
            return true; 
        }else{
            $this->errors[] = array('field'=>$fieldname,'message'=>$description);
			$this->invalidfields[]	=	$invalidfieldname;
			
            return false; // Return false
        }
    }
		
					
    // Check whether any errors have been found (i.e. validation has returned false)
    // since the object was created
    function foundErrors() {
        if (count($this->errors) > 0){
            return true;
        }else{
            return false;
        }
    }

    // Display the errors
    function listErrors(){
		echo "<ul>";
		for ($i=0; $i<count($this->errors); $i++ ) {
			echo  "<li><b>".$this->errors[$i]['field'].":&nbsp;&nbsp;</b>".$this->errors[$i]['message']. "</li>";
		}
		echo "</ul>";
    }
    
    // Manually add something to the list of errors
    function addError($fieldname='',	$description, $invalidfieldname=''){
			$this->errors[] = array('field'=>$fieldname,'message'=>$description);
			$this->invalidfields[]	=	$invalidfieldname;
			

    }    
        
	// validate if str1 the same as str2
	function validateEqual($fieldname,$str1, $str2, $description	=	'') {
		
		if ($str1!=$str2) {    $this->errors[] =  array('field'=>$fieldname,'message'=>$description); // Value not numeric! Add error description to list of errors
            return false; // Return false
        }else{
              return true; // The values are the same

        }
	}
	

 function check_not_null($value) {
    if (is_array($value)) {
      if (sizeof($value) > 0) {
        return true;
      } else {
        return false;
      }
    } else {
      if (($value != '') && (strtolower($value) != 'null') && (strlen(trim($value)) > 0)) {
        return true;
      } else {
        return false;
      }
    }
  }	
}
?>