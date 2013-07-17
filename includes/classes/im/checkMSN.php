<?php
/**
 * This is an attempt to check online status for users.
 * Method:
 * first we ping an onlinestatus server. If response time is too long, or if it's down, we change.
 * Time response has to be under 1s.
 *
 * You can find some address here: http://www.onlinestatus.org/usage.php
 *
 * I've seen that IP addresses are faster than "human" addresses, as we don't have to resolve these adresses.
 *
 * getStatus() sets status to :
 * 0 : offline
 * 1 : online
 * 2 : unknown
 *
 * isOnline() returns true only if status is 1
 *
 * Requiered:
 * 1- fsockopen support
 *
 * @author C. Jeanneret <cjeanneret@internux.ch>
 */

/*
Copyright (C) 2007 Jeanneret Internux

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/


class checkMSN {

  /**
   * Server we're going to use later (after "ping" prob). Should be private
   *
   * @var string
   */
  var $server;
  /**
   * Port on remote server. Should be private
   *
   * @var int
   */
  var $port;
  /**
   * Account we're going to check.
   *
   * @var string
   */
  var $account;
  /**
   * Status. Should be private
   *
   * @var bool
   */
  var $status;

  /**
   * Constructor
   *
   * @param string $account
   * @return checkMSN
   */
  function checkMSN($account) {
    $this->account = $account;
  }

  /**
   * Probe if a server is up and if it's responding within 1s.
   *
   * @return bool true if we find one server. Else false, with error message.
   */
  function ping() {

    $a_servs = array (
    '83.142.226.228',
    '217.8.135.183',
    '210.169.107.134',
    '69.72.168.157',
    '66.177.205.6');

    $a_port = array ('81',
    '54345',
    '8000',
    '80',
    '8000');

    $nb = count($a_servs);

    // let's check
    for($i=0;$i<$nb;$i++) {

      // "ping"
      $sock = @fsockopen($a_servs[$i],$a_port[$i],$errno,$errstr,1);
      if($sock) {
        $this->server = $a_servs[$i];
        $this->port = $a_port[$i];
        return true;
      } //end sock test
      @fclose($sock);
    }
    // if all servers are down
    echo '<p>Sorry, all servers are currently down !</p>';
    return false;
  }

  /**
   * Get user status. It first uses $this->ping() to find a good server, then grab status
   *
   * @return bool true if we have a status.
   */
  function getStatus() {
    if($this->ping()) {
      $url = $this->server.':'.$this->port.'/msn/'.$this->account;
      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_HEADER, 1);

      ob_start();
      curl_exec($curl);
      $sta = ob_get_contents();
      curl_close($curl);
      ob_get_clean();

      if (eregi('online.gif',$sta)) {
        $this->status = 1;
      }
      elseif(eregi('unknown.gif',$sta)) {
        $this->status = 2;
      } else{
        $this->status = 0;
      }
      return true;
    } else {
      return false;
    }
  }

  /**
   * Just give us the status.
   *
   * @return bool true if online
   */
  function isOnline() {
    if($this->getStatus())
    return ($this->status == 1);
  }

}
?>