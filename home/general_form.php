<?php

$currencies_array = get_currencies();

foreach ($currencies_array as $currency_code => $currency_info) {
    $balance_currencies[$currency_code] = $currency_info['title'];
}
$smarty->assign('balance_currencies', $balance_currencies);
//eof: get currencies
$smarty->assign('fields_extra', FIELDS_EXTRA_SCI_LIMIT);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    postAssign($smarty);
    $posts = $_POST;
    $string_input = '';
    foreach ($posts as $key => $post) {
        $posts[$key] = db_prepare_input($post);

        if ($key != 'extra_field' && $key != 'extra_value') {
            $posts_value[$key] = db_prepare_input($post);
            $string_input .= '&' . $key . '=' . db_prepare_input($post);
        } elseif ($key == 'extra_field') {
            foreach ($post as $number => $field) {
                if (!empty($field)) {
                    $posts_value[$field] = $posts['extra_value'][$number];
                    $string_input .= '&' . $field . '=' . db_prepare_input($posts['extra_value'][$number]);
                }
            }
        }
    }
    $sql_user = "SELECT user_id,  email,password FROM " . _TABLE_USERS . " WHERE account_number='" . $posts['payee_account'] . "'";
    $user_query = db_query($sql_user);
    
    if (db_num_rows($user_query) <= 0) {
        $validator->addError('Acount Number', ERROR_ACCOUNT_NUMBER_WRONG);
    }
    
    if(empty($posts['checkout_currency'])){
        $validator->addError('Currency', ERROR_CURENCY_EMPTY);
    }
    if(!empty($posts['checkout_amount'])){
        if(!is_numeric($posts['checkout_amount']) || $posts['checkout_amount'] < 0){
            $validator->addError('Amount', ERROR_AMOUNT);
        }
    }
    
    if (count($validator->errors) == 0) {

        $zend_code_link = _HTTP_SITE_ROOT . '/index.php?' . PAGE_PROCESS . $string_input;

        $zend_code_html = '<a href="' . $zend_code_link . '">Pay With E-globalcash Reserve!</a>';

        $zend_code_buton = '<a href="' . $zend_code_link . '"><img src="' . _HTTP_SITE_ROOT . '/images/scilogo.png"/></a>';
        $smarty->assign('posts_value', $posts_value);
        $smarty->assign('posts', $posts);
        $smarty->assign('post_link', _HTTP_SITE_ROOT . '/index.php?' . PAGE_PROCESS);
        $smarty->assign('zend_code_link', $zend_code_link);
        $smarty->assign('zend_code_html', $zend_code_html);
        $smarty->assign('zend_code_buton', $zend_code_buton);
        $zend_code_form = $smarty->fetch('home/zend_form.html');
        $smarty->assign('zend_code_form', $zend_code_form);
    } else {

        $smarty->assign('validerrors', $validator->errors);
    }
}
$smarty->assign('validerrors', $validator->errors);
$_html_main_content = $smarty->fetch('home/general_form.html');
?>