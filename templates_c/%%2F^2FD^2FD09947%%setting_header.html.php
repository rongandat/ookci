<?php /* Smarty version 2.6.18, created on 2013-07-15 05:33:21
         compiled from account/modules/setting_header.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dev_get_page_link', 'account/modules/setting_header.html', 8, false),)), $this); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<table width="500" cellpadding="2" cellspacing="2" border="0"><tr>
        <?php if ($this->_tpl_vars['SETTING_PAGE'] == 'stpersonal'): ?>
        <td><font size="2" face="Tahoma">Personal</font></td>
        <?php else: ?>
        <td><a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_SETTING_PERSONAL','ssl' => true), $this);?>
">
                <font size="2" face="Tahoma">Personal</font></a></td>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['SETTING_PAGE'] == 'stverification'): ?>
        <td><font size="2" face="Tahoma">Verification</font></td>
        <?php else: ?>
        <td><a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_SETTING_VERIFICATION','ssl' => true), $this);?>
">
                <font size="2" face="Tahoma">Verification</font></a></td>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['SETTING_PAGE'] == 'stcki_ipn'): ?>
        <td><font size="2" face="Tahoma">CKI/IPN</font></td>
        <?php else: ?>
        <td><a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_SETTING_CKI_IPN','ssl' => true), $this);?>
">
                <font size="2" face="Tahoma">CKI/IPN</font></a></td>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['SETTING_PAGE'] == 'stapi'): ?>
        <td><font size="2" face="Tahoma">API</font></td>
        <?php else: ?>
        <td><a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_SETTING_API','ssl' => true), $this);?>
">
                <font size="2" face="Tahoma">API</font></a></td>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['SETTING_PAGE'] == 'stchange_password'): ?>
        <td><font size="2" face="Tahoma">Password</font></td>
        <?php else: ?>
        <td><a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_SETTING_PASSWORD','ssl' => true), $this);?>
">
                <font size="2" face="Tahoma">Password</font></a></td>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['SETTING_PAGE'] == 'stsecure_pin'): ?>
        <td><font size="2" face="Tahoma">Secure PIN</font></td>
        <?php else: ?>
        <td><a href="<?php echo smarty_function_dev_get_page_link(array('page' => 'PAGE_SETTING_SECURE_PIN','ssl' => true), $this);?>
">
                <font size="2" face="Tahoma">Secure PIN</font></a></td>
        <?php endif; ?>
    </tr>
</table>