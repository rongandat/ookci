<?php /* Smarty version 2.6.18, created on 2013-07-17 10:49:30
         compiled from home/contact.html */ ?>
<form method="POST" action="https://e-globalcash.net/contact.php">
    <input name="action" value="process" type="hidden" />
    <div class="simple-form">
        <h1>Contact Us</h1>
        <p>
            Use a form of contact to submit this forms <i>*</i> Marks must fill in
        </p>
        <div class="line"></div>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['_TEMPLATE_SOURCE_DIR'])."/modules/validate_error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <div class="st-form-line">
            <span class="st-labeltext"><i>*</i> Your Name:</span>
            <input id="ctl00_cp1_tbName0" class="st-forminput large" name="Name" AUTOCOMPLETE="OFF" size="20">
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext"><i>*</i> Your E-mail Address:</span>
            <input id="ctl00_cp1_tbEmail0" class="st-forminput large" name="email" AUTOCOMPLETE="OFF" size="20">
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext"><i>*</i> Select Department:</span>
            <select id="ctl00_cp1_dlCateg0" class="st-forminput large" name="ctl00$cp1$dlCateg">
                <option selected value="General Questions">General Questions
                </option>
                <option value="Funding Questions">Funding Questions</option>
                <option value="Password/PIN/Key/Email Reset">
                    Password/PIN/Key/Email Reset</option>
                <option value="API/SCI and Technical Questions">API/SCI and 
                    Technical Questions</option>
                <option value="Business Department">Business Department
                </option>
                <option value="Abuse Department">Abuse Department</option>
            </select>
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext">Your Account #:</span>
            <input id="ctl00_cp1_tbAccount0" class="st-forminput large" name="Account" size="20">
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext"><i>*</i> Subject:</span>
            <input id="ctl00_cp1_tbSubject0" class="st-forminput large" name="Subject" AUTOCOMPLETE="OFF" size="20">
            <div class="clear"></div>
        </div>
        <div class="st-form-line">
            <span class="st-labeltext"><i>*</i>  Question/Comment:</span>
            <textarea style="height: 100px;"  id="ctl00_cp1_tbBody" class="st-forminput hurge" name="Comment" rows="1" cols="20"></textarea>
            <div class="clear"></div>
        </div>
    </div>
    <div class="st-form-line">
        <span class="st-labeltext"></span>
        <div class="buttons">
            <input type="submit" class="button" value="Submit Message" name="B1">
            <input type="reset" class="button" value="Reset" name="B2">
        </div>
    </div>
</form>