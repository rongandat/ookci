<?php

// generate link for the site
function get_html_link($page = '', $parameters = '', $connection = 'NONSSL', $add_session_id = true) {
    global $request_type, $session_started, $SID;

    if ($connection == 'NONSSL') {
        $link = _HTTP_SITE_ROOT . '/';
    } elseif ($connection == 'SSL') {
        if (ENABLE_SSL == true) {
            $link = _HTTPS_SITE_ROOT . '/';
        } else {
            $link = _HTTP_SITE_ROOT . '/';
        }
    }


    if (tep_not_null($parameters)) {
        $link .= $page . '?' . tep_output_string($parameters);
        $separator = '&';
    } else {
        $link .= $page;
        $separator = '?';
    }

// Add the session ID when moving from different HTTP and HTTPS servers, or when SID is defined
    if (($add_session_id == true) && ($session_started == true) && (SESSION_FORCE_COOKIE_USE == 'False')) {
        if (tep_not_null($SID)) {
            $_sid = $SID;
        } elseif (( ($request_type == 'NONSSL') && ($connection == 'SSL') && (ENABLE_SSL == true) ) || ( ($request_type == 'SSL') && ($connection == 'NONSSL') )) {
            if (HTTP_COOKIE_DOMAIN != HTTPS_COOKIE_DOMAIN) {
                $_sid = tep_session_name() . '=' . tep_session_id();
            }
        }
    }

    if (isset($_sid)) {
        $link .= $separator . tep_output_string($_sid);
    }

    return $link;
}

// generate src
function getHtmlImageSource($imagename) {
    if(ENABLE_SSL == true)
        return _IMAGESSL_SITE_URL . $imagename;
    return _IMAGE_SITE_URL . $imagename;
}

// get template image source
function get_template_image_source($image) {
    return _HTTP_SITE_ROOT . '/templates/images/' . $image;
}

// get image button  
function get_language_button_image($imagename) {
    return _IMAGES_LANG_DIR . 'images/' . $imagename;
}

// assign all $_POST variables to smarty template
function postAssign(&$smartyobj, $postArray = '') {
    if (!is_array($postArray))
        $postArray = $_POST;
    foreach ($postArray as $key => $value) {
        $smartyobj->assign($key, db_prepare_input($value));
    }
}

function get_href_link($page = '', $parameters = '', $connection = 'NONSSL', $add_session_id = true, $search_engine_safe = true) {
    global $request_type, $session_started, $SID;
    
    if (!tep_not_null($page)) {
        $page = PAGE_DEFAULT;
    }

    if ($connection == 'NONSSL') {
        $link = _HTTP_SITE_ROOT . '/index.php?';
    } elseif ($connection == 'SSL') {
        if (ENABLE_SSL == true) {
            $link = _HTTPS_SITE_ROOT . '/index.php?';
        } else {
            $link = _HTTP_SITE_ROOT . '/index.php?';
        }
    } else {
        die('<span style="color:#ff0000"><strong>Error!</strong></span><br><br><strong>Unable to determine connection method on a link!<br><br>Known methods: NONSSL SSL</strong><br><br>');
    }

    if (tep_not_null($parameters)) {
        $link .= $page . '&' . tep_output_string($parameters);
        $separator = '&';
    } else {
        $link .= $page;
        $separator = '&';
    }

    while ((substr($link, -1) == '&') || (substr($link, -1) == '?'))
        $link = substr($link, 0, -1);

// Add the session ID when moving from different HTTP and HTTPS servers, or when SID is defined
    if (($add_session_id == true) && ($session_started == true) && (SESSION_FORCE_COOKIE_USE == 'False')) {
        if (tep_not_null($SID)) {
            $_sid = $SID;
        } elseif (( ($request_type == 'NONSSL') && ($connection == 'SSL') && (ENABLE_SSL == true) ) || ( ($request_type == 'SSL') && ($connection == 'NONSSL') )) {
            if (HTTP_COOKIE_DOMAIN != HTTPS_COOKIE_DOMAIN) {
                $_sid = tep_session_name() . '=' . tep_session_id();
            }
        }
    }

    if ((SEARCH_ENGINE_FRIENDLY_URLS == 'true') && ($search_engine_safe == true)) {
        while (strstr($link, '&&'))
            $link = str_replace('&&', '&', $link);

        $link = str_replace('?', '/', $link);
        $link = str_replace('&', '/', $link);
        $link = str_replace('=', '/', $link);

        $separator = '&';
    }

    if (isset($_sid)) {
        $link .= $separator . tep_output_string($_sid);
    }

    return $link;
}

// generate a drop down list with Data ARRAY
function getHtmlDropDownByArray($items_array, $selected_value = null, $params = '') {
    $strDropDown = "";
    foreach ($items_array as $key => $val) {
        $strDropDown .= '<option value="' . $key . '" ' . (( ($key == $selected_value) && (isset($selected_value)) ) ? ' selected="selected" ' : '') . $params . ' >' . $val . '</option>';
    }
    return $strDropDown;
}

////
// Output a form input field
function tep_draw_input_field($name, $value = '', $parameters = '', $required = false, $type = 'text', $reinsert_value = true) {
    global $_GET, $_POST;

    $field = '<input type="' . tep_output_string($type) . '" name="' . tep_output_string($name) . '"';

    if (($reinsert_value == true) && ( (isset($_GET[$name]) && is_string($_GET[$name])) || (isset($_POST[$name]) && is_string($_POST[$name])) )) {
        if (isset($_GET[$name]) && is_string($_GET[$name])) {
            $value = stripslashes($_GET[$name]);
        } elseif (isset($_POST[$name]) && is_string($_POST[$name])) {
            $value = stripslashes($_POST[$name]);
        }
    }

    if (tep_not_null($value)) {
        $field .= ' value="' . tep_output_string($value) . '"';
    }

    if (tep_not_null($parameters))
        $field .= ' ' . $parameters;

    $field .= '>';

    if ($required == true)
        $field .= TEXT_FIELD_REQUIRED;

    return $field;
}

////
// Output a form password field
function tep_draw_password_field($name, $value = '', $required = false) {
    $field = tep_draw_input_field($name, $value, 'maxlength="40"', $required, 'password', false);

    return $field;
}

////
// Output a form filefield
function tep_draw_file_field($name, $required = false) {
    $field = tep_draw_input_field($name, '', '', $required, 'file');

    return $field;
}

////
// Output a selection field - alias function for tep_draw_checkbox_field() and tep_draw_radio_field()
function tep_draw_selection_field($name, $type, $value = '', $checked = false, $compare = '') {
    global $_GET, $_POST;

    $selection = '<input type="' . tep_output_string($type) . '" name="' . tep_output_string($name) . '"';

    if (tep_not_null($value))
        $selection .= ' value="' . tep_output_string($value) . '"';

    if (($checked == true) || (isset($_GET[$name]) && is_string($_GET[$name]) && (($_GET[$name] == 'on') || (stripslashes($_GET[$name]) == $value))) || (isset($_POST[$name]) && is_string($_POST[$name]) && (($_POST[$name] == 'on') || (stripslashes($_POST[$name]) == $value))) || (tep_not_null($compare) && ($value == $compare))) {
        $selection .= ' CHECKED';
    }

    $selection .= '>';

    return $selection;
}

////
// Output a form checkbox field
function tep_draw_checkbox_field($name, $value = '', $checked = false, $compare = '') {
    return tep_draw_selection_field($name, 'checkbox', $value, $checked, $compare);
}

////
// Output a form radio field
function tep_draw_radio_field($name, $value = '', $checked = false, $compare = '') {
    return tep_draw_selection_field($name, 'radio', $value, $checked, $compare);
}

////
// Output a form textarea field
function tep_draw_textarea_field($name, $wrap, $width, $height, $text = '', $parameters = '', $reinsert_value = true) {
    global $_GET, $_POST;

    $field = '<textarea name="' . tep_output_string($name) . '" wrap="' . tep_output_string($wrap) . '" cols="' . tep_output_string($width) . '" rows="' . tep_output_string($height) . '"';

    if (tep_not_null($parameters))
        $field .= ' ' . $parameters;

    $field .= '>';

    if (($reinsert_value == true) && ( (isset($_GET[$name]) && is_string($_GET[$name])) || (isset($_POST[$name]) && is_string($_POST[$name])) )) {
        if (isset($_GET[$name]) && is_string($_GET[$name])) {
            $field .= tep_output_string_protected(stripslashes($_GET[$name]));
        } elseif (isset($_POST[$name]) && is_string($_POST[$name])) {
            $field .= tep_output_string_protected(stripslashes($_POST[$name]));
        }
    } elseif (tep_not_null($text)) {
        $field .= tep_output_string_protected($text);
    }

    $field .= '</textarea>';

    return $field;
}

////
// Output a form hidden field
function tep_draw_hidden_field($name, $value = '', $parameters = '') {
    global $_GET, $_POST;

    $field = '<input type="hidden" name="' . tep_output_string($name) . '"';

    if (tep_not_null($value)) {
        $field .= ' value="' . tep_output_string($value) . '"';
    } elseif ((isset($_GET[$name]) && is_string($_GET[$name])) || (isset($_POST[$name]) && is_string($_POST[$name]))) {
        if ((isset($_GET[$name]) && is_string($_GET[$name]))) {
            $field .= ' value="' . tep_output_string(stripslashes($_GET[$name])) . '"';
        } elseif ((isset($_POST[$name]) && is_string($_POST[$name]))) {
            $field .= ' value="' . tep_output_string(stripslashes($_POST[$name])) . '"';
        }
    }

    if (tep_not_null($parameters))
        $field .= ' ' . $parameters;

    $field .= '>';

    return $field;
}

////
// Hide form elements
function tep_hide_session_id() {
    $string = '';

    if (defined('SID') && tep_not_null(SID)) {
        $string = tep_draw_hidden_field(tep_session_name(), tep_session_id());
    }

    return $string;
}

////
// Output a form pull down menu
function tep_draw_pull_down_menu($name, $values, $default = '', $parameters = '', $required = false) {
    global $_GET, $_POST;

    $field = '<select name="' . tep_output_string($name) . '"';

    if (tep_not_null($parameters))
        $field .= ' ' . $parameters;

    $field .= '>';

    if (empty($default) && ( (isset($_GET[$name]) && is_string($_GET[$name])) || (isset($_POST[$name]) && is_string($_POST[$name])) )) {
        if (isset($_GET[$name]) && is_string($_GET[$name])) {
            $default = stripslashes($_GET[$name]);
        } elseif (isset($_POST[$name]) && is_string($_POST[$name])) {
            $default = stripslashes($_POST[$name]);
        }
    }

    for ($i = 0, $n = sizeof($values); $i < $n; $i++) {
        $field .= '<option value="' . tep_output_string($values[$i]['id']) . '"';
        if ($default == $values[$i]['id']) {
            $field .= ' SELECTED';
        }

        $field .= '>' . tep_output_string($values[$i]['text'], array('"' => '&quot;', '\'' => '&#039;', '<' => '&lt;', '>' => '&gt;')) . '</option>';
    }
    $field .= '</select>';

    if ($required == true)
        $field .= TEXT_FIELD_REQUIRED;

    return $field;
}

// get link to Load Page (for Ajax content,..)
function get_loadpage_link($page = '', $parameters = '', $connection = 'NONSSL', $add_session_id = true, $search_engine_safe = true) {
    global $request_type, $session_started, $SID;

    if (!tep_not_null($page)) {
        $page = PAGE_DEFAULT;
    }

    if ($connection == 'NONSSL') {
        $link = _HTTP_SITE_ROOT . '/loadpage.php?';
    } elseif ($connection == 'SSL') {
        if (ENABLE_SSL == true) {
            $link = _HTTPS_SITE_ROOT . '/loadpage.php?';
        } else {
            $link = _HTTP_SITE_ROOT . '/loadpage.php?';
        }
    } else {
        die('<span style="color:#ff0000"><strong>Error!</strong></span><br><br><strong>Unable to determine connection method on a link!<br><br>Known methods: NONSSL SSL</strong><br><br>');
    }

    if (tep_not_null($parameters)) {
        $link .= $page . '&' . tep_output_string($parameters);
        $separator = '&';
    } else {
        $link .= $page;
        $separator = '&';
    }

    while ((substr($link, -1) == '&') || (substr($link, -1) == '?'))
        $link = substr($link, 0, -1);

// Add the session ID when moving from different HTTP and HTTPS servers, or when SID is defined
    if (($add_session_id == true) && ($session_started == true) && (SESSION_FORCE_COOKIE_USE == 'False')) {
        if (tep_not_null($SID)) {
            $_sid = $SID;
        } elseif (( ($request_type == 'NONSSL') && ($connection == 'SSL') && (ENABLE_SSL == true) ) || ( ($request_type == 'SSL') && ($connection == 'NONSSL') )) {
            if (HTTP_COOKIE_DOMAIN != HTTPS_COOKIE_DOMAIN) {
                $_sid = tep_session_name() . '=' . tep_session_id();
            }
        }
    }

    if ((SEARCH_ENGINE_FRIENDLY_URLS == 'true') && ($search_engine_safe == true)) {
        while (strstr($link, '&&'))
            $link = str_replace('&&', '&', $link);

        $link = str_replace('?', '/', $link);
        $link = str_replace('&', '/', $link);
        $link = str_replace('=', '/', $link);

        $separator = '&';
    }

    if (isset($_sid)) {
        $link .= $separator . tep_output_string($_sid);
    }

    return $link;
}

?>