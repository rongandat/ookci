<?php

include('includes/admin_login_check.php');

$doajax = $_POST['doajax'];

switch ($doajax) {
    case 'get_user_details':
        $user_id = (int) $_POST['user_id'];
        $user_data = db_fetch_array(db_query("SELECT * FROM " . _TABLE_USERS . " WHERE user_id='" . $user_id . "'"));
        $smarty->assign('user_data', $user_data);
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
}

die();
?>