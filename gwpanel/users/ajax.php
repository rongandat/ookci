<?php

include('includes/admin_login_check.php');

$doajax = $_POST['doajax'];
switch ($doajax) {
    case 'get_user_details':
        $user_id = (int) $_POST['user_id'];
        $user_data = db_fetch_array(db_query("SELECT * FROM " . _TABLE_USERS . " WHERE user_id='" . $user_id . "'"));
        $smarty->assign('user_data', $user_data);


//BOF: main account balances
// get all currencies_list
        $currencies_array = get_currencies();

// get main account balances
        $sql_balances = "SELECT currency_code, balance FROM " . _TABLE_USER_BALANCE . " WHERE user_id='" . $login_userid . "'";
        $balances_query = db_query($sql_balances);
        while ($balance = db_fetch_array($balances_query)) {
            $balances_array[$balance['currency_code']] = $balance['balance'];
        }

        foreach ($currencies_array as $currency_code => $currency_info) {
            $balance_info_array[] = array('balance_code' => $currency_info['code'],
                'balance_name' => $currency_info['title'],
                'balance_text' => get_currency_value_format($balances_array[$currency_code], $currency_info)
            );
        }

        $smarty->assign('balances', $balance_info_array);

// get wallet balances
        $sql_wallets = "SELECT currency_code, balance FROM " . _TABLE_USER_WALLET . " WHERE user_id='" . $login_userid . "'";
        $wallets_query = db_query($sql_wallets);
        while ($wallet = db_fetch_array($wallets_query)) {
            $wallets_array[$balance['currency_code']] = $wallet['balance'];
        }

        foreach ($currencies_array as $currency_code => $currency_info) {
            $wallet_info_array[] = array('balance_code' => $currency_info['code'],
                'balance_name' => $currency_info['title'],
                'balance_text' => get_currency_value_format($wallets_array[$currency_code], $currency_info)
            );
            $totals_info_array[] = array('balance_text' => get_currency_value_format($wallets_array[$currency_code] + $balances_array[$currency_code], $currency_info));
        }

        $smarty->assign('wallets', $wallet_info_array);
        $smarty->assign('totals', $totals_info_array);

//EOF: main account balances	

        echo $smarty->fetch('users/view.html');
        break;

    case 'edit_user':
        $user_id = (int) $_POST['user_id'];
        $user_data = db_fetch_array(db_query("SELECT user_id, firstname,lastname,email,phone,mobile, additional_information, account_number FROM " . _TABLE_USERS . " WHERE user_id='" . $user_id . "'"));
        $smarty->assign('user_data', $user_data);
        echo $smarty->fetch('users/edit.html');
        break;
    case 'add_user':
        // get security questions
        $security_questions_array = array();
        $security_questions_query = db_query('SELECT s.security_questions_id, sd.question FROM ' . _TABLE_SECURITY_QUESTIONS . " s, " . _TABLE_SECURITY_QUESTIONS_DESCRIPTION . " sd WHERE s.security_questions_id =sd.security_questions_id AND sd.language_id='" . $languages_id . "' ORDER BY s.sort_order, sd.question ");
        while ($security_question = db_fetch_array($security_questions_query)) {
            $security_questions_array[$security_question['question']] = $security_question['question'];
        }

        $whosale['retail'] = 'retail';
        $whosale['wholesale'] = 'wholesale';

        $smarty->assign('security_questions_array', $security_questions_array);
        $smarty->assign('whosale', $whosale);
        echo $smarty->fetch('users/add.html');
        break;
    case 'active_user':
        $user_id = (int) $_POST['user_id'];
        db_perform(_TABLE_USERS, array('status' => 1), 'update', "user_id='" . db_prepare_input($user_id) . "'");

        $user_data = db_fetch_array(db_query("SELECT * FROM " . _TABLE_USERS . " WHERE user_id='" . $user_id . "'"));
        // send notification email to user
        $email_info = get_email_template('ACTIVE_USER_EMAIL');

        $firstname = $user_data['firstname'];
        $account_number = $user_data['account_number'];
        $msg_subject = $email_info['emailtemplate_subject'];
        $msg_content = str_replace(array('[firstname]', '[account_number]'), array($firstname, $account_number), $email_info['emailtemplate_content']);

        tep_mail($firstname, $user_data['email'], $msg_subject, $msg_content, SITE_NAME, SITE_CONTACT_EMAIL);


        echo 'active';
        break;
    case 'deactive_user':
        $user_id = (int) $_POST['user_id'];
        db_perform(_TABLE_USERS, array('status' => 0), 'update', "user_id='" . db_prepare_input($user_id) . "'");
        
        $user_data = db_fetch_array(db_query("SELECT * FROM " . _TABLE_USERS . " WHERE user_id='" . $user_id . "'"));
        // send notification email to user
        $email_info = get_email_template('DEACTIVE_USER_EMAIL');

        $firstname = $user_data['firstname'];
        $account_number = $user_data['account_number'];
        $msg_subject = $email_info['emailtemplate_subject'];
        $msg_content = str_replace(array('[firstname]', '[account_number]'), array($firstname, $account_number), $email_info['emailtemplate_content']);

        tep_mail($firstname, $user_data['email'], $msg_subject, $msg_content, SITE_NAME, SITE_CONTACT_EMAIL);

        
        echo 'Deactive';
        break;
}

die();
?>