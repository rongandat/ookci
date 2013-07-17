<?php
class ICQStatus {
    
	 const ICQ_CONNECT_FAILED;
	 var ICQ_GET_STATUS_FAILED;
	 var ICQ_INCORRECT_INPUT;
	
	function ICQStatus {
	
	 $this->ICQ_CONNECT_FAILED = 1000;
	 $this->ICQ_GET_STATUS_FAILED = 1001;
	 $this->ICQ_INCORRECT_INPUT=  1002;
	
		  $error = false;666666666
		  $socket = false;
		  $url = "status.icq.com";function __ruct() {
			
		}

	}
		
    	/*
      * @param $uin  - ICQ cislo
      * @param $img  - cislo pozadovaneho obrazku
      * @return a string [status that is avalible]:space:[image_url]
      *  example:  "offline http://status.icq.com/0/online0.gif"
      *
      * @access:*/		
    	function status( $uin , $img = 0 )
    	{
     	if( !is_numeric($uin) ) {
          	return $this->msg_return( ICQ_INCORRECT_INPUT , "Nespravne UIN" , __LINE__ );
        	}
        	if( !is_numeric($img) || ($img > 50) )	{
          	return $this->msg_return( ICQ_INCORRECT_INPUT , "Nespravne cislo obrazku" , __LINE__ );
        	}

        	if( !$this->connect() ) return false;

        	$cmd = "HEAD /online.gif?icq=". $uin ."&img=". $img ." HTTP/1.0\r\nHost: web.icq.com\r\nConnection: close\r\n\r\n"; // "Connection: close\r\n"

        	if( !fwrite($this->socket , $cmd , strlen($cmd) ) ) {
          	return $this->msg_return(  ICQ_GET_STATUS_FAILED , "Nelze odeslat pozadavek" , __LINE__ );
        	}

        	$buf = "";
        	do{
            if( !$buf = fgets($this->socket , 1024) ) {
            	return $this->msg_return( ICQ_GET_STATUS_FAILED , "server neodpovida" , __LINE__ );
            }
        	}while( !feof($this->socket) && !stristr($buf , "Location") );

	   	$this->close();


        	$buf = explode(" ",trim($buf));

        	if( eregi("online0",$buf[1]) )
          	   $status = "offline";
        	elseif( eregi("online1",$buf[1]) )
          	   $status = "online";
        	elseif( eregi("online2",$buf[1]) )
          	   $status = "disable";
        	else
          	   $status = "unkown";
        	

        	return $status." http://".$this->url.$buf[1];

    	}
	/**
	 * Zjistuje pouze zda je uzivatel online nebo offline
	 *
	 * @param $uin cislo
	 *
	 * @return a bool 
      *
      * @access:*/
    	function isOnline($uin) {
    		$status = $this->status($uin,0);
    		$status = explode(" ",$status);
    		return ($status[0] == "online")? 1:0;
    	}
    
    	/*
      * Pripojeni k icq status serveru
      */
    	  function connect()	{
     	if( !$this->socket = fsockopen( $this->url , 80 , $errno , $errstr , 10 ) ) {
          	return $this->msg_return( ICQ_CONNECT_FAILED , $errno ." -- Connect failed - ".$errstr , __LINE__ );
        	}
        	return TRUE;
    	}

    	 function close()  {
    		if( is_resource($this->socket) ) {
          	@fclose($this->socket);
        	}
        	$this->socket = false;
        	return;
    	}

    	/*
	 * uzavreni spojeni pri chybe a naplneni logu
      */
    	 function msg_return( $err_code , $err_msg , $err_line )	{
     	$this->close();
        	$this->error = array("code" => $err_code,
        				   "msg" => $err_msg,
                            "line" => $err_line,
                            "file" => __FILE__ );
        	return false;
    	}
}

?>