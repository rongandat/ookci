<?php

// get email template information
function get_email_template($template_key) {
    global $languages_id;
    $sql_emailinfo = "SELECT ed.emailtemplate_subject,   ed.emailtemplate_content FROM " . _TABLE_EMAILTEMPLATES . ' e,' . _TABLE_EMAILTEMPLATES_DESCRIPTION . " ed WHERE  e.emailtemplates_id=ed.emailtemplates_id and ed.language_id='" . $languages_id . "' and e.emailtemplate_status and e.emailtemplate_key='" . $template_key . "' ";
    $email_info = db_fetch_array(db_query($sql_emailinfo));

    return $email_info;
}

//get currencies list
function get_currencies() {
    $currencies_array = array();
    $currencies_query = db_query("select code, title, symbol_left, symbol_right, decimal_point, thousands_point, decimal_places, value from " . _TABLE_CURRENCIES . " where status=1 order by sort_order, code ");
    while ($currencies = db_fetch_array($currencies_query)) {
        $currencies_array[$currencies['code']] = array('code' => $currencies['code'],
            'title' => $currencies['title'],
            'symbol_left' => $currencies['symbol_left'],
            'symbol_right' => $currencies['symbol_right'],
            'decimal_point' => $currencies['decimal_point'],
            'thousands_point' => $currencies['thousands_point'],
            'decimal_places' => $currencies['decimal_places'],
            'value' => $currencies['value']);
    }

    return $currencies_array;
}

function get_currency($code) {
    $currencies_query = db_query("select code, title, symbol_left, symbol_right, decimal_point, thousands_point, decimal_places, value from " . _TABLE_CURRENCIES . " where status=1 and code='{$code}' order by sort_order, code ");
    $curency = db_fetch_array($currencies_query);
    return $curency;
}

// return formated string of value(amount) by currency
function get_currency_value_format($amount, $currency_info) {
    $format_string = $currency_info['symbol_left'] . number_format(tep_round($amount, $currency_info['decimal_places']), $currency_info['decimal_places'], $currency_info['decimal_point'], $currency_info['thousands_point']) . $currency_info['symbol_right'];
    return $format_string;
}

?>