<?php

include('includes/admin_login_check.php');

include(_CLASSES_DIR . 'paginator.php');

$action = $_POST['action'];
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
switch ($action) {
    case 'save':
        $user_id = $_POST['user_id'];
        $account_number = $_POST['account_number'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $phone = $_POST['phone'];
        $additional_information = $_POST['additional_information'];

        $user_data_array = array(
            'firstname' => db_prepare_input($firstname),
            'lastname' => db_prepare_input($lastname),
            'email' => db_prepare_input($email),
            'mobile' => $mobile,
            'phone' => $phone,
            'additional_information' => $additional_information
        );

        db_perform(_TABLE_USERS, $user_data_array, 'update', "user_id='" . db_prepare_input($user_id) . "'");

        $smarty->assign('feedback_message', 'User(#' . $account_number . ') information have been updated successfully!');

        break;
    case 'add':
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $account_name = $_POST['account_name'];
        $mobile = $_POST['mobile'];
        $phone = $_POST['phone'];
        $security_question = $_POST['security_question'];
        $security_answer = $_POST['security_answer'];
        $welcome_message = $_POST['welcome_message'];
        $additional_information = $_POST['additional_information'];
        $distributors = $_POST['distributors'];

        $password = tep_create_random_value(7);
        $login_pin = tep_create_random_value(5, 'digits');
        $master_key = tep_create_random_value(3, 'digits');
        if ($_POST['distributors'] == 'wholesale')
            $account_number = 'X' . generate_account_number();
        else
            $account_number = 'U' . generate_account_number();
        $validator = array();
        if (strlen(trim($email)) == 0) {
            $validator['email'] = 'Email not null';
        } else {
            $sql_check = "SELECT * FROM " . _TABLE_USERS . " WHERE email='{$email}' ";
            if (db_num_rows(db_query($sql_check)) > 0) { // email existed
                $validator['email'] = 'This e-mail already exists in our database';
            }
        }
        if (strlen(trim($account_name)) == 0) {
            $validator['account_name'] = 'Acount name not null';
        } else {
            $sql_check = "SELECT * FROM " . _TABLE_USERS . " WHERE account_name='{$account_name}' ";
            if (db_num_rows(db_query($sql_check)) > 0) { // email existed
                $validator['account_name'] = 'This Acount name already exists in our database';
            }
        }
        if (count($validator) == 0) {
            $user_data_array = array(
                'firstname' => db_prepare_input($firstname),
                'lastname' => db_prepare_input($lastname),
                'email' => db_prepare_input($email),
                'mobile' => $mobile,
                'phone' => $phone,
                'additional_information' => $additional_information,
                'security_question' => db_prepare_input($security_question),
                'security_answer' => db_prepare_input($security_answer),
                'language' => 'en',
                'status' => 0, // inactive by default	,
                'account_number' => $account_number,
                'login_pin' => $login_pin,
                'master_key' => $master_key,
                'password' => encrypt_password($password),
                'account_type' => 'user', // user by default,
                'account_name' => $account_name, // user by default,
                'signup_date' => date('YmdHis')
            );

            db_perform(_TABLE_USERS, $user_data_array);

            // send notification email to user
            $email_info = get_email_template('SIGNUP_EMAIL_ADMIN');

            $firstname = $user_data_array['firstname'];
            $msg_subject = $email_info['emailtemplate_subject'];
            $msg_content = str_replace(array('[firstname]', '[account_number]', '[login_pin]', '[master_key]', '[password]', '[security_question]', '[security_answer]'), array($firstname, $account_number, $login_pin, $master_key, $password, $security_question, $security_answer), $email_info['emailtemplate_content']);

            tep_mail($firstname, $user_data_array['email'], $msg_subject, $msg_content, SITE_NAME, SITE_CONTACT_EMAIL);

            $smarty->assign('feedback_message', 'User(#' . $account_number . ') information have been add successfully!');
        } else {
            $smarty->assign('feedback_err', $validator);
            $smarty->assign('user_data_array', $_POST);
        }

        break;
    case 'process_search':
        $account_number = db_prepare_input($_POST['account_number']);
        $keyword = db_prepare_input($_POST['keyword']);

        if (tep_not_null($account_number))
            $where_filter .= " AND account_number	=	'" . $account_number . "' ";
        if (tep_not_null($keyword))
            $where_filter .= " AND (firstname LIKE '" . $keyword . "%' OR lastname LIKE '" . keyword . "%' OR account_name LIKE '" . $keyword . "%')";
        postAssign($smarty);
        break;
}

$smarty->assign('link_user', get_admin_link(PAGE_USERS, tep_get_all_get_params(array('action', 'module', 'page'))));

$sql_user = "SELECT * FROM " . _TABLE_USERS . " WHERE 1 $where_filter ";
$sql_user_page = "SELECT * FROM " . _TABLE_USERS . " WHERE 1 $where_filter ORDER BY signup_date DESC, account_name ASC, firstname ASC, lastname ASC ";

$user_query = db_query($sql_user);
$user_numbers = db_num_rows($user_query);

$userpage = & new Paginator($_GET['pg'], $user_numbers);
$userpage->set_Limit(25);
$userpage->pagename = get_admin_link(PAGE_USERS, tep_get_all_get_params(array('pg', 'x', 'y', 'action', 'module', 'page')));

$userpage->set_Links(6);
$limit1 = $userpage->getRange1();
$limit2 = $userpage->getRange2();

$sql_user_page .= " LIMIT $limit1, $limit2";
$user_page_query = db_query($sql_user_page);

// get smarty user list
$user_array = array();
while ($user = db_fetch_array($user_page_query)) {
    $users_array[] = $user;
}

$smarty->assign('page_links', $userpage->getPageLinks());
$smarty->assign('users', $users_array);

// get all user users
$_html_main_content = $smarty->fetch('users/list.html');
?>