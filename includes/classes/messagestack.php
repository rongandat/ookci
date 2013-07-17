<?php

  class messageStack {

// class constructor
    function messageStack() {
      global $messageToStack;

      $this->messages = array();

      if (session_is_registered('messageToStack')) {
        for ($i=0, $n=sizeof($messageToStack); $i<$n; $i++) {
          $this->add($messageToStack[$i]['field'],$messageToStack[$i]['class'], $messageToStack[$i]['text'], $messageToStack[$i]['type']);
        }
        session_unregister('messageToStack');
      }
    }

// class methods 
//	$type=empty  =>'ERROR' message 

    function add($field, $class, $message, $type = '') {
        $this->messages[] = array('field' => $field, 'class' => $class, 'text' =>  $message, 'type'=>$type);     
    }

    function addSession($field, $class, $message, $type = '') {
		  global $messageToStack;
	
		  if (!session_is_registered('messageToStack')) {
			session_register('messageToStack');
			$messageToStack = array();
		  }
	
		  $messageToStack[] = array('field'=>$field, 'class' => $class, 'text' => $message, 'type' => $type);
    }

    function reset() {
      $this->messages = array();
    }

    function output($class,$type='') {
      $output = array();
      for ($i=0, $n=count($this->messages); $i<$n; $i++) {
        if ( ($this->messages[$i]['class'] == $class) && ($this->messages[$i]['type']==$type) ) {
	         $output[] = $this->messages[$i];
        }
      }

      return $output;
    }

    function size($class, $type='') {
      $count = 0;

      for ($i=0, $n=sizeof($this->messages); $i<$n; $i++) {
        if ( ($this->messages[$i]['class'] == $class) && ($this->messages[$i]['type']==$type) ) {
          $count++;
        }
      }

      return $count;
    }
	
	function listMessages($class,$type='') {
	
		$output	=	$this->output($class,$type);
		echo '<ul>';
		for ($i=0; $i<count($output); $i++ ) {
			echo  "<li><b>".$output[$i]['field'].":&nbsp;&nbsp;</b>".$output[$i]['text']. "</li>";
		}
		echo '</ul>';
		
	}
	
  }
?>
