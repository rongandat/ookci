<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * A base controller for all controllers. here we set various variables and tasks to avoid redundantly doing it throughout codebase
 *
 * @author 		Khiem Pham <khiemktqd@gmail.com>
 * @date 		14/12/2012
 */
class MY_Input extends CI_Input {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Fetch an item from the POST array
     *
     * @access	public
     * @param	string
     * @param	bool
     * @return	string
     */
    function request($index = NULL, $xss_clean = FALSE) {
        // Check if a field has been provided
        if ($index === NULL AND !empty($_REQUEST)) {
            $request = array();

            // Loop through the full _POST array and return it
            foreach (array_keys($_REQUEST) as $key) {
                $request[$key] = $this->_fetch_from_array($_REQUEST, $key, $xss_clean);
            }
            return $request;
        }

        return $this->_fetch_from_array($_REQUEST, $index, $xss_clean);
    }

}