<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('admin_url')) {

    function admin_url($uri = '') {
        $CI = & get_instance();
        return $CI->config->site_url('admincp/' . $uri);
    }

}

if (!function_exists('get_language_id')) {

    function get_language_id() {
        $CI = & get_instance();
        $CI->load->model('configs_model');
        $language_config = $CI->configs_model->getConfig('language');
        $language = $CI->session->userdata('language');
        if (!$language)
            $language = $language_config['value'];
        return $language;
    }

}

if (!function_exists('curl_post')) {

    function curl_post($url, $fields) {
        //url-ify the data for the POST
        $fields_string = '';
        foreach ($fields as $key => $value) {
            $fields_string .= $key . '=' . $value . '&';
        }
        rtrim($fields_string, '&');

//open connection
        $ch = curl_init();

//set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//execute post
        $result = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

//close connection
        curl_close($ch);
        if ($httpcode >= 200 && $httpcode < 300) {
            return $result;
        } else {
            return false;
        }
    }

}


if (!function_exists('curl_get')) {

    function curl_get($url, $fields) {
        //url-ify the data for the POST
        $fields_string = '';
        foreach ($fields as $key => $value) {
            $fields_string .= $key . '=' . $value . '&';
        }
        $fields_string = rtrim($fields_string, '&');

//open connection
        $ch = curl_init();
        $url .= '?' . $fields_string;
//set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//execute post
        $result = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

//close connection
        curl_close($ch);
        if ($httpcode >= 200 && $httpcode < 300) {
            return $result;
        } else {
            return false;
        }
    }

}

if (!function_exists('tep_create_random_value')) {

    function tep_create_random_value($length, $type = 'mixed') {
        if (($type != 'mixed') && ($type != 'chars') && ($type != 'digits'))
            return false;

        $rand_value = '';
        while (strlen($rand_value) < $length) {
            if ($type == 'digits') {
                $char = tep_rand(0, 9);
            } else {
                $char = chr(tep_rand(0, 255));
            }
            if ($type == 'mixed') {
                if (preg_match('/^[a-z0-9]$/i', $char))
                    $rand_value .= $char;
            } elseif ($type == 'chars') {
                if (preg_match('/^[a-z]$/i', $char))
                    $rand_value .= $char;
            } elseif ($type == 'digits') {
                if (preg_match('/^[0-9]$/', $char))
                    $rand_value .= $char;
            }
        }
        

        return $rand_value;
    }

}
if (!function_exists('generate_account_number')) {

    function generate_account_number() {
        while (true) {
            $new_account_number = tep_create_random_value(7, 'digits');
            //check if the account number is existed
            $check_account_number = db_fetch_array(db_query("SELECT count(*) as total FROM " . _TABLE_USERS . " WHERE account_number='" . $new_account_number . "'"));
            if ($check_account_number['total'] == 0)
                return $new_account_number;
        }
    }

}

if (!function_exists('tep_rand')) {

// Return a random value
    function tep_rand($min = null, $max = null) {
        static $seeded;

        if (!isset($seeded)) {
            mt_srand((double) microtime() * 1000000);
            $seeded = true;
        }

        if (isset($min) && isset($max)) {
            if ($min >= $max) {
                return $min;
            } else {
                return mt_rand($min, $max);
            }
        } else {
            return mt_rand();
        }
    }

}

if (!function_exists('tep_convert_linefeeds')) {

// nl2br() prior PHP 4.2.0 did not convert linefeeds on all OSs (it only converted \n)
    function tep_convert_linefeeds($from, $to, $string) {
        if ((PHP_VERSION < "4.0.5") && is_array($from)) {
            return ereg_replace('(' . implode('|', $from) . ')', $to, $string);
        } else {
            return str_replace($from, $to, $string);
        }
    }

}

if (!function_exists('tep_mail')) {

    function tep_mail($to_name, $to_email_address, $email_subject, $email_text, $from_email_name, $from_email_address, $html_email = false) {
        $CI = & get_instance();
        $CI->load->library('email');
        // Instantiate a new mail object
        $message = new Email(array('X-Mailer: E-goldexJp Mailer'));

        // Build the text version
        $text = strip_tags($email_text); // edit by donghp 27/03/2012

        if ($html_email) {
            $message->add_html($email_text, $text);
        } else {
            $message->add_text($text);
        }

        // Send message
        $message->build_message();
        $message->send($to_name, $to_email_address, $from_email_name, $from_email_address, $email_subject);
    }

}

if (!function_exists('get_client_ip')) {

    function get_client_ip() {
        $ipaddress = '';
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (!empty($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (!empty($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (!empty($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (!empty($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';

        return $ipaddress;
    }

}

if (!function_exists('get_currency_value_format')) {

    // return formated string of value(amount) by currency
    function get_currency_value_format($amount, $currency_info) {
        $format_string = $currency_info['symbol_left'] . number_format(tep_round($amount, $currency_info['decimal_places']), $currency_info['decimal_places'], $currency_info['decimal_point'], $currency_info['thousands_point']) . $currency_info['symbol_right'];
        return $format_string;
    }

}

if (!function_exists('get_currency_value')) {

    // return formated string of value(amount) by currency
    function get_currency_value($amount, $currency_info) {
        $format_string = number_format(tep_round($amount, $currency_info['decimal_places']), $currency_info['decimal_places'], $currency_info['decimal_point'], $currency_info['thousands_point']) . $currency_info['symbol_right'];
        return $format_string;
    }

}

if (!function_exists('tep_round')) {

    function tep_round($number, $precision) {
        if (strpos($number, '.') && (strlen(substr($number, strpos($number, '.') + 1)) > $precision)) {
            $number = substr($number, 0, strpos($number, '.') + 1 + $precision + 1);

            if (substr($number, -1) >= 5) {
                if ($precision > 1) {
                    $number = substr($number, 0, -1) + ('0.' . str_repeat(0, $precision - 1) . '1');
                } elseif ($precision == 1) {
                    $number = substr($number, 0, -1) + 0.1;
                } else {
                    $number = substr($number, 0, -1) + 1;
                }
            } else {
                $number = substr($number, 0, -1);
            }
        }

        return $number;
    }

}
?>
