<?php

if (tep_session_is_registered('signup_info'))
    tep_session_unregister('signup_info');

if ($_POST['action'] == 'process') {
    $security_code = db_prepare_input($_POST['security_code']);
    if ($security_code == $secure_image_hash_string) {
        $security_question = $_POST['security_question'];
        $firstname = db_prepare_input($_POST['firstname']);
        $lastname = db_prepare_input($_POST['lastname']);
        $email = db_prepare_input($_POST['email']);
        $confirm_email = db_prepare_input($_POST['confirm_email']);
        $welcome_message = db_prepare_input($_POST['welcome_message']);
        $security_answer = db_prepare_input($_POST['security_answer']);
        $custom_question = db_prepare_input($_POST['custom_question']);

        $validator->validateGeneral('First Name', $firstname, _ERROR_FIELD_EMPTY);
        $validator->validateGeneral('Last Name', $lastname, _ERROR_FIELD_EMPTY);

        if ($validator->validateEmail('Email', $email, ERROR_EMAIL_ADDRESS)) {
            if ($email != $confirm_email) {
                $validator->addError('Email/Confirm Email', ERROR_EMAIL_CONFIRM_EMAIL_MATCH);
            } else {
                // check if the email avaible
                $sql_check_email = "SELECT user_id	FROM " . _TABLE_USERS . " WHERE email='" . $email . "'";
                if (db_num_rows(db_query($sql_check_email)) > 0) { // email existed
                    $validator->addError('Email', 'This e-mail already exists in our database. Please use a different e-mail address or login if you already have an e-globalcash account. ');
                }
            }
        }
        if ($security_question == -1) {
            $validator->validateGeneral('Custom Question', $custom_question, _ERROR_FIELD_EMPTY);
        }
        $validator->validateGeneral('Security Answer', $security_answer, _ERROR_FIELD_EMPTY);
        $validator->validateGeneral('Welcome Mesasge', $welcome_message, _ERROR_FIELD_EMPTY);
    } else {
        $validator->addError('Turing Number', ERROR_SECURE_CODE_WRONG);
    }

    if (count($validator->errors) == 0) { // create new user					
        if (!tep_session_is_registered('signup_info'))
            tep_session_register('signup_info');
        $signup_info = array('firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'welcome_message' => $welcome_message,
            'security_question' => ($security_question == -1) ? $custom_question : $security_question,
            'security_answer' => $security_answer
        );

        tep_redirect(get_href_link(PAGE_SIGNUP_PERSONAL));
    } else {
        postAssign($smarty);
    }
}

// get security questions
$security_questions_array = array();
$security_questions_query = db_query('SELECT s.security_questions_id, sd.question FROM ' . _TABLE_SECURITY_QUESTIONS . " s, " . _TABLE_SECURITY_QUESTIONS_DESCRIPTION . " sd WHERE s.security_questions_id =sd.security_questions_id AND sd.language_id='" . $languages_id . "' ORDER BY s.sort_order, sd.question ");
while ($security_question = db_fetch_array($security_questions_query)) {
    $security_questions_array[$security_question['question']] = $security_question['question'];
}
// Customer Question 
$security_questions_array[-1] = TEXT_CUSTOM_QUESTION;

$smarty->assign('security_questions_array', $security_questions_array);
$smarty->assign('validerrors', $validator->errors);
$_html_main_content = $smarty->fetch('home/signup.html');
?>