<?php

userLoginCheck();

$action = $_POST['action'];
$master_key_pass = false;


$smarty->assign('CURRENT_PAGE', _CURRENT_PAGE);

$psettings = isset($_GET['psettings']) ? $_GET['psettings'] : 'stpersonal';
$smarty->assign('SETTING_PAGE', $psettings);


if ($action == 'process') {
    $master_key = db_prepare_input($_POST['master_key']);
    if ($validator->validateGeneral('Master Key', $master_key, _ERROR_FIELD_EMPTY)) {
        if ($master_key != getMasterKey())
            $validator->addError('Master Key', 'Invalid master key. Please try again.');
    }

    if (count($validator->errors) == 0) {
        $master_key_pass = true;
        // get account's information
        $account_info = db_fetch_array(db_query("SELECT * FROM " . _TABLE_USERS . " WHERE user_id='" . $login_userid . "'"));
        postAssign($smarty, $account_info);
        $country = $account_info['country'];
    }
}

switch ($psettings) {
    case 'stpersonal':
        include_once 'settings/stpersonal.php';
        $smarty->assign('HREF_PAGE', get_href_link(PAGE_SETTING_PERSONAL));
        break;
    case 'stverification':
        include_once 'settings/stverification.php';
        $smarty->assign('HREF_PAGE', get_href_link(PAGE_SETTING_VERIFICATION));
        break;
    case 'stcki_ipn':
        include_once 'settings/stcki_ipn.php';
        $smarty->assign('HREF_PAGE', get_href_link(PAGE_SETTING_CKI_IPN));
        break;
    case 'stapi':
        include_once 'settings/stapi.php';
        $smarty->assign('HREF_PAGE', get_href_link(PAGE_SETTING_API));
        break;
    case 'stchange_password':
        include_once 'settings/stchange_password.php';
        $smarty->assign('HREF_PAGE', get_href_link(PAGE_SETTING_PASSWORD));
        break;
    case 'stsecure_pin':
        include_once 'settings/stsecure_pin.php';
        $smarty->assign('HREF_PAGE', get_href_link(PAGE_SETTING_SECURE_PIN));
        break;
    case 'security_code':
        include_once 'settings/security_code.php';
        $smarty->assign('HREF_PAGE', get_href_link(PAGE_SETTING_SECURE_CODE));
        break;
    default:
        break;
}


$smarty->assign('validerrors', $validator->errors);

$_html_main_content = $smarty->fetch('account/settings.html');
//if ($master_key_pass) {
//    $_html_main_content = $smarty->fetch('account/edit_account.html');
//} else {
//    $_html_main_content = $smarty->fetch('account/settings.html');
//}
?>