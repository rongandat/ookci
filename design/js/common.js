<!--
var validated = true;  // global
var firstCtrlWithErr = '';
var disableFocus = false;
var sla = false;
var preferredph = true;
var preferredall = false;

function setErrorBlock(errId, msg) {
	if(errId != '') errId = '#'+ errId;
	if($('#olTip').length)
		$('#olTip').hide();
		
	$(errId).show()
			.html(msg);
}

function unsetErrorBlock(errId) {
	if(errId != '') errId = '#'+ errId;
	$(errId).hide()
			.html('');
}

// call this from onchange
function valid(vl,errm, msgTypo, errOverlayId) // varying number of arguments
{
    var i;
    var arrTypo = new Array();
	var validated = true;

    // Regular expression for typo errors
    arrTypo[0] = "[\\w-\\.]{1,}\\@[\\w-\\.\\@]{0,}(rediff|htomail|htomil|htomai|htomal|htomial|hotmil|hotmai|hotmial|hotamil|hatmail|hotnail|hotrmail)s*.co[m]{0,1}[\\w\\.\\@]{0,}.[\\w-\\.]{2}[\\w\\.\\@]{0,}";
    arrTypo[1] = "[\\w-\\.]{1,}\\@[\\w-\\.]{1,}(rediff|rediffmail|hotmail|hotm[ail]s?).com[\\w-\\.\\@]{0,}.[\\w-\\.]{2}[\\w\\.\\@]{0,}";
    arrTypo[2] = "[\\w-\\.]{1,}\\@[\\w-\\.]{1,}(rediffmail|hotmail|hotm[ail]s?)[\\w-\\.]{1,}.com[\\w\\.\\@]{0,}.[\\w-\\.]{2}[\\w\\.\\@]{0,}";
    arrTypo[3] = "[\\w-\\.]{1,}\\@(rediffmail|hotmail)[\\w-\\.]{1,}.co[m]{0,1}[\\w-\\.\\@]{0,}.[\\w-\\.]{2}[\\w\\.\\@]{0,}";
    arrTypo[4] = "[\\w-\\.]{1,}\\@(rediffmail|hotmail).com[\\w-\\.\\@]{1,}.[\\w-\\.]{2}[\\w\\.\\@]{0,}";
    arrTypo[5] = "[\\w-\\.]{1,}\\@[\\w-\\.\\@]{1,}yahoo[\\w\\.]{1,}.(com|co.uk|co.in)";
    arrTypo[6] = "[\\w-\\.]{1,}\\@[\\w-\\.\\@]{1,}yahoo.(com|co.uk|co.in)";
    arrTypo[7] = "[\\w\\.\\@]{1,}\\@yahoo[\\w-\\.]{1,}.(com|co.uk|co.in)";
    arrTypo[8] = "[\\w-\\.]{1,}\\@[\\w-\\.\\@]{0,}yahoo[\\w]{0,}.com.in";
    arrTypo[9] = "[\\w-\\.]{1,}\\@[\\w-\\.\\@]{0,}yahoo[\\w]{0,}.com.uk";
    arrTypo[10] = "[\\w-\\.]{1,}\\@[\\w-\\.\\@]{0,}y(o|a)*ho{3,}[\\w]{0,}.(com|co.uk|co.in)";
    arrTypo[11] = "[\\w-\\.]{1,}\\@[\\w-\\.\\@]{0,}yahoo.uk.co[\\w-\\.]{0,}";
    arrTypo[12] = "[\\w-\\.]{1,}\\@[\\w-\\.\\@]{1,}tm[.,]net[.,]my[\\w]{1,}";
    arrTypo[13] = "[\\w-\\.]{1,}\\@[\\w-\\.\\@]{1,}tm[.,]net[.,]my";
    arrTypo[14] = "[\\w-\\.]{1,}\\@tm[.,]net[.,]my[\\w]{1,}";
    arrTypo[15] = "[\\w-\\.]{1,}\\@usa[.,]net[\\w-\\.\\@]{1,}";
    arrTypo[16] = "[\\w-\\.\\@]{1,}\\@[\\w-\\.\\@]{1,}usa[.,]net[\\w-\\.\\@]{1,}";
    arrTypo[17] = "[\\w-\\.\\@]{1,}\\@[\\w-\\.\\@]{1,}usa[.,]net";
    arrTypo[18] = "[\\w-\\.]{1,}\\@pacific[.,]net[.,]sg[\\w-\\.\\@]{1,}";
    arrTypo[19] = "[\\w-\\.]{1,}\\@[\\w-\\.\\@]{1,}pacific[.,]net[.,]sg";
    arrTypo[20] = "[\\w-\\.]{1,}\\@[\\w-\\.\\@]{1,}pacific[.,]net[.,]sg[\\w-\\.\\@]{1,}";
    arrTypo[21] = "[\\w-\\.]{1,}\\@www\\.[\\w-\\.]{0,}\\.[\\w-\\.]{0,}";
    arrTypo[22] = "[\\w-\\.]{1,}\\@(ya[\\w-]{1,}hoo|yh[\\w-]{1,}oo|yaho|yhoo).(com|co.uk|co.in)";
    arrTypo[23] = "[\\w-\\.]{1,}\\@tm(.net|net.com.my)";
    arrTypo[24] = "newmail@wipro.com";

    // check email format
    for (i=4;i<valid.arguments.length;i++)
        rx=new RegExp(valid.arguments[i]);

    if ((a=rx.exec(vl))!=null && a[0].length==vl.length)
    {
        unsetErrorBlock(errOverlayId);
    }
    else{
        // return false once it finds any format error
        setErrorBlock(errOverlayId, errm);
        validated=false;
        return false;
    }

    // if the email don't have any format error
    // check for any typo error
    // the loop will exit once it found any typo error
    if (validated)
    {
        for (i=0;i<arrTypo.length;i++) 
        {
            var rx;

            rx=new RegExp(arrTypo[i]);
            if ((a=rx.exec(vl))!=null && a[0].length==vl.length) {
                setErrorBlock(errOverlayId, msgTypo);
                validated=false;
                return false; 
            }
        }
        return validated;
    }

}

function ValidateOneEmail(ctl, msgId, msgId2, msgId3, msgDont, msgFree, msgTypo, errOverlayId)
{
    var vl = ctl.value.toLowerCase();
    vl = Trim(vl);
    var validErr = true;
    
    // scan for typo errors for the following domains:
    //   - hotmail.com
    //   - yahoo.com, yahoo.co.uk, yahoo.co.in
    //   - rediffmail.com
    //   - tm.net.my
    
    var errMsg = msgId + " " + msgDont + " <a href=\'javascript: showForm(4)\' class=\'tip\'>" + msgFree + "</a>";
    var errPattern = "[\\w-_]+((\\.)[\\w-_]+)*\\@[\\w-_]+(\\.[\\w-_]+){1,5}";
	validErr=valid(vl, errMsg, msgTypo, errOverlayId, errPattern);
 
    if (!validErr) {
       validated = false;
       focusCtrl(ctl);
    } else {
        if (vl.indexOf('@jobstreet.com') > 0) {
            str = msgId2 + " " + msgDont + " <a href=\'javascript: showForm(4)\' class=\'tip\'>" + msgFree + "</a>";
            setErrorBlock(errOverlayId, str);
            focusCtrl(ctl);
            validErr = false;
			validated = false;
        } 
        else if (vl.indexOf('@bdonline') > 0) {
           str = msgId3 + " " + msgDont + " <a href=\'javascript: showForm(4)\' class=\'tip\'>" + msgFree + "</a>";
           setErrorBlock(errOverlayId, str);        
           focusCtrl(ctl);
           validErr = false;
           validated = false;
        } 
        else{
           unsetErrorBlock(errOverlayId);
        }
    }
    return validErr;
}

function ValidateTwoEmail(email1, email2, msgId, msgId2, errOverlayId) {
    if (Trim(email2.value) == "") {
       setErrorBlock(errOverlayId, msgId);  
        focusCtrl(email2);
        validated = false;
        return false;
    } else if (Trim(email1.value) == Trim(email2.value)) {
        unsetErrorBlock(errOverlayId);
        return true;
    } else {
       setErrorBlock(errOverlayId, msgId2);  
       focusCtrl(email2);
       validated = false;
       return false;
    }
}

function ValidateAltEmail(ctl, email, msgId, msgId2, msgTypo, errOverlayId)
{
    var vl = ctl.value;
    vl = Trim(vl);

    if (vl == '') {
        unsetErrorBlock(errOverlayId);
        return true;
    } else {
        // scan for typo errors for the following domains:
        //   - hotmail.com
        //   - yahoo.com, yahoo.co.uk, yahoo.co.in
        //   - rediffmail.com
        //   - tm.net.my
        errPattern = "[\\w-_]+((\\.|')[\\w-_]+)*\\@[\\w-_]+(\\.[\\w-_]+){1,5}";
        validErr=valid(vl, msgId, msgTypo, errOverlayId, errPattern);
        if (!validErr && vl != '') {
            focusCtrl(ctl);
             alidated = false;
            return false;
        }
        else if(ctl.value == email.value){
            focusCtrl(ctl);
            setErrorBlock(errOverlayId, msgId2);
            validated = false;
            return false;
        }
    }
}

function ValidateEmail(ctl, errMsg, msgTypo, errOverlayId)
{
    var vl = ctl.value;
    vl = Trim(vl);

    // scan for typo errors for the following domains:
    //   - hotmail.com
    //   - yahoo.com, yahoo.co.uk, yahoo.co.in
    //   - rediffmail.com
    //   - tm.net.my
    errPattern = "[\\w-_]+((\\.|')[\\w-_]+)*\\@[\\w-_]+(\\.[\\w-_]+){1,5}";
    validErr=valid(vl, errMsg, msgTypo, errOverlayId, errPattern);

    if (!validErr && vl != '') {
        focusCtrl(ctl);
        validated = false;            
        return false;
    }
    else{
        unsetErrorBlock(errOverlayId);
        return true;
    }
}

// used in email-resume.tpl.php
function ValidateCompanyEmail(strBannedEmail, ctl, errMsg, msgId, msgId2, msgTypo, errOverlayId, errOverlayId2)
{
    var vl = ctl.value.toLowerCase();  
    strBannedEmail = strBannedEmail.toLowerCase();
    jsEmail = ",lina@jobstreet.com,info@jobstreet.com,siva_auto_mailer@jobstreet.com,lina01@jobstreet.com,advert@jobstreet.com,auth-admin-ph@jobstreet.com,myjobstreet@jobstreet.com,lina-in@jobstreet.com,auth-admin-my@jobstreet.com,lina-ph@jobstreet.com,policy@jobstreet.com,marcom@jobstreet.com,webmaster@jobstreet.com,usercare@jobstreet.com,usercare-my@jobstreet.com,";  
    vl = Trim(vl);
    strBannedEmail = Trim(strBannedEmail);

    // scan for typo errors for the following domains:
    //   - hotmail.com
    //   - yahoo.com, yahoo.co.uk, yahoo.co.in
    //   - rediffmail.com
    //   - tm.net.my
    errPattern = "[\\w-_]+((\\.|')[\\w-_]+)*\\@[\\w-_]+(\\.[\\w-_]+){1,5}";
    validErr=valid(vl, errMsg, msgTypo, errOverlayId, errPattern);
    unsetErrorBlock(errOverlayId2);

    if (!validErr || vl == '') {
          focusCtrl(ctl);        
          validated = false;        
        }
    else {
        if (String(jsEmail).indexOf(vl) > 0) {
            str = msgId + " " + ctl.value;
            setErrorBlock(errOverlayId, str);
            focusCtrl(ctl);
            validated = false;
            validErr = false;
        } 
        else if (String(strBannedEmail).indexOf(vl) > 0) {
            setErrorBlock(errOverlayId2, msgId2);
            focusCtrl(ctl);
            validated = false;
            validErr = false;
        }
        else{
           unsetErrorBlock(errOverlayId);
           unsetErrorBlock(errOverlayId2);
        }
    }
    return validErr;
}

function isConfirm(msg) {
    var reply;
    
    reply = confirm(msg);
    if (reply)
        return true;
    else
        return false;   
}

function checkChkBoxLimit(ctrl, intLimit, msgId, msgId2, errOverlayId, compulsory, ctrl2)
{
    intTotal = 0;
    for(i=0;i<ctrl.length;i++)
    {
        if(ctrl[i].checked && (!ctrl[i].disabled))
            intTotal++;         
    }
    try {
        if (ctrl2 != undefined) {
            for(var j=0; j<ctrl2.length;j++) {
                if(ctrl2[j].checked && (!ctrl2[j].disabled))
                    intTotal++;
            }
        }
    } catch (e) {
        // do nothing
    }
    if(compulsory && intTotal == 0)
    {
        setErrorBlock(errOverlayId, msgId);  
        if (ctrl[0]) focusCtrl(ctrl[0]);
        validated = false;
        return false;
    }
    else if(intTotal > intLimit)
    {
        msg = msgId2.replace("#intLimit#", intLimit);
        setErrorBlock(errOverlayId, msg);  
        if (ctrl[0]) focusCtrl(ctrl[0]);
        validated = false;
        return false;
    }
    else {
        unsetErrorBlock(errOverlayId);
        return true;
    }
}

function ValidateMonthlySalary(ctlMinSal, ctlExpCur, msgId, msgId2, msgId3, errOverlayId){

    if ( ctlMinSal.value == ''){
        setErrorBlock(errOverlayId, msgId);  
        focusCtrl(ctlMinSal);
        validated = false;
        return false;
    }else if( !isNumber(ctlMinSal.value) || ctlMinSal.value <= 0 ){
        setErrorBlock(errOverlayId, msgId2);  
        focusCtrl(ctlMinSal);
        validated = false;
        return false;
    }else if( ctlExpCur.val() == "" ){
        setErrorBlock(errOverlayId, msgId3);  
        focusCtrl( ctlExpCur );
        validated = false;
        return false;
    }else{
        unsetErrorBlock(errOverlayId);  
        return true;
    }
}

function isNumber(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}

function ValidatePassword(ctlPwd, msgId, errOverlayId) {
    if (Trim(ctlPwd.value).length < 6) {
            setErrorBlock(errOverlayId, msgId);  
            focusCtrl(ctlPwd);
            validated = false;
            return false;
    }   else {
         unsetErrorBlock(errOverlayId);  
    }
    
}

function ValidateConfirmPassword(ctlPwd, ctlCfPwd, msgId, msgId2, errOverlayId) {
    if (Trim(ctlCfPwd.value) == "") {
        setErrorBlock(errOverlayId, msgId);  
        focusCtrl(ctlCfPwd);
        validated = false;
        return false;
    } else if (Trim(ctlPwd.value) == Trim(ctlCfPwd.value)) {
        unsetErrorBlock(errOverlayId);  
        return true;
    } else {
        setErrorBlock(errOverlayId, msgId2);  
        focusCtrl(ctlCfPwd);
        validated = false;
        return false;
    }
}

function ValidatePhones (telNo, HpCtryCode, hpNo, msg, msgHp, msgHpValid, msgHpCtry, msgTelValid, errOverlayId, errOverlayId2)
{
    tel = Trim(telNo.value);
    hp = Trim(hpNo.value);
    isvalid = true;
    if (tel == '' && hp == '')
    {
        isvalid = false;
        setErrorBlock(errOverlayId, msg);
		if(document.frmRegistration != null) {
			if(document.frmRegistration.handphone_no_temp != null)
				focusCtrl(document.frmRegistration.handphone_no_temp);
		}
    } 
    else 
    {
        unsetErrorBlock(errOverlayId);  
        unsetErrorBlock(errOverlayId2);  
        if (hp != '') {
            isvalid = ValidateHp(HpCtryCode, hpNo, msgHp, msgHpValid, msgHpCtry, errOverlayId);
        } 
		
        isvalid = ValidatePhone (telNo, msgTelValid, errOverlayId2);
    }
    if (!isvalid) {
        validated = false;
    }
    return isvalid;
}

function ValidatePhone (ctl, msgTelValid, errOverlayId) {
    var temp_str = Trim(ctl.value);
    var validPhone = /^[\d\-\(\)\[\]\s\+]{5,}$/;
    if (temp_str == "") {
        unsetErrorBlock(errOverlayId);  
        return true;   
    } else if (!validPhone.test(temp_str)) {
          
        setErrorBlock(errOverlayId, msgTelValid);
        focusCtrl(ctl);
        validated = false;
        return false;
    } 
    else {
        unsetErrorBlock(errOverlayId);  
        return true;
    }
}

function ValidatePhonesSG (telNo, HpCtryCode, hpNo, msg, msgHp, msgHpValid, msgHpCtry, msgTelCtry, msgTelValid, errOverlayId, errOverlayId2)
{
    tel = Trim(telNo.value);
    hp = Trim(hpNo.value);
    isvalid = true;
    if (tel == '' && hp == '')
    {
        isvalid = false;
        setErrorBlock(errOverlayId, msg);
    } 
    else 
    {
        unsetErrorBlock(errOverlayId);  
        unsetErrorBlock(errOverlayId2);  
        if (hp != '') {
            isvalid = ValidateHp(HpCtryCode, hpNo, msgHp, msgHpValid, msgHpCtry,errOverlayId);
        }        
        isvalid = ValidatePhoneSG (telNo, msgTelValid, errOverlayId2);        
    }
    if (!isvalid) {
        validated = false;
    }
    return isvalid;
}

function ValidatePhoneSG (ctl, msgTelValid, errOverlayId) {
    var temp_str = Trim(ctl.value);
    var validPhone = /^[\d\-\(\)\[\]\s\+]{5,}$/;
    if (temp_str == "") {
        unsetErrorBlock(errOverlayId);  
        return true;    
    } else if (!validPhone.test(temp_str)) {
        setErrorBlock(errOverlayId, msgTelValid);
        focusCtrl(ctl2);
        validated = false;
        return false;
    } 
    else {
        unsetErrorBlock(errOverlayId);  
        validated = true;
        return true;
    }
}

function ValidateHp(ctl1,ctl2,msgHp,msgHpValid,msgHpCtry,errOverlayId) {
    // Regular expression for typo errors
    var validMY = /^0?1[02346789]\d{7}$/;
    var validMY2 = /^0?1[02346789]\-\d{7}$/;
    var validMY3 = /^0?11\d{8}$/;
    var validMY4 = /^0?11\-\d{8}$/;
	
    var validSG = /^[89]\d{7}$/;
    var validBD = /^01[156789]\d{6,8}$/;
    var validID = /^0?\d{8,}$/;
    var validPH = /^0?9\d{9}$/;
    var validIN = /^[789]\d{9}$/;
    var validTH = /^0?[89]\d{8}$/;
    var validVN = /^0?[19]\d{8,9}$/;
    var validDF = /^[0-9()+-.,\\*#]+$/;
    
    aNum = Trim(ctl1.options[ctl1.selectedIndex].value);
    hpNum = Trim(ctl2.value);

    message = '';
    if (aNum == '' && hpNum == '') { } 
    else {
        if (aNum == '') {  
            message = msgHpCtry; 
        } 
        else if (hpNum == '') {  
            message = msgHp;
        } 
        else {
            var strExp = validDF;
            var strExp2 = '';
            var strExp3 = '';
            var strExp4 = '';   
            switch (aNum) {
                case '60': 
                    strExp = validMY; 
                    strExp2 = validMY2;
                    strExp3 = validMY3; 
                    strExp4 = validMY4;
                    break;
                case '65': strExp = validSG; break;
                case '63': strExp = validPH; break;
                case '91': strExp = validIN; break;
                case '62': strExp = validID; break;
                case '880': strExp = validBD; break;
                case '66': strExp = validTH; break;
				case '84': strExp = validVN; break;
            }
            if (aNum == '60') {
                if (!strExp.test(hpNum) && !strExp2.test(hpNum) && !strExp3.test(hpNum) && !strExp4.test(hpNum)) {
                    message = msgHpValid;
                }
            }
            else {
                if (!strExp.test(hpNum)) {
                    message = msgHpValid;
                }
            }                

        }
    }
    if (message != '') {
        setErrorBlock(errOverlayId, message);  
        focusCtrl(ctl2);
        validated = false;
        return false;
    } else {
        ctl2.value = hpNum.replace(/[^0-9]+/gi, '');
        unsetErrorBlock(errOverlayId);  
        return true;
    }
}

function ValidateText(ctl, msg, errOverlayId) {
    var temp_str = Trim(ctl.value);
    if (temp_str == "") {
        ctl.value = "";
        setErrorBlock(errOverlayId, msg);  
        focusCtrl(ctl);
        validated = false;      
        return false;
    } else {
        ctl.value = temp_str;
        unsetErrorBlock(errOverlayId);  
        return true;
    }
}

function ValidateReal(ctl, msg, errOverlayId) {
    var temp_str = Trim(ctl.value);
    if (isReal(temp_str)) {
        ctl.value = temp_str;
        unsetErrorBlock(errOverlayId);  
        return true;
    } else {
        setErrorBlock(errOverlayId, msg);  
        focusCtrl(ctl);
        validated = false;      
        return false;
    }
}

function ValidateSkills(ctl, msg, errOverlayId) {
    var strRegex = new RegExp(/^([-,&()\\\/\w\.\s]+)$/);
    if (ctl.value == '' || strRegex.test(ctl.value)) {
        unsetErrorBlock(errOverlayId);  
        return true; 
    }
    else {
        setErrorBlock(errOverlayId, msg);  
        validated = false;
        return false;
    }
}

function ValidateName(name1, name2, msg1, msg2, msg3, errOverlayId) {
    var temp_str1 = Trim(name1.value);
    var temp_str2 = Trim(name2.value);
    if (temp_str1 == "" && temp_str2 == "") {
        setErrorBlock("", "");    
        setErrorBlock(errOverlayId, msg1);
        focusCtrl(name1);
		if(document.frmRegistration != null) {
			if(document.frmRegistration.first_name_temp != null)
				focusCtrl(document.frmRegistration.first_name_temp);
		}
        validated = false;
        return false;
    }
    else if (temp_str1 == "") {
        name1.value = "";
        setErrorBlock(errOverlayId, msg2);
        focusCtrl(name1);
		if(document.frmRegistration != null) {
			if(document.frmRegistration.first_name_temp != null)
				focusCtrl(document.frmRegistration.first_name_temp);
		}
        validated = false;
        return false;
    } else if (temp_str2 == "") {
        name2.value = "";
        setErrorBlock(errOverlayId, msg3);
        focusCtrl(name2);
		if(document.frmRegistration != null) {
			if(document.frmRegistration.last_name_temp != null)
				focusCtrl(document.frmRegistration.last_name_temp);
		}
        validated = false;
        return false;
    } else {
        name1.value = temp_str1;
        name2.value = temp_str2;
        unsetErrorBlock("");  
        unsetErrorBlock(errOverlayId);  
        return true;
    }
}

function ValidateUpload(ctl, mode, msg, errId) {
    //mode(bitwise) : 1 - doc, 2 - .txt, 4 - .pdf, 8 - .htm, 16 - .rtf
    var temp_str = String(Trim(ctl.value));
    var str_len = temp_str.length;
    var str_ext = temp_str.substring(str_len, temp_str.lastIndexOf("."));
    
    if ( ((mode&1)==1 && (str_ext.toLowerCase()==".doc") || str_ext.toLowerCase()==".docx") || ((mode&2)==2 && str_ext.toLowerCase()==".txt") || ((mode&4)==4 && str_ext.toLowerCase()==".pdf") || ((mode&8)==8 && str_ext.toLowerCase()==".htm")|| ((mode&16)==16 && str_ext.toLowerCase()==".rtf")) {
        unsetErrorBlock(errId);  
        return true;
    }
    else {
        setErrorBlock(errId, msg);  
        focusCtrl(ctl);
        validated = false;
        return false;
    }
}

function CountText(ctl, indicator) {
    indicator.value = ctl.value.length;
}


function ValidateTextLimit(ctl,min_val,max_val,msg, errId) {
    var strTemp = Trim(ctl.value);
    if (strTemp.length < min_val || strTemp.length > max_val) {
        setErrorBlock(errId, msg);  
        focusCtrl(ctl);
        validated = false;
        return false;
    }
    else {
        ctl.value = strTemp;
        unsetErrorBlock(errId);  
        return true;
    }
}

function ValidateCtl(ctl, msg, compulsory, errOverlayId) {
    if (GetValueFromCtl(ctl) == "" && compulsory=="1") {
        setErrorBlock(errOverlayId, msg);  
        focusCtrl(ctl);
        validated = false;
        return false;
    } else {
        unsetErrorBlock(errOverlayId);  
        return true;
    }
}

function ValidateNonEmptyCtl(ctl, msg, compulsory, errOverlayId) {
    if (ctl.value == "" && compulsory=="1") {
        setErrorBlock(errOverlayId, msg);  
        ctl.focus();
        validated = false;
        return false;
    } else {
        unsetErrorBlock(errOverlayId);  
        return true;
    }
}

function ValidateRdo(ctl, msg, compulsory, errOverlayId){
    var rdo = "";
    for (var i=0; i < ctl.length; i++) {
        if (ctl[i].checked) {
            rdo = ctl[i].value;
        }
    }
    if (rdo == "" && compulsory == 1) {
        setErrorBlock(errOverlayId, msg);  
        if ((ctl[0])) 
            focusCtrl(ctl[0]);
        else 
            focusCtrl(ctl);
        validated = false;
        return false;
    } else {
       unsetErrorBlock(errOverlayId);  
       return true;
    }    
}

function ValidateList(ctl,msg,ctlfocus) {
    var temp_str = Trim(ctl.value);
    
    if (temp_str == "") {
      alert(msg);
      focusCtrl(ctlfocus);
      validated = false;
      return false;
    }
    else {
      ctl.value = temp_str;
      return true;
    }
}

function GetValueFromCtl (ctl) {
    for (var i=0; i < ctl.options.length; i++) {        
        if(ctl.options[i].selected ) {
            if (ctl.options[i].value == "" || ctl.options[i].value == "0" || ctl.options[i].value == "-" || ctl.options[i].value == "00" || ctl.options[i].value == "000") {
                return "";
            } else
                return ctl.options[i].value;
        }
    }
    return "";
}

function GetValueFromRdo (ctl) {
    var cv = "";
    if (ctl.length == undefined) {
        if (ctl.checked) cv = ctl.value;
    } else {
        for (var i=0; i < ctl.length; i++) {
            if (ctl[i].checked) {
                cv = ctl[i].value;
            }
        }
    }
    return cv;
}

function GetRdoFromValue (ctl, val) {
    var cv = "";
    if (ctl.length != undefined) {
        for (var i=0; i < ctl.length; i++) {
            if (ctl[i].value == val) {
                cv = i;
            }
        }
    }
    return cv;
}

function ValidateNotDuplicate(ctlValue,arrCtl,ctlSize,errOverlayId, msg)
{
    var countDup = 0;
    var arrControl = new Array();

    for(var c=0; c<ctlSize; c++)
        arrControl[c] = arrCtl[c].value;
    
    for(var i=0;i<ctlSize;i++){
        if(arrControl[i] == ctlValue && arrControl[i] != "" && ctlValue != ""){
            countDup = countDup+1;
        }
    }

    if (countDup > 1) {     
        setErrorBlock(errOverlayId, msg);       
        validated = false;  
        return false;
    }
    else
    {
        unsetErrorBlock(errOverlayId);  
        return true;
    }
}

function ValidateSkillSet(ctlSkill, ctlYOE, ctlProficiency, errOverlayId, msgYOE, msgAnd, msgProficiency, msgSelect, msgSkill)
{   
    var msg = "";
    if(trim(ctlSkill.value) != "")
    {   
        if(ctlYOE.value == "" || ctlProficiency.value == "")
        {
            validated=false;
            if(ctlYOE.value == "")
            {
                msg = msgYOE;
                if(ctlProficiency.value == "")
                    msg = msg + " " + msgAnd + " ";
            }
            if(ctlProficiency.value == "")
            {

                msg = msg + msgProficiency;
            }
            msg = msgSelect.replace("#OPTION#", msg);
            setErrorBlock(errOverlayId, msg);
            return false;
        }
        else
        {
            unsetErrorBlock(errOverlayId);  
            return true;
        }
    }
    else
    {
        if(ctlYOE.value != "" || ctlProficiency.value != "")
        {
            setErrorBlock(errOverlayId, msgSkill);
            validated = false;
            return false;
        }
        else
        {
            unsetErrorBlock(errOverlayId);  
            return true;
        }
    }
}
function ValidateLanguageSet(ctlLanguage, ctlWritten, ctlSpoken, errOverlayId, msgBoth, msgSpoken, msgWritten, msgLanguage)
{
    var msg = "";
    if((ctlLanguage.value) != "")
    {
        if(ctlWritten.value == "" || ctlSpoken.value == "")
        {
            if(ctlWritten.value == "" && ctlSpoken.value == "")
                msg = msgBoth;
            else if(ctlSpoken.value == "")
                msg = msgSpoken
            else if(ctlWritten.value == "")
                msg = msgWritten
                
            if (msg != "") {
            setErrorBlock(errOverlayId, msg);
            validated = false;
            return false;
            }
        }
        else
        {
            unsetErrorBlock(errOverlayId);  
            return true;
        }
    }
    else
    {
        if(ctlWritten.value != "" || ctlSpoken.value != "")
        {
            msg = msgLanguage;
            setErrorBlock(errOverlayId, msg);
            validated = false;
            return false;
        }
        else
        {
            unsetErrorBlock(errOverlayId);  
            return true;
        }
    }
}

function GetTextFromCtl (ctl) {
    for (var i=0; i < ctl.options.length; i++) {
        if(ctl.options[i].selected ) {
            return ctl.options[i].text;
        }
    }
    return "";
}

function ValidateDate(aday,amonth,ayear,maxyear,intType,msg, msg2, compulsory, errOverlayId) {
    var tempDate; //= aday.value + amonth.value + ayear.value;
    var tempDay;
    var tempMonth;
    var tempYear;
    var isvalid;
    if (intType & 1)
        tempDay = GetValueFromCtl(aday);
    else
        tempDay = 1;

    if (intType & 2)
        tempMonth = GetValueFromCtl(amonth);
    else
        tempMonth = 1;

    if (intType & 4)
        if (ayear.type=='select') tempYear = GetValueFromCtl(ayear);
        else tempYear = ayear.value;
    else
        tempYear = 1900;

    if (maxyear == 0)
        maxyear = 2999;

    tempDate = tempDay + tempMonth + tempYear;
    if (tempYear != '' && tempYear < 1900  || tempYear > maxyear) {
        isvalid = false;
        var today = new Date();
    }
    else 
    {
        var test = new Date(tempYear,tempMonth-1,tempDay);
            if ((test.getFullYear() == tempYear) && (tempMonth - 1 == test.getMonth()) && (tempDay == test.getDate())) {
                isvalid = true;
            }
            else
            isvalid = false;
    }    

    if (compulsory == '0' && tempDate == '') {
    }

    if (isvalid == false) {
        if ((tempDay =="0" || tempDay =="") && (intType & 1)) {
            focusCtrl(aday);
        } else if ((tempMonth =="0" || tempMonth =="") && (intType & 2)) {
            focusCtrl(amonth);
        } else {
            focusCtrl(ayear);
        }
        setErrorBlock(errOverlayId, msg);
        setErrorBlock("", "");  
        validated = false;
    } else {
        unsetErrorBlock(errOverlayId);  
        unsetErrorBlock("");     
    }
    return isvalid;
}

function ValidateAvailability(aday, amonth, ayear, msg, msg2, msg3, compulsory, errOverlayId) {
    var tempDay = GetValueFromCtl(aday);
    var tempMonth = GetValueFromCtl(amonth);
    var tempYear = ayear.value;
    var tempDate = tempDay + tempMonth + tempYear;
    var today = new Date();

    if (compulsory == 0 && tempDate == '') {
        unsetErrorBlock(errOverlayId); 
    }
    else if (tempYear == '') {
        validated = false;
        setErrorBlock(errOverlayId, msg);  
    }
    else 
    {
        var test = new Date(tempYear,tempMonth-1,tempDay);
            if ((test.getFullYear() == tempYear) && (tempMonth - 1 == test.getMonth()) && (tempDay == test.getDate())) {
                if (test >= today) {
                    unsetErrorBlock(errOverlayId); 
                }
                else {
                    msg = msg2;
                    validated = false;
                    setErrorBlock(errOverlayId, msg);  
                }
            } else {
                msg = msg3;
                validated = false;
                setErrorBlock(errOverlayId, msg);
            }
    }    

    if (validated == false) {
        if (tempDay == "0") {
            aday.focus();
        } else if (tempMonth == "0") {
            amonth.focus();
        } else {
            ayear.focus();
        }
    }
    return validated;
}

function isInt(string) {
    for (var i=0;i < string.length;i++)
        if ((string.substring(i,i+1) < '0') || (string.substring(i,i+1) > '9') )
            return false;
    return true;
}

function isReal(string) {
    var decimal_found = false;
    var ws;

    for (var i=0;i < string.length;i++)
      if ((string.substring(i,i+1) < '0' || string.substring(i,i+1) > '9') && string.substring(i,i+1) != '.' && string.substring(i,i+1) != ',') {
            return false;
      }
      else {
        if (string.substring(i,i+1) == '.') {
          if (decimal_found == true) {
            return false;
          }
          else {
            decimal_found = true;
          }
        }   
      }
    return true;      
}

/// EXPERIENCE SECTION ///
function ValidateExperienceCtl(ctl, msg, errOverlayId) {
    var value;
    for (var i=0; i < ctl.options.length; i++) {        
        if(ctl.options[i].selected ) {
            value = ctl.options[i].value;
        }
    }
    if (value == "") {
        setErrorBlock(errOverlayId, msg);  
        focusCtrl(ctl);
        validated = false;
        return false;
    } else {
        unsetErrorBlock(errOverlayId);  
        return true;
    }
}

function ValidateDateJoined(amonth, ayear, dob_year, allowedYears, msgMonth, msgYear, msgLegal1, msgLegal2, errOverlayId, monthEleId)
{
    var cont;
    cont = ValidateMonthYear(amonth, ayear, msgMonth, msgYear, 1, errOverlayId, monthEleId);
    if (cont)
    {
        // all required fields present
        cont = ValidateYearsWorked(ayear, dob_year, allowedYears, msgLegal1, msgLegal2, errOverlayId);
    }
    return cont;
}

function ValidateDateLeft(amonth, ayear, join_month, join_year, msg, msgMonth, msgYear, errOverlayId, monthEleId)
{
    var joined = parseInt(GetValueFromCtl(join_year));
    var left = parseInt(GetValueFromCtl(ayear));	
	var joinMonth = parseInt(GetValueFromCtl(join_month));		
	var leftMonth = parseInt(GetValueFromCtl(amonth));
	if(joinMonth > 0){
		//
	} else {
		joinMonth = 1;
	}
	
	if(leftMonth > 0){
		//
	} else {
		leftMonth = 1;
	}
	
    // make year compulsory if Present not selected
    yearCompulsory = true;
    if ((elId(monthEleId).style.display != 'none' && leftMonth == 99) || (elId(monthEleId).style.display == 'none')) yearCompulsory = false;

    var cont;
    cont = ValidateMonthYear(amonth, ayear, msgMonth, msgYear, yearCompulsory, errOverlayId, monthEleId);
        
    if (cont)
    {
        if (elId(monthEleId).style.display != 'none') {
            // month is visible, validate month as well            
			var joinDate = new Date(joined,joinMonth-1,1);			
            var leftDate = new Date(left, leftMonth-1, 1);
            if (leftMonth == 99) {
                // present selected
                unsetErrorBlock(errOverlayId);  
                return true;
            } else {
                if ((leftDate<joinDate)) {
                    setErrorBlock(errOverlayId, msg);
                    focusCtrl(ayear);
                    validated = false;
                    return false;
                } else {
                    unsetErrorBlock(errOverlayId);  
                    return true;
                }
            }
        } else {
            if (left > 0) {
                if (left<joined) {
                    setErrorBlock(errOverlayId, msg);  
                    focusCtrl(ayear);
                    validated = false;
                    return false;
                } else {
                    unsetErrorBlock(errOverlayId);  
                    return true;
                }
            } else {
                unsetErrorBlock(errOverlayId);  
                return true;
            }
        }
    }
    return cont;
}

function ValidateMonthYear(amonth, ayear, msgMonth, msgYear, yearCompulsory, errOverlayId, monthEleId)
{
    var cont = true;
    if (elId(monthEleId).style.display != 'none') {
        // If month is visible
        cont = ValidateCtl(amonth, msgMonth, 0, errOverlayId);
        if (cont) { if (yearCompulsory) cont = ValidateCtl(ayear, msgYear, 1, errOverlayId); }
    } else {
        if (yearCompulsory) cont = ValidateCtl(ayear, msgYear, 1, errOverlayId);
    }
    return cont;
}

function ValidateYoeCtl(ctl, dob_year, allowedYears, msg, msgLegal1, msgLegal2, errOverlayId) {
    var cont = ValidateCtl(ctl, msg, 1, errOverlayId);
    if (cont) {
        cont = ValidateYearsWorked(ctl, dob_year, allowedYears, msgLegal1, msgLegal2, errOverlayId)
    }
    return cont;
}

function ValidateYoeMonthCtl(ctl, yearStart, msg, msg2, errOverlayId) {
    var cont = ValidateCtl(ctl, msg, 1, errOverlayId);
    if (cont) {
        var yr = parseInt(yearStart);
        cont = ValidateMonthsWorked(ctl, yearStart, msg2, errOverlayId)
    }
    return cont;
}

function ValidateGraduationDate(graduate_year, dob_year, msg, errOverlayId) {
    var graduateYear = graduate_year;
	var dob_year = dob_year;
	var range_diff = parseInt(graduate_year) - parseInt(dob_year);
	var graduateLimit = parseInt(dob_year) + 13;
	if(graduateLimit > graduateYear) {
		msg = msg.replace("##range##", range_diff);
		setErrorBlock(errOverlayId, msg);
        validated = false;
        return false;
	} else {
		unsetErrorBlock(errOverlayId);
        return true;
    }
}

function ValidateMonthsWorked(ctl, yearStart, msg, errOverlayId) {
    var today = new Date();
    var month = GetValueFromCtl(ctl) - 1;
    if (month < 0) month = 0;
    var yr = today.getFullYear();
    if ( (yearStart > yr) || (yearStart == yr && month > today.getMonth()) ) {
        setErrorBlock(errOverlayId, msg);  
        focusCtrl(ctl);
        validated = false;
        return false;
    } else {
        unsetErrorBlock(errOverlayId);  
        return true;
    }
}

function ValidateYearsWorked(ctl, dob_year, allowedYears, msg1, msg2, errOverlayId) {
    var value = GetValueFromCtl(ctl);
    var today = new Date();
    var validYear = parseInt(dob_year) + parseInt(allowedYears);
    var yearsWorked = parseInt(value) - parseInt(dob_year);

    if (yearsWorked < allowedYears) {
        if (validYear < today.getFullYear())
        {
            msg = msg1.replace("#allowed_years#", allowedYears);
            msg = msg.replace("#legal_work_year#", validYear);
        }
        else
        {
            msg = msg2.replace("#allowed_years#", allowedYears);
        }
        setErrorBlock(errOverlayId, msg);  
        focusCtrl(ctl);
        validated = false;
        return false;
    } else {
        unsetErrorBlock(errOverlayId);  
        return true;
    }
}

function ValidateYoeText(ctl, msg1, msg2, msg3, msg4, minYear, errOverlayId) {
    var value = ctl.value;
    var validYoe = false;
    if (value == '') {
        setErrorBlock(errOverlayId, msg1);
        validated = false;
    } else {
        validYoe = ValidateReal(ctl, msg2, errOverlayId);
        if (validYoe) {
            if (String(value).length != 4) {
                setErrorBlock(errOverlayId, msg3);
                validated = false;
            } else if (minYear > value) {
                validYoe = true;
                unsetErrorBlock(errOverlayId);  
            } else {
                msg = msg4.replace("#minYear#", minYear);
                setErrorBlock(errOverlayId, msg);
                validYoe = false;
                validated = false;
            }
        } 
    }
    return validYoe;
}

// Work Locations
function checkWL(strFirst, strScd, strThird) {
    var arrKey = ",10000,30000,40000,50000,60000,70000,80000,110000,";
    var noDup = true;
    // Start skip checking for Japan
    if (strFirst == 150000) {
        strFirst = "JP";
    }
    if (strScd == 150000) {
        strScd = "JP";
    }
    if (strThird == 150000) {
        strThird = "JP";
    }
    // End skip checking for Japan

    if (arrKey.indexOf(strFirst) > 0) {
        noDup = checkWLOverlap(strFirst, strScd + "," + strThird);
    }
    if (noDup && (arrKey.indexOf(strScd) > 0)) {
        noDup = checkWLOverlap(strScd, strFirst + "," + strThird);
    }
    if (noDup && (arrKey.indexOf(strThird) > 0)) {
        noDup = checkWLOverlap(strThird, strFirst + "," + strScd);
    }
    return noDup;
}

function checkWLOverlap(strCtry, strOth) {
    var arrCtry = new Array();
    var i;
    var noDup = true;
    if (strCtry != null) {
        arrCtry = eval("pl" + strCtry);
        var intLen = arrCtry.length;
        for (i=0; i< intLen; i++) {
            strTmp = arrCtry[i].substr(2,6);
            if (strTmp.substr(5,1) == "'") strTmp = strTmp.substr(0,5);
            if(strOth.indexOf(strTmp) > -1) {
                noDup = false; break;
            }
        }
    } return noDup;
}

function ValidateWLCtl(optFirst, optScd, optThird, errOverlayId, msg, msg2, msg3) {
    var state1 = optFirst.options[optFirst.selectedIndex].value;
    var state2 = optScd.options[optScd.selectedIndex].value;
    var state3 = optThird.options[optThird.selectedIndex].value;
    if (state1 == '' && state2 == '' && state3 == '') {
        setErrorBlock(errOverlayId, msg2);
        validated = false;
        return false;
    } 
    else if ((state1 == state2 && state1 != '' && state2 != '')|| (state1 == state3 && state1 != '' && state3 != '') || (state2 == state3 && state2 != '' && state3 != '')) {
        setErrorBlock(errOverlayId, msg3);
        validated = false;
        return false;
    }
    else if (! checkWL(state1, state2, state3)) {
        alert(msg);  
		validated = false;
		return false;
    } else {
        unsetErrorBlock(errOverlayId);  
        return true;
    }
}

function in_array(string, array)
{
	for (i = 0; i < array.length; i++)
	{
		if(array[i] == string)
		{
			return true;
		}
	}
	return false;
}

// Training Locations
function checkTL(strFirst, strScd) {
    var arrKey = ",10000,20000,30000,40000,50000,60000,70000,80000,110000,";
    var noDup = true;
    //Skip checking for Japan & Australia
    if (strFirst != 150000 && strFirst != 10000 && strScd != 150000 && strScd != 10000) {
        if (arrKey.indexOf(strFirst) > 0) {
            noDup = checkTLOverlap(strFirst, strScd);
        }
        if (noDup && (arrKey.indexOf(strScd) > 0)) {
            noDup = checkTLOverlap(strScd, strFirst);
        }
    }
    return noDup;
}

function checkTLOverlap(strCtry, strOth) {
    var arrCtry = new Array();
    var i;
    var noDup = true;
    if (strCtry != null) {
        arrCtry = eval("pl" + strCtry);
        var intLen = arrCtry.length;
        for (i=0; i< intLen; i++) {
            strTmp = arrCtry[i].substr(2,6);
            if (strTmp.substr(5,1) == "'") strTmp = strTmp.substr(0,5);
            if(strOth.indexOf(strTmp) > -1) {
                noDup = false; break;
            }
        }
    } return noDup;
}

function ValidateTLCtl(optFirst, optScd, errOverlayId, msg, msg2, msg3) {
    var state1 = optFirst.options[optFirst.selectedIndex].value;
    var state2 = optScd.options[optScd.selectedIndex].value;
    if (state1 == '' && state2 == '') {
        setErrorBlock(errOverlayId, msg2);
        validated = false;
        return false;
    } 
    else if (state1 == state2 && state1 != '' && state2 != '') { 
        setErrorBlock(errOverlayId, msg3);
        validated = false;
        return false;
    }
    else if (! checkTL(state1, state2)) {
        alert(msg);  
        validated = false;
		return false;    
    }
    else {
        unsetErrorBlock(errOverlayId);  
        return true;
    }
}

function separateProfile(state1,state2,state3, phWL, tickOversea)
{
	sla = false;
	var stateph1 = false, stateph2 = false, stateph3 = false;
	var stateoversea1 = false, stateoversea2 = false, stateoversea3 = false;
	var chooseph, chooseoversea;
	var phLocation = new Array();
	phLocation = phWL.split(",");
	
 	 if ((state1 != '' && state2 != '')|| (state1 != '' && state3 != '') || (state2 != '' && state3 != '') ) {  
		if (checkWL(state1, state2, state3))
		{	
			state1 = state1.replace("ctry_", "");
			state2 = state2.replace("ctry_", "");
			state3 = state3.replace("ctry_", "");
			if(state3 == '')
			{
				if(in_array(state1, phLocation))
					stateph1 = true;
				else
					stateoversea1 = true;
				
				if(in_array(state2, phLocation))
					stateph2 = true;
				else
					stateoversea2 = true;

				if(stateph1 || stateph2)
					chooseph = true;
				else
					chooseph = false;
					
				if(stateoversea1 || stateoversea2)
					chooseoversea = true;
				else
					chooseoversea = false;
			}
			else
			{
				if(in_array(state1, phLocation))
					stateph1 = true;
				else
					stateoversea1 = true;
				
				if(in_array(state2, phLocation))
					stateph2 = true;
				else
					stateoversea2 = true;
				
				if(in_array(state3, phLocation))
					stateph3 = true;
				else
					stateoversea3 = true;
				
				if(stateph1 || stateph2 || stateph3)
					chooseph = true;
				else
					chooseph = false;
					
				if(stateoversea1 || stateoversea2 ||stateoversea3)
					chooseoversea = true;
				else
					chooseoversea = false;
					
			}
			
			preferredph = chooseph;
			preferredall = (chooseph && chooseoversea);
			if(preferredall)
				sla = true;
			else
			{
				if(preferredph && tickOversea)
					sla = true;
				else
					sla = false;
			}
		}
		else
			sla = false;
    } 
    else
    {	
    	if(in_array(state1, phLocation))
			stateph1 = true;
		else
			stateoversea1 = true;
		
		if(stateph1 && tickOversea)
			sla = true;
		else
			sla = false;
    }
	confirmSLA(sla);
}

function confirmSLA(sla)
{
	if(sla)
		document.forms["frmRegistration"].sla.value = sla;
	else
		document.forms["frmRegistration"].sla.value = '';
}

function cfHideSR(ctl, msg)
{
    if (ctl.value == "0") {
        var cf = confirm(msg);
        if (! cf) {
            validated = false;
            focusCtrl(ctl);
        }
        return cf;
    }
    return true;
}

// This scans all the onchanged routines
function onFrmSubmit(frm, valid) {
    // force validation of all fields                   
    var i;
    validated = (typeof(valid) == "undefined") ?  true : valid;
    firstCtrlWithErr = '';
	disableFocus = true;
    var NS4 = (document.layers) ? true : false;
    for (i=0;i<frm.elements.length;i++) {
        if (frm.elements[i].onchange!=null || $(frm.elements[i]).change() != null ) {
            if (!NS4) {				
                if (frm.elements[i].style.visibility != 'hidden' && frm.elements[i].disabled == false) {
					// force fire onchange event
					try { 
						$(frm.elements[i]).trigger('change'); 
					} catch(e) {  
						frm.elements[i].onchange(); 
					}  
                }
            }
        }
    }
	disableFocus = false;
    if (validated==true) {    
      frm.submit();
      return validated;
    } else {
        if (firstCtrlWithErr)  { focusCtrl(firstCtrlWithErr); }
    }
}

function validateOption(ctl,msg) {
    var v = false;
    for (var i=0; i<ctl.length; i++) {            
        if (ctl[i].checked) {
            v = true;
                break;
        }
    }
    if ((!v) && (msg!="")) {alert(msg);}
    return v;
}

// function to focus only if control is visible - to avoid IE errors
function focusCtrl(ctrl)
{
    if (firstCtrlWithErr == '') {
        firstCtrlWithErr = ctrl;
    }
    try {
        // focus_form_field() is located at Static/common/core/common.js
		if(!disableFocus)
			if(ctrl.id) {focus_form_field(ctrl.id);} else {focus_form_field(ctrl.name);}
    } catch (e) {
        //do nothing
    }
}

function warnOnlinePayment(pm, msg, msgAlert) {
    var v = true;
    v = validateOption(pm,msg);
    if ((v) && (pm[0].checked)) 
        return confirm(msgAlert);
    else
        return v;
}

function inputNumeric(evt){
	var charCode = evt.which;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;

	return true;
}
function inputNumericOnly(ctl)
{
    var val = Trim(ctl.value);
    var newVal = val.match(/[0-9]+/g);
    ctl.value = (newVal != null) ? newVal : '';   
}

function ValidatePostcode(ctl, msg, msgId, errOverlayId) {
    var val = Trim(ctl.value);
    if (val == "")
    {
        ctl.value = "";
        setErrorBlock(errOverlayId, msg);
        focusCtrl(ctl);
        validated = false;
        return false;
    }
    else
    {
        val = val.replace(/[^0-9]+/gi, '');
        ctl.value = val;
        unsetErrorBlock(errOverlayId);  
        return true;
    }
}
// -->

/*!
 * jQuery JavaScript Library v1.4
 * http://jquery.com/
 *
 * Copyright 2010, John Resig
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://docs.jquery.com/License
 *
 * Includes Sizzle.js
 * http://sizzlejs.com/
 * Copyright 2010, The Dojo Foundation
 * Released under the MIT, BSD, and GPL Licenses.
 *
 * Date: Wed Jan 13 15:23:05 2010 -0500
 */
(function(A,w){function oa(){if(!c.isReady){try{s.documentElement.doScroll("left")}catch(a){setTimeout(oa,1);return}c.ready()}}function La(a,b){b.src?c.ajax({url:b.src,async:false,dataType:"script"}):c.globalEval(b.text||b.textContent||b.innerHTML||"");b.parentNode&&b.parentNode.removeChild(b)}function $(a,b,d,f,e,i){var j=a.length;if(typeof b==="object"){for(var o in b)$(a,o,b[o],f,e,d);return a}if(d!==w){f=!i&&f&&c.isFunction(d);for(o=0;o<j;o++)e(a[o],b,f?d.call(a[o],o,e(a[o],b)):d,i);return a}return j?
e(a[0],b):null}function K(){return(new Date).getTime()}function aa(){return false}function ba(){return true}function pa(a,b,d){d[0].type=a;return c.event.handle.apply(b,d)}function qa(a){var b=true,d=[],f=[],e=arguments,i,j,o,p,n,t=c.extend({},c.data(this,"events").live);for(p in t){j=t[p];if(j.live===a.type||j.altLive&&c.inArray(a.type,j.altLive)>-1){i=j.data;i.beforeFilter&&i.beforeFilter[a.type]&&!i.beforeFilter[a.type](a)||f.push(j.selector)}else delete t[p]}i=c(a.target).closest(f,a.currentTarget);
n=0;for(l=i.length;n<l;n++)for(p in t){j=t[p];o=i[n].elem;f=null;if(i[n].selector===j.selector){if(j.live==="mouseenter"||j.live==="mouseleave")f=c(a.relatedTarget).closest(j.selector)[0];if(!f||f!==o)d.push({elem:o,fn:j})}}n=0;for(l=d.length;n<l;n++){i=d[n];a.currentTarget=i.elem;a.data=i.fn.data;if(i.fn.apply(i.elem,e)===false){b=false;break}}return b}function ra(a,b){return["live",a,b.replace(/\./g,"`").replace(/ /g,"&")].join(".")}function sa(a){return!a||!a.parentNode||a.parentNode.nodeType===
11}function ta(a,b){var d=0;b.each(function(){if(this.nodeName===(a[d]&&a[d].nodeName)){var f=c.data(a[d++]),e=c.data(this,f);if(f=f&&f.events){delete e.handle;e.events={};for(var i in f)for(var j in f[i])c.event.add(this,i,f[i][j],f[i][j].data)}}})}function ua(a,b,d){var f,e,i;if(a.length===1&&typeof a[0]==="string"&&a[0].length<512&&a[0].indexOf("<option")<0){e=true;if(i=c.fragments[a[0]])if(i!==1)f=i}if(!f){b=b&&b[0]?b[0].ownerDocument||b[0]:s;f=b.createDocumentFragment();c.clean(a,b,f,d)}if(e)c.fragments[a[0]]=
i?f:1;return{fragment:f,cacheable:e}}function T(a){for(var b=0,d,f;(d=a[b])!=null;b++)if(!c.noData[d.nodeName.toLowerCase()]&&(f=d[H]))delete c.cache[f]}function L(a,b){var d={};c.each(va.concat.apply([],va.slice(0,b)),function(){d[this]=a});return d}function wa(a){return"scrollTo"in a&&a.document?a:a.nodeType===9?a.defaultView||a.parentWindow:false}var c=function(a,b){return new c.fn.init(a,b)},Ma=A.jQuery,Na=A.$,s=A.document,U,Oa=/^[^<]*(<[\w\W]+>)[^>]*$|^#([\w-]+)$/,Pa=/^.[^:#\[\.,]*$/,Qa=/\S/,
Ra=/^(\s|\u00A0)+|(\s|\u00A0)+$/g,Sa=/^<(\w+)\s*\/?>(?:<\/\1>)?$/,P=navigator.userAgent,xa=false,Q=[],M,ca=Object.prototype.toString,da=Object.prototype.hasOwnProperty,ea=Array.prototype.push,R=Array.prototype.slice,V=Array.prototype.indexOf;c.fn=c.prototype={init:function(a,b){var d,f;if(!a)return this;if(a.nodeType){this.context=this[0]=a;this.length=1;return this}if(typeof a==="string")if((d=Oa.exec(a))&&(d[1]||!b))if(d[1]){f=b?b.ownerDocument||b:s;if(a=Sa.exec(a))if(c.isPlainObject(b)){a=[s.createElement(a[1])];
c.fn.attr.call(a,b,true)}else a=[f.createElement(a[1])];else{a=ua([d[1]],[f]);a=(a.cacheable?a.fragment.cloneNode(true):a.fragment).childNodes}}else{if(b=s.getElementById(d[2])){if(b.id!==d[2])return U.find(a);this.length=1;this[0]=b}this.context=s;this.selector=a;return this}else if(!b&&/^\w+$/.test(a)){this.selector=a;this.context=s;a=s.getElementsByTagName(a)}else return!b||b.jquery?(b||U).find(a):c(b).find(a);else if(c.isFunction(a))return U.ready(a);if(a.selector!==w){this.selector=a.selector;
this.context=a.context}return c.isArray(a)?this.setArray(a):c.makeArray(a,this)},selector:"",jquery:"1.4",length:0,size:function(){return this.length},toArray:function(){return R.call(this,0)},get:function(a){return a==null?this.toArray():a<0?this.slice(a)[0]:this[a]},pushStack:function(a,b,d){a=c(a||null);a.prevObject=this;a.context=this.context;if(b==="find")a.selector=this.selector+(this.selector?" ":"")+d;else if(b)a.selector=this.selector+"."+b+"("+d+")";return a},setArray:function(a){this.length=
0;ea.apply(this,a);return this},each:function(a,b){return c.each(this,a,b)},ready:function(a){c.bindReady();if(c.isReady)a.call(s,c);else Q&&Q.push(a);return this},eq:function(a){return a===-1?this.slice(a):this.slice(a,+a+1)},first:function(){return this.eq(0)},last:function(){return this.eq(-1)},slice:function(){return this.pushStack(R.apply(this,arguments),"slice",R.call(arguments).join(","))},map:function(a){return this.pushStack(c.map(this,function(b,d){return a.call(b,d,b)}))},end:function(){return this.prevObject||
c(null)},push:ea,sort:[].sort,splice:[].splice};c.fn.init.prototype=c.fn;c.extend=c.fn.extend=function(){var a=arguments[0]||{},b=1,d=arguments.length,f=false,e,i,j,o;if(typeof a==="boolean"){f=a;a=arguments[1]||{};b=2}if(typeof a!=="object"&&!c.isFunction(a))a={};if(d===b){a=this;--b}for(;b<d;b++)if((e=arguments[b])!=null)for(i in e){j=a[i];o=e[i];if(a!==o)if(f&&o&&(c.isPlainObject(o)||c.isArray(o))){j=j&&(c.isPlainObject(j)||c.isArray(j))?j:c.isArray(o)?[]:{};a[i]=c.extend(f,j,o)}else if(o!==w)a[i]=
o}return a};c.extend({noConflict:function(a){A.$=Na;if(a)A.jQuery=Ma;return c},isReady:false,ready:function(){if(!c.isReady){if(!s.body)return setTimeout(c.ready,13);c.isReady=true;if(Q){for(var a,b=0;a=Q[b++];)a.call(s,c);Q=null}c.fn.triggerHandler&&c(s).triggerHandler("ready")}},bindReady:function(){if(!xa){xa=true;if(s.readyState==="complete")return c.ready();if(s.addEventListener){s.addEventListener("DOMContentLoaded",M,false);A.addEventListener("load",c.ready,false)}else if(s.attachEvent){s.attachEvent("onreadystatechange",
M);A.attachEvent("onload",c.ready);var a=false;try{a=A.frameElement==null}catch(b){}s.documentElement.doScroll&&a&&oa()}}},isFunction:function(a){return ca.call(a)==="[object Function]"},isArray:function(a){return ca.call(a)==="[object Array]"},isPlainObject:function(a){if(!a||ca.call(a)!=="[object Object]"||a.nodeType||a.setInterval)return false;if(a.constructor&&!da.call(a,"constructor")&&!da.call(a.constructor.prototype,"isPrototypeOf"))return false;var b;for(b in a);return b===w||da.call(a,b)},
isEmptyObject:function(a){for(var b in a)return false;return true},noop:function(){},globalEval:function(a){if(a&&Qa.test(a)){var b=s.getElementsByTagName("head")[0]||s.documentElement,d=s.createElement("script");d.type="text/javascript";if(c.support.scriptEval)d.appendChild(s.createTextNode(a));else d.text=a;b.insertBefore(d,b.firstChild);b.removeChild(d)}},nodeName:function(a,b){return a.nodeName&&a.nodeName.toUpperCase()===b.toUpperCase()},each:function(a,b,d){var f,e=0,i=a.length,j=i===w||c.isFunction(a);
if(d)if(j)for(f in a){if(b.apply(a[f],d)===false)break}else for(;e<i;){if(b.apply(a[e++],d)===false)break}else if(j)for(f in a){if(b.call(a[f],f,a[f])===false)break}else for(d=a[0];e<i&&b.call(d,e,d)!==false;d=a[++e]);return a},trim:function(a){return(a||"").replace(Ra,"")},makeArray:function(a,b){b=b||[];if(a!=null)a.length==null||typeof a==="string"||c.isFunction(a)||typeof a!=="function"&&a.setInterval?ea.call(b,a):c.merge(b,a);return b},inArray:function(a,b){if(b.indexOf)return b.indexOf(a);for(var d=
0,f=b.length;d<f;d++)if(b[d]===a)return d;return-1},merge:function(a,b){var d=a.length,f=0;if(typeof b.length==="number")for(var e=b.length;f<e;f++)a[d++]=b[f];else for(;b[f]!==w;)a[d++]=b[f++];a.length=d;return a},grep:function(a,b,d){for(var f=[],e=0,i=a.length;e<i;e++)!d!==!b(a[e],e)&&f.push(a[e]);return f},map:function(a,b,d){for(var f=[],e,i=0,j=a.length;i<j;i++){e=b(a[i],i,d);if(e!=null)f[f.length]=e}return f.concat.apply([],f)},guid:1,proxy:function(a,b,d){if(arguments.length===2)if(typeof b===
"string"){d=a;a=d[b];b=w}else if(b&&!c.isFunction(b)){d=b;b=w}if(!b&&a)b=function(){return a.apply(d||this,arguments)};if(a)b.guid=a.guid=a.guid||b.guid||c.guid++;return b},uaMatch:function(a){var b={browser:""};a=a.toLowerCase();if(/webkit/.test(a))b={browser:"webkit",version:/webkit[\/ ]([\w.]+)/};else if(/opera/.test(a))b={browser:"opera",version:/version/.test(a)?/version[\/ ]([\w.]+)/:/opera[\/ ]([\w.]+)/};else if(/msie/.test(a))b={browser:"msie",version:/msie ([\w.]+)/};else if(/mozilla/.test(a)&&
!/compatible/.test(a))b={browser:"mozilla",version:/rv:([\w.]+)/};b.version=(b.version&&b.version.exec(a)||[0,"0"])[1];return b},browser:{}});P=c.uaMatch(P);if(P.browser){c.browser[P.browser]=true;c.browser.version=P.version}if(c.browser.webkit)c.browser.safari=true;if(V)c.inArray=function(a,b){return V.call(b,a)};U=c(s);if(s.addEventListener)M=function(){s.removeEventListener("DOMContentLoaded",M,false);c.ready()};else if(s.attachEvent)M=function(){if(s.readyState==="complete"){s.detachEvent("onreadystatechange",
M);c.ready()}};if(V)c.inArray=function(a,b){return V.call(b,a)};(function(){c.support={};var a=s.documentElement,b=s.createElement("script"),d=s.createElement("div"),f="script"+K();d.style.display="none";d.innerHTML="   <link/><table></table><a href='/a' style='color:red;float:left;opacity:.55;'>a</a><input type='checkbox'/>";var e=d.getElementsByTagName("*"),i=d.getElementsByTagName("a")[0];if(!(!e||!e.length||!i)){c.support={leadingWhitespace:d.firstChild.nodeType===3,tbody:!d.getElementsByTagName("tbody").length,
htmlSerialize:!!d.getElementsByTagName("link").length,style:/red/.test(i.getAttribute("style")),hrefNormalized:i.getAttribute("href")==="/a",opacity:/^0.55$/.test(i.style.opacity),cssFloat:!!i.style.cssFloat,checkOn:d.getElementsByTagName("input")[0].value==="on",optSelected:s.createElement("select").appendChild(s.createElement("option")).selected,scriptEval:false,noCloneEvent:true,boxModel:null};b.type="text/javascript";try{b.appendChild(s.createTextNode("window."+f+"=1;"))}catch(j){}a.insertBefore(b,
a.firstChild);if(A[f]){c.support.scriptEval=true;delete A[f]}a.removeChild(b);if(d.attachEvent&&d.fireEvent){d.attachEvent("onclick",function o(){c.support.noCloneEvent=false;d.detachEvent("onclick",o)});d.cloneNode(true).fireEvent("onclick")}c(function(){var o=s.createElement("div");o.style.width=o.style.paddingLeft="1px";s.body.appendChild(o);c.boxModel=c.support.boxModel=o.offsetWidth===2;s.body.removeChild(o).style.display="none"});a=function(o){var p=s.createElement("div");o="on"+o;var n=o in
p;if(!n){p.setAttribute(o,"return;");n=typeof p[o]==="function"}return n};c.support.submitBubbles=a("submit");c.support.changeBubbles=a("change");a=b=d=e=i=null}})();c.props={"for":"htmlFor","class":"className",readonly:"readOnly",maxlength:"maxLength",cellspacing:"cellSpacing",rowspan:"rowSpan",colspan:"colSpan",tabindex:"tabIndex",usemap:"useMap",frameborder:"frameBorder"};var H="jQuery"+K(),Ta=0,ya={},Ua={};c.extend({cache:{},expando:H,noData:{embed:true,object:true,applet:true},data:function(a,
b,d){if(!(a.nodeName&&c.noData[a.nodeName.toLowerCase()])){a=a==A?ya:a;var f=a[H],e=c.cache;if(!b&&!f)return null;f||(f=++Ta);if(typeof b==="object"){a[H]=f;e=e[f]=c.extend(true,{},b)}else e=e[f]?e[f]:typeof d==="undefined"?Ua:(e[f]={});if(d!==w){a[H]=f;e[b]=d}return typeof b==="string"?e[b]:e}},removeData:function(a,b){if(!(a.nodeName&&c.noData[a.nodeName.toLowerCase()])){a=a==A?ya:a;var d=a[H],f=c.cache,e=f[d];if(b){if(e){delete e[b];c.isEmptyObject(e)&&c.removeData(a)}}else{try{delete a[H]}catch(i){a.removeAttribute&&
a.removeAttribute(H)}delete f[d]}}}});c.fn.extend({data:function(a,b){if(typeof a==="undefined"&&this.length)return c.data(this[0]);else if(typeof a==="object")return this.each(function(){c.data(this,a)});var d=a.split(".");d[1]=d[1]?"."+d[1]:"";if(b===w){var f=this.triggerHandler("getData"+d[1]+"!",[d[0]]);if(f===w&&this.length)f=c.data(this[0],a);return f===w&&d[1]?this.data(d[0]):f}else return this.trigger("setData"+d[1]+"!",[d[0],b]).each(function(){c.data(this,a,b)})},removeData:function(a){return this.each(function(){c.removeData(this,
a)})}});c.extend({queue:function(a,b,d){if(a){b=(b||"fx")+"queue";var f=c.data(a,b);if(!d)return f||[];if(!f||c.isArray(d))f=c.data(a,b,c.makeArray(d));else f.push(d);return f}},dequeue:function(a,b){b=b||"fx";var d=c.queue(a,b),f=d.shift();if(f==="inprogress")f=d.shift();if(f){b==="fx"&&d.unshift("inprogress");f.call(a,function(){c.dequeue(a,b)})}}});c.fn.extend({queue:function(a,b){if(typeof a!=="string"){b=a;a="fx"}if(b===w)return c.queue(this[0],a);return this.each(function(){var d=c.queue(this,
a,b);a==="fx"&&d[0]!=="inprogress"&&c.dequeue(this,a)})},dequeue:function(a){return this.each(function(){c.dequeue(this,a)})},delay:function(a,b){a=c.fx?c.fx.speeds[a]||a:a;b=b||"fx";return this.queue(b,function(){var d=this;setTimeout(function(){c.dequeue(d,b)},a)})},clearQueue:function(a){return this.queue(a||"fx",[])}});var za=/[\n\t]/g,fa=/\s+/,Va=/\r/g,Wa=/href|src|style/,Xa=/(button|input)/i,Ya=/(button|input|object|select|textarea)/i,Za=/^(a|area)$/i,Aa=/radio|checkbox/;c.fn.extend({attr:function(a,
b){return $(this,a,b,true,c.attr)},removeAttr:function(a){return this.each(function(){c.attr(this,a,"");this.nodeType===1&&this.removeAttribute(a)})},addClass:function(a){if(c.isFunction(a))return this.each(function(p){var n=c(this);n.addClass(a.call(this,p,n.attr("class")))});if(a&&typeof a==="string")for(var b=(a||"").split(fa),d=0,f=this.length;d<f;d++){var e=this[d];if(e.nodeType===1)if(e.className)for(var i=" "+e.className+" ",j=0,o=b.length;j<o;j++){if(i.indexOf(" "+b[j]+" ")<0)e.className+=
" "+b[j]}else e.className=a}return this},removeClass:function(a){if(c.isFunction(a))return this.each(function(p){var n=c(this);n.removeClass(a.call(this,p,n.attr("class")))});if(a&&typeof a==="string"||a===w)for(var b=(a||"").split(fa),d=0,f=this.length;d<f;d++){var e=this[d];if(e.nodeType===1&&e.className)if(a){for(var i=(" "+e.className+" ").replace(za," "),j=0,o=b.length;j<o;j++)i=i.replace(" "+b[j]+" "," ");e.className=i.substring(1,i.length-1)}else e.className=""}return this},toggleClass:function(a,
b){var d=typeof a,f=typeof b==="boolean";if(c.isFunction(a))return this.each(function(e){var i=c(this);i.toggleClass(a.call(this,e,i.attr("class"),b),b)});return this.each(function(){if(d==="string")for(var e,i=0,j=c(this),o=b,p=a.split(fa);e=p[i++];){o=f?o:!j.hasClass(e);j[o?"addClass":"removeClass"](e)}else if(d==="undefined"||d==="boolean"){this.className&&c.data(this,"__className__",this.className);this.className=this.className||a===false?"":c.data(this,"__className__")||""}})},hasClass:function(a){a=
" "+a+" ";for(var b=0,d=this.length;b<d;b++)if((" "+this[b].className+" ").replace(za," ").indexOf(a)>-1)return true;return false},val:function(a){if(a===w){var b=this[0];if(b){if(c.nodeName(b,"option"))return(b.attributes.value||{}).specified?b.value:b.text;if(c.nodeName(b,"select")){var d=b.selectedIndex,f=[],e=b.options;b=b.type==="select-one";if(d<0)return null;var i=b?d:0;for(d=b?d+1:e.length;i<d;i++){var j=e[i];if(j.selected){a=c(j).val();if(b)return a;f.push(a)}}return f}if(Aa.test(b.type)&&
!c.support.checkOn)return b.getAttribute("value")===null?"on":b.value;return(b.value||"").replace(Va,"")}return w}var o=c.isFunction(a);return this.each(function(p){var n=c(this),t=a;if(this.nodeType===1){if(o)t=a.call(this,p,n.val());if(typeof t==="number")t+="";if(c.isArray(t)&&Aa.test(this.type))this.checked=c.inArray(n.val(),t)>=0;else if(c.nodeName(this,"select")){var z=c.makeArray(t);c("option",this).each(function(){this.selected=c.inArray(c(this).val(),z)>=0});if(!z.length)this.selectedIndex=
-1}else this.value=t}})}});c.extend({attrFn:{val:true,css:true,html:true,text:true,data:true,width:true,height:true,offset:true},attr:function(a,b,d,f){if(!a||a.nodeType===3||a.nodeType===8)return w;if(f&&b in c.attrFn)return c(a)[b](d);f=a.nodeType!==1||!c.isXMLDoc(a);var e=d!==w;b=f&&c.props[b]||b;if(a.nodeType===1){var i=Wa.test(b);if(b in a&&f&&!i){if(e){if(b==="type"&&Xa.test(a.nodeName)&&a.parentNode)throw"type property can't be changed";a[b]=d}if(c.nodeName(a,"form")&&a.getAttributeNode(b))return a.getAttributeNode(b).nodeValue;
if(b==="tabIndex")return(b=a.getAttributeNode("tabIndex"))&&b.specified?b.value:Ya.test(a.nodeName)||Za.test(a.nodeName)&&a.href?0:w;return a[b]}if(!c.support.style&&f&&b==="style"){if(e)a.style.cssText=""+d;return a.style.cssText}e&&a.setAttribute(b,""+d);a=!c.support.hrefNormalized&&f&&i?a.getAttribute(b,2):a.getAttribute(b);return a===null?w:a}return c.style(a,b,d)}});var $a=function(a){return a.replace(/[^\w\s\.\|`]/g,function(b){return"\\"+b})};c.event={add:function(a,b,d,f){if(!(a.nodeType===
3||a.nodeType===8)){if(a.setInterval&&a!==A&&!a.frameElement)a=A;if(!d.guid)d.guid=c.guid++;if(f!==w){d=c.proxy(d);d.data=f}var e=c.data(a,"events")||c.data(a,"events",{}),i=c.data(a,"handle"),j;if(!i){j=function(){return typeof c!=="undefined"&&!c.event.triggered?c.event.handle.apply(j.elem,arguments):w};i=c.data(a,"handle",j)}if(i){i.elem=a;b=b.split(/\s+/);for(var o,p=0;o=b[p++];){var n=o.split(".");o=n.shift();d.type=n.slice(0).sort().join(".");var t=e[o],z=this.special[o]||{};if(!t){t=e[o]={};
if(!z.setup||z.setup.call(a,f,n,d)===false)if(a.addEventListener)a.addEventListener(o,i,false);else a.attachEvent&&a.attachEvent("on"+o,i)}if(z.add)if((n=z.add.call(a,d,f,n,t))&&c.isFunction(n)){n.guid=n.guid||d.guid;d=n}t[d.guid]=d;this.global[o]=true}a=null}}},global:{},remove:function(a,b,d){if(!(a.nodeType===3||a.nodeType===8)){var f=c.data(a,"events"),e,i,j;if(f){if(b===w||typeof b==="string"&&b.charAt(0)===".")for(i in f)this.remove(a,i+(b||""));else{if(b.type){d=b.handler;b=b.type}b=b.split(/\s+/);
for(var o=0;i=b[o++];){var p=i.split(".");i=p.shift();var n=!p.length,t=c.map(p.slice(0).sort(),$a);t=new RegExp("(^|\\.)"+t.join("\\.(?:.*\\.)?")+"(\\.|$)");var z=this.special[i]||{};if(f[i]){if(d){j=f[i][d.guid];delete f[i][d.guid]}else for(var B in f[i])if(n||t.test(f[i][B].type))delete f[i][B];z.remove&&z.remove.call(a,p,j);for(e in f[i])break;if(!e){if(!z.teardown||z.teardown.call(a,p)===false)if(a.removeEventListener)a.removeEventListener(i,c.data(a,"handle"),false);else a.detachEvent&&a.detachEvent("on"+
i,c.data(a,"handle"));e=null;delete f[i]}}}}for(e in f)break;if(!e){if(B=c.data(a,"handle"))B.elem=null;c.removeData(a,"events");c.removeData(a,"handle")}}}},trigger:function(a,b,d,f){var e=a.type||a;if(!f){a=typeof a==="object"?a[H]?a:c.extend(c.Event(e),a):c.Event(e);if(e.indexOf("!")>=0){a.type=e=e.slice(0,-1);a.exclusive=true}if(!d){a.stopPropagation();this.global[e]&&c.each(c.cache,function(){this.events&&this.events[e]&&c.event.trigger(a,b,this.handle.elem)})}if(!d||d.nodeType===3||d.nodeType===
8)return w;a.result=w;a.target=d;b=c.makeArray(b);b.unshift(a)}a.currentTarget=d;var i=c.data(d,"handle");i&&i.apply(d,b);var j,o;try{if(!(d&&d.nodeName&&c.noData[d.nodeName.toLowerCase()])){j=d[e];o=d["on"+e]}}catch(p){}i=c.nodeName(d,"a")&&e==="click";if(!f&&j&&!a.isDefaultPrevented()&&!i){this.triggered=true;try{d[e]()}catch(n){}}else if(o&&d["on"+e].apply(d,b)===false)a.result=false;this.triggered=false;if(!a.isPropagationStopped())(d=d.parentNode||d.ownerDocument)&&c.event.trigger(a,b,d,true)},
handle:function(a){var b,d;a=arguments[0]=c.event.fix(a||A.event);a.currentTarget=this;d=a.type.split(".");a.type=d.shift();b=!d.length&&!a.exclusive;var f=new RegExp("(^|\\.)"+d.slice(0).sort().join("\\.(?:.*\\.)?")+"(\\.|$)");d=(c.data(this,"events")||{})[a.type];for(var e in d){var i=d[e];if(b||f.test(i.type)){a.handler=i;a.data=i.data;i=i.apply(this,arguments);if(i!==w){a.result=i;if(i===false){a.preventDefault();a.stopPropagation()}}if(a.isImmediatePropagationStopped())break}}return a.result},
props:"altKey attrChange attrName bubbles button cancelable charCode clientX clientY ctrlKey currentTarget data detail eventPhase fromElement handler keyCode layerX layerY metaKey newValue offsetX offsetY originalTarget pageX pageY prevValue relatedNode relatedTarget screenX screenY shiftKey srcElement target toElement view wheelDelta which".split(" "),fix:function(a){if(a[H])return a;var b=a;a=c.Event(b);for(var d=this.props.length,f;d;){f=this.props[--d];a[f]=b[f]}if(!a.target)a.target=a.srcElement||
s;if(a.target.nodeType===3)a.target=a.target.parentNode;if(!a.relatedTarget&&a.fromElement)a.relatedTarget=a.fromElement===a.target?a.toElement:a.fromElement;if(a.pageX==null&&a.clientX!=null){b=s.documentElement;d=s.body;a.pageX=a.clientX+(b&&b.scrollLeft||d&&d.scrollLeft||0)-(b&&b.clientLeft||d&&d.clientLeft||0);a.pageY=a.clientY+(b&&b.scrollTop||d&&d.scrollTop||0)-(b&&b.clientTop||d&&d.clientTop||0)}if(!a.which&&(a.charCode||a.charCode===0?a.charCode:a.keyCode))a.which=a.charCode||a.keyCode;if(!a.metaKey&&
a.ctrlKey)a.metaKey=a.ctrlKey;if(!a.which&&a.button!==w)a.which=a.button&1?1:a.button&2?3:a.button&4?2:0;return a},guid:1E8,proxy:c.proxy,special:{ready:{setup:c.bindReady,teardown:c.noop},live:{add:function(a,b){c.extend(a,b||{});a.guid+=b.selector+b.live;c.event.add(this,b.live,qa,b)},remove:function(a){if(a.length){var b=0,d=new RegExp("(^|\\.)"+a[0]+"(\\.|$)");c.each(c.data(this,"events").live||{},function(){d.test(this.type)&&b++});b<1&&c.event.remove(this,a[0],qa)}},special:{}},beforeunload:{setup:function(a,
b,d){if(this.setInterval)this.onbeforeunload=d;return false},teardown:function(a,b){if(this.onbeforeunload===b)this.onbeforeunload=null}}}};c.Event=function(a){if(!this.preventDefault)return new c.Event(a);if(a&&a.type){this.originalEvent=a;this.type=a.type}else this.type=a;this.timeStamp=K();this[H]=true};c.Event.prototype={preventDefault:function(){this.isDefaultPrevented=ba;var a=this.originalEvent;if(a){a.preventDefault&&a.preventDefault();a.returnValue=false}},stopPropagation:function(){this.isPropagationStopped=
ba;var a=this.originalEvent;if(a){a.stopPropagation&&a.stopPropagation();a.cancelBubble=true}},stopImmediatePropagation:function(){this.isImmediatePropagationStopped=ba;this.stopPropagation()},isDefaultPrevented:aa,isPropagationStopped:aa,isImmediatePropagationStopped:aa};var Ba=function(a){for(var b=a.relatedTarget;b&&b!==this;)try{b=b.parentNode}catch(d){break}if(b!==this){a.type=a.data;c.event.handle.apply(this,arguments)}},Ca=function(a){a.type=a.data;c.event.handle.apply(this,arguments)};c.each({mouseenter:"mouseover",
mouseleave:"mouseout"},function(a,b){c.event.special[a]={setup:function(d){c.event.add(this,b,d&&d.selector?Ca:Ba,a)},teardown:function(d){c.event.remove(this,b,d&&d.selector?Ca:Ba)}}});if(!c.support.submitBubbles)c.event.special.submit={setup:function(a,b,d){if(this.nodeName.toLowerCase()!=="form"){c.event.add(this,"click.specialSubmit."+d.guid,function(f){var e=f.target,i=e.type;if((i==="submit"||i==="image")&&c(e).closest("form").length)return pa("submit",this,arguments)});c.event.add(this,"keypress.specialSubmit."+
d.guid,function(f){var e=f.target,i=e.type;if((i==="text"||i==="password")&&c(e).closest("form").length&&f.keyCode===13)return pa("submit",this,arguments)})}else return false},remove:function(a,b){c.event.remove(this,"click.specialSubmit"+(b?"."+b.guid:""));c.event.remove(this,"keypress.specialSubmit"+(b?"."+b.guid:""))}};if(!c.support.changeBubbles){var ga=/textarea|input|select/i;function Da(a){var b=a.type,d=a.value;if(b==="radio"||b==="checkbox")d=a.checked;else if(b==="select-multiple")d=a.selectedIndex>
-1?c.map(a.options,function(f){return f.selected}).join("-"):"";else if(a.nodeName.toLowerCase()==="select")d=a.selectedIndex;return d}function ha(a,b){var d=a.target,f,e;if(!(!ga.test(d.nodeName)||d.readOnly)){f=c.data(d,"_change_data");e=Da(d);if(e!==f){if(a.type!=="focusout"||d.type!=="radio")c.data(d,"_change_data",e);if(d.type!=="select"&&(f!=null||e)){a.type="change";return c.event.trigger(a,b,this)}}}}c.event.special.change={filters:{focusout:ha,click:function(a){var b=a.target,d=b.type;if(d===
"radio"||d==="checkbox"||b.nodeName.toLowerCase()==="select")return ha.call(this,a)},keydown:function(a){var b=a.target,d=b.type;if(a.keyCode===13&&b.nodeName.toLowerCase()!=="textarea"||a.keyCode===32&&(d==="checkbox"||d==="radio")||d==="select-multiple")return ha.call(this,a)},beforeactivate:function(a){a=a.target;a.nodeName.toLowerCase()==="input"&&a.type==="radio"&&c.data(a,"_change_data",Da(a))}},setup:function(a,b,d){for(var f in W)c.event.add(this,f+".specialChange."+d.guid,W[f]);return ga.test(this.nodeName)},
remove:function(a,b){for(var d in W)c.event.remove(this,d+".specialChange"+(b?"."+b.guid:""),W[d]);return ga.test(this.nodeName)}};var W=c.event.special.change.filters}s.addEventListener&&c.each({focus:"focusin",blur:"focusout"},function(a,b){function d(f){f=c.event.fix(f);f.type=b;return c.event.handle.call(this,f)}c.event.special[b]={setup:function(){this.addEventListener(a,d,true)},teardown:function(){this.removeEventListener(a,d,true)}}});c.each(["bind","one"],function(a,b){c.fn[b]=function(d,
f,e){if(typeof d==="object"){for(var i in d)this[b](i,f,d[i],e);return this}if(c.isFunction(f)){thisObject=e;e=f;f=w}var j=b==="one"?c.proxy(e,function(o){c(this).unbind(o,j);return e.apply(this,arguments)}):e;return d==="unload"&&b!=="one"?this.one(d,f,e,thisObject):this.each(function(){c.event.add(this,d,j,f)})}});c.fn.extend({unbind:function(a,b){if(typeof a==="object"&&!a.preventDefault){for(var d in a)this.unbind(d,a[d]);return this}return this.each(function(){c.event.remove(this,a,b)})},trigger:function(a,
b){return this.each(function(){c.event.trigger(a,b,this)})},triggerHandler:function(a,b){if(this[0]){a=c.Event(a);a.preventDefault();a.stopPropagation();c.event.trigger(a,b,this[0]);return a.result}},toggle:function(a){for(var b=arguments,d=1;d<b.length;)c.proxy(a,b[d++]);return this.click(c.proxy(a,function(f){var e=(c.data(this,"lastToggle"+a.guid)||0)%d;c.data(this,"lastToggle"+a.guid,e+1);f.preventDefault();return b[e].apply(this,arguments)||false}))},hover:function(a,b){return this.mouseenter(a).mouseleave(b||
a)},live:function(a,b,d){if(c.isFunction(b)){d=b;b=w}c(this.context).bind(ra(a,this.selector),{data:b,selector:this.selector,live:a},d);return this},die:function(a,b){c(this.context).unbind(ra(a,this.selector),b?{guid:b.guid+this.selector+a}:null);return this}});c.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error".split(" "),function(a,b){c.fn[b]=function(d){return d?
this.bind(b,d):this.trigger(b)};if(c.attrFn)c.attrFn[b]=true});A.attachEvent&&!A.addEventListener&&A.attachEvent("onunload",function(){for(var a in c.cache)if(c.cache[a].handle)try{c.event.remove(c.cache[a].handle.elem)}catch(b){}});(function(){function a(g){for(var h="",k,m=0;g[m];m++){k=g[m];if(k.nodeType===3||k.nodeType===4)h+=k.nodeValue;else if(k.nodeType!==8)h+=a(k.childNodes)}return h}function b(g,h,k,m,r,q){r=0;for(var v=m.length;r<v;r++){var u=m[r];if(u){u=u[g];for(var y=false;u;){if(u.sizcache===
k){y=m[u.sizset];break}if(u.nodeType===1&&!q){u.sizcache=k;u.sizset=r}if(u.nodeName.toLowerCase()===h){y=u;break}u=u[g]}m[r]=y}}}function d(g,h,k,m,r,q){r=0;for(var v=m.length;r<v;r++){var u=m[r];if(u){u=u[g];for(var y=false;u;){if(u.sizcache===k){y=m[u.sizset];break}if(u.nodeType===1){if(!q){u.sizcache=k;u.sizset=r}if(typeof h!=="string"){if(u===h){y=true;break}}else if(p.filter(h,[u]).length>0){y=u;break}}u=u[g]}m[r]=y}}}var f=/((?:\((?:\([^()]+\)|[^()]+)+\)|\[(?:\[[^[\]]*\]|['"][^'"]*['"]|[^[\]'"]+)+\]|\\.|[^ >+~,(\[\\]+)+|[>+~])(\s*,\s*)?((?:.|\r|\n)*)/g,
e=0,i=Object.prototype.toString,j=false,o=true;[0,0].sort(function(){o=false;return 0});var p=function(g,h,k,m){k=k||[];var r=h=h||s;if(h.nodeType!==1&&h.nodeType!==9)return[];if(!g||typeof g!=="string")return k;for(var q=[],v,u,y,S,I=true,N=x(h),J=g;(f.exec(""),v=f.exec(J))!==null;){J=v[3];q.push(v[1]);if(v[2]){S=v[3];break}}if(q.length>1&&t.exec(g))if(q.length===2&&n.relative[q[0]])u=ia(q[0]+q[1],h);else for(u=n.relative[q[0]]?[h]:p(q.shift(),h);q.length;){g=q.shift();if(n.relative[g])g+=q.shift();
u=ia(g,u)}else{if(!m&&q.length>1&&h.nodeType===9&&!N&&n.match.ID.test(q[0])&&!n.match.ID.test(q[q.length-1])){v=p.find(q.shift(),h,N);h=v.expr?p.filter(v.expr,v.set)[0]:v.set[0]}if(h){v=m?{expr:q.pop(),set:B(m)}:p.find(q.pop(),q.length===1&&(q[0]==="~"||q[0]==="+")&&h.parentNode?h.parentNode:h,N);u=v.expr?p.filter(v.expr,v.set):v.set;if(q.length>0)y=B(u);else I=false;for(;q.length;){var E=q.pop();v=E;if(n.relative[E])v=q.pop();else E="";if(v==null)v=h;n.relative[E](y,v,N)}}else y=[]}y||(y=u);if(!y)throw"Syntax error, unrecognized expression: "+
(E||g);if(i.call(y)==="[object Array]")if(I)if(h&&h.nodeType===1)for(g=0;y[g]!=null;g++){if(y[g]&&(y[g]===true||y[g].nodeType===1&&F(h,y[g])))k.push(u[g])}else for(g=0;y[g]!=null;g++)y[g]&&y[g].nodeType===1&&k.push(u[g]);else k.push.apply(k,y);else B(y,k);if(S){p(S,r,k,m);p.uniqueSort(k)}return k};p.uniqueSort=function(g){if(D){j=o;g.sort(D);if(j)for(var h=1;h<g.length;h++)g[h]===g[h-1]&&g.splice(h--,1)}return g};p.matches=function(g,h){return p(g,null,null,h)};p.find=function(g,h,k){var m,r;if(!g)return[];
for(var q=0,v=n.order.length;q<v;q++){var u=n.order[q];if(r=n.leftMatch[u].exec(g)){var y=r[1];r.splice(1,1);if(y.substr(y.length-1)!=="\\"){r[1]=(r[1]||"").replace(/\\/g,"");m=n.find[u](r,h,k);if(m!=null){g=g.replace(n.match[u],"");break}}}}m||(m=h.getElementsByTagName("*"));return{set:m,expr:g}};p.filter=function(g,h,k,m){for(var r=g,q=[],v=h,u,y,S=h&&h[0]&&x(h[0]);g&&h.length;){for(var I in n.filter)if((u=n.leftMatch[I].exec(g))!=null&&u[2]){var N=n.filter[I],J,E;E=u[1];y=false;u.splice(1,1);if(E.substr(E.length-
1)!=="\\"){if(v===q)q=[];if(n.preFilter[I])if(u=n.preFilter[I](u,v,k,q,m,S)){if(u===true)continue}else y=J=true;if(u)for(var X=0;(E=v[X])!=null;X++)if(E){J=N(E,u,X,v);var Ea=m^!!J;if(k&&J!=null)if(Ea)y=true;else v[X]=false;else if(Ea){q.push(E);y=true}}if(J!==w){k||(v=q);g=g.replace(n.match[I],"");if(!y)return[];break}}}if(g===r)if(y==null)throw"Syntax error, unrecognized expression: "+g;else break;r=g}return v};var n=p.selectors={order:["ID","NAME","TAG"],match:{ID:/#((?:[\w\u00c0-\uFFFF-]|\\.)+)/,
CLASS:/\.((?:[\w\u00c0-\uFFFF-]|\\.)+)/,NAME:/\[name=['"]*((?:[\w\u00c0-\uFFFF-]|\\.)+)['"]*\]/,ATTR:/\[\s*((?:[\w\u00c0-\uFFFF-]|\\.)+)\s*(?:(\S?=)\s*(['"]*)(.*?)\3|)\s*\]/,TAG:/^((?:[\w\u00c0-\uFFFF\*-]|\\.)+)/,CHILD:/:(only|nth|last|first)-child(?:\((even|odd|[\dn+-]*)\))?/,POS:/:(nth|eq|gt|lt|first|last|even|odd)(?:\((\d*)\))?(?=[^-]|$)/,PSEUDO:/:((?:[\w\u00c0-\uFFFF-]|\\.)+)(?:\((['"]?)((?:\([^\)]+\)|[^\(\)]*)+)\2\))?/},leftMatch:{},attrMap:{"class":"className","for":"htmlFor"},attrHandle:{href:function(g){return g.getAttribute("href")}},
relative:{"+":function(g,h){var k=typeof h==="string",m=k&&!/\W/.test(h);k=k&&!m;if(m)h=h.toLowerCase();m=0;for(var r=g.length,q;m<r;m++)if(q=g[m]){for(;(q=q.previousSibling)&&q.nodeType!==1;);g[m]=k||q&&q.nodeName.toLowerCase()===h?q||false:q===h}k&&p.filter(h,g,true)},">":function(g,h){var k=typeof h==="string";if(k&&!/\W/.test(h)){h=h.toLowerCase();for(var m=0,r=g.length;m<r;m++){var q=g[m];if(q){k=q.parentNode;g[m]=k.nodeName.toLowerCase()===h?k:false}}}else{m=0;for(r=g.length;m<r;m++)if(q=g[m])g[m]=
k?q.parentNode:q.parentNode===h;k&&p.filter(h,g,true)}},"":function(g,h,k){var m=e++,r=d;if(typeof h==="string"&&!/\W/.test(h)){var q=h=h.toLowerCase();r=b}r("parentNode",h,m,g,q,k)},"~":function(g,h,k){var m=e++,r=d;if(typeof h==="string"&&!/\W/.test(h)){var q=h=h.toLowerCase();r=b}r("previousSibling",h,m,g,q,k)}},find:{ID:function(g,h,k){if(typeof h.getElementById!=="undefined"&&!k)return(g=h.getElementById(g[1]))?[g]:[]},NAME:function(g,h){if(typeof h.getElementsByName!=="undefined"){var k=[];
h=h.getElementsByName(g[1]);for(var m=0,r=h.length;m<r;m++)h[m].getAttribute("name")===g[1]&&k.push(h[m]);return k.length===0?null:k}},TAG:function(g,h){return h.getElementsByTagName(g[1])}},preFilter:{CLASS:function(g,h,k,m,r,q){g=" "+g[1].replace(/\\/g,"")+" ";if(q)return g;q=0;for(var v;(v=h[q])!=null;q++)if(v)if(r^(v.className&&(" "+v.className+" ").replace(/[\t\n]/g," ").indexOf(g)>=0))k||m.push(v);else if(k)h[q]=false;return false},ID:function(g){return g[1].replace(/\\/g,"")},TAG:function(g){return g[1].toLowerCase()},
CHILD:function(g){if(g[1]==="nth"){var h=/(-?)(\d*)n((?:\+|-)?\d*)/.exec(g[2]==="even"&&"2n"||g[2]==="odd"&&"2n+1"||!/\D/.test(g[2])&&"0n+"+g[2]||g[2]);g[2]=h[1]+(h[2]||1)-0;g[3]=h[3]-0}g[0]=e++;return g},ATTR:function(g,h,k,m,r,q){h=g[1].replace(/\\/g,"");if(!q&&n.attrMap[h])g[1]=n.attrMap[h];if(g[2]==="~=")g[4]=" "+g[4]+" ";return g},PSEUDO:function(g,h,k,m,r){if(g[1]==="not")if((f.exec(g[3])||"").length>1||/^\w/.test(g[3]))g[3]=p(g[3],null,null,h);else{g=p.filter(g[3],h,k,true^r);k||m.push.apply(m,
g);return false}else if(n.match.POS.test(g[0])||n.match.CHILD.test(g[0]))return true;return g},POS:function(g){g.unshift(true);return g}},filters:{enabled:function(g){return g.disabled===false&&g.type!=="hidden"},disabled:function(g){return g.disabled===true},checked:function(g){return g.checked===true},selected:function(g){return g.selected===true},parent:function(g){return!!g.firstChild},empty:function(g){return!g.firstChild},has:function(g,h,k){return!!p(k[3],g).length},header:function(g){return/h\d/i.test(g.nodeName)},
text:function(g){return"text"===g.type},radio:function(g){return"radio"===g.type},checkbox:function(g){return"checkbox"===g.type},file:function(g){return"file"===g.type},password:function(g){return"password"===g.type},submit:function(g){return"submit"===g.type},image:function(g){return"image"===g.type},reset:function(g){return"reset"===g.type},button:function(g){return"button"===g.type||g.nodeName.toLowerCase()==="button"},input:function(g){return/input|select|textarea|button/i.test(g.nodeName)}},
setFilters:{first:function(g,h){return h===0},last:function(g,h,k,m){return h===m.length-1},even:function(g,h){return h%2===0},odd:function(g,h){return h%2===1},lt:function(g,h,k){return h<k[3]-0},gt:function(g,h,k){return h>k[3]-0},nth:function(g,h,k){return k[3]-0===h},eq:function(g,h,k){return k[3]-0===h}},filter:{PSEUDO:function(g,h,k,m){var r=h[1],q=n.filters[r];if(q)return q(g,k,h,m);else if(r==="contains")return(g.textContent||g.innerText||a([g])||"").indexOf(h[3])>=0;else if(r==="not"){h=
h[3];k=0;for(m=h.length;k<m;k++)if(h[k]===g)return false;return true}else throw"Syntax error, unrecognized expression: "+r;},CHILD:function(g,h){var k=h[1],m=g;switch(k){case "only":case "first":for(;m=m.previousSibling;)if(m.nodeType===1)return false;if(k==="first")return true;m=g;case "last":for(;m=m.nextSibling;)if(m.nodeType===1)return false;return true;case "nth":k=h[2];var r=h[3];if(k===1&&r===0)return true;h=h[0];var q=g.parentNode;if(q&&(q.sizcache!==h||!g.nodeIndex)){var v=0;for(m=q.firstChild;m;m=
m.nextSibling)if(m.nodeType===1)m.nodeIndex=++v;q.sizcache=h}g=g.nodeIndex-r;return k===0?g===0:g%k===0&&g/k>=0}},ID:function(g,h){return g.nodeType===1&&g.getAttribute("id")===h},TAG:function(g,h){return h==="*"&&g.nodeType===1||g.nodeName.toLowerCase()===h},CLASS:function(g,h){return(" "+(g.className||g.getAttribute("class"))+" ").indexOf(h)>-1},ATTR:function(g,h){var k=h[1];g=n.attrHandle[k]?n.attrHandle[k](g):g[k]!=null?g[k]:g.getAttribute(k);k=g+"";var m=h[2];h=h[4];return g==null?m==="!=":m===
"="?k===h:m==="*="?k.indexOf(h)>=0:m==="~="?(" "+k+" ").indexOf(h)>=0:!h?k&&g!==false:m==="!="?k!==h:m==="^="?k.indexOf(h)===0:m==="$="?k.substr(k.length-h.length)===h:m==="|="?k===h||k.substr(0,h.length+1)===h+"-":false},POS:function(g,h,k,m){var r=n.setFilters[h[2]];if(r)return r(g,k,h,m)}}},t=n.match.POS;for(var z in n.match){n.match[z]=new RegExp(n.match[z].source+/(?![^\[]*\])(?![^\(]*\))/.source);n.leftMatch[z]=new RegExp(/(^(?:.|\r|\n)*?)/.source+n.match[z].source.replace(/\\(\d+)/g,function(g,
h){return"\\"+(h-0+1)}))}var B=function(g,h){g=Array.prototype.slice.call(g,0);if(h){h.push.apply(h,g);return h}return g};try{Array.prototype.slice.call(s.documentElement.childNodes,0)}catch(C){B=function(g,h){h=h||[];if(i.call(g)==="[object Array]")Array.prototype.push.apply(h,g);else if(typeof g.length==="number")for(var k=0,m=g.length;k<m;k++)h.push(g[k]);else for(k=0;g[k];k++)h.push(g[k]);return h}}var D;if(s.documentElement.compareDocumentPosition)D=function(g,h){if(!g.compareDocumentPosition||
!h.compareDocumentPosition){if(g==h)j=true;return g.compareDocumentPosition?-1:1}g=g.compareDocumentPosition(h)&4?-1:g===h?0:1;if(g===0)j=true;return g};else if("sourceIndex"in s.documentElement)D=function(g,h){if(!g.sourceIndex||!h.sourceIndex){if(g==h)j=true;return g.sourceIndex?-1:1}g=g.sourceIndex-h.sourceIndex;if(g===0)j=true;return g};else if(s.createRange)D=function(g,h){if(!g.ownerDocument||!h.ownerDocument){if(g==h)j=true;return g.ownerDocument?-1:1}var k=g.ownerDocument.createRange(),m=
h.ownerDocument.createRange();k.setStart(g,0);k.setEnd(g,0);m.setStart(h,0);m.setEnd(h,0);g=k.compareBoundaryPoints(Range.START_TO_END,m);if(g===0)j=true;return g};(function(){var g=s.createElement("div"),h="script"+(new Date).getTime();g.innerHTML="<a name='"+h+"'/>";var k=s.documentElement;k.insertBefore(g,k.firstChild);if(s.getElementById(h)){n.find.ID=function(m,r,q){if(typeof r.getElementById!=="undefined"&&!q)return(r=r.getElementById(m[1]))?r.id===m[1]||typeof r.getAttributeNode!=="undefined"&&
r.getAttributeNode("id").nodeValue===m[1]?[r]:w:[]};n.filter.ID=function(m,r){var q=typeof m.getAttributeNode!=="undefined"&&m.getAttributeNode("id");return m.nodeType===1&&q&&q.nodeValue===r}}k.removeChild(g);k=g=null})();(function(){var g=s.createElement("div");g.appendChild(s.createComment(""));if(g.getElementsByTagName("*").length>0)n.find.TAG=function(h,k){k=k.getElementsByTagName(h[1]);if(h[1]==="*"){h=[];for(var m=0;k[m];m++)k[m].nodeType===1&&h.push(k[m]);k=h}return k};g.innerHTML="<a href='#'></a>";
if(g.firstChild&&typeof g.firstChild.getAttribute!=="undefined"&&g.firstChild.getAttribute("href")!=="#")n.attrHandle.href=function(h){return h.getAttribute("href",2)};g=null})();s.querySelectorAll&&function(){var g=p,h=s.createElement("div");h.innerHTML="<p class='TEST'></p>";if(!(h.querySelectorAll&&h.querySelectorAll(".TEST").length===0)){p=function(m,r,q,v){r=r||s;if(!v&&r.nodeType===9&&!x(r))try{return B(r.querySelectorAll(m),q)}catch(u){}return g(m,r,q,v)};for(var k in g)p[k]=g[k];h=null}}();
(function(){var g=s.createElement("div");g.innerHTML="<div class='test e'></div><div class='test'></div>";if(!(!g.getElementsByClassName||g.getElementsByClassName("e").length===0)){g.lastChild.className="e";if(g.getElementsByClassName("e").length!==1){n.order.splice(1,0,"CLASS");n.find.CLASS=function(h,k,m){if(typeof k.getElementsByClassName!=="undefined"&&!m)return k.getElementsByClassName(h[1])};g=null}}})();var F=s.compareDocumentPosition?function(g,h){return g.compareDocumentPosition(h)&16}:function(g,
h){return g!==h&&(g.contains?g.contains(h):true)},x=function(g){return(g=(g?g.ownerDocument||g:0).documentElement)?g.nodeName!=="HTML":false},ia=function(g,h){var k=[],m="",r;for(h=h.nodeType?[h]:h;r=n.match.PSEUDO.exec(g);){m+=r[0];g=g.replace(n.match.PSEUDO,"")}g=n.relative[g]?g+"*":g;r=0;for(var q=h.length;r<q;r++)p(g,h[r],k);return p.filter(m,k)};c.find=p;c.expr=p.selectors;c.expr[":"]=c.expr.filters;c.unique=p.uniqueSort;c.getText=a;c.isXMLDoc=x;c.contains=F})();var ab=/Until$/,bb=/^(?:parents|prevUntil|prevAll)/,
cb=/,/;R=Array.prototype.slice;var Fa=function(a,b,d){if(c.isFunction(b))return c.grep(a,function(e,i){return!!b.call(e,i,e)===d});else if(b.nodeType)return c.grep(a,function(e){return e===b===d});else if(typeof b==="string"){var f=c.grep(a,function(e){return e.nodeType===1});if(Pa.test(b))return c.filter(b,f,!d);else b=c.filter(b,a)}return c.grep(a,function(e){return c.inArray(e,b)>=0===d})};c.fn.extend({find:function(a){for(var b=this.pushStack("","find",a),d=0,f=0,e=this.length;f<e;f++){d=b.length;
c.find(a,this[f],b);if(f>0)for(var i=d;i<b.length;i++)for(var j=0;j<d;j++)if(b[j]===b[i]){b.splice(i--,1);break}}return b},has:function(a){var b=c(a);return this.filter(function(){for(var d=0,f=b.length;d<f;d++)if(c.contains(this,b[d]))return true})},not:function(a){return this.pushStack(Fa(this,a,false),"not",a)},filter:function(a){return this.pushStack(Fa(this,a,true),"filter",a)},is:function(a){return!!a&&c.filter(a,this).length>0},closest:function(a,b){if(c.isArray(a)){var d=[],f=this[0],e,i=
{},j;if(f&&a.length){e=0;for(var o=a.length;e<o;e++){j=a[e];i[j]||(i[j]=c.expr.match.POS.test(j)?c(j,b||this.context):j)}for(;f&&f.ownerDocument&&f!==b;){for(j in i){e=i[j];if(e.jquery?e.index(f)>-1:c(f).is(e)){d.push({selector:j,elem:f});delete i[j]}}f=f.parentNode}}return d}var p=c.expr.match.POS.test(a)?c(a,b||this.context):null;return this.map(function(n,t){for(;t&&t.ownerDocument&&t!==b;){if(p?p.index(t)>-1:c(t).is(a))return t;t=t.parentNode}return null})},index:function(a){if(!a||typeof a===
"string")return c.inArray(this[0],a?c(a):this.parent().children());return c.inArray(a.jquery?a[0]:a,this)},add:function(a,b){a=typeof a==="string"?c(a,b||this.context):c.makeArray(a);b=c.merge(this.get(),a);return this.pushStack(sa(a[0])||sa(b[0])?b:c.unique(b))},andSelf:function(){return this.add(this.prevObject)}});c.each({parent:function(a){return(a=a.parentNode)&&a.nodeType!==11?a:null},parents:function(a){return c.dir(a,"parentNode")},parentsUntil:function(a,b,d){return c.dir(a,"parentNode",
d)},next:function(a){return c.nth(a,2,"nextSibling")},prev:function(a){return c.nth(a,2,"previousSibling")},nextAll:function(a){return c.dir(a,"nextSibling")},prevAll:function(a){return c.dir(a,"previousSibling")},nextUntil:function(a,b,d){return c.dir(a,"nextSibling",d)},prevUntil:function(a,b,d){return c.dir(a,"previousSibling",d)},siblings:function(a){return c.sibling(a.parentNode.firstChild,a)},children:function(a){return c.sibling(a.firstChild)},contents:function(a){return c.nodeName(a,"iframe")?
a.contentDocument||a.contentWindow.document:c.makeArray(a.childNodes)}},function(a,b){c.fn[a]=function(d,f){var e=c.map(this,b,d);ab.test(a)||(f=d);if(f&&typeof f==="string")e=c.filter(f,e);e=this.length>1?c.unique(e):e;if((this.length>1||cb.test(f))&&bb.test(a))e=e.reverse();return this.pushStack(e,a,R.call(arguments).join(","))}});c.extend({filter:function(a,b,d){if(d)a=":not("+a+")";return c.find.matches(a,b)},dir:function(a,b,d){var f=[];for(a=a[b];a&&a.nodeType!==9&&(d===w||!c(a).is(d));){a.nodeType===
1&&f.push(a);a=a[b]}return f},nth:function(a,b,d){b=b||1;for(var f=0;a;a=a[d])if(a.nodeType===1&&++f===b)break;return a},sibling:function(a,b){for(var d=[];a;a=a.nextSibling)a.nodeType===1&&a!==b&&d.push(a);return d}});var Ga=/ jQuery\d+="(?:\d+|null)"/g,Y=/^\s+/,db=/(<([\w:]+)[^>]*?)\/>/g,eb=/^(?:area|br|col|embed|hr|img|input|link|meta|param)$/i,Ha=/<([\w:]+)/,fb=/<tbody/i,gb=/<|&\w+;/,hb=function(a,b,d){return eb.test(d)?a:b+"></"+d+">"},G={option:[1,"<select multiple='multiple'>","</select>"],
legend:[1,"<fieldset>","</fieldset>"],thead:[1,"<table>","</table>"],tr:[2,"<table><tbody>","</tbody></table>"],td:[3,"<table><tbody><tr>","</tr></tbody></table>"],col:[2,"<table><tbody></tbody><colgroup>","</colgroup></table>"],area:[1,"<map>","</map>"],_default:[0,"",""]};G.optgroup=G.option;G.tbody=G.tfoot=G.colgroup=G.caption=G.thead;G.th=G.td;if(!c.support.htmlSerialize)G._default=[1,"div<div>","</div>"];c.fn.extend({text:function(a){if(c.isFunction(a))return this.each(function(b){var d=c(this);
return d.text(a.call(this,b,d.text()))});if(typeof a!=="object"&&a!==w)return this.empty().append((this[0]&&this[0].ownerDocument||s).createTextNode(a));return c.getText(this)},wrapAll:function(a){if(c.isFunction(a))return this.each(function(d){c(this).wrapAll(a.call(this,d))});if(this[0]){var b=c(a,this[0].ownerDocument).eq(0).clone(true);this[0].parentNode&&b.insertBefore(this[0]);b.map(function(){for(var d=this;d.firstChild&&d.firstChild.nodeType===1;)d=d.firstChild;return d}).append(this)}return this},
wrapInner:function(a){return this.each(function(){var b=c(this),d=b.contents();d.length?d.wrapAll(a):b.append(a)})},wrap:function(a){return this.each(function(){c(this).wrapAll(a)})},unwrap:function(){return this.parent().each(function(){c.nodeName(this,"body")||c(this).replaceWith(this.childNodes)}).end()},append:function(){return this.domManip(arguments,true,function(a){this.nodeType===1&&this.appendChild(a)})},prepend:function(){return this.domManip(arguments,true,function(a){this.nodeType===1&&
this.insertBefore(a,this.firstChild)})},before:function(){if(this[0]&&this[0].parentNode)return this.domManip(arguments,false,function(b){this.parentNode.insertBefore(b,this)});else if(arguments.length){var a=c(arguments[0]);a.push.apply(a,this.toArray());return this.pushStack(a,"before",arguments)}},after:function(){if(this[0]&&this[0].parentNode)return this.domManip(arguments,false,function(b){this.parentNode.insertBefore(b,this.nextSibling)});else if(arguments.length){var a=this.pushStack(this,
"after",arguments);a.push.apply(a,c(arguments[0]).toArray());return a}},clone:function(a){var b=this.map(function(){if(!c.support.noCloneEvent&&!c.isXMLDoc(this)){var d=this.outerHTML,f=this.ownerDocument;if(!d){d=f.createElement("div");d.appendChild(this.cloneNode(true));d=d.innerHTML}return c.clean([d.replace(Ga,"").replace(Y,"")],f)[0]}else return this.cloneNode(true)});if(a===true){ta(this,b);ta(this.find("*"),b.find("*"))}return b},html:function(a){if(a===w)return this[0]&&this[0].nodeType===
1?this[0].innerHTML.replace(Ga,""):null;else if(typeof a==="string"&&!/<script/i.test(a)&&(c.support.leadingWhitespace||!Y.test(a))&&!G[(Ha.exec(a)||["",""])[1].toLowerCase()])try{for(var b=0,d=this.length;b<d;b++)if(this[b].nodeType===1){T(this[b].getElementsByTagName("*"));this[b].innerHTML=a}}catch(f){this.empty().append(a)}else c.isFunction(a)?this.each(function(e){var i=c(this),j=i.html();i.empty().append(function(){return a.call(this,e,j)})}):this.empty().append(a);return this},replaceWith:function(a){if(this[0]&&
this[0].parentNode){c.isFunction(a)||(a=c(a).detach());return this.each(function(){var b=this.nextSibling,d=this.parentNode;c(this).remove();b?c(b).before(a):c(d).append(a)})}else return this.pushStack(c(c.isFunction(a)?a():a),"replaceWith",a)},detach:function(a){return this.remove(a,true)},domManip:function(a,b,d){function f(t){return c.nodeName(t,"table")?t.getElementsByTagName("tbody")[0]||t.appendChild(t.ownerDocument.createElement("tbody")):t}var e,i,j=a[0],o=[];if(c.isFunction(j))return this.each(function(t){var z=
c(this);a[0]=j.call(this,t,b?z.html():w);return z.domManip(a,b,d)});if(this[0]){e=a[0]&&a[0].parentNode&&a[0].parentNode.nodeType===11?{fragment:a[0].parentNode}:ua(a,this,o);if(i=e.fragment.firstChild){b=b&&c.nodeName(i,"tr");for(var p=0,n=this.length;p<n;p++)d.call(b?f(this[p],i):this[p],e.cacheable||this.length>1||p>0?e.fragment.cloneNode(true):e.fragment)}o&&c.each(o,La)}return this}});c.fragments={};c.each({appendTo:"append",prependTo:"prepend",insertBefore:"before",insertAfter:"after",replaceAll:"replaceWith"},
function(a,b){c.fn[a]=function(d){var f=[];d=c(d);for(var e=0,i=d.length;e<i;e++){var j=(e>0?this.clone(true):this).get();c.fn[b].apply(c(d[e]),j);f=f.concat(j)}return this.pushStack(f,a,d.selector)}});c.each({remove:function(a,b){if(!a||c.filter(a,[this]).length){if(!b&&this.nodeType===1){T(this.getElementsByTagName("*"));T([this])}this.parentNode&&this.parentNode.removeChild(this)}},empty:function(){for(this.nodeType===1&&T(this.getElementsByTagName("*"));this.firstChild;)this.removeChild(this.firstChild)}},
function(a,b){c.fn[a]=function(){return this.each(b,arguments)}});c.extend({clean:function(a,b,d,f){b=b||s;if(typeof b.createElement==="undefined")b=b.ownerDocument||b[0]&&b[0].ownerDocument||s;var e=[];c.each(a,function(i,j){if(typeof j==="number")j+="";if(j){if(typeof j==="string"&&!gb.test(j))j=b.createTextNode(j);else if(typeof j==="string"){j=j.replace(db,hb);var o=(Ha.exec(j)||["",""])[1].toLowerCase(),p=G[o]||G._default,n=p[0];i=b.createElement("div");for(i.innerHTML=p[1]+j+p[2];n--;)i=i.lastChild;
if(!c.support.tbody){n=fb.test(j);o=o==="table"&&!n?i.firstChild&&i.firstChild.childNodes:p[1]==="<table>"&&!n?i.childNodes:[];for(p=o.length-1;p>=0;--p)c.nodeName(o[p],"tbody")&&!o[p].childNodes.length&&o[p].parentNode.removeChild(o[p])}!c.support.leadingWhitespace&&Y.test(j)&&i.insertBefore(b.createTextNode(Y.exec(j)[0]),i.firstChild);j=c.makeArray(i.childNodes)}if(j.nodeType)e.push(j);else e=c.merge(e,j)}});if(d)for(a=0;e[a];a++)if(f&&c.nodeName(e[a],"script")&&(!e[a].type||e[a].type.toLowerCase()===
"text/javascript"))f.push(e[a].parentNode?e[a].parentNode.removeChild(e[a]):e[a]);else{e[a].nodeType===1&&e.splice.apply(e,[a+1,0].concat(c.makeArray(e[a].getElementsByTagName("script"))));d.appendChild(e[a])}return e}});var ib=/z-?index|font-?weight|opacity|zoom|line-?height/i,Ia=/alpha\([^)]*\)/,Ja=/opacity=([^)]*)/,ja=/float/i,ka=/-([a-z])/ig,jb=/([A-Z])/g,kb=/^-?\d+(?:px)?$/i,lb=/^-?\d/,mb={position:"absolute",visibility:"hidden",display:"block"},nb=["Left","Right"],ob=["Top","Bottom"],pb=s.defaultView&&
s.defaultView.getComputedStyle,Ka=c.support.cssFloat?"cssFloat":"styleFloat",la=function(a,b){return b.toUpperCase()};c.fn.css=function(a,b){return $(this,a,b,true,function(d,f,e){if(e===w)return c.curCSS(d,f);if(typeof e==="number"&&!ib.test(f))e+="px";c.style(d,f,e)})};c.extend({style:function(a,b,d){if(!a||a.nodeType===3||a.nodeType===8)return w;if((b==="width"||b==="height")&&parseFloat(d)<0)d=w;var f=a.style||a,e=d!==w;if(!c.support.opacity&&b==="opacity"){if(e){f.zoom=1;b=parseInt(d,10)+""===
"NaN"?"":"alpha(opacity="+d*100+")";a=f.filter||c.curCSS(a,"filter")||"";f.filter=Ia.test(a)?a.replace(Ia,b):b}return f.filter&&f.filter.indexOf("opacity=")>=0?parseFloat(Ja.exec(f.filter)[1])/100+"":""}if(ja.test(b))b=Ka;b=b.replace(ka,la);if(e)f[b]=d;return f[b]},css:function(a,b,d,f){if(b==="width"||b==="height"){var e,i=b==="width"?nb:ob;function j(){e=b==="width"?a.offsetWidth:a.offsetHeight;f!=="border"&&c.each(i,function(){f||(e-=parseFloat(c.curCSS(a,"padding"+this,true))||0);if(f==="margin")e+=
parseFloat(c.curCSS(a,"margin"+this,true))||0;else e-=parseFloat(c.curCSS(a,"border"+this+"Width",true))||0})}a.offsetWidth!==0?j():c.swap(a,mb,j);return Math.max(0,Math.round(e))}return c.curCSS(a,b,d)},curCSS:function(a,b,d){var f,e=a.style;if(!c.support.opacity&&b==="opacity"&&a.currentStyle){f=Ja.test(a.currentStyle.filter||"")?parseFloat(RegExp.$1)/100+"":"";return f===""?"1":f}if(ja.test(b))b=Ka;if(!d&&e&&e[b])f=e[b];else if(pb){if(ja.test(b))b="float";b=b.replace(jb,"-$1").toLowerCase();e=
a.ownerDocument.defaultView;if(!e)return null;if(a=e.getComputedStyle(a,null))f=a.getPropertyValue(b);if(b==="opacity"&&f==="")f="1"}else if(a.currentStyle){d=b.replace(ka,la);f=a.currentStyle[b]||a.currentStyle[d];if(!kb.test(f)&&lb.test(f)){b=e.left;var i=a.runtimeStyle.left;a.runtimeStyle.left=a.currentStyle.left;e.left=d==="fontSize"?"1em":f||0;f=e.pixelLeft+"px";e.left=b;a.runtimeStyle.left=i}}return f},swap:function(a,b,d){var f={};for(var e in b){f[e]=a.style[e];a.style[e]=b[e]}d.call(a);for(e in b)a.style[e]=
f[e]}});if(c.expr&&c.expr.filters){c.expr.filters.hidden=function(a){var b=a.offsetWidth,d=a.offsetHeight,f=a.nodeName.toLowerCase()==="tr";return b===0&&d===0&&!f?true:b>0&&d>0&&!f?false:c.curCSS(a,"display")==="none"};c.expr.filters.visible=function(a){return!c.expr.filters.hidden(a)}}var qb=K(),rb=/<script(.|\s)*?\/script>/gi,sb=/select|textarea/i,tb=/color|date|datetime|email|hidden|month|number|password|range|search|tel|text|time|url|week/i,O=/=\?(&|$)/,ma=/\?/,ub=/(\?|&)_=.*?(&|$)/,vb=/^(\w+:)?\/\/([^\/?#]+)/,
wb=/%20/g;c.fn.extend({_load:c.fn.load,load:function(a,b,d){if(typeof a!=="string")return this._load(a);else if(!this.length)return this;var f=a.indexOf(" ");if(f>=0){var e=a.slice(f,a.length);a=a.slice(0,f)}f="GET";if(b)if(c.isFunction(b)){d=b;b=null}else if(typeof b==="object"){b=c.param(b,c.ajaxSettings.traditional);f="POST"}c.ajax({url:a,type:f,dataType:"html",data:b,context:this,complete:function(i,j){if(j==="success"||j==="notmodified")this.html(e?c("<div />").append(i.responseText.replace(rb,
"")).find(e):i.responseText);d&&this.each(d,[i.responseText,j,i])}});return this},serialize:function(){return c.param(this.serializeArray())},serializeArray:function(){return this.map(function(){return this.elements?c.makeArray(this.elements):this}).filter(function(){return this.name&&!this.disabled&&(this.checked||sb.test(this.nodeName)||tb.test(this.type))}).map(function(a,b){a=c(this).val();return a==null?null:c.isArray(a)?c.map(a,function(d){return{name:b.name,value:d}}):{name:b.name,value:a}}).get()}});
c.each("ajaxStart ajaxStop ajaxComplete ajaxError ajaxSuccess ajaxSend".split(" "),function(a,b){c.fn[b]=function(d){return this.bind(b,d)}});c.extend({get:function(a,b,d,f){if(c.isFunction(b)){f=f||d;d=b;b=null}return c.ajax({type:"GET",url:a,data:b,success:d,dataType:f})},getScript:function(a,b){return c.get(a,null,b,"script")},getJSON:function(a,b,d){return c.get(a,b,d,"json")},post:function(a,b,d,f){if(c.isFunction(b)){f=f||d;d=b;b={}}return c.ajax({type:"POST",url:a,data:b,success:d,dataType:f})},
ajaxSetup:function(a){c.extend(c.ajaxSettings,a)},ajaxSettings:{url:location.href,global:true,type:"GET",contentType:"application/x-www-form-urlencoded",processData:true,async:true,xhr:A.XMLHttpRequest&&(A.location.protocol!=="file:"||!A.ActiveXObject)?function(){return new A.XMLHttpRequest}:function(){try{return new A.ActiveXObject("Microsoft.XMLHTTP")}catch(a){}},accepts:{xml:"application/xml, text/xml",html:"text/html",script:"text/javascript, application/javascript",json:"application/json, text/javascript",
text:"text/plain",_default:"*/*"}},lastModified:{},etag:{},ajax:function(a){function b(){e.success&&e.success.call(p,o,j,x);e.global&&f("ajaxSuccess",[x,e])}function d(){e.complete&&e.complete.call(p,x,j);e.global&&f("ajaxComplete",[x,e]);e.global&&!--c.active&&c.event.trigger("ajaxStop")}function f(r,q){(e.context?c(e.context):c.event).trigger(r,q)}var e=c.extend(true,{},c.ajaxSettings,a),i,j,o,p=e.context||e,n=e.type.toUpperCase();if(e.data&&e.processData&&typeof e.data!=="string")e.data=c.param(e.data,
e.traditional);if(e.dataType==="jsonp"){if(n==="GET")O.test(e.url)||(e.url+=(ma.test(e.url)?"&":"?")+(e.jsonp||"callback")+"=?");else if(!e.data||!O.test(e.data))e.data=(e.data?e.data+"&":"")+(e.jsonp||"callback")+"=?";e.dataType="json"}if(e.dataType==="json"&&(e.data&&O.test(e.data)||O.test(e.url))){i=e.jsonpCallback||"jsonp"+qb++;if(e.data)e.data=(e.data+"").replace(O,"="+i+"$1");e.url=e.url.replace(O,"="+i+"$1");e.dataType="script";A[i]=A[i]||function(r){o=r;b();d();A[i]=w;try{delete A[i]}catch(q){}B&&
B.removeChild(C)}}if(e.dataType==="script"&&e.cache===null)e.cache=false;if(e.cache===false&&n==="GET"){var t=K(),z=e.url.replace(ub,"$1_="+t+"$2");e.url=z+(z===e.url?(ma.test(e.url)?"&":"?")+"_="+t:"")}if(e.data&&n==="GET")e.url+=(ma.test(e.url)?"&":"?")+e.data;e.global&&!c.active++&&c.event.trigger("ajaxStart");t=(t=vb.exec(e.url))&&(t[1]&&t[1]!==location.protocol||t[2]!==location.host);if(e.dataType==="script"&&n==="GET"&&t){var B=s.getElementsByTagName("head")[0]||s.documentElement,C=s.createElement("script");
C.src=e.url;if(e.scriptCharset)C.charset=e.scriptCharset;if(!i){var D=false;C.onload=C.onreadystatechange=function(){if(!D&&(!this.readyState||this.readyState==="loaded"||this.readyState==="complete")){D=true;b();d();C.onload=C.onreadystatechange=null;B&&C.parentNode&&B.removeChild(C)}}}B.insertBefore(C,B.firstChild);return w}var F=false,x=e.xhr();if(x){e.username?x.open(n,e.url,e.async,e.username,e.password):x.open(n,e.url,e.async);try{if(e.data||a&&a.contentType)x.setRequestHeader("Content-Type",
e.contentType);if(e.ifModified){c.lastModified[e.url]&&x.setRequestHeader("If-Modified-Since",c.lastModified[e.url]);c.etag[e.url]&&x.setRequestHeader("If-None-Match",c.etag[e.url])}t||x.setRequestHeader("X-Requested-With","XMLHttpRequest");x.setRequestHeader("Accept",e.dataType&&e.accepts[e.dataType]?e.accepts[e.dataType]+", */*":e.accepts._default)}catch(ia){}if(e.beforeSend&&e.beforeSend.call(p,x,e)===false){e.global&&!--c.active&&c.event.trigger("ajaxStop");x.abort();return false}e.global&&f("ajaxSend",
[x,e]);var g=x.onreadystatechange=function(r){if(!x||x.readyState===0){F||d();F=true;if(x)x.onreadystatechange=c.noop}else if(!F&&x&&(x.readyState===4||r==="timeout")){F=true;x.onreadystatechange=c.noop;j=r==="timeout"?"timeout":!c.httpSuccess(x)?"error":e.ifModified&&c.httpNotModified(x,e.url)?"notmodified":"success";if(j==="success")try{o=c.httpData(x,e.dataType,e)}catch(q){j="parsererror"}if(j==="success"||j==="notmodified")i||b();else c.handleError(e,x,j);d();r==="timeout"&&x.abort();if(e.async)x=
null}};try{var h=x.abort;x.abort=function(){if(x){h.call(x);if(x)x.readyState=0}g()}}catch(k){}e.async&&e.timeout>0&&setTimeout(function(){x&&!F&&g("timeout")},e.timeout);try{x.send(n==="POST"||n==="PUT"||n==="DELETE"?e.data:null)}catch(m){c.handleError(e,x,null,m);d()}e.async||g();return x}},handleError:function(a,b,d,f){if(a.error)a.error.call(a.context||A,b,d,f);if(a.global)(a.context?c(a.context):c.event).trigger("ajaxError",[b,a,f])},active:0,httpSuccess:function(a){try{return!a.status&&location.protocol===
"file:"||a.status>=200&&a.status<300||a.status===304||a.status===1223||a.status===0}catch(b){}return false},httpNotModified:function(a,b){var d=a.getResponseHeader("Last-Modified"),f=a.getResponseHeader("Etag");if(d)c.lastModified[b]=d;if(f)c.etag[b]=f;return a.status===304||a.status===0},httpData:function(a,b,d){var f=a.getResponseHeader("content-type")||"",e=b==="xml"||!b&&f.indexOf("xml")>=0;a=e?a.responseXML:a.responseText;if(e&&a.documentElement.nodeName==="parsererror")throw"parsererror";if(d&&
d.dataFilter)a=d.dataFilter(a,b);if(typeof a==="string")if(b==="json"||!b&&f.indexOf("json")>=0)if(/^[\],:{}\s]*$/.test(a.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g,"@").replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g,"]").replace(/(?:^|:|,)(?:\s*\[)+/g,"")))a=A.JSON&&A.JSON.parse?A.JSON.parse(a):(new Function("return "+a))();else throw"Invalid JSON: "+a;else if(b==="script"||!b&&f.indexOf("javascript")>=0)c.globalEval(a);return a},param:function(a,b){function d(e,i){i=
c.isFunction(i)?i():i;f[f.length]=encodeURIComponent(e)+"="+encodeURIComponent(i)}var f=[];if(b===w)b=c.ajaxSettings.traditional;c.isArray(a)||a.jquery?c.each(a,function(){d(this.name,this.value)}):c.each(a,function e(i,j){if(c.isArray(j))c.each(j,function(o,p){b?d(i,p):e(i+"["+(typeof p==="object"||c.isArray(p)?o:"")+"]",p)});else!b&&j!=null&&typeof j==="object"?c.each(j,function(o,p){e(i+"["+o+"]",p)}):d(i,j)});return f.join("&").replace(wb,"+")}});var na={},xb=/toggle|show|hide/,yb=/^([+-]=)?([\d+-.]+)(.*)$/,
Z,va=[["height","marginTop","marginBottom","paddingTop","paddingBottom"],["width","marginLeft","marginRight","paddingLeft","paddingRight"],["opacity"]];c.fn.extend({show:function(a,b){if(a!=null)return this.animate(L("show",3),a,b);else{a=0;for(b=this.length;a<b;a++){var d=c.data(this[a],"olddisplay");this[a].style.display=d||"";if(c.css(this[a],"display")==="none"){d=this[a].nodeName;var f;if(na[d])f=na[d];else{var e=c("<"+d+" />").appendTo("body");f=e.css("display");if(f==="none")f="block";e.remove();
na[d]=f}c.data(this[a],"olddisplay",f)}}a=0;for(b=this.length;a<b;a++)this[a].style.display=c.data(this[a],"olddisplay")||"";return this}},hide:function(a,b){if(a!=null)return this.animate(L("hide",3),a,b);else{a=0;for(b=this.length;a<b;a++){var d=c.data(this[a],"olddisplay");!d&&d!=="none"&&c.data(this[a],"olddisplay",c.css(this[a],"display"))}a=0;for(b=this.length;a<b;a++)this[a].style.display="none";return this}},_toggle:c.fn.toggle,toggle:function(a,b){var d=typeof a==="boolean";if(c.isFunction(a)&&
c.isFunction(b))this._toggle.apply(this,arguments);else a==null||d?this.each(function(){var f=d?a:c(this).is(":hidden");c(this)[f?"show":"hide"]()}):this.animate(L("toggle",3),a,b);return this},fadeTo:function(a,b,d){return this.filter(":hidden").css("opacity",0).show().end().animate({opacity:b},a,d)},animate:function(a,b,d,f){var e=c.speed(b,d,f);if(c.isEmptyObject(a))return this.each(e.complete);return this[e.queue===false?"each":"queue"](function(){var i=c.extend({},e),j,o=this.nodeType===1&&c(this).is(":hidden"),
p=this;for(j in a){var n=j.replace(ka,la);if(j!==n){a[n]=a[j];delete a[j];j=n}if(a[j]==="hide"&&o||a[j]==="show"&&!o)return i.complete.call(this);if((j==="height"||j==="width")&&this.style){i.display=c.css(this,"display");i.overflow=this.style.overflow}if(c.isArray(a[j])){(i.specialEasing=i.specialEasing||{})[j]=a[j][1];a[j]=a[j][0]}}if(i.overflow!=null)this.style.overflow="hidden";i.curAnim=c.extend({},a);c.each(a,function(t,z){var B=new c.fx(p,i,t);if(xb.test(z))B[z==="toggle"?o?"show":"hide":z](a);
else{var C=yb.exec(z),D=B.cur(true)||0;if(C){z=parseFloat(C[2]);var F=C[3]||"px";if(F!=="px"){p.style[t]=(z||1)+F;D=(z||1)/B.cur(true)*D;p.style[t]=D+F}if(C[1])z=(C[1]==="-="?-1:1)*z+D;B.custom(D,z,F)}else B.custom(D,z,"")}});return true})},stop:function(a,b){var d=c.timers;a&&this.queue([]);this.each(function(){for(var f=d.length-1;f>=0;f--)if(d[f].elem===this){b&&d[f](true);d.splice(f,1)}});b||this.dequeue();return this}});c.each({slideDown:L("show",1),slideUp:L("hide",1),slideToggle:L("toggle",
1),fadeIn:{opacity:"show"},fadeOut:{opacity:"hide"}},function(a,b){c.fn[a]=function(d,f){return this.animate(b,d,f)}});c.extend({speed:function(a,b,d){var f=a&&typeof a==="object"?a:{complete:d||!d&&b||c.isFunction(a)&&a,duration:a,easing:d&&b||b&&!c.isFunction(b)&&b};f.duration=c.fx.off?0:typeof f.duration==="number"?f.duration:c.fx.speeds[f.duration]||c.fx.speeds._default;f.old=f.complete;f.complete=function(){f.queue!==false&&c(this).dequeue();c.isFunction(f.old)&&f.old.call(this)};return f},easing:{linear:function(a,
b,d,f){return d+f*a},swing:function(a,b,d,f){return(-Math.cos(a*Math.PI)/2+0.5)*f+d}},timers:[],fx:function(a,b,d){this.options=b;this.elem=a;this.prop=d;if(!b.orig)b.orig={}}});c.fx.prototype={update:function(){this.options.step&&this.options.step.call(this.elem,this.now,this);(c.fx.step[this.prop]||c.fx.step._default)(this);if((this.prop==="height"||this.prop==="width")&&this.elem.style)this.elem.style.display="block"},cur:function(a){if(this.elem[this.prop]!=null&&(!this.elem.style||this.elem.style[this.prop]==
null))return this.elem[this.prop];return(a=parseFloat(c.css(this.elem,this.prop,a)))&&a>-10000?a:parseFloat(c.curCSS(this.elem,this.prop))||0},custom:function(a,b,d){function f(i){return e.step(i)}this.startTime=K();this.start=a;this.end=b;this.unit=d||this.unit||"px";this.now=this.start;this.pos=this.state=0;var e=this;f.elem=this.elem;if(f()&&c.timers.push(f)&&!Z)Z=setInterval(c.fx.tick,13)},show:function(){this.options.orig[this.prop]=c.style(this.elem,this.prop);this.options.show=true;this.custom(this.prop===
"width"||this.prop==="height"?1:0,this.cur());c(this.elem).show()},hide:function(){this.options.orig[this.prop]=c.style(this.elem,this.prop);this.options.hide=true;this.custom(this.cur(),0)},step:function(a){var b=K(),d=true;if(a||b>=this.options.duration+this.startTime){this.now=this.end;this.pos=this.state=1;this.update();this.options.curAnim[this.prop]=true;for(var f in this.options.curAnim)if(this.options.curAnim[f]!==true)d=false;if(d){if(this.options.display!=null){this.elem.style.overflow=
this.options.overflow;a=c.data(this.elem,"olddisplay");this.elem.style.display=a?a:this.options.display;if(c.css(this.elem,"display")==="none")this.elem.style.display="block"}this.options.hide&&c(this.elem).hide();if(this.options.hide||this.options.show)for(var e in this.options.curAnim)c.style(this.elem,e,this.options.orig[e]);this.options.complete.call(this.elem)}return false}else{e=b-this.startTime;this.state=e/this.options.duration;a=this.options.easing||(c.easing.swing?"swing":"linear");this.pos=
c.easing[this.options.specialEasing&&this.options.specialEasing[this.prop]||a](this.state,e,0,1,this.options.duration);this.now=this.start+(this.end-this.start)*this.pos;this.update()}return true}};c.extend(c.fx,{tick:function(){for(var a=c.timers,b=0;b<a.length;b++)a[b]()||a.splice(b--,1);a.length||c.fx.stop()},stop:function(){clearInterval(Z);Z=null},speeds:{slow:600,fast:200,_default:400},step:{opacity:function(a){c.style(a.elem,"opacity",a.now)},_default:function(a){if(a.elem.style&&a.elem.style[a.prop]!=
null)a.elem.style[a.prop]=(a.prop==="width"||a.prop==="height"?Math.max(0,a.now):a.now)+a.unit;else a.elem[a.prop]=a.now}}});if(c.expr&&c.expr.filters)c.expr.filters.animated=function(a){return c.grep(c.timers,function(b){return a===b.elem}).length};c.fn.offset="getBoundingClientRect"in s.documentElement?function(a){var b=this[0];if(!b||!b.ownerDocument)return null;if(a)return this.each(function(e){c.offset.setOffset(this,a,e)});if(b===b.ownerDocument.body)return c.offset.bodyOffset(b);var d=b.getBoundingClientRect(),
f=b.ownerDocument;b=f.body;f=f.documentElement;return{top:d.top+(self.pageYOffset||c.support.boxModel&&f.scrollTop||b.scrollTop)-(f.clientTop||b.clientTop||0),left:d.left+(self.pageXOffset||c.support.boxModel&&f.scrollLeft||b.scrollLeft)-(f.clientLeft||b.clientLeft||0)}}:function(a){var b=this[0];if(!b||!b.ownerDocument)return null;if(a)return this.each(function(t){c.offset.setOffset(this,a,t)});if(b===b.ownerDocument.body)return c.offset.bodyOffset(b);c.offset.initialize();var d=b.offsetParent,f=
b,e=b.ownerDocument,i,j=e.documentElement,o=e.body;f=(e=e.defaultView)?e.getComputedStyle(b,null):b.currentStyle;for(var p=b.offsetTop,n=b.offsetLeft;(b=b.parentNode)&&b!==o&&b!==j;){if(c.offset.supportsFixedPosition&&f.position==="fixed")break;i=e?e.getComputedStyle(b,null):b.currentStyle;p-=b.scrollTop;n-=b.scrollLeft;if(b===d){p+=b.offsetTop;n+=b.offsetLeft;if(c.offset.doesNotAddBorder&&!(c.offset.doesAddBorderForTableAndCells&&/^t(able|d|h)$/i.test(b.nodeName))){p+=parseFloat(i.borderTopWidth)||
0;n+=parseFloat(i.borderLeftWidth)||0}f=d;d=b.offsetParent}if(c.offset.subtractsBorderForOverflowNotVisible&&i.overflow!=="visible"){p+=parseFloat(i.borderTopWidth)||0;n+=parseFloat(i.borderLeftWidth)||0}f=i}if(f.position==="relative"||f.position==="static"){p+=o.offsetTop;n+=o.offsetLeft}if(c.offset.supportsFixedPosition&&f.position==="fixed"){p+=Math.max(j.scrollTop,o.scrollTop);n+=Math.max(j.scrollLeft,o.scrollLeft)}return{top:p,left:n}};c.offset={initialize:function(){var a=s.body,b=s.createElement("div"),
d,f,e,i=parseFloat(c.curCSS(a,"marginTop",true))||0;c.extend(b.style,{position:"absolute",top:0,left:0,margin:0,border:0,width:"1px",height:"1px",visibility:"hidden"});b.innerHTML="<div style='position:absolute;top:0;left:0;margin:0;border:5px solid #000;padding:0;width:1px;height:1px;'><div></div></div><table style='position:absolute;top:0;left:0;margin:0;border:5px solid #000;padding:0;width:1px;height:1px;' cellpadding='0' cellspacing='0'><tr><td></td></tr></table>";a.insertBefore(b,a.firstChild);
d=b.firstChild;f=d.firstChild;e=d.nextSibling.firstChild.firstChild;this.doesNotAddBorder=f.offsetTop!==5;this.doesAddBorderForTableAndCells=e.offsetTop===5;f.style.position="fixed";f.style.top="20px";this.supportsFixedPosition=f.offsetTop===20||f.offsetTop===15;f.style.position=f.style.top="";d.style.overflow="hidden";d.style.position="relative";this.subtractsBorderForOverflowNotVisible=f.offsetTop===-5;this.doesNotIncludeMarginInBodyOffset=a.offsetTop!==i;a.removeChild(b);c.offset.initialize=c.noop},
bodyOffset:function(a){var b=a.offsetTop,d=a.offsetLeft;c.offset.initialize();if(c.offset.doesNotIncludeMarginInBodyOffset){b+=parseFloat(c.curCSS(a,"marginTop",true))||0;d+=parseFloat(c.curCSS(a,"marginLeft",true))||0}return{top:b,left:d}},setOffset:function(a,b,d){if(/static/.test(c.curCSS(a,"position")))a.style.position="relative";var f=c(a),e=f.offset(),i=parseInt(c.curCSS(a,"top",true),10)||0,j=parseInt(c.curCSS(a,"left",true),10)||0;if(c.isFunction(b))b=b.call(a,d,e);d={top:b.top-e.top+i,left:b.left-
e.left+j};"using"in b?b.using.call(a,d):f.css(d)}};c.fn.extend({position:function(){if(!this[0])return null;var a=this[0],b=this.offsetParent(),d=this.offset(),f=/^body|html$/i.test(b[0].nodeName)?{top:0,left:0}:b.offset();d.top-=parseFloat(c.curCSS(a,"marginTop",true))||0;d.left-=parseFloat(c.curCSS(a,"marginLeft",true))||0;f.top+=parseFloat(c.curCSS(b[0],"borderTopWidth",true))||0;f.left+=parseFloat(c.curCSS(b[0],"borderLeftWidth",true))||0;return{top:d.top-f.top,left:d.left-f.left}},offsetParent:function(){return this.map(function(){for(var a=
this.offsetParent||s.body;a&&!/^body|html$/i.test(a.nodeName)&&c.css(a,"position")==="static";)a=a.offsetParent;return a})}});c.each(["Left","Top"],function(a,b){var d="scroll"+b;c.fn[d]=function(f){var e=this[0],i;if(!e)return null;if(f!==w)return this.each(function(){if(i=wa(this))i.scrollTo(!a?f:c(i).scrollLeft(),a?f:c(i).scrollTop());else this[d]=f});else return(i=wa(e))?"pageXOffset"in i?i[a?"pageYOffset":"pageXOffset"]:c.support.boxModel&&i.document.documentElement[d]||i.document.body[d]:e[d]}});
c.each(["Height","Width"],function(a,b){var d=b.toLowerCase();c.fn["inner"+b]=function(){return this[0]?c.css(this[0],d,false,"padding"):null};c.fn["outer"+b]=function(f){return this[0]?c.css(this[0],d,false,f?"margin":"border"):null};c.fn[d]=function(f){var e=this[0];if(!e)return f==null?null:this;return"scrollTo"in e&&e.document?e.document.compatMode==="CSS1Compat"&&e.document.documentElement["client"+b]||e.document.body["client"+b]:e.nodeType===9?Math.max(e.documentElement["client"+b],e.body["scroll"+
b],e.documentElement["scroll"+b],e.body["offset"+b],e.documentElement["offset"+b]):f===w?c.css(e,d):this.css(d,typeof f==="string"?f:f+"px")}});A.jQuery=A.$=c})(window);


window.onerror=function(msg){
$("body").attr("JSError",msg);
}

/*
return element object by Id
@param string, object Id
@return element object
*/
function elId(id){return document.getElementById(id);}

/*
return element object by name
@param string, object name
@return element object
*/
function elName(name){return document.getElementsByName(name);}

/**
 * trim value
 * @param string strToTrim. value to be trim.
 * @return string
 */
function trim(strToTrim)
{
	return strToTrim.replace(/^\s+|\s+$/g,"");
}

function selectAll(obj, ctrl){
	for(i=0;i<ctrl.length;i++)
    {
		if (obj != ctrl[i]) {	//dont disable own control
			if (obj.checked) {
				ctrl[i].checked = true;
				ctrl[i].disabled = true;
			}
			else {
				ctrl[i].checked = false;
				ctrl[i].disabled = false;
			}
		}
    }
}

/**
 * set object visibility
 * @param string strObjName. object name.
 * @param boolean blnShow. true=visible | false=collapse
 */
function setObjVisibility(strObjName, blnShow)
{	
	var obj = elId(strObjName);
	if(obj == null) return;

	var strVisibleValue ;
	 
	if(blnShow == 'true')
	{
		obj.style.display = '';
		obj.style.visibility = 'visible';		
	}
	else
	{
		obj.style.display = 'none';
	}
}

function setDivClass(sObj, sCssClass)
{
	var obj = elId(sObj);
	if(obj == null) return;
	obj.className=sCssClass;
}

/**
 * set object Div msg
 * @param string strObjName. regex.
 * @param string strMsg. msg
 * @param string strClassName. css class name
 */
function setDivMsg(strObjName, strMsg, strClassName)
{
	var obj = elId(strObjName);
	if(obj == null) return;
	if(typeof(strClassName) != 'undefined' && strClassName.length > 0) 
	{
		strMsg = "<span class='" + strClassName +"'>" + strMsg + "</span>";
	}
	obj.innerHTML  = strMsg;
}

/*
* Do submit
*/
function doSubmit(objCtrl)
{
	objCtrl.form.submit();
}

/*
* Do Client site language translation
*/
function lang(strKey)
{
	var translation = eval(strKey);
	if(translation == '') return strKey;
	return translation;
}

function escapeHTML (str)
{
   var div = document.createElement('div');
   var text = document.createTextNode(str);
   div.appendChild(text);
   return div.innerHTML;
}

/*
* Include a js file in a js file. same as includeJs2 
*/
function includeJs(strUrl)
{
	var str = '<script type="text/javascript" src="' + strUrl + '"></script>';
	document.write(str); 
}

/*
* Include a js file in a js file. same as includeJs 
*/
function includeJs2(strUrl)
{
	var body = document.getElementsByTagName('body').item(0);
	script = document.createElement('script');
	script.src = strUrl;
	script.type = 'text/javascript';
	body.appendChild(script);
}

function popWin(url, height, width, winId)
{
        sWidth = screen.width || 1024;
        sHeight = screen.height || 600;

        if(typeof(height) == 'undefined') height = sHeight - sHeight * 0.15;
        if(typeof(width) == 'undefined') width = 767;
        if(typeof(winId) == 'undefined') winId = "W958b6e9ea6bed1f9c5288b15959dad77";

        //Detecting user resolution, if above use this.
        if ( sWidth > 1024 )
        {
                width = 967;
        }

        //Center the display
        displayRight = sWidth/2 - width/2;
        displayTop = 30;

        w=window.open(url, winId, "left="+displayRight+",top="+displayTop+",menubar=no,height="+height+",width="+width+",scrollbars=yes,resizable=yes");
        w.focus();
}

function companyPopWin(url, h, w) 
{
	var is_chrome = navigator.userAgent.toLowerCase().indexOf('chrome') > -1;
	
	if(typeof(h) == 'undefined') h = 500;
	if(typeof(w) == 'undefined') w = 700;
	
	if (is_chrome)
	{
		w=window.open('about:blank', "", "left=150,top=120,menubar=no,height="+h+",width="+w+",scrollbars=yes,resizable=yes");
		w.opener = null;
		w.document.location = url;
	}
	else
	{
		w=window.open(url, "", "left=150,top=120,menubar=no,height="+h+",width="+w+",scrollbars=yes,resizable=yes");
	}
	w.focus();
}

function setFixedPosition(id,x,y){
    var sty=elId(id).style;
    sty.left=x + 'px';
    sty.top=y + 'px';
} 

function centerDiv(E){
  var A = document.getElementById(E);
  if (IE) {
    C = document.body.clientWidth;
    D = document.body.clientHeight;
  } else {
    C = window.innerWidth;
    D = window.innerHeight;
  }
  //must display block first to have clientWidth and clientHeight
  A.style.display = "block";
  var elementWidth = A.clientWidth;
  var elementHeight = A.clientHeight;
  
  if(D - elementHeight < 0)
	A.style.top = "0px";
  else
	A.style.top = String(Math.round((D-elementHeight)/2))+"px";
  
  if(C - elementWidth < 0)
	A.style.left = "0px";
  else
	A.style.left = String(Math.round((C-elementWidth)/2))+"px";
}

function centerDivQuickSignUp(E){
  var A = document.getElementById(E);
  if (IE) {
    C = document.documentElement.clientWidth;
    D = document.documentElement.clientHeight;
  } else {
    C = window.innerWidth;
    D = window.innerHeight;
  }
  //must display block first to have clientWidth and clientHeight
  A.style.display = "block";
  var elementWidth = A.clientWidth;
  var elementHeight = A.clientHeight;
  A.style.top = String(Math.round(((D-elementHeight)/2)-65))+"px";  
  A.style.left = String(Math.round((C-elementWidth)/2))+"px";
}

//to display a popup that does not pop off the edge of the screen if the link is toward the edge, make sure cross-browser compatible
function setPosition(id,x,y){
    var sty=elId(id).style;
    
    //to get browser's page view screen size
    getScreenAvailHeight = screen.availHeight;
    getScreenAvailWidth = screen.availWidth;
   
    //to get Pop-up window size
    getPopupHeight = elId(id).offsetHeight;
    getPopupWidth = elId(id).offsetWidth;
	
	//Microsoft's DOM (IE, Opera and Konqeuror)
 	if (IE) {
        getScrollTop = document.documentElement.scrollTop;
 		if ((tempAvailY + y + getPopupHeight) > getScreenAvailHeight) {
            topY = tempY - getPopupHeight;
		  	if (topY < getScrollTop) { 
		  	   topY = topY - getScrollTop - 30;
            } 	
	  	} 	else {
	  		topY = tempY + y;
	  	}
        	  	
	} 
	//W3C DOM  (Mozilla, Netscape and Epiphany)
  	else {
        getScrollTop = window.pageYOffset;
  		if 	(tempAvailY + 110 + y + getPopupHeight > getScreenAvailHeight)	{
	  		topY = tempY - getPopupHeight;
	  		if (topY < getScrollTop) {	
	  			topY = topY - getScrollTop - 30; 
            }
	  	}   else {
	  		topY = tempY + y;
	  		
	  	}
	}
	//alert("tempAvailY (mouse) + y + getPopupHeight > getScreenAvailHeight"+"<br/>" + tempAvailY + "+" + y + "+" + getPopupHeight + ">" + getScreenAvailHeight);
  	
  	if (topY < 0) {
		topY = 0 + getScrollTop; 
  	}
  	
  	sty.top = topY + 'px';
  	sty.left = tempX + x + 'px';
}

function getMouseXY(e) 
{	
	if (window.event) 
	{		
		//mouse position within the web page you would simply add the scroll position of the page within the browser window
		if(navigator.platform == "iPad"){ //iPad's Safari compability
			tempX = window.event.clientX + document.documentElement.scrollLeft;
			tempY = window.event.clientY + document.documentElement.scrollTop;
		}
		else{
			tempX = window.event.clientX + document.documentElement.scrollLeft + document.body.scrollLeft;
			tempY = window.event.clientY + document.documentElement.scrollTop + document.body.scrollTop;
		}
		
		tempAvailX = window.event.screenX;
		tempAvailY = window.event.screenY;
		
    	getScrollTop = document.documentElement.scrollTop;
	} 
	else 
	{
		//event.pageX and event.pageY, using these fields you do not have to add the scroll position of the page
		tempX = e.pageX;
		tempY = e.pageY;
		
		tempAvailX = e.clientX;
		tempAvailY = e.clientY;
		
		getScrollTop = window.pageYOffset;		
	}
	
	if (tempX < 0) { tempX = 0;	}
	if (tempAvailX < 0) { tempAvailX = 0;	}
	if (tempY < 0) { tempY = 0;	}
	if (tempAvailY < 0) { tempAvailY = 0;	}
		
	return true;
}

function closeWin() {
	window.open('','_parent','');
	window.close();
}

function Trim(str) {
	var res = /^\s+/ig;
	var ree = /\s+$/ig;
	var out = str.replace(res,"").replace(ree,"");
    return out;
}

function isIE6OrAbove() 
{ 
	var bver = navigator.appVersion.indexOf("MSIE") 
	if(bver!=-1) { 
		bver=bver+5 
		var vernum = navigator.appVersion.substr(bver,3) 
		if(vernum>6) {
			return true;
		} else {
			return false;
		} 
	} else {
		return true;
	}
 } 

function isBrowser(b,v) {
  /*
  ** Check if the current browser is compatible
  **  b  browser name
  **  v  version number (if 0 don't check version)
  ** returns true if browser equals and version equals or greater
  */
  browserOk = false;
  versionOk = false;

  browserOk = (navigator.appName.indexOf(b) != -1);
  if (v == 0) versionOk = true;
  else  versionOk = (v <= parseInt(navigator.appVersion));
  return browserOk && versionOk;
  }


/**
*
*  UTF-8 data encode / decode
*  http://www.webtoolkit.info/
*
**/
var Url = {

    // public method for url encoding
    encode : function (string) {
		string = escape(this._utf8_encode(string));
		return string.replace(/\+/g, "%2B");        
    },

    // public method for url decoding
    decode : function (string) {
        return this._utf8_decode(unescape(string));
    },

    // private method for UTF-8 encoding
    _utf8_encode : function (string) {
        string = string.replace(/\r\n/g,"\n");
        var utftext = "";

        for (var n = 0; n < string.length; n++) {

            var c = string.charCodeAt(n);

            if (c < 128) {
                utftext += String.fromCharCode(c);
            }
            else if((c > 127) && (c < 2048)) {
                utftext += String.fromCharCode((c >> 6) | 192);
                utftext += String.fromCharCode((c & 63) | 128);
            }
            else {
                utftext += String.fromCharCode((c >> 12) | 224);
                utftext += String.fromCharCode(((c >> 6) & 63) | 128);
                utftext += String.fromCharCode((c & 63) | 128);
            }

        }

        return utftext;
    },

    // private method for UTF-8 decoding
    _utf8_decode : function (utftext) {
        var string = "";
        var i = 0;
        var c = c1 = c2 = 0;

        while ( i < utftext.length ) {

            c = utftext.charCodeAt(i);

            if (c < 128) {
                string += String.fromCharCode(c);
                i++;
            }
            else if((c > 191) && (c < 224)) {
                c2 = utftext.charCodeAt(i+1);
                string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
                i += 2;
            }
            else {
                c2 = utftext.charCodeAt(i+1);
                c3 = utftext.charCodeAt(i+2);
                string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
                i += 3;
            }

        }

        return string;
    }

}


/**************************************/
// Description: Expandable ad setup script 
// Version: 1.0
// Last update: Oct 10, 2008
// Sample usage:
//    <script type="text/javascript">
//          jobstreet_setup_expleaderboard("MyLeaderboard.swf", 728, 90, 728, 180);
//    </script>
/**************************************/

// The id/name for flash banner
leaderboard_id = "homepage_leaderboard";
// Setup expandable leaderboard
function jobstreet_setup_expleaderboard(file, width, height, expwidth, expheight) {
      if(!expwidth) {
            expwidth = width;
      }
      if(!expheight) {
            expheight = height;
      }
      jobstreet_writeFlash(leaderboard_id, file, expwidth, expheight, "transparent", "");
      jobstreet_shrink_leaderboard();
} 

// Call this from flash banner to expand your ad
function jobstreet_expand_leaderboard() {
      jobstreet_getFlash(leaderboard_id).height = 120;
}

// Call this from flash banner to shrink your ad
function jobstreet_shrink_leaderboard() {
      jobstreet_getFlash(leaderboard_id).height = 60;
}

// Function to get flash id/name
function jobstreet_getFlash(id) {
      if(navigator.appName.indexOf("Microsoft") != -1) {
            return window[id];
      }else {
            return document[id];
      }
}

// Function to write the flash
function jobstreet_writeFlash(id, file, width, height, wmode, params) {
      var flashTag = '';
      flashTag += '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" ';
      flashTag += 'id="' + id + '" ';
      flashTag += 'codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#" ';
      flashTag += 'width="' + width + '" ';
      flashTag += 'height="' + height + '">';
      flashTag += '<param name="movie" value="' + file + '"/>';
      flashTag += '<param name="wmode" value="' + wmode + '"/>';
      flashTag += '<param name="quality" value="high"/>';
      flashTag += '<param name="flashvars" value="' + params + '"/>';
      flashTag += '<param name="allowscriptaccess" value="always"/>';
      flashTag += '<embed src="' + file + '"';
      flashTag += ' width="' + width + '"';
      flashTag += ' height="' + height + '"';
      flashTag += ' type="application/x-shockwave-flash"';
      flashTag += ' name="' + id + '"';
      flashTag += ' allowscriptaccess="always"';
      flashTag += ' quality="high"';
      flashTag += ' wmode="' + wmode + '" ';
      flashTag += ' flashvars="' + params + '" ';
      flashTag += ' swliveconnect="true" ';
      flashTag += ' pluginspage="http://www.macromedia.com/go/getflashplayer">';
      flashTag += '</embed>';
      flashTag += '</object>';
      document.write(flashTag);
}

function focus_form_field(id)
{
	var obj;
	if (elId(id)) {obj =elId(id); } else { obj = elName(id);obj=obj[0];}	
	if(obj != null && obj.type != 'hidden' && obj.disabled == false) { obj.focus(); return true; }
	return false;
}


if (self.parent.frames.length != 0) {
	if(document.getElementById('eb') !== null && document.getElementById('eb').value != '1502')
		self.parent.location = window.document.URL;
}
var IE = document.all?true:false;
if (!IE) {
	if (window.event) document.captureEvents(Event.MOUSEMOVE);
}
//mouse cursor position relative to the top left corner of the web page
var tempX=0;
var tempY=0;
//mouse distance from the left and top of the browser window respectively
var tempAvailX=0;
var tempAvailY=0;

var getScrollTop=0;

<!--

// STATE AND LOCATION
function emptyLocationSelect(objOtherState, strCountry, objStateSelect, objCitySelect, objLocationSelect, sL)
{
    var sLC = "";
    if(sL==16){sLC = "Th";}
	else if(sL==135){sLC = "Vn";}
	else if(sL==7){sLC = "Id";}
    var NS4 = (document.layers) ? true : false;
    var temp = "";
	if(!NS4){ 	objStateSelect.style.display = 'none'; }
	if(strArrayList.indexOf("," + strCountry + ",") > -1) {
        while(objStateSelect.options.length > eval("ctry" + sLC + strCountry + ".length")){
		  objStateSelect.options[(objStateSelect.options.length-1)] = null;
        }
		objOtherState.disabled = true;
		objOtherState.value = '';
		for(i=0;i<eval("ctry" + sLC + strCountry + ".length");i++){
			temp = eval("ctry" + sLC + strCountry + "[i]");
			if(!NS4){
				objOtherState.size = 10
				objOtherState.style.display = 'none';
				objStateSelect.style.display = 'block';
			}
			else{
				objOtherState.disabled = true;
			}
			eval("objStateSelect.options[i] = new Option" + temp);
        }
    }else {
        while(objStateSelect.options.length > 1) {
		  objStateSelect.options[(objStateSelect.options.length-1)] = null;
        }
        if(!NS4){
			objStateSelect.options[0] = new Option("","00");
			objStateSelect.style.display = 'none';
			objOtherState.style.display = 'block';
			objOtherState.size = 20
			objOtherState.disabled = false;
        }else{
			objStateSelect.options[0] = new Option(Others,"00");
			objOtherState.disabled = false;
		}
	}
	objStateSelect.selectedIndex = 0;
	return true;
}

function enterCity(ld,  objCitySelect, objLocationSelect, cls){
	var id = ld.split(":") ;
	objLocationSelect.value = "";
	if(id[1] != null && id[1].length > 0){
		objLocationSelect.value = id[1];
			if(id[2] != null && id[2].length > 0 ){
				objCitySelect.value = "";
				objCitySelect.value = id[2];
		} else{
			if(cls == true) {
				objCitySelect.value = "";
			}
		}
	}else{
	   if(cls == true) {
		objCitySelect.value = "";
	   }
	}
}

function repopulateLocation(objMsiaState, data, startindex, endindex) {
	for(var i =0 ; i< objMsiaState.options.length; i++)
	{
		var tempVar =  data;
		if(objMsiaState.options[i].value == tempVar
		||  (objMsiaState.options[i].value.substring(startindex, endindex) == tempVar.substring(startindex, endindex)))
		{
			objMsiaState.selectedIndex = i;
			break;
		}
	}
   return i;
}

function populateDuplicateLocation(objMsiaState, data, strmsia, strloc, strcity){
	for(var i =0 ; i< objMsiaState.options.length; i++){
 		if(objMsiaState.options[i].value == data){
			objMsiaState.selectedIndex = i;
			break;
		}else{
			var tmpst =  strmsia;
			var tmplc =  strloc;
			var tmpct =  strcity;
				var d = objMsiaState.options[i].value.split(":");
			if(d[0] == tmpst && d[1] == tmplc){
				var c = d[2].toLowerCase();
				var tmpct = tmpct.toLowerCase();
				if ( c.indexOf(tmpct) >= 0 || tmpct.indexOf(c) >= 0 ){
					objMsiaState.selectedIndex = i;
						break;
				}
			}
		}
   }
   return i;
}

function populateOtherLocation(objMsiaState, objCity, objLocation, strmsia, strcity){
    for(var i =0 ; i< objMsiaState.options.length; i++){
	var tmpst = strmsia;
	var tmpct =  strcity;
				var d = objMsiaState.options[i].value.split(":");
			if(d[0] == tmpst){
			   if(d[2] != null && d[2].length > 0 ){
				var c = d[2].toLowerCase();
				var tmpct = tmpct.toLowerCase();
				if ( c.indexOf(tmpct) >= 0 || tmpct.indexOf(c) >= 0 ){
					objMsiaState.selectedIndex = i;
					break;
				}
				}
			}
		}
	if(i <  objMsiaState.options.length){
		enterCity(objMsiaState.options[i].value, objCity, objLocation, false)
   }
   return i;
}
	
// EDUCATION
function repopulateSelect(objEduSelect, strCountry, blnDiploma){
		strCountry = trim(strCountry);
		
		if(strCountry == '150' )  {	strCountry = 'myEdu'; } 
		else if (strCountry == '170')  {	strCountry = 'phEdu'; } 
        else if (strCountry == '100')  {	strCountry = 'inEdu'; } 
        else if (strCountry == '97') {	strCountry = 'idEdu'; } 
        else if (strCountry == '208')   { strCountry = 'thEdu'; }
        else if (strCountry == '190')   { strCountry = 'sgEdu'; }
        else if (strCountry == '231')   { strCountry = 'vnEdu'; }
        else{			strCountry = 'defaultEdu';		}		
        while(objEduSelect.options.length > 0){
			objEduSelect.options[(objEduSelect.options.length-1)] = null;
		}
        
		for(i=0;i<eval(strCountry + ".length");i++)	{
            temp = eval(strCountry + "[i]");  	
			
			var temp2 = temp;
			temp2 = temp2.substring(2,temp2.length-3);
			var aryRes = temp2.split('","');
			var result = aryRes[0];
			
			eval("objEduSelect.options[i] = new Option" + temp);
			objEduSelect.options[i].title = result;
			
			if(blnDiploma && i == 4){
				
				objEduSelect.options[objEduSelect.options.length] = new Option('I do not have any qualification','99');
				break;
			}
		}
}		

function defaultCGPABase(oGr, oFd, sSel, dfV, orV)	{
	var strSel = oGr.options[oGr.selectedIndex].value;
	if (strSel == sSel)	{
		if (orV == null || orV == 0) oFd.value = dfV;
		else oFd.value = orV;
	}
}

function repopulateFieldSelect(oFd, oQf, sC, myField, sL){

 	if(sC == "100" || sC == "150" || sC == "190")
 	{
    	populateFieldSelect(oFd, oQf, sC, myField);
  	}
  	else if(sC == "208" && sL == 16){
		for(var c=0;c < thfd.length;c++)	{
			
			var temp = thfd[c];
			temp = temp.substring(2,temp.length-3);
			var aryRes = temp.split("','");
			var result = aryRes[0];
			
			eval("oFd.options[c] = new Option" + thfd[c]);
			oFd.options[c].title = result;
		}
	}else if(sC == "231" && sL == 135){
		for(var c=0;c < vnfd.length;c++)	{
			
			var temp = vnfd[c];
			temp = temp.substring(2,temp.length-3);
			var aryRes = temp.split("','");
			var result = aryRes[0];
			
			eval("oFd.options[c] = new Option" + vnfd[c]);
			oFd.options[c].title = result;
		}
	}else if(sC == "97" && sL == 7){
		for(var c=0;c < idfd.length;c++)	{
			
			var temp = idfd[c];
			temp = temp.substring(2,temp.length-3);
			var aryRes = temp.split("','");
			var result = aryRes[0];
			
			eval("oFd.options[c] = new Option" + idfd[c]);
			oFd.options[c].title = result;
		}
	}else{
		for(var c=0;c < fd.length;c++)	{
		
			var temp = fd[c];
			temp = temp.substring(2,temp.length-3);
			var aryRes = temp.split("','");
			var result = aryRes[0];
			
			eval("oFd.options[c] = new Option" + fd[c]);
			oFd.options[c].title = result;
		}
	}
 }
 
function populateFieldSelect(oFd, oQf, sC, myField) {
	var len =  oFd.options.length;
	var strSel = oFd.options[oFd.selectedIndex].value;
	oFd.options.length = 0;
	if(sC == "100"){
		if(oQf == null || oQf.value == "1:0" || oQf.options.value == "1:0" || oQf.value == "0"){
			oFd.options[0] = new Option(myField[0],"0", "");
		}
		else
		{
			for(var j=0; j< oQf.options.length; j++) {
				var val = oQf.options[j].value;
				var sq = val.split(":")
				if(oQf.options[j].selected && sq.length > 0) {
					if(sq[0] == 2){
						oFd.options[0] = new Option(myField[1],"44");
					} else if(sq[0] == 3){
                        oFd.options[0] = new Option(myField[2],"0");
						oFd.options[1] = new Option(myField[3],"1");
						oFd.options[2] = new Option(myField[4],"54");
						oFd.options[3] = new Option(myField[5],"50");
					}
					else  {
						var rl  = rs[sq[0]];
						var sh  = rl.split(",");
						if(sh.length == 1 && rl == 99){
							for(var t = 0; t < fd.length; t++){
							
								var temp = fd[t];
								temp = temp.substring(2,temp.length-3);
								var aryRes = temp.split("','");
								var result = aryRes[0];							
														
								eval("oFd.options[t] = new Option" + fd[t]);
								oFd.options[t].title = result;
							}
						}
						else
						{
							for(var k=0; k < sh.length; k++) {
								
								var temp = fd[sh[k]];
								temp = temp.substring(2,temp.length-3);
								var aryRes = temp.split("','");
								var result = aryRes[0];
								
								eval("oFd.options[k] = new Option" + fd[sh[k]]);
								oFd.options[k].title = result;
							}
						}
 					}
				}
			}
		}
	}
	else{
  		if( (oQf.options.value=="1" || oQf.value=="1" || oQf.options.value=="9" || oQf.value=="9")){
 			oFd.options[0] = new Option(myField[6],"0");
  			if(sC.toLowerCase() == "150"){
                oFd.options[1] = new Option(myField[7],"50");
                oFd.options[2] = new Option(myField[8],"32");
                oFd.options[3] = new Option(myField[9],"44");				
			}
			else{
                oFd.options[1] = new Option(myField[10],"50");
                oFd.options[2] = new Option(myField[11],"32");
                oFd.options[3] = new Option(myField[12],"44");				
			}
		}
		else{
			for(var d=0;d < fd.length;d++){
			
				var temp = fd[d];
				temp = temp.substring(2,temp.length-3);
				var aryRes = temp.split("','");
				var result = aryRes[0]; 
								
				eval("oFd.options[d] = new Option" + fd[d]);
				oFd.options[d].title = result;
				
			}
		}
		oFd.selectedIndex = 0;
		for (var i=0; i < oFd.options.length; i++) {
			if (strSel == oFd.options[i].value) {
				oFd.selectedIndex = i;
				break;
			}
		}
	}
}

// POSITION
function repopulatePositionSelect(objPositionSelect, strCountry){
		if(strCountry == '170') {			
            strCountry = 'phPosition';		
        } else if(strCountry == '97') {
            strCountry = 'idPosition';		
        } else if(strCountry == '100') {
        	strCountry = 'inPosition';		
        } else if(strCountry == '208') {
        	strCountry = 'thPosition';
        } else if(strCountry == '231') {
            strCountry = 'vnPosition';        			
        } else {	
        	strCountry = 'defaultPosition';		
        }
        while(objPositionSelect.options.length > 0) {
			objPositionSelect.options[(objPositionSelect.options.length-1)] = null;
		}
		for(i=0;i<eval(strCountry + ".length");i++)	{
			temp = eval(strCountry + "[i]");	

			var temp2 = temp;
			temp2 = temp2.substring(2,temp2.length-3);
			var aryRes = temp2.split("','");
			var result = aryRes[0];
			
            eval("objPositionSelect.options[i] = new Option" + temp);
			objPositionSelect.options[i].title = result;
	
		}
}

// ROLE
function repopulateRoleSelect(objRole1, intSpec, msgSelect, sC, sL)
{
    var sR = "role"
    if(sC == "208" && sL == 16)
    {
        sR = "roleTh";
    }else if(sC == "231" && sL == 135){
		sR = "roleVn";
	}else if(sC == "97" && sL == 7){
		sR = "roleId";
	}

    while(objRole1.options.length > 0) {
	   objRole1.options[(objRole1.options.length-1)] = null;
	}

    if (intSpec == undefined || intSpec == '' || eval(sR + intSpec) == undefined) {
        objRole1.options[0]  = new Option(msgSelect,'','');
    } else {
        tempArrName = sR+intSpec;
	    for(i=0;i<eval(tempArrName+".length");i++) {
	        temp = eval(tempArrName+"[i]");
	        eval("objRole1.options[i] = new Option" + temp);
	    }

    }
}

function showOverseas(ctry, overseasDiv, checkboxDiv)
{
	if (ctry == '170') {
		setObjVisibility(overseasDiv, 'true');
	} else {
		setObjVisibility(overseasDiv, 'false');
		elId(checkboxDiv).checked = false;
	}
}

function enableAll(ctrl)
{
	var intL = ctrl.length;
	for (var i=0; i<intL; i++) {
		ctrl[i].disabled=false;	
		sSelect(ctrl[i]);
	}
}
function disableAll(ctrl)
{
	var intL = ctrl.length;
	for (var i=0; i<intL; i++) {
		ctrl[i].checked = false;
		ctrl[i].disabled=true;	
		sSelect(ctrl[i]);
	}
}

function repopulateWL(objPLSelect, selState) {
	var arrState = ",50100,50300,50700,51200,40200,40800,41500,41800,42900,";
	if(selState != '') { 
		if (arrState.indexOf(selState) < 0) { 
			for(var i=0 ; i<objPLSelect.options.length; i++) { 
				if(objPLSelect.options[i].value == selState) { 
					objPLSelect.selectedIndex = i; 
					break; 
				} 
			} 
		} 
	} 
}

// multiple select
function mSelect(elsCurrent, currentId, strId, strGroupName){
	var strName=strId + currentId;   //eg state100
	var els=document.getElementsByTagName('input');
	var len=els.length;
	for(var intCount=0; intCount<len; ++intCount)
	{
		if ((els[intCount].name == strGroupName || els[intCount].name == strGroupName+'[]') && (String(els[intCount].id).indexOf(strName) >= 0))
		{			
			els[intCount].checked=elsCurrent.checked;
			els[intCount].disabled=elsCurrent.checked;
			setBg(els[intCount]);
		}
    }
}
// multiple select clear
function mClear(strName, HiddenFld){
	var els=document.getElementsByTagName('input');
	
	for(var i=0; i<els.length; ++i)
		if((els[i].name==strName+'[]' || els[i].name==strName)){
			els[i].checked=false;
			els[i].disabled=false;
			setBg(els[i]);
		}
}
// multiple has selected
function mHasSelected(strName){
	var els=document.getElementsByTagName('input');
	
	for(var i=0; i<els.length; ++i)
		if((els[i].name==strName+'[]' || els[i].name==strName) && els[i].checked)
			setBg(els[i]);
}

function setBg(els){
	var elParent=els.parentNode.parentNode;
	var strBackground=els.checked?'#ccc':'#fff';
	var strColour=els.checked?'#666':'#000';
	elParent.style['backgroundColor']=strBackground;
	elParent.style['color']=strColour;
}

function updateBg(els){	
	setBg(els);
}
// single select
function sSelect(oCtrl)
{
	var strName=oCtrl.name;
	updateShortList(strName, oCtrl);
	updateBg(oCtrl);
}

//strName = Loc,  oCtrl= elsCurrent
function updateShortList(strName, oCtrl, booFound)
{
	//define for alt name
	var intKey = getSListKey(strName);
	var strShortListName = getSListName(strName);

	//handle for alt name
	if(strShortListName != '')
	{
		var aObj = document.getElementsByName(strShortListName);
		if(aObj != null)
		{
			var strAltValue=oCtrl.value ;
			for(var i=0; i<aObj.length; i++)
			{
				if(aObj[i].value == strAltValue)
				{
					aObj[i].checked=oCtrl.checked;	
					if(typeof(booFound) != 'undefined') 
					{
						if(booFound) aObj[i].disabled=oCtrl.checked;
					}
					if(intKey == 2) setBg(aObj[i]);	
				}									
			}
		}
	}
}


function getSListKey(strName)
{
	var intKey = strName.charAt(strName.length -1);
	return intKey;
}

function getSListName(strName, intKey)
{
	var strShortListName = '';
	if(typeof(intKey) == 'undefined') intKey = getSListKey(strName);		
	if(intKey == 1) strShortListName = strName.substr(0,strName.length-1) + '2';
	else if(intKey == 2) strShortListName = strName.substr(0,strName.length-1) + '1';
	return strShortListName;
}


//-->

function popup_win( loc, wd, hg ) {
   var remote = null;
   var xpos = screen.availWidth/2 - wd/2; 
   var ypos = screen.availHeight/2 - hg/2; 
   remote = window.open('','','width=' + wd + ',height=' + hg + ',resizable=1,scrollbars=1,screenX=0,screenY=0,top='+ypos+',left='+xpos);
   if (remote != null) {
      if (remote.opener == null) {
         remote.opener = self;
      }
      remote.location.href = loc;
      remote.focus();
   } 
   else { 
      self.close(); 
   }
}

function popup_win2( loc, wd, hg ) {
   var remote = null;
   var xpos = screen.availWidth/2 - wd/2; 
   var ypos = screen.availHeight/2 - hg/2; 
   remote = window.open('','','width=' + wd + ',height=' + hg + ',resizable=1,scrollbars=1,toolbar=1,menubar=1,screenX=0,screenY=0,top='+ypos+',left='+xpos);
   if (remote != null) {
      if (remote.opener == null) {
         remote.opener = self;
      }
      remote.location.href = loc;
      remote.focus();
   } 
   else { 
      self.close(); 
   }
}

function popup_win3( loc ) {
   var remote = null;
   var wd = 680;
   var hg = screen.availHeight * 0.8;
   var xpos = screen.availWidth/2 - wd/2; 
   var ypos = (screen.availHeight/2 - hg/2) - 64; 
   remote = window.open(loc, "newwindow", "toolbar=1,menubar=0,scrollbars=1,resizable=1,location=top,status=0,width="+wd+",height="+hg+",screenX=0,screenY=0,top="+ypos+",left="+xpos);
   if (remote != null) {
      if (remote.opener == null) {
         remote.opener = self;
      }
      remote.location.href = loc;
      remote.focus();
   } 
   else { 
      self.close(); 
   }
}

function popup_win4( loc, wd, hg ) {
   var remote = null;
   var xpos = screen.availWidth/2 - wd/2; 
   var ypos = screen.availHeight/2 - hg/2; 
   remote = window.open('','','width=' + wd + ',height=' + hg + ',resizable=1,toolbar=1,scrollbars=1,screenX=0,screenY=0,top='+ypos+',left='+xpos);
   if (remote != null) {
      if (remote.opener == null) {
         remote.opener = self;
      }
      remote.location.href = loc;
      remote.focus();
   } 
   else { 
      self.close(); 
   }
}

function popup_win5( loc, wd, hg ) {
   var remote = null;
   var xpos = screen.availWidth/2 - wd/2; 
   var ypos = screen.availHeight/2 - hg/2; 
   remote = window.open(loc,"newwindow",'width=' + wd + ',height=' + hg + ',resizable=0,toolbar=0,scrollbars=1,screenX=0,screenY=0,top='+ypos+',left='+xpos);
   if (remote != null) {
      if (remote.opener == null) {
         remote.opener = self;
      }
      remote.location.href = loc;
      remote.focus();
   } 
   else { 
      self.close(); 
   }
}

function popup_win6( loc, wn ) {
  var remote = null;
   var wd = 680;
   var hg = screen.availHeight * 0.8;
   var xpos = screen.availWidth/2 - wd/2; 
   var ypos = (screen.availHeight/2 - hg/2) - 64; 
   
   remote = window.open(loc, wn, "toolbar=1,menubar=0,scrollbars=1,resizable=1,location=top,status=0,width="+wd+",height="+hg+",screenX=0,screenY=0,top="+ypos+",left="+xpos);
   if (remote != null) {
      remote.location.href = loc;
      remote.focus();
   } 
   else { 
      self.close(); 
   }
}

function open_url(url, x) {
   if ((x==1) && (window.opener!=null)) {
      window.self.close();
      window.opener.focus();
      window.opener.location.href = url;
   }
   else {
      var w = window.open(url, '_new');
      w.focus();
      w.opener = self;
   }
}

function open_url2(url) {
	if (window.opener==null) {
		window.location.href = url
	}
	else {
      var w = window.open(url, '_new');
      w.focus();
      w.opener = self;
      window.self.close();
	}
}

function open_url3(url, wd) {
	  
	  var hg = screen.availHeight * 0.8;
	  var xpos = screen.availWidth/2 - wd/2; 
	  var ypos = (screen.availHeight/2 - hg/2) - 64;
   
      var w = window.open(url, '_new', 'toolbar=1,menubar=1,scrollbars=1,status=1,resizable=1,width='+wd+'top='+ypos+',left='+xpos);
      w.focus();
      w.opener = self;
}

//popup window with popup blocker check
function popup_win7( loc, wd, hg, msg) {
    var remote = null;
    var xpos = screen.availWidth/2 - wd/2; 
    var ypos = screen.availHeight/2 - hg/2; 
    remote = window.open(loc,'','width=' + wd + ',height=' + hg + ',resizable=0,scrollbars=1,screenX=0,screenY=0,top='+ypos+',left='+xpos);
	try{
		remote.focus();
	} 
	catch(e){ 
		//alert('The page you clicked could not be opened!\nDo you have any pop-up blocker installed?\n\nIf so, please disable the pop-up blocker or \nadd this site to the "allow pop-up" list.');
		alert(msg);
	}
}

//popup window with popup blocker check with toolbar
function popup_win8( loc, wd, hg, msg) {
    var remote = null;
    var xpos = screen.availWidth/2 - wd/2; 
    var ypos = 1; 
    remote = window.open(loc,'','width=' + wd + ',height=' + hg + ',toolbar=1,location=1,resizable=1,scrollbars=1,screenX=0,screenY=0,top='+ypos+',left='+xpos);
	try{
		remote.focus();
	} 
	catch(e){ 
		alert('The page you clicked could not be opened!\nDo you have any pop-up blocker installed?\n\nIf so, please disable the pop-up blocker or \nadd this site to the "allow pop-up" list.');
		//alert(msg);
	}
}

function popup_win9( loc, wd, hg ) {
   window.location.href = loc;
}

//popup window with popup blocker check
function popup_win10( loc, wd, hg ) {
    var remote = null;
    var xpos = screen.availWidth/2 - wd/2; 
    var ypos = screen.availHeight/2 - hg/2; 
    remote = window.open(loc,'','width=' + wd + ',height=' + hg + ',resizable=0,scrollbars=1,screenX=0,screenY=0,top='+ypos+',left='+xpos);
    try{
        remote.focus();
        window.opener = top;
        window.open('', '_self', '');   
        window.self.close();                
    } 
    catch(e){ 
        alert('The page you clicked could not be opened!\nDo you have any pop-up blocker installed?\n\nIf so, please disable the pop-up blocker or \nadd this site to the "allow pop-up" list.');
    }
}

//hide/show div section
//element id to hide/show, action, image id to change, imgExpand, imgCollapse
function toggleDiv(id, newClass, imgId, imgE, imgC) 
{ 
	var identity=document.getElementById(id); 
	if (identity.className == "toggleshow") {
		identity.className="toggle";
		if (imgId != null && imgId != "")
			document.images[imgId].src = imgE;		
	}
	else{
		identity.className= newClass;
		if (imgId != null && imgId != "") 
			document.images[imgId].src = imgC;		
	}
}
var sessionTimeoutAlert = function(intMinutes, intOffset, msg) {
	if (!isNaN(intMinutes) && intMinutes > intOffset){ 
		intMinutes = (intMinutes - intOffset) * 60 * 1000;
		//var strMsg = "WARNING: To ensure security of your resume, this session will expire in " + intOffset + " minutes. If you have made changes on this page, please save them NOW. Otherwise, the changes will be lost. You can continue to update after you have saved the changes.";	
		var strMsg = msg.replace("#intOffset#", intOffset);
		setTimeout(function() { alert(strMsg); }, intMinutes);
	}
}

function toggleDiv2(showHideDiv) {
	var ele = document.getElementById(showHideDiv);
	if(ele.style.display == "block") {
		ele.style.display = "none";
	}
	else {
		ele.style.display = "block";
	}
}


function toggleDiv3(showHideDiv, divName) {
	var newboxes = document.getElementsByTagName("div");
            for(var x=0; x<newboxes.length; x++) {
                  name = newboxes[x].getAttribute("name");
                  if (name == divName) {
                  	if (newboxes[x].id == showHideDiv) {
						if(newboxes[x].style.display == "block") {
							newboxes[x].style.display = "none";
						} else {
							newboxes[x].style.display = "block";
						}
                    	
                  	} else {
						if(newboxes[x].style.display == "block") {
							newboxes[x].style.display = "none";
						} else {
							newboxes[x].style.display = "none";
						}
                  	}
            }
      }
}

function showTip(ele, left, top)
{
	var tipbox = document.getElementById(ele);
	tipbox.style.left = tempX + left + "px";
	tipbox.style.top = tempY + top + "px";
	tipbox.style.visibility = 'visible';
}

function stripHTML(str)
{
	str = str.replace(/<\S[^><]*>/gi, "");
	return str;
}

function hideTip(ele)
{
	document.getElementById(ele).style.visibility='hidden';
}

<!--
var currCtry = '';
var currState = '';
var currSpec = '';

function toggleSection(id, newClass)
{
	var identity=elId(id);
	if (identity.className == "toggleshow") {
		identity.className="toggle";
	} else {
		identity.className= newClass;
	}
}

//Check Login Availability
function checkLid(lid, url, errId) {
    lid = Trim(lid);
    if (lid == null || lid == '') {
        // if user did not enter login id
        procLid('', errId);
    } else {
        var re = new RegExp(/^[a-z0-9\.\_\@\']*$/i);
        if (lid.match(re)) {
    		var str = 'ac=1&li=' + encodeURIComponent(lid);
            mkGetReq(url, str, 'procLid', errId);
        } else {
            procLid('0|bad_id', errId);
        }
    }
}

//Process Check Login Availability result
function procLid(responseText, errId) {

    if (responseText == null || responseText == '') {
    } else {
        // responseText format: valid(1)|$arrChk.message_id|loginID
        var result = responseText.split("|");
        var output = eval('$arrChk.' + result[1]);
        if (result[2]) {
            output = output.replace(/##LoginID##/g, result[2]);
        }
        setDivMsg(errId, output);
        setObjVisibility(errId, 'true');
    }
}

function initReq()
{
	var req = null;
	//find the most recent version on user machine
	var arr = ['MSXML2.XMLHttp.5.0', 'MSXML2.XMLHttp.4.0', 'MSXML2.XMLHttp.3.0', 'Msxml2.XMLHTTP', 'Microsoft.XMLHTTP'];
	if (window.XMLHttpRequest)
	{
		req = new XMLHttpRequest();
		return req;
	} else {
		for (var i=0; i<arr.length; i++) {
			try {
				req = new ActiveXObject(arr[i]);
				return req;
			} catch (e) { }
		}
	}
	throw new Error("XmlHttp not supported.");
}

function mkGetReq(url, str, callBack, ele, imgEle, internal)
{
	var request = initReq();
	if (request != null)
	{
		request.onreadystatechange = function()
		{
		if (request.readyState == 4 && request.status == 200) {
			if (request.responseText) {
				eval("var output = '" + request.responseText + "';");
				eval(callBack + "('" + output + "', '" + ele + "', '" + imgEle + "', '" + internal + "');");
				return;
			} else {
				eval(callBack + "('', '" + ele + "', '" + imgEle + "', '" + internal + "');");
                return;
            }
		}
		return;
		}
		request.open('GET', url + '?' + str, true);
		request.send(null);
	}
}

//Check Email as Login ID
function checkEmailLid(lid, url, loginId, errId, email, internal) {
	if (lid != '') {
		var str = 'ac=2&li=' + encodeURIComponent(lid);
		if(email == 1)
			str = str + '&e=1';
		mkGetReq(url, str, 'procEmailLid', loginId, errId, internal);
	}
}

var jsonLid = '';
var jsonErrId = '';
var currField = '';
// using json

function remoteCheckEmailLid(lid, url, loginId, errId, email) {
	if (lid != '') {
		var str = 'ac=2&op=json&li=' + encodeURIComponent(lid);
		if(email == 1)
			str = str + '&e=1';
		jsonLid = loginId;
		jsonErrId = errId;
		currField = 'email';
        // The web service call
        var req  = url + '?' + str;
        // Create a new request object
        bObj = new JSONscriptRequest(req);
        // Build the dynamic script tag
        bObj.buildScriptTag();
        // Add the script tag to the page
        bObj.addScriptTag();
	}
}

function remoteCheckLid(lid, url, errId) {
    lid = Trim(lid);
    if (lid == null || lid == '') {
        procLid('', errId);
    } else {
		jsonErrId = errId;
		currField = 'login';
        var re = new RegExp(/^[a-z0-9\.\_\@\']*$/i);
		var str = 'ac=1&op=json&li=' + encodeURIComponent(lid);
        var req  = url + '?' + str;
        if (lid.match(re)) {
            // Create a new request object
            bObj = new JSONscriptRequest(req);
            // Build the dynamic script tag
            bObj.buildScriptTag();
            // Add the script tag to the page
            bObj.addScriptTag();
        } else {
            procLid('0|bad_id', errId);
        }
	}
}

function getJsonAvail(jsonData) {
    var output = jsonData.ResultSet.Result[0].Response;
    if (currField == 'email')     procEmailLid(output, jsonLid, jsonErrId);
    else procLid(output, jsonErrId);
    // After getting response remove script tag
    bObj.removeScriptTag();
}

//Process Check Email as Login ID results
function procEmailLid(responseText, loginId, errId, internal) {

    if (responseText == null || responseText == "") {
    } else {
        // responseText format: valid(1)|$arrChk.message_id|loginID
        var result = responseText.split("|");
        if (result[0] == 0) {
            // if login id already exists
            var output = $arrChk.same_email;
            if (result[2]) {
                output = output.replace(/##LoginID##/g, result[2]);
            }
            if (elId(loginId).style.display == 'none') {

                if ($('#social_login_flag').length > 0 && $('#social_login_flag').val() == 1) {
                    setDivMsg(errId, output);
                    setObjVisibility(errId, 'true');
                    elId('login_id_flag').value = 1;
                } else {
					if(internal == 1)
						setObjVisibility(loginId, 'true');
					else
						setObjVisibility(loginId, 'false');
					elId('login_id').value = '';
                    setDivMsg(errId, output);
                    setObjVisibility(errId, 'true');
                    elId('login_id_flag').value = 1;
                }
            } else {
				if(internal == 1) {
					setObjVisibility(loginId, 'true');
				} else {
					setObjVisibility(loginId, 'false');
					elId('login_id').value = '';
					document.getElementById("dvAv").style.display="none";
				}
                setDivMsg(errId, output);
                setObjVisibility(errId, 'true');
                elId('login_id_flag').value = 1;
			}
        } else {
            setDivMsg(errId, '');
            elId('login_id').value = '';
            setObjVisibility(errId, 'false');
            setObjVisibility(loginId, 'false');
        }
        hideOverlay();
    }
}

function changeBox(divTip, divField, txtField)
{
  setObjVisibility(divTip, 'false');//elId(divTip).style.display='none';
  setObjVisibility(divField, 'true');//elId(divField).style.display='';
  focusCtrl(elId(txtField));
}

function restoreBox(divTip, divField, txtField)
{
	if(elId(txtField).value=='')
	{
	  setObjVisibility(divTip, 'true');//elId(divTip).style.display='';
	  setObjVisibility(divField, 'false');//elId(divField).style.display='none';
	} else {
		changeBox(divTip, divField, txtField);
	}
}

function setPLevel(ctl) {
	var frm = document.frmRegistration;
	var value = GetValueFromCtl(ctl);
	if (value == "0") {
		frm.position_level_code.selectedIndex = 5;	frm.company_name.value=""; frm.company_name.disabled=true;
		frm.position_title.value=""; frm.position_title.disabled=true; frm.salary_currency_code.selectedIndex = 0; frm.salary_currency_code.disabled=true;
		frm.salary.value=""; frm.salary.disabled=true;
	} else {
		if (frm.position_level_code.selectedIndex == 5) frm.position_level_code.selectedIndex = 0;
		frm.company_name.disabled=false; frm.position_title.disabled=false; //frm.dpt_field.disabled=false;
		frm.salary_currency_code.disabled=false;frm.salary.disabled=false;
	}
}

function ShowTextBox()
{
	var textDiv = document.getElementById('copyResume');
	var upDiv = document.getElementById('uploadResume');
	var rdo = GetValueFromRdo(document.frmRegistration.uploaded);
	if (rdo == "2")
	{
        unsetErrorBlock('errUpload', '', '');
		hideOverlay();
		if (textDiv) textDiv.style.display = 'block';
		if (upDiv) upDiv.style.display = 'none';
	}
	else if (rdo == "1")
	{
		if (upDiv) upDiv.style.display = 'block';
		if (textDiv) textDiv.style.display='none';
	}
	else {
        unsetErrorBlock('errUpload', '', '');
		if (upDiv) upDiv.style.display = 'none';
		if (textDiv) textDiv.style.display='none';
	}
}
function showYM(value, currYear) {
	setObjVisibility('expMonth', 'false');
	setObjVisibility('expYears', 'false');

	if (currYear - value <= 1)	{ setObjVisibility('expMonth','true'); elId('years_of_exp_text').value = '';}
	else if(value != '' && currYear - value > 30) { setObjVisibility('expYears', 'true'); elId('expMonth').selectedIndex = 0; }
	else { elId('expMonth').selectedIndex = 0; elId('years_of_exp_text').value = ''; }
    if (currYear - value < 3) {
			setObjVisibility('dvGraduation','true');
			setObjVisibility('dvGraduation2','true');
			//setObjVisibility('dvJDate','true');
			//setObjVisibility('dvLDate','true');
			setObjVisibility('dvGrade','true');
			setObjVisibility('dvGradeTwo', 'true')
    } else {
			setObjVisibility('dvGraduation','false');
			if (elId('grad_month'))  elId('grad_month').selectedIndex = 0;
			if (elId('average_grade'))  elId('average_grade').selectedIndex = 0;
			if (elId('average_grade0'))  elId('average_grade0').selectedIndex = 0;
			if (elId('average_grade1'))  elId('average_grade1').selectedIndex = 0;
			//if (elId('join_date_month'))  elId('join_date_month').selectedIndex = 0;
			//if (elId('left_date_month'))  elId('left_date_month').selectedIndex = 0;
			setObjVisibility('dvGraduation2','false');
			//setObjVisibility('dvJDate','false');
			//setObjVisibility('dvLDate','false');
			setObjVisibility('dvGrade','false');
			setObjVisibility('dvGradeTwo', 'false')
			setObjVisibility('cgpa1','false');
			setObjVisibility('cgpa2','false');
    }
}
function showExp(ctry, ctrl, arrEle) {
	value = GetValueFromRdo(ctrl);
	if(arrEle != "")
	arrEle[3].checked = false; // uncheck intern first
	if(value != '') {
		if (value == 1) {
			setObjVisibility('dvWorkSection','true');
			setObjVisibility('dvStudent','false');
			elId('years_of_exp').disabled = false;
			if (elId('grad_month'))  elId('grad_month').selectedIndex = 0;
			if (elId('average_grade'))
			{	if (ctry == '208')
					elId('average_grade').selectedIndex = 9;
				else
					elId('average_grade').selectedIndex = 0;
			}
			if (elId('average_grade0'))  elId('average_grade0').selectedIndex = 0;
			if (elId('average_grade1'))  elId('average_grade1').selectedIndex = 0;
			//if (elId('join_date_month'))  elId('join_date_month').selectedIndex = 0;
			//if (elId('left_date_month'))  elId('left_date_month').selectedIndex = 0;
			if (elName('cgpa')) elName('cgpa').value='';
			if (elName('cgpa_base')) elName('cgpa_base').value='';
			if (elId('cgpa0_field')) elId('cgpa0_field').value='';
			if (elId('cgpa1_field')) elId('cgpa1_field').value='';
			if (elId('cgpa_base0_field')) elId('cgpa_base0_field').value='';
			if (elId('cgpa_base1_field')) elId('cgpa_base1_field').value='';
		} else {
			if (elId('average_grade'))
			{	if (ctry == '208')
				{	elId('average_grade').selectedIndex = 9;
					setObjVisibility('cgpa1','true');
				}

			}
			setObjVisibility('dvGraduation','true');
			setObjVisibility('dvGraduation2','true');
			//setObjVisibility('dvJDate','true');
			//setObjVisibility('dvLDate','true');
			setObjVisibility('dvGrade','true');
			setObjVisibility('dvGradeTwo', 'true')
			setObjVisibility('dvWorkSection','false');
			elId('years_of_exp').selectedIndex = 0;
			elId('years_of_exp').disabled = true;
			elId('months_of_exp').selectedIndex = 0;
			setObjVisibility('expMonth', 'false');
			setObjVisibility('expYears', 'false');
			setObjVisibility('errYExp', 'false');
			if (ctry=='100') setObjVisibility('dvStudent','true');
			showOverlay ('', '', '', '', ''); //hide overlay
            if (value == 3) {
                if(arrEle != "")
				arrEle[3].checked = true;
            }
        }
	}
}

function suggest(ctry, ctryObj){
	if (isIE6OrAbove() && (ctry=='150'||ctry=='100'||ctry=='170'||ctry=='190'||ctry=='97')) {
		var arrCtry = eval('college'+ctry);
		new AutoSuggest(document.getElementById('college'), arrCtry, ctry, ctryObj);
	}
}
function suggestCompany(ctry, ctryObj){
	if (isIE6OrAbove() && (ctry=='150'||ctry=='170'||ctry=='190')) {
		var arrCtry = eval('company'+ctry);
		new AutoSuggest(document.getElementById('company'), arrCtry, ctry, ctryObj);
	}
}
function suggestPositionTitle(ctry, ctryObj){
	if (isIE6OrAbove()) {
		var arrCtry = eval('positionTitle');
		new AutoSuggest(document.getElementById('position_title'), arrCtry, ctry, ctryObj);
	}
}
function suggestSkill(ctry, ctryObj){
	if (isIE6OrAbove()) {
		var arrCtry = eval('skill');
		new AutoSuggest(document.getElementById('position_title'), arrCtry, ctry, ctryObj);
	}
}
function customCtry(ctry, msgCity, msgArea) {
    if (ctry=='150' || ctry == '100' || ctry == '97' || ctry == '170' || ctry == '19' || ctry == '208' || ctry == '231')
    {
        setObjVisibility('ctryState', 'true');
        setObjVisibility('ctryCity', 'true');
        elId('lblCity').innerHTML = '<span class="asterisk">*</span>&nbsp;' + msgCity;
        // to overcome IE6 bug
        if (!isIE6OrAbove()) elId('lblCity').className = 'colLeft';
    } else if (ctry == '190') {
        setObjVisibility('ctryState', 'false');
        setObjVisibility('ctryCity', 'true');
        elId('lblCity').innerHTML = '<span class="asterisk">*</span>&nbsp;' + msgArea;
        // to overcome IE6 bug
        if (!isIE6OrAbove()) elId('lblCity').className = 'colLeft';
    } else {
        setObjVisibility('ctryState', 'true');
        setObjVisibility('ctryCity', 'false');
    }
}

// defaulting for reg form
function onCountrySelect(frmReg, msgCity, msgArea, sL)
{
    var ctry = frmReg.country_code.options[frmReg.country_code.selectedIndex].value;
    // initialize college auto suggest
    //if (elId('institute_country_code')) suggest(ctry, elId('institute_country_code'));
   // else    suggest(ctry);
    // populate state list
    if (currCtry != ctry) emptyLocationSelect(frmReg.state, ctry,frmReg.state_code, frmReg.city, frmReg.location_code, sL);
    // populate education list
    repopulateSelect(frmReg.qualification, ctry);
    // populate positon list
    repopulatePositionSelect(frmReg.position_level_code, ctry);
    // populate nationality
    if(frmReg.nationality_code.selectedIndex == 0) frmReg.nationality_code.selectedIndex = this.selectedIndex;
    // show / hide state and city for diff countries
    customCtry(ctry, msgCity, msgArea);
    // PH overseas job
    //showOverseas(ctry, 'dvOversea', 'overseas_job');
    currCtry = ctry;
}
function onStateSelect(frmReg, stateValue)
{
    if (currState != stateValue) {
        enterCity(stateValue, frmReg.city, frmReg.location_code, true);
    }
    currState = stateValue;
}
function onSpecSelect(frmReg, specValue, msgSelect, sC, sL)
{
    if (currSpec != specValue)  { repopulateRoleSelect(frmReg.primary_role, specValue, msgSelect, sC, sL); }
    if(specValue=='116') setObjVisibility('expSpec', 'true'); else setObjVisibility('expSpec', 'false');
    currSpec = specValue;
}
function onSpecSelect1(frmReg, specValue, msgSelect, counter, sC, sL)
{
    if (currSpec != specValue)  { repopulateRoleSelect(document.getElementById('primary_role'+counter), specValue, msgSelect, sC, sL); }
    if(specValue=='116') setObjVisibility('expSpec'+counter, 'true'); else setObjVisibility('expSpec'+counter, 'false');
    currSpec = specValue;
}
function onPositionSelect(positionValue)
{
    if(positionValue=='1' || positionValue=='2')
        setObjVisibility('team', 'true');
    else
        setObjVisibility('team', 'false');
}
function onPositionSelect1(positionValue, counter)
{
	if(positionValue=='1' || positionValue=='2')
        setObjVisibility('team'+counter, 'true');
    else
        setObjVisibility('team'+counter, 'false');
}
// Copied from job search, for specialization box
if (typeof(updateThis) != "function")
var updateThis = function(what, bAvoid, bScan) {
    var selectedClassName = "labelSelected";
    var normalClassName = "labelNormal";

    if( what.checked == true ){what.parentNode.className = selectedClassName;}
	else{what.parentNode.className = normalClassName;}

	if(typeof(bAvoid) == 'undefined') bAvoid = false;
	updateThisDesc(what, bAvoid);

	if(typeof(bScan) == 'undefined') bScan = false;
	if(bScan == false) updateThisDetail(what);

	//check short list
	sSL = 'Sl' + what.id;
	oSl = elId(sSL);
	if(oSl != null) oSl.checked = what.checked;
}
function updateThisDesc(what, bAvoid)
{
	if(typeof(bAvoid) == 'undefined') bAvoid = false;
	sName = what.name;
	sName = sName.replace("[]","") + 'Sel';
	sDesc = trim(what.alt);
	if(sDesc == '') return;

	var oDiv = elId(sName);
	if(oDiv == null) return;

	sLegend = '<b>Your Selection: </b><br/>';

	sHtml = oDiv.innerHTML;
	if(typeof(sHtml) == 'undefined' || sHtml == '') {sHtml = ', ';}
	else{ sHtml = sHtml.substring(27) ; sHtml = ', ' + sHtml + ', ';}
	sSearch = ', ' + escapeHTML(sDesc) + ', ';
	if( what.checked == true && bAvoid == false && what.disabled == false)
	{
		bFound = sHtml.search(sSearch);
		if(bFound == -1) sHtml = sHtml + sDesc + ', ';
	}
	else sHtml = sHtml.replace(sSearch, ', ') ;
	if(sHtml.length > 4){ sHtml = sHtml.substring(2, (sHtml.length - 2) ); sHtml = sLegend + sHtml;}
	else {sHtml = '';}
	oDiv.innerHTML = sHtml;
}
function uncheckAll(field) {
	field = elName(field);
    for (i = 0; i < field.length; i++) {
	field[i].checked = false;
	updateThis(field[i], false, true);
    }
}
//Used in Quick Sign Up Form
function showWorkLocation(workLocationId, addMoreId) {
	document.getElementById(workLocationId).style.display = "";
	document.getElementById(addMoreId).style.display = "none";
}
// JSONscriptRequest -- a simple class for making HTTP requests
// using dynamically generated script tags and JSON
function JSONscriptRequest(fullUrl) {
    this.fullUrl = fullUrl;
    this.noCacheIE = '&noCacheIE=' + (new Date()).getTime();
    this.headLoc = document.getElementsByTagName("head").item(0);
    this.scriptId = 'JscriptId' + JSONscriptRequest.scriptCounter++;
}
JSONscriptRequest.scriptCounter = 1;
JSONscriptRequest.prototype.buildScriptTag = function () {
    this.scriptObj = document.createElement("script");
    this.scriptObj.setAttribute("type", "text/javascript");
    this.scriptObj.setAttribute("charset", "utf-8");
    this.scriptObj.setAttribute("src", this.fullUrl + this.noCacheIE);
    this.scriptObj.setAttribute("id", this.scriptId);
}
JSONscriptRequest.prototype.removeScriptTag = function () {
    this.headLoc.removeChild(this.scriptObj);
}
JSONscriptRequest.prototype.addScriptTag = function () {
    this.headLoc.appendChild(this.scriptObj);
}


//-->


$(document).ready(function(){

$('#login_id').bind({
	blur: function() {
		checkLid(this.value, $arrOthers.login_exist_url, 'dvAv');
	},
	change: function() {
		if ($('#dvLogin').is(':visible'))
			ValidateTextLimit(this, 4, 100, $arrErr.login, 'errLoginId');
	}
});

$('#email').bind({
	focus: function() {
		showOverlay ('dvEml', '$arrTip', 'email', 'errEml');
	},
	change: function() {
        	if (ValidateOneEmail(this, $arrErr.email, $arrErr.email2, $arrErr.email3, $arrErr.email4, $arrErr.email5, $arrErr.email6, 'errEml')){
				var internal = 0;
				var internalEmail = new Array();
				internalEmail = $arrOthers.internal_email.split(",");
				if(in_array(this.value,internalEmail))
					internal = 1;
				else
					internal = 0;
				checkEmailLid(this.value, $arrOthers.login_exist_url, 'dvLogin', 'errEml', 1, internal);
    		}
	}
});

$('#first_name').bind({
	focus: function() {
		showOverlay ('dvName', '$arrTip', 'first_name', 'errName');
	},
	blur: function() {
		if (Trim(this.value) == '')
			restoreBox('fnTip', 'fnField', 'first_name');
	}
});

$('input[name="first_name_temp"]').bind('focus', function() {
	changeBox('fnTip', 'fnField', 'first_name');
});

$('#last_name').bind({
	focus: function() {
		showOverlay ('dvName', '$arrTip', 'first_name', 'errName');
	},
	blur: function() {
		if (Trim(this.value) == '')
			restoreBox('lnTip', 'lnField', 'last_name');
	},
	change: function() {
		ValidateName(document.frmRegistration.first_name, this, $arrErr.first_last_name, $arrErr.first_name, $arrErr.last_name, 'errName');
	}
});

$('input[name="last_name_temp"]').bind('focus', function() {
	changeBox('lnTip', 'lnField', 'last_name');
});

$('#nationality_code').bind({
	blur: function() {
		if(this.form.country_code.selectedIndex == 0 )
			this.form.country_code.selectedIndex = this.selectedIndex;
	},
	change: function() {
		ValidateCtl(this, $arrErr.nationality,1, 'errNationality');
	}
});

$('#country_code').bind('change', function() {
	ValidateCtl(this, $arrErr.country, 1, 'errCtry');
});

$('#password').bind({
	focus: function() {
		showOverlay ('dvPwd', '$arrTip', 'password', 'errPwd');
	},
	change: function() {
		ValidatePassword(this, $arrErr.password, 'errPwd');
	}
});

$('#salary').bind({
	focus:function(){
		showOverlay ('dvMinSal', '$arrTip', 'salary', 'errMinSal');
	},
	change: function(){
		var selfCurrency = $('#salary_currency_code');
		ValidateMonthlySalary(this, selfCurrency, $arrErr.salary, $arrErr.salary2, $arrErr.salary3, 'errMinSal');
	}
});

$('#salary_currency_code').bind({
	change: function() {
		ValidateCtl(this, $arrErr.salary3, 1, 'errMinSal');
	}
});


$('#work_location1').bind('change', function() {
	if (this.disabled == false)
		ValidateWLCtl(this, this.form.work_location2, this.form.work_location3, 'errWL', $arrErr.work_location, $arrErr.work_location2, $arrErr.work_location3);
});

$('#key').bind({
	focus: function() {
		showTips('div_key', $arrTip.keyword);
	},
	blur: function() {
		hideTips('div_key');
	}
});

$('input[name="specialization[]"]').bind('change', function(){
	checkChkBoxLimit(this.form.elements['specialization[]'], 5, $arrErr.specialization , $arrErr.specialization, 'errJobSpec', 1, '');
});

$('input[name="position[]"]').bind('change', function() {
	if($('input[name="position[]"]').length == 6)
		checkChkBoxLimit(this.form.elements['position[]'], 6, $arrErr.position, $arrErr.position, 'errPos', 1, '');
	else
		checkChkBoxLimit(this.form.elements['position[]'], 7, $arrErr.position, $arrErr.position, 'errPos', 1, '');
});

$('#knownFrom').bind({
	blur: function() {
		if ($(this).val() == 8)
			$('#dvTellUs').show();
		else
			$('#dvTellUs').hide();
	},
	change: function() {
		ValidateCtl(this, $arrErr.learnt_from, 1, 'errKF');
	}
});

$('#detailKnown').bind('change', function() {
	if ($('#knownFrom').val() == 8)
		ValidateText(this, $arrErr.learnt_from, 'errKFOth');
});;

$('input[name="btnSave"]').bind('click', function() {
	hideOthers(0);
	if($(frmReg.country_code).val() == '170')
	{
		var optFirst = $(frmReg.work_location1).val();
		var optSecond = $(frmReg.work_location2).val();
		var optThird = $(frmReg.work_location3).val();
		var tickOversea = frmReg.overseas_job.checked;
		separateProfile(optFirst,optSecond,optThird, $arrOthers.ph_location, tickOversea);

	}
	onFrmSubmit(document.frmRegistration);
});

$('#salary').keypress(function(evt){
	var charCode = evt.which;
	if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
		return false;

	return true;
});
	
});
function updFrequence(oCtrl, iId, iSsid, msgUpdating, msgFail, msgUnsub, msgDaily, msgWeekly, msgConnect)
{
	sDiv = 'ajaxmsg' + iId;
	var oFreCon = document.getElementById(sDiv);
	//if(oFreCon != null) oFreCon.innerHTML = "Updating...";
	if(oFreCon != null) oFreCon.innerHTML = msgUpdating;

	var iRandom = Math.random();
	var sUrl = dPath + "/my-job/upd-frequence.php?fid="+oCtrl.value+"&sid="+iId+"&rnd="+iRandom+"&x="+iSsid;
	var callbackFb = {};
	callbackFb.success = updFre;
	callbackFb.timeout = 8000; 
	callbackFb.argument = new Array(iId, oCtrl.value, msgUnsub, msgDaily, msgWeekly, msgConnect);
	//Do request
	if(typeof(YAHOO) != 'undefined')
	{
		var request = YAHOO.util.Connect.asyncRequest('GET', sUrl, callbackFb, null);   
	}
	else
	{
		//oFreCon.innerHTML = "Update fail. Please refresh this page and try again.";
		oFreCon.innerHTML = msgFail;
	}
}

function updFre(arg)
{
	iId = arg.argument[0];
	iFid = arg.argument[1];
	mix = arg.responseText;
	iSuccess = false;
	if(mix != undefined) 
	{
		iSuccess = mix.search('success'); 
		if(iSuccess > 0) iSuccess = true;
		else iSuccess = false;
	}
	sDiv = 'ajaxmsg' + iId;
	var oFreCon = document.getElementById(sDiv);
	if(iSuccess)
	{
		//if(iFid == 0){sHtml = "You have unsubscribed email alert.";}
		//else if(iFid == 1){sHtml = "You will receive an email alert daily.";}
		//else if (iFid == 2){sHtml = "You will receive an email alert weekly.";}
        if(iFid == 0){sHtml = arg.argument[2];}
        else if(iFid == 1){sHtml = arg.argument[3];}
        else if (iFid == 2){sHtml = arg.argument[4];}		
		else {sHtml = "Saved";}
	}
	//else sHtml = "Connection fail. Please try again.";
	else sHtml = arg.argument[5];
	if(oFreCon != null) oFreCon.innerHTML = sHtml;		
}

function delBookmarkJob(id, x, msg)
{
	//if(confirm('Are you sure deleting this bookmarked job?'))
	if(confirm(msg))
	{
		document.location.href= "?del=" + id + "&x=" + x;
	}
	return false;
}

function delSavedSearchJob(id, x, p, msg)
{
	//if(confirm('Are you sure to delete this job alert?'))
	if(confirm(msg))
	{
		document.location.href= "?did=" + id + p + "&x=" + x;
	}
	return false;
}

function checkLoginExist(x, lid, sType, msgRegisterB4, msgNotAvail)
{
	if(sType == 'E')
	{
		oDivLi = document.getElementById('login_id');
		if(oDivLi != null && trim(oDivLi.value) != "") return;
	}

	if(trim(lid) == "") 
	{
		return;
	}

	var iRandom = Math.random();
	var sUrl = dPath + '/registration/login-exist.php?x=' + x + '&ac=2&li=' + encodeURIComponent(lid) + "&rnd="+iRandom;

	var callbackFb = {};
	callbackFb.success = updLoginExist;
	callbackFb.timeout = 8000; 
	callbackFb.argument = new Array(sType, msgRegisterB4, msgNotAvail);
	//Do request
	if(typeof(YAHOO) != 'undefined')
	{
		var request = YAHOO.util.Connect.asyncRequest('GET', sUrl, callbackFb, null);   
	}
}

function updLoginExist(arg)
{
	sType = arg.argument[0];
	mix = arg.responseText;	
	if(mix != undefined) 
	{
		var result = mix.split("|");

		sDiv = 'div_register';
		var obj = elId(sDiv);
		if(obj != null) 
		{
			setDivMsg(sDiv, '');
			setObjVisibility(sDiv,'false'); 
		}

		sDiv = 'div_reg_login_id';
        if (result[0] == 0) {
			//Login Exist
			if(sType == 'E')
			{
				//sMsg = "Sorry, this email address has been registered as a Login ID by another user. You can still register with this Email address, but please enter a new login ID below.";
				sMsg = arg.argument[1];
			}
			else
			{
				//sMsg = "This Login ID not available. Please use another one.";
				sMsg = arg.argument[2];
			}			
			
			var oDiv = document.getElementById(sDiv);
			if(oDiv != null) 
			{
				setObjVisibility(sDiv, 'true'); 
				setDivMsg(sDiv, sMsg);	
				setDivClass(sDiv, 'errorReg');
			}				
			oDivLi = document.getElementById('dvLoginId');
			if(oDivLi != null)
			{
				oDivLi.style.display = '';
				document.getElementById('login_id').disabled = false;
				document.getElementById('login_id').focus();				
				document.getElementById('tipEmailDesc').style.display = 'none';
			}
        } 	
		else
		{
			var obj = elId(sDiv);
			if(obj != null) 
			{
				if(obj.className == 'errorReg')
				{
					setDivMsg(sDiv, '');
					setObjVisibility(sDiv,'false'); 
				}
			}

			//if Login ID field is empty, hide it
			if(sType == 'E')
			{
				oDivLi = document.getElementById('login_id');
				if(oDivLi != null && trim(oDivLi.value) == "")
				{
					oDivLi = document.getElementById('dvLoginId');
					if(oDivLi != null)
					{
						document.getElementById('tipEmailDesc').style.display = '';
						document.getElementById('cemail').focus();	
						document.getElementById('login_id').disabled = true;						
						oDivLi.style.display = 'none';
					}					
				}
			}
		}
	}
	
}

function showMoreOpt()
{
	setObjVisibility('optHide', 'true');
	setObjVisibility('optHideCtrl', 'false');
}

function saveSearch(oCtrl, bConfirm, bMode, msgSpec, msgMax, msgOths, msgLoc)
{
	bResult = true;
	//bResult = core_validator.onCheckSubmit(oCtrl);
	if(trim(document.master.subject.value) == "")
	{
		vConfig.form = 'master';
		vConfig.addError('subject', 'ERR_REQUIRED', "");
		core_validator.onHandleErrorByKey('master','subject');
		bResult = false;
	}	

	if(bResult == false)
	{
		saveSearchValidate(oCtrl, 1, msgSpec, msgMax, msgOths, msgLoc);
		document.location.href="#e1";
		return false;
	}
	else
	{ 
		bResult = saveSearchValidate(oCtrl, 1, msgSpec, msgMax, msgOths, msgLoc);
		if(bResult == false) return false;
		
//		if(bConfirm) 
//		{
//			bResult = confirm('Do you wish to preview jobs before create this job alert?\nClick \'Cancel\' to continue create job alert.');		
//			if(bResult)
//			{
//				document.master.mode.value = "preview";
//				document.master.submit();
//				return false;
//			}
//		}
		document.master.submit();
		return true;
	}
}

function saveSearchValidate(oCtrl, bFocus, msgSpec, msgMax, msgOths, msgLoc)
{
	bErr = false;
	oSpe = elName('specialization[]');
	bSpe = false;
	iSpe = 0;
	bOtherSpe = false;
	if(oSpe.length == 0) return true;	
	for(var i=0; i < oSpe.length ; i++) {if(oSpe[i].checked == true) {bSpe = true;iSpe++; if(oSpe[i].value == '116') bOtherSpe=true; }}

	oKey = elId('key');
	bKey = false;
	if(oKey != null) if(trim(oKey.value) != "") bKey = true;
		
	oLoc = elName('location[]');
	bLoc = false;
	for(var i=0; i < oLoc.length ; i++) {if(oLoc[i].checked == true) {bLoc = true;break;}}

	sDiv = 'div_mandatory';
	if(bSpe == false &&  bKey == false )
	{
		//Error Found
		//sMsg = "Please provide your specialization or keyword!";
		sMsg = msgSpec;
		var oDiv = document.getElementById(sDiv);
		if(oDiv != null) 
		{
			setObjVisibility(sDiv, 'true'); 
			setDivMsg(sDiv, sMsg);	
			setDivClass(sDiv, 'errorReg');
		}
		if(bFocus == 1) document.location.href="#e1";
		bErr = true;
	}
	else if(iSpe>5 && bErr == false) 
	{
		setObjVisibility(sDiv, 'true'); 
		//setDivMsg(sDiv, 'Please select maximum 5 specializations only.');	
		setDivMsg(sDiv, msgMax);
		setDivClass(sDiv, 'errorReg');
		if(bFocus == 1) document.location.href="#e1";
		bErr = true;
	}
	else
	{
		var obj = elId(sDiv);
		if(obj != null) 
		{
			if(obj.className == 'errorReg')
			{
				setDivMsg(sDiv, '');
				setObjVisibility(sDiv,'false'); 
			}
		}
	}	
	
	if(bOtherSpe && bKey == false)
	{
		setObjVisibility('div_key', 'true'); 
		//setDivMsg('div_key', "You have select 'Others' as your specialization. Please tell us more by providing keyword.");	
		setDivMsg('div_key', msgOths);
		setDivClass('div_key', 'errorReg');
		if(bFocus == 1) document.location.href="#e1";
		bErr = true;
	}
	else
	{
		var obj = elId('div_key');
		if(obj != null) 
		{
			if(obj.className == 'errorReg')
			{
				setDivMsg('div_key', '');
				setObjVisibility('div_key','false'); 
			}
		}
	}

	if(bLoc == false)
	{
		setObjVisibility('div_loc', 'true'); 
		//setDivMsg('div_loc', "Please provide your location!");	
		setDivMsg('div_loc', msgLoc);
		setDivClass('div_loc', 'errorReg');
		if(bFocus == 1) document.location.href="#e1";
		bErr = true;
	}
	else
	{
		var obj = elId('div_loc');
		if(obj != null) 
		{
			if(obj.className == 'errorReg')
			{
				setDivMsg('div_loc', '');
				setObjVisibility('div_loc','false'); 
			}
		}
	}

	if(bErr == true) return false;
	return true;
}

function showTips(sId, sMsg)
{
	var obj = elId(sId);
	if(obj != null) 
	{
		if(obj.className == 'errorReg') return;
		setObjVisibility(sId,'true'); 
		setDivClass(sId, 'overlay');	
		obj.innerHTML = sMsg;
	}
}


function hideTips(sId)
{
	var obj = elId(sId);
	if(obj != null) 
	{
		if(obj.className == 'errorReg') return;
		setObjVisibility(sId,'false');
		setDivClass(sId, '');
		obj.innerHTML = "";
	}
}

function toggleAllOverseas(oCtrl, sLoc)
{
	if (oCtrl.checked == true) checkAllLoc(0,1, sLoc);
	else uncheckAllLoc(0,1, sLoc);
}

function clearLocation()
{
	uncheckAllLoc(1,1);
	oCtrl = elId('cbAllOverseas');
	if(oCtrl != null) oCtrl.checked = false;
}

function updateThisExternal(oCtrl)
{
	sName = oCtrl.name;
	sName = sName.replace("[]","");
	if(sName == 'specialization')
	{
		if(typeof(bSpeCheckMax) == 'undefined') bSpeCheckMax = false;
		if(bSpeCheckMax)
		{
			if(typeof(sSpeErrDiv) == 'undefined') sSpeErrDiv = 'div_mandatory';
			if(typeof(sSpeLabel) == 'undefined') sSpeLabel = 'Specialization';
			ctrlMaxSel(oCtrl, sSpeErrDiv, sSpeLabel, bSpeCheckMax);
		}
	}
	
	if(sName == 'location')
	{
		isAllCountryCheck();
	}
}

//This is customize function
function updateThisDetail(oCtrl)
{	
	if(typeof(updateThisExternal) == 'function') updateThisExternal(oCtrl);
}

function isAllCountryCheck()
{	
	//check All overseas location flag, hard code
	oAllOvsCtrl = getEl('cbAllOverseas');
	if(oAllOvsCtrl != null)
	{
		bAllOvsCheck = true;
		if(typeof(sCountryLocation) == 'undefined') sCountryLocation = "";
		if(bAllOvsCheck && getEl('location10000').checked == false && sCountryLocation != '10000') bAllOvsCheck = false;
		if(bAllOvsCheck && getEl('location20000').checked == false && sCountryLocation != '20000') bAllOvsCheck = false;
		if(bAllOvsCheck && getEl('location30000').checked == false && sCountryLocation != '30000') bAllOvsCheck = false;
		if(bAllOvsCheck && getEl('location40000').checked == false && sCountryLocation != '40000') bAllOvsCheck = false;
		if(bAllOvsCheck && getEl('location50000').checked == false && sCountryLocation != '50000') bAllOvsCheck = false;
		if(bAllOvsCheck && getEl('location60000').checked == false && sCountryLocation != '60000') bAllOvsCheck = false;
		if(bAllOvsCheck && getEl('location70000').checked == false && sCountryLocation != '70000') bAllOvsCheck = false;
		if(bAllOvsCheck && getEl('location80000').checked == false && sCountryLocation != '80000') bAllOvsCheck = false;
		if(bAllOvsCheck && getEl('location100000').checked == false && sCountryLocation != '100000') bAllOvsCheck = false;
		if(bAllOvsCheck && getEl('location110000').checked == false && sCountryLocation != '110000') bAllOvsCheck = false;
		if(bAllOvsCheck && getEl('location120000').checked == false && sCountryLocation != '120000') bAllOvsCheck = false;
		if(bAllOvsCheck && getEl('location150000').checked == false && sCountryLocation != '150000') bAllOvsCheck = false;
		if(bAllOvsCheck && getEl('location90100').checked == false && sCountryLocation != '90100') bAllOvsCheck = false;
		oAllOvsCtrl.checked = bAllOvsCheck;
	}
}
﻿
var ctryVn190 = new Array(); ctryVn190[0] = "('Singapore', '117', '')"; 
var ctryVn150 = new Array(); ctryVn150[0] = "('- Select State -', '00', '')"; ctryVn150[1] = "('Johor','56','')"; ctryVn150[2] = "('Kedah','69','')"; ctryVn150[3] = "('Kuala Lumpur','70','')"; ctryVn150[4] = "('Kelantan','73','')"; ctryVn150[5] = "('Melaka','85','')"; ctryVn150[6] = "('Negeri Sembilan','95','')"; ctryVn150[7] = "('Penang','100','')"; ctryVn150[8] = "('Pahang','101','')"; ctryVn150[9] = "('Perak','102','')"; ctryVn150[10] = "('Perlis','104','')"; ctryVn150[11] = "('Putrajaya','232','')"; ctryVn150[12] = "('Sabah','112','')"; ctryVn150[13] = "('Selangor','122','')"; ctryVn150[14] = "('Sarawak','127','')"; ctryVn150[15] = "('Terengganu','136','')"; ctryVn150[16] = "('Labuan','77','')"; 
var ctryVn170 = new Array(); ctryVn170[0] = "('- Select State -', '00', '')"; ctryVn170[1] = "('Armm','5','')"; ctryVn170[2] = "('Bicol Region','15','')"; ctryVn170[3] = "('C.A.R','17','')"; ctryVn170[4] = "('Cagayan Valley','18','')"; ctryVn170[5] = "('Calabarzon & Mimaropa','126','')"; ctryVn170[6] = "('Central Luzon','21','')"; ctryVn170[7] = "('Caraga','25','')"; ctryVn170[8] = "('Central Visayas','27','')"; ctryVn170[9] = "('Davao','123','')"; ctryVn170[10] = "('Eastern Visayas','32','')"; ctryVn170[11] = "('Ilocos Region','53','')"; ctryVn170[12] = "('National Capital Reg','91','')"; ctryVn170[13] = "('Northern Mindanao','93','')"; ctryVn170[14] = "('Soccsksargen','22','')"; ctryVn170[15] = "('Western Visayas','149','')"; ctryVn170[16] = "('Zamboanga','148','')"; 
var ctryVn97 = new Array(); ctryVn97[0] = "('- Select State -', '00', '')"; ctryVn97[1] = "('Aceh','1','')"; ctryVn97[2] = "('Bali','9','')"; ctryVn97[3] = "('Bangka Belitung','10','')"; ctryVn97[4] = "('Banten','14','')"; ctryVn97[5] = "('Bengkulu','11','')"; ctryVn97[6] = "('Gorontalo','37','')"; ctryVn97[7] = "('Jakarta Raya','54','')"; ctryVn97[8] = "('Jambi','55','')"; ctryVn97[9] = "('Jawa Barat','61','')"; ctryVn97[10] = "('Jawa Tengah','62','')"; ctryVn97[11] = "('Jawa Timur','64','')"; ctryVn97[12] = "('Kalimantan Barat','67','')"; ctryVn97[13] = "('Kalimantan Selatan','72','')"; ctryVn97[14] = "('Kalimantan Tengah','74','')"; ctryVn97[15] = "('Kalimantan Timur','75','')"; ctryVn97[16] = "('Kepulauan Riau','233','')"; ctryVn97[17] = "('Lampung','79','')"; ctryVn97[18] = "('Maluku','86','')"; ctryVn97[19] = "('Maluku Utara','84','')"; ctryVn97[20] = "('Nusa Tenggara Barat','90','')"; ctryVn97[21] = "('Nusa Tenggara Timur','96','')"; ctryVn97[22] = "('Papua','52','')"; ctryVn97[23] = "('Papua Barat','234','')"; ctryVn97[24] = "('Riau','110','')"; ctryVn97[25] = "('Sulawesi Barat','235','')"; ctryVn97[26] = "('Sulawesi Selatan','115','')"; ctryVn97[27] = "('Sulawesi Tengah','116','')"; ctryVn97[28] = "('Sulawesi Tenggara','118','')"; ctryVn97[29] = "('Sulawesi Utara','120','')"; ctryVn97[30] = "('Sumatera Barat','121','')"; ctryVn97[31] = "('Sumatera Selatan','124','')"; ctryVn97[32] = "('Sumatera Utara','125','')"; ctryVn97[33] = "('Yogyakarta','152','')"; 
var ctryVn208 = new Array(); ctryVn208[0] = "('- Select State -', '00', '')"; ctryVn208[1] = "('Bangkok - Bang Bon','193:80801:Bang Bon:','')"; ctryVn208[2] = "('Bangkok - Bang Kapi','193:80802:Bang Kapi:','')"; ctryVn208[3] = "('Bangkok - Bang Khae','193:80803:Bang Khae:','')"; ctryVn208[4] = "('Bangkok - Bang Khen','193:80804:Bang Khen:','')"; ctryVn208[5] = "('Bangkok - Bang Kho Laem','193:80805:Bang Kho Laem:','')"; ctryVn208[6] = "('Bangkok - Bang Khun Thian','193:80806:Bang Khun Thian:','')"; ctryVn208[7] = "('Bangkok - Bang Na','193:80807:Bang Na:','')"; ctryVn208[8] = "('Bangkok - Bang Phlad','193:80808:Bang Phlad:','')"; ctryVn208[9] = "('Bangkok - Bang Rak','193:80809:Bang Rak:','')"; ctryVn208[10] = "('Bangkok - Bang Sue','193:80810:Bang Sue:','')"; ctryVn208[11] = "('Bangkok - Bangkok Noi','193:80811:Bangkok Noi:','')"; ctryVn208[12] = "('Bangkok - Bangkok Yai','193:80812:Bangkok Yai:','')"; ctryVn208[13] = "('Bangkok - Bung Kum','193:80813:Bung Kum:','')"; ctryVn208[14] = "('Bangkok - Chatuchak','193:80814:Chatuchak:','')"; ctryVn208[15] = "('Bangkok - Chom Thong','193:80815:Chom Thong:','')"; ctryVn208[16] = "('Bangkok - Din Daeng','193:80816:Din Daeng:','')"; ctryVn208[17] = "('Bangkok - Don Muang','193:80817:Don Muang:','')"; ctryVn208[18] = "('Bangkok - Dusit','193:80818:Dusit:','')"; ctryVn208[19] = "('Bangkok - Huai Khwang','193:80819:Huai Khwang:','')"; ctryVn208[20] = "('Bangkok - Kan Na Yao','193:80820:Kan Na Yao:','')"; ctryVn208[21] = "('Bangkok - Khlong Sam Wa','193:80821:Khlong Sam Wa:','')"; ctryVn208[22] = "('Bangkok - Khlong San','193:80822:Khlong San:','')"; ctryVn208[23] = "('Bangkok - Khlong Toei','193:80823:Khlong Toei:','')"; ctryVn208[24] = "('Bangkok - Lad Krabang','193:80824:Lad Krabang:','')"; ctryVn208[25] = "('Bangkok - Lad Phrao','193:80825:Lad Phrao:','')"; ctryVn208[26] = "('Bangkok - Lak Si','193:80826:Lak Si:','')"; ctryVn208[27] = "('Bangkok - Min Buri','193:80827:Min Buri:','')"; ctryVn208[28] = "('Bangkok - Nong Chok','193:80828:Nong Chok:','')"; ctryVn208[29] = "('Bangkok - Nong Khaem','193:80829:Nong Khaem:','')"; ctryVn208[30] = "('Bangkok - Pathum Wan','193:80830:Pathum Wan:','')"; ctryVn208[31] = "('Bangkok - Phasi Charoen','193:80831:Phasi Charoen:','')"; ctryVn208[32] = "('Bangkok - Phaya Thai','193:80832:Phaya Thai:','')"; ctryVn208[33] = "('Bangkok - Phra Kanong','193:80833:Phra Kanong:','')"; ctryVn208[34] = "('Bangkok - Phra Nakhon','193:80834:Phra Nakhon:','')"; ctryVn208[35] = "('Bangkok - Pom Prap Sattru Phai','193:80835:Pom Prap Sattru Phai:','')"; ctryVn208[36] = "('Bangkok - Pravet','193:80836:Pravet:','')"; ctryVn208[37] = "('Bangkok - Rat Burana','193:80837:Rat Burana:','')"; ctryVn208[38] = "('Bangkok - Ratchatewi','193:80838:Ratchatewi:','')"; ctryVn208[39] = "('Bangkok - Sai Mai','193:80839:Sai Mai:','')"; ctryVn208[40] = "('Bangkok - Samphantawong','193:80840:Samphantawong:','')"; ctryVn208[41] = "('Bangkok - Saphan Sung','193:80841:Saphan Sung:','')"; ctryVn208[42] = "('Bangkok - Sathon','193:80842:Sathon:','')"; ctryVn208[43] = "('Bangkok - Suan Luang','193:80843:Suan Luang:','')"; ctryVn208[44] = "('Bangkok - Taling Chan','193:80844:Taling Chan:','')"; ctryVn208[45] = "('Bangkok - Thawi Watthana','193:80845:Thawi Watthana:','')"; ctryVn208[46] = "('Bangkok - Thon Buri','193:80846:Thon Buri:','')"; ctryVn208[47] = "('Bangkok - Thung Khru','193:80847:Thung Khru:','')"; ctryVn208[48] = "('Bangkok - Vadhana','193:80848:Vadhana:','')"; ctryVn208[49] = "('Bangkok - Wang Thonglang','193:80849:Wang Thonglang:','')"; ctryVn208[50] = "('Bangkok - Yan Nawa','193:80850:Yan Nawa:','')"; ctryVn208[51] = "('Nonthaburi - Bang Bua Thong','200:84001:Bang Bua Thong:','')"; ctryVn208[52] = "('Nonthaburi - Bang Kruai','200:84002:Bang Kruai:','')"; ctryVn208[53] = "('Nonthaburi - Bang Yai','200:84003:Bang Yai:','')"; ctryVn208[54] = "('Nonthaburi - Mueang Nonthaburi','200:84004:Mueang Nonthaburi:','')"; ctryVn208[55] = "('Nonthaburi - Pak Kret','200:84005:Pak Kret:','')"; ctryVn208[56] = "('Nonthaburi - Sai Noi','200:84006:Sai Noi:','')"; ctryVn208[57] = "('Samut Prakan - Bang Bo','208:86101:Bang Bo:','')"; ctryVn208[58] = "('Samut Prakan - Bang Phli','208:86102:Bang Phli:','')"; ctryVn208[59] = "('Samut Prakan - Bang Sao Thong','208:86103:Bang Sao Thong:','')"; ctryVn208[60] = "('Samut Prakan - Mueang Samut Prakan','208:86104:Mueang Samut Prakan:','')"; ctryVn208[61] = "('Samut Prakan - Phra Pradaeng','208:86105:Phra Pradaeng:','')"; ctryVn208[62] = "('Samut Prakan - Phra Samut Chedi','208:86106:Phra Samut Chedi:','')"; ctryVn208[63] = "('All jobs in Pathum Thani','201:84100:','')"; ctryVn208[64] = "('Pathum Thani - Khlong Luang','201:84101:Khlong Luang:','')"; ctryVn208[65] = "('Pathum Thani - Lam Luk Ka','201:84102:Lam Luk Ka:','')"; ctryVn208[66] = "('Pathum Thani - Lat Lum Kaeo','201:84103:Lat Lum Kaeo:','')"; ctryVn208[67] = "('Pathum Thani - Mueang Pathum Thani','201:84104:Mueang Pathum Thani:','')"; ctryVn208[68] = "('Pathum Thani - Nong Suea','201:84105:Nong Suea:','')"; ctryVn208[69] = "('Pathum Thani - Sam Khok','201:84106:Sam Khok:','')"; ctryVn208[70] = "('Pathum Thani - Thanyaburi','201:84107:Thanyaburi:','')"; ctryVn208[71] = "('Ang Thong','192:80700:','')"; ctryVn208[72] = "('Buri Ram','174:80900:','')"; ctryVn208[73] = "('Cha Choeng Sao','194:81000:','')"; ctryVn208[74] = "('Chai Nat','195:81100:','')"; ctryVn208[75] = "('Chaiyaphum','175:81200:','')"; ctryVn208[76] = "('Chanthaburi','214:81300:','')"; ctryVn208[77] = "('Chiang Mai','156:81400:','')"; ctryVn208[78] = "('Chiang Rai','157:81500:','')"; ctryVn208[79] = "('Chon Buri','215:81600:','')"; ctryVn208[80] = "('Chumphon','218:81700:','')"; ctryVn208[81] = "('Kalasin','176:81800:','')"; ctryVn208[82] = "('Kamphaeng Phet','158:81900:','')"; ctryVn208[83] = "('Kanchanaburi','196:82000:','')"; ctryVn208[84] = "('Khon Kaen','177:82100:','')"; ctryVn208[85] = "('Krabi','219:82200:','')"; ctryVn208[86] = "('Lampang','159:82300:','')"; ctryVn208[87] = "('Lamphun','160:82400:','')"; ctryVn208[88] = "('Loei','178:82500:','')"; ctryVn208[89] = "('Lop Buri','197:82600:','')"; ctryVn208[90] = "('Mae Hong Son','161:82700:','')"; ctryVn208[91] = "('Maha Sarakham','179:82800:','')"; ctryVn208[92] = "('Mukdahan','180:82900:','')"; ctryVn208[93] = "('Nakhon Nayok','198:83000:','')"; ctryVn208[94] = "('Nakhon Phanom','181:83200:','')"; ctryVn208[95] = "('Nakhon Ratchasima','182:83300:','')"; ctryVn208[96] = "('Nakhon Pathom','199:83100:','')"; ctryVn208[97] = "('Nakhon Sawan','162:83400:','')"; ctryVn208[98] = "('Nakhon Si Thammarat','220:83500:','')"; ctryVn208[99] = "('Nan','163:83600:','')"; ctryVn208[100] = "('Narathiwat','221:83700:','')"; ctryVn208[101] = "('Nongbua Lumphoo','183:83800:','')"; ctryVn208[102] = "('Nong Khai','184:83900:','')"; ctryVn208[103] = "('Pattani','222:84200:','')"; ctryVn208[104] = "('Phang Nga','223:84300:','')"; ctryVn208[105] = "('Phatthalung','224:84400:','')"; ctryVn208[106] = "('Phayao','164:84500:','')"; ctryVn208[107] = "('Phetchabun','165:84600:','')"; ctryVn208[108] = "('Phetchaburi','202:84700:','')"; ctryVn208[109] = "('Phichit','166:84800:','')"; ctryVn208[110] = "('Phitsanulok','167:84900:','')"; ctryVn208[111] = "('Phra Nakhon Si Ayuttaya','203:85000:','')"; ctryVn208[112] = "('Phrae','168:85100:','')"; ctryVn208[113] = "('Phuket','225:85200:','')"; ctryVn208[114] = "('Prachin Buri','204:85300:','')"; ctryVn208[115] = "('Prachuap Khiri Khan','205:85400:','')"; ctryVn208[116] = "('Ranong','226:85500:','')"; ctryVn208[117] = "('Ratchaburi','206:85600:','')"; ctryVn208[118] = "('Rayong','216:85700:','')"; ctryVn208[119] = "('Roi Et','185:85800:','')"; ctryVn208[120] = "('Sa Kaew','207:85900:','')"; ctryVn208[121] = "('Sakon Nakhon','186:86000:','')"; ctryVn208[122] = "('Samut Sakhon','209:86200:','')"; ctryVn208[123] = "('Samut Songkhram','210:86300:','')"; ctryVn208[124] = "('Saraburi','211:86400:','')"; ctryVn208[125] = "('Satun','227:86500:','')"; ctryVn208[126] = "('Si Sa Ket','187:86600:','')"; ctryVn208[127] = "('Sing Buri','212:86700:','')"; ctryVn208[128] = "('Song Khla','228:86800:','')"; ctryVn208[129] = "('Sukhothai','169:86900:','')"; ctryVn208[130] = "('Suphan Buri','213:87000:','')"; ctryVn208[131] = "('Surat Thani','229:87100:','')"; ctryVn208[132] = "('Surin','188:87200:','')"; ctryVn208[133] = "('Tak','170:87300:','')"; ctryVn208[134] = "('Trang','230:87400:','')"; ctryVn208[135] = "('Trat','217:87500:','')"; ctryVn208[136] = "('Ubon Ratchathani','189:87600:','')"; ctryVn208[137] = "('Udon Thani','190:87700:','')"; ctryVn208[138] = "('Umnad Chareun','173:80600:','')"; ctryVn208[139] = "('Uthai Thani','171:87800:','')"; ctryVn208[140] = "('Uttaradit','172:87900:','')"; ctryVn208[141] = "('Yala','231:88000:','')"; ctryVn208[142] = "('Yasothon','191:88100:','')"; 
var ctryVn231 = new Array(); ctryVn231[0] = "('- Chọn Tỉnh -', '00', '')"; ctryVn231[1] = "('An Giang','241','')"; ctryVn231[2] = "('Bà Rịa - Vũng Tàu','242','')"; ctryVn231[3] = "('Bắc Cạn','243','')"; ctryVn231[4] = "('Bắc Giang','244','')"; ctryVn231[5] = "('Bạc Liêu','245','')"; ctryVn231[6] = "('Bắc Ninh','246','')"; ctryVn231[7] = "('Bến Tre','247','')"; ctryVn231[8] = "('Biên Hòa','303','')"; ctryVn231[9] = "('Bình Định','248','')"; ctryVn231[10] = "('Bình Dương','249','')"; ctryVn231[11] = "('Bình Phước','250','')"; ctryVn231[12] = "('Bình Thuận','251','')"; ctryVn231[13] = "('Cà Mau','252','')"; ctryVn231[14] = "('Cần Thơ','253','')"; ctryVn231[15] = "('Cao Bằng','254','')"; ctryVn231[16] = "('Đà Nẵng','255','')"; ctryVn231[17] = "('Đắc Lắc','256','')"; ctryVn231[18] = "('Điện Biên','304','')"; ctryVn231[19] = "('Đồng Nai','257','')"; ctryVn231[20] = "('Đồng Tháp','258','')"; ctryVn231[21] = "('Gia Lai','259','')"; ctryVn231[22] = "('Hà Giang','260','')"; ctryVn231[23] = "('Hà Nam','261','')"; ctryVn231[24] = "('Hà Nội','262','')"; ctryVn231[25] = "('Hà Tây','263','')"; ctryVn231[26] = "('Hà Tĩnh','264','')"; ctryVn231[27] = "('Hải Dương','265','')"; ctryVn231[28] = "('Hải Phòng','266','')"; ctryVn231[29] = "('Hồ Chí Minh','267','')"; ctryVn231[30] = "('Hòa Bình','268','')"; ctryVn231[31] = "('Huế','305','')"; ctryVn231[32] = "('Hưng Yên','269','')"; ctryVn231[33] = "('Khánh Hòa','270','')"; ctryVn231[34] = "('Kiên Giang','271','')"; ctryVn231[35] = "('Kon Tum','272','')"; ctryVn231[36] = "('Lai Châu','273','')"; ctryVn231[37] = "('Lâm Đồng','274','')"; ctryVn231[38] = "('Lạng Sơn','275','')"; ctryVn231[39] = "('Lào Cai','276','')"; ctryVn231[40] = "('Long An','277','')"; ctryVn231[41] = "('Nam Định','278','')"; ctryVn231[42] = "('Nghệ An','279','')"; ctryVn231[43] = "('Ninh Bình','280','')"; ctryVn231[44] = "('Ninh Thuận','281','')"; ctryVn231[45] = "('Phú Thọ','282','')"; ctryVn231[46] = "('Phú Yên','283','')"; ctryVn231[47] = "('Quảng Bình','284','')"; ctryVn231[48] = "('Quảng Nam','285','')"; ctryVn231[49] = "('Quảng Ngãi','286','')"; ctryVn231[50] = "('Quảng Ninh','287','')"; ctryVn231[51] = "('Quảng Trị','288','')"; ctryVn231[52] = "('Sóc Trăng','289','')"; ctryVn231[53] = "('Sơn La','290','')"; ctryVn231[54] = "('Tây Ninh','291','')"; ctryVn231[55] = "('Thái Bình','292','')"; ctryVn231[56] = "('Thái Nguyên','293','')"; ctryVn231[57] = "('Thanh Hóa','294','')"; ctryVn231[58] = "('Thừa Thiên Huế','295','')"; ctryVn231[59] = "('Tiền Giang','296','')"; ctryVn231[60] = "('Trà Vinh','297','')"; ctryVn231[61] = "('Tuyên Quang','298','')"; ctryVn231[62] = "('Vĩnh Long','299','')"; ctryVn231[63] = "('Vĩnh Phúc','300','')"; ctryVn231[64] = "('Vũng Tàu','306','')"; ctryVn231[65] = "('Yên Bái','301','')"; ctryVn231[66] = "('Khác','302','')"; 
var ctryVn100 = new Array(); ctryVn100[0] = "('- Select State -', '00', '')"; ctryVn100[1] = "('Andaman & Nicobar','3:40100:','')"; ctryVn100[2] = "('Andhra Pradesh - Anantapur','4:40205:Anantapur:','')"; ctryVn100[3] = "('Andhra Pradesh - Guntakal','4:40206:Guntakal:','')"; ctryVn100[4] = "('Andhra Pradesh - Guntur','4:40207:Guntur:','')"; ctryVn100[5] = "('Andhra Pradesh - Hyderabad','4:40210:Hyderabad:','')"; ctryVn100[6] = "('Andhra Pradesh - Secunderabad','4:40210:Secunderabad:','')"; ;ctryVn100[7] = "('Andhra Pradesh - Kakinada','4:40211:Kakinada:','')"; ctryVn100[8] = "('Andhra Pradesh - Kurnool','4:40212:Kurnool:','')"; ctryVn100[9] = "('Andhra Pradesh - Nellore','4:40213:Nellore:','')"; ctryVn100[10] = "('Andhra Pradesh - Nizamabad','4:40214:Nizamabad:','')"; ctryVn100[11] = "('Andhra Pradesh - Rajahmundry','4:40215:Rajahmundry:','')"; ctryVn100[12] = "('Andhra Pradesh - Tirupati','4:40216:Tirupati:','')"; ctryVn100[13] = "('Andhra Pradesh - Visakhapatnam','4:40220:Visakhapatnam:','')"; ctryVn100[14] = "('Andhra Pradesh - Vijayawada','4:40230:Vijayawada:','')"; ctryVn100[15] = "('Andhra Pradesh - Warangal','4:40231:Warangal:','')"; ctryVn100[16] = "('Andhra Pradesh - Other cities','4:40299:','')"; ctryVn100[17] = "('Assam - Gauhati','6:40310:Gauhati:','')"; ctryVn100[18] = "('Assam - Silchar','6:40320:Silchar:','')"; ctryVn100[19] = "('Assam - Other cities','6:40399:','')"; ctryVn100[20] = "('Arunachal Pradesh - Itanagar','8:40410:Itanagar:','')"; ctryVn100[21] = "('Arunachal Pradesh - Other cities','8:40499:','')"; ctryVn100[22] = "('Bihar - Bahgalpur','12:40505:Bahgalpur:','')"; ctryVn100[23] = "('Bihar - Patna','12:40510:Patna:','')"; ctryVn100[24] = "('Bihar - Other cities','12:40599:','')"; ctryVn100[25] = "('Chandigarh','19:40600:','')"; ctryVn100[26] = "('Daman & Diu','28:40700:','')"; ctryVn100[27] = "('Delhi - Delhi','29:40800:Delhi:','')"; ctryVn100[28] = "('Delhi - Faridabad','29:40800:Faridabad:','')"; ctryVn100[29] = "('Delhi - Ghaziabad','29:40800:Ghaziabad:','')"; ctryVn100[30] = "('Delhi - Gurgoan','29:40800:Gurgoan:','')"; ctryVn100[31] = "('Delhi - Noida','29:40800:Noida:','')"; ctryVn100[32] = "('Dadra & Nagar Haveli','31:40900:','')"; ctryVn100[33] = "('Goa - Panjim / Panaji','36:41010:Panjim / Panaji:','')"; ctryVn100[34] = "('Goa - Vasco Da Gama','36:41020:Vasco Da Gama:','')"; ctryVn100[35] = "('Goa - Other','36:41099:','')"; ctryVn100[36] = "('Gujarat - Ahmedabad','39:41110:Ahmedabad:','')"; ctryVn100[37] = "('Gujarat - Anand','39:41111:Anand:','')"; ctryVn100[38] = "('Gujarat - Ankleshwar','39:41112:Ankleshwar:','')"; ctryVn100[39] = "('Gujarat - Bharuch','39:41113:Bharuch:','')"; ctryVn100[40] = "('Gujarat - Bhavnagar','39:41114:Bhavnagar:','')"; ctryVn100[41] = "('Gujarat - Bhuj','39:41115:Bhuj:','')"; ctryVn100[42] = "('Gujarat - Gandhinagar','39:41116:Gandhinagar:','')"; ctryVn100[43] = "('Gujarat - Gir','39:41117:Gir:','')"; ctryVn100[44] = "('Gujarat - Jamnagar','39:41118:Jamnagar:','')"; ctryVn100[45] = "('Gujarat - Kandla','39:41119:Kandla:','')"; ctryVn100[46] = "('Gujarat - Porbandar','39:41121:Porbandar:','')"; ctryVn100[47] = "('Gujarat - Rajkot','39:41122:Rajkot:','')"; ctryVn100[48] = "('Gujarat - Surat','39:41123:Surat:','')"; ctryVn100[49] = "('Gujarat - Vadodara','39:41120:Vadodara:','')"; ctryVn100[50] = "('Gujarat - Valsad','39:41124:Valsad:','')"; ctryVn100[51] = "('Gujarat - Vapi','39:41125:Vapi:','')"; ctryVn100[52] = "('Gujarat - Other cities','39:41199:','')"; ctryVn100[53] = "('Haryana - Ambala','42:41201:Ambala:','')"; ctryVn100[54] = "('Haryana - Faridabad','42:41202:Faridabad:','')"; ctryVn100[55] = "('Haryana - Gurgaon','42:41203:Gurgaon:','')"; ctryVn100[56] = "('Haryana - Hisar','42:41204:Hisar:','')"; ctryVn100[57] = "('Haryana - Karnal','42:41205:Karnal:','')"; ctryVn100[58] = "('Haryana - Kurukshetra','42:41206:Kurukshetra:','')"; ctryVn100[59] = "('Haryana - Panipat','42:41210:Panipat:','')"; ctryVn100[60] = "('Haryana - Rohtak','42:41211:Rohtak:','')"; ctryVn100[61] = "('Haryana - Other cities','42:41299:','')"; ctryVn100[62] = "('Himachal Pradesh - Dalhousie','49:41301:Dalhousie:','')"; ctryVn100[63] = "('Himachal Pradesh - Dharmasala','49:41302:Dharmasala:','')"; ctryVn100[64] = "('Himachal Pradesh - Kulu / Manali','49:41303:Kulu / Manali:','')"; ctryVn100[65] = "('Himachal Pradesh - Shimla','49:41304:Shimla:','')"; ctryVn100[66] = "('Himachal Pradesh - Other cities','49:41399:','')"; ctryVn100[67] = "('Jammu & Kashmir - Jammu','57:41401:Jammu:','')"; ctryVn100[68] = "('Jammu & Kashmir - Srinagar','57:41402:Srinagar:','')"; ctryVn100[69] = "('Jammu & Kashmir - Other cities','57:41403:','')"; ctryVn100[70] = "('Karnataka - Bangalore','66:41510:Bangalore:','')"; ctryVn100[71] = "('Karnataka - Belgaum','66:41511:Belgaum:','')"; ctryVn100[72] = "('Karnataka - Bellary','66:41512:Bellary:','')"; ctryVn100[73] = "('Karnataka - Bidar','66:41513:Bidar:','')"; ctryVn100[74] = "('Karnataka - Dharwad','66:41514:Dharwad:','')"; ctryVn100[75] = "('Karnataka - Gulbarga','66:41515:Gulbarga:','')"; ctryVn100[76] = "('Karnataka - Hubli','66:41516:Hubli:','')"; ctryVn100[77] = "('Karnataka - Kolar','66:41517:Kolar:','')"; ctryVn100[78] = "('Karnataka - Mysore','66:41520:Mysore:','')"; ctryVn100[79] = "('Karnataka - Mangalore','66:41530:Mangalore:','')"; ctryVn100[80] = "('Karnataka - Other cities','66:41599:','')"; ctryVn100[81] = "('Kerala - Calicut','68:41601:Calicut:','')"; ctryVn100[82] = "('Kerala - Cochin','68:41610:Cochin:','')"; ctryVn100[83] = "('Kerala - Ernakulam','68:41611:Ernakulam:','')"; ctryVn100[84] = "('Kerala - Kannur','68:41612:Kannur:','')"; ctryVn100[85] = "('Kerala - Kochi','68:41613:Kochi:','')"; ctryVn100[86] = "('Kerala - Kollam','68:41614:Kollam:','')"; ctryVn100[87] = "('Kerala - Kottayam','68:41615:Kottayam:','')"; ctryVn100[88] = "('Kerala - Kozhikode','68:41616:Kozhikode:','')"; ctryVn100[89] = "('Kerala - Palakkad','68:41617:Palakkad:','')"; ctryVn100[90] = "('Kerala - Palghat','68:41618:Palghat:','')"; ctryVn100[91] = "('Kerala - Thrissur','68:41619:Thrissur:','')"; ctryVn100[92] = "('Kerala - Trivandrum','68:41620:Trivandrum:','')"; ctryVn100[93] = "('Kerala - Other cities','68:41699:','')"; ctryVn100[94] = "('Lakshadweep','76:41700:','')"; ctryVn100[95] = "('Maharashtra - Ahmednagar','80:41801:Ahmednagar:','')"; ctryVn100[96] = "('Maharashtra - Aurangabad','80:41810:Aurangabad:','')"; ctryVn100[97] = "('Maharashtra - Jalgaon','80:41811:Jalgaon:','')"; ctryVn100[98] = "('Maharashtra - Kolhapur','80:41812:Kolhapur:','')"; ctryVn100[99] = "('Maharashtra - Mumbai','80:41820:Mumbai:','')"; ctryVn100[100] = "('Maharashtra - Mumbai Suburbs','80:41821:Maharashtra - Mumbai Suburbs:','')"; ctryVn100[101] = "('Maharashtra - Nagpur','80:41830:Nagpur:','')"; ctryVn100[102] = "('Maharashtra - Nashik','80:41840:Nashik:','')"; ctryVn100[103] = "('Maharashtra - Navi Mumbai','80:41841:Navi Mumbai:','')"; ctryVn100[104] = "('Maharashtra - Pune','80:41850:Pune:','')"; ctryVn100[105] = "('Maharashtra - Solapur','80:41860:Solapur:','')"; ctryVn100[106] = "('Maharashtra - Thane','80:41870:Thane:','')"; ctryVn100[107] = "('Maharashtra - Other cities','80:41899:','')"; ctryVn100[108] = "('Meghalaya - Shillong','82:41910:Shillong:','')"; ctryVn100[109] = "('Meghalaya - Other cities','82:41999:','')"; ctryVn100[110] = "('Mizoram - Aizawal','83:42010:Aizawal:','')"; ctryVn100[111] = "('Mizoram - Other cities','83:42099:','')"; ctryVn100[112] = "('Manipur - Imphal','87:42110:Imphal:','')"; ctryVn100[113] = "('Manipur - Other cities','87:42199:','')"; ctryVn100[114] = "('Madhya Pradesh - Bhopal','88:42210:Bhopal:','')"; ctryVn100[115] = "('Madhya Pradesh - Gwalior','88:42215:Gwalior:','')"; ctryVn100[116] = "('Madhya Pradesh - Indore','88:42220:Indore:','')"; ctryVn100[117] = "('Madhya Pradesh - Jabalpur','88:42230:Jabalpur:','')"; ctryVn100[118] = "('Madhya Pradesh - Ujjain','88:42240:Ujjain:','')"; ctryVn100[119] = "('Madhya Pradesh - Other cities','88:42299:','')"; ctryVn100[120] = "('Nagaland - Dimapur','89:42310:Dimapur:','')"; ctryVn100[121] = "('Nagaland - Other cities','89:42399:','')"; ctryVn100[122] = "('Orissa - Bhubaneshwar','99:42410:Bhubaneshwar:','')"; ctryVn100[123] = "('Orissa - Cuttack','99:42420:Cuttack:','')"; ctryVn100[124] = "('Orissa - Puri','99:42430:Puri:','')"; ctryVn100[125] = "('Orissa - Paradeep','99:42440:Paradeep:','')"; ctryVn100[126] = "('Orissa - Rourkela','99:42450:Rourkela:','')"; ctryVn100[127] = "('Orissa - Other cities','99:42499:','')"; ctryVn100[128] = "('Pondicherry','103:42500:','')"; ctryVn100[129] = "('Punjab - Amritsar','105:42601:Amritsar:','')"; ctryVn100[130] = "('Punjab - Bathinda','105:42602:Bathinda:','')"; ctryVn100[131] = "('Punjab - Jalandhar','105:42610:Jalandhar:','')"; ctryVn100[132] = "('Punjab - Ludhiana','105:42620:Ludhiana:','')"; ctryVn100[133] = "('Punjab - Mohali','105:42630:Mohali:','')"; ctryVn100[134] = "('Punjab - Patiala','105:42640:Patiala:','')"; ctryVn100[135] = "('Punjab - Pathankot','105:42650:Pathankot:','')"; ctryVn100[136] = "('Punjab - Other cities','105:42699:','')"; ctryVn100[137] = "('Rajasthan - Ajmer','108:42701:Ajmer:','')"; ctryVn100[138] = "('Rajasthan - Jaipur','108:42710:Jaipur:','')"; ctryVn100[139] = "('Rajasthan - Jaisalmer','108:42715:Jaisalmer:','')"; ctryVn100[140] = "('Rajasthan - Jodhpur','108:42716:Jodhpur:','')"; ctryVn100[141] = "('Rajasthan - Kota','108:42720:Kota:','')"; ctryVn100[142] = "('Rajasthan - Udaipur','108:42730:Udaipur:','')"; ctryVn100[143] = "('Rajasthan - Other cities','108:42799:','')"; ctryVn100[144] = "('Sikkim','119:42800:','')"; ctryVn100[145] = "('Sikkim - Gangtok','119:42810:Gangtok:','')"; ctryVn100[146] = "('Tamil Nadu - Chennai','138:42910:Chennai:','')"; ctryVn100[147] = "('Tamil Nadu - Coimbatore','138:42920:Coimbatore:','')"; ctryVn100[148] = "('Tamil Nadu - Cuddalore','138:42921:Cuddalore:','')"; ctryVn100[149] = "('Tamil Nadu - Erode','138:42925:Erode:','')"; ctryVn100[150] = "('Tamil Nadu - Madurai','138:42930:Madurai:','')"; ctryVn100[151] = "('Tamil Nadu - Nagercoil','138:42931:Nagercoil:','')"; ctryVn100[152] = "('Tamil Nadu - Ooty','138:42936:Ooty:','')"; ctryVn100[153] = "('Tamil Nadu - Thanjavur','138:42938:Thanjavur:','')"; ctryVn100[154] = "('Tamil Nadu - Tiruchirapalli','138:42940:Tiruchirapalli:','')"; ctryVn100[155] = "('Tamil Nadu - Tirunalveli','138:42941:Tirunalveli:','')"; ctryVn100[156] = "('Tamil Nadu - Tuticorin','138:42943:Tuticorin:','')"; ctryVn100[157] = "('Tamil Nadu - Salem','138:42950:Salem:','')"; ctryVn100[158] = "('Tamil Nadu - Hosur','138:42960:Hosur:','')"; ctryVn100[159] = "('Tamil Nadu - Vellore','138:42961:Tamil Nadu - Vellore:','')"; ctryVn100[160] = "('Tamil Nadu - Other cities','138:42999:','')"; ctryVn100[161] = "('Tripura - Agartala','139:43001:Agartala:','')"; ctryVn100[162] = "('Tripura - Other cities','139:43099:','')"; ctryVn100[163] = "('Uttar Pradesh - Agra','142:43101:Agra:','')"; ctryVn100[164] = "('Uttar Pradesh - Aligarh','142:43102:Aligarh:','')"; ctryVn100[165] = "('Uttar Pradesh - Allahabad','142:43103:Allahabad:','')"; ctryVn100[166] = "('Uttar Pradesh - Bareilly','142:43104:Bareilly:','')"; ctryVn100[167] = "('Uttar Pradesh - Etah','142:43105:Etah:','')"; ctryVn100[168] = "('Uttar Pradesh - Faizabad','142:43106:Faizabad:','')"; ctryVn100[169] = "('Uttar Pradesh - Ghaziabad','142:43107:Ghaziabad:','')"; ctryVn100[170] = "('Uttar Pradesh - Gorakhpur','142:43108:Gorakhpur:','')"; ctryVn100[171] = "('Uttar Pradesh - Lucknow','142:43110:Lucknow:','')"; ctryVn100[172] = "('Uttar Pradesh - Kanpur','142:43120:Kanpur:','')"; ctryVn100[173] = "('Uttar Pradesh - Mathura','142:43121:Mathura:','')"; ctryVn100[174] = "('Uttar Pradesh - Meerut','142:43122:Meerut:','')"; ctryVn100[175] = "('Uttar Pradesh - Moradabad','142:43123:Moradabad:','')"; ctryVn100[176] = "('Uttar Pradesh - Noida','142:43124:Noida:','')"; ctryVn100[177] = "('Uttar Pradesh - Varanasi','142:43130:Varanasi:','')"; ctryVn100[178] = "('Uttar Pradesh - Other cities','142:43199:','')"; ctryVn100[179] = "('West Bengal - Asansol','147:43201:Asansol:','')"; ctryVn100[180] = "('West Bengal - Barddhaman','147:43202:Barddhaman:','')"; ctryVn100[181] = "('West Bengal - Durgapur','147:43203:Durgapur:','')"; ctryVn100[182] = "('West Bengal - Haldia','147:43204:Haldia:','')"; ctryVn100[183] = "('West Bengal - Jalpaiguri','147:43205:Jalpaiguri:','')"; ctryVn100[184] = "('West Bengal - Kolkata','147:43210:Kolkata:','')"; ctryVn100[185] = "('West Bengal - Kharagpur','147:43220:Kharagpur:','')"; ctryVn100[186] = "('West Bengal - Siliguri','147:43230:Siliguri:','')"; ctryVn100[187] = "('West Bengal - Other cities','147:43299:','')"; ctryVn100[188] = "('Chhattisgarh - Bilaspur','26:43401:Bilaspur:','')"; ctryVn100[189] = "('Chhattisgarh - Bhillai','26:43402:Bhillai:','')"; ctryVn100[190] = "('Chhattisgarh - Raipur','26:43403:Raipur:','')"; ctryVn100[191] = "('Chhattisgarh - Other cities','26:43499:','')"; ctryVn100[192] = "('Jharkhand - Bokaro','59:43501:Bokaro:','')"; ctryVn100[193] = "('Jharkhand - Jamshedpur','59:43510:Jamshedpur:','')"; ctryVn100[194] = "('Jharkhand - Dhanbad','59:43502:Dhanbad:','')"; ctryVn100[195] = "('Jharkhand - Ranchi','59:43520:Ranchi:','')"; ctryVn100[196] = "('Jharkhand - Other cities','59:43599:','')"; ctryVn100[197] = "('Uttaranchal - Dehradun','143:43620:Dehradun:','')"; ctryVn100[198] = "('Uttaranchal - Hardwar','143:43630:Hardwar:','')"; ctryVn100[199] = "('Uttaranchal - Roorkee','143:43640:Roorkee:','')"; ctryVn100[200] = "('Uttaranchal - Other cities','143:43699:','')"; 
var ctryVn91 = new Array(); ctryVn91[0] = "('Hong Kong', '46', '')"; 
var ctryVn14 = new Array(); ctryVn14[0] = "('- Select State -', '00', '')"; ctryVn14[1] = "('A.C.T','7','')"; ctryVn14[2] = "('Northern Territory','94','')"; ctryVn14[3] = "('New South Wales','97','')"; ctryVn14[4] = "('Queensland','107','')"; ctryVn14[5] = "('South Australia','111','')"; ctryVn14[6] = "('Tasmania','140','')"; ctryVn14[7] = "('Victoria','144','')"; ctryVn14[8] = "('Western Australia','146','')"; var strArrayList = ",190,150,170,97,208,231,100,91,14," 

var defaultEdu = new Array();
var myEdu = new Array();
var sgEdu = new Array();
var phEdu = new Array();
var inEdu = new Array();
var idEdu = new Array();
var thEdu = new Array();
var vnEdu = new Array();
var myEdu = new Array();
defaultEdu[0] = '("- Select Qualification -", "0", "")'; defaultEdu[1] = '("Primary/Secondary School/\'O\' Level","1","")'; defaultEdu[2] = '("Higher Secondary/Pre-U/\'A\' Level","9","")'; defaultEdu[3] = '("Professional Certificate","8","")'; defaultEdu[4] = '("Diploma","2","")'; defaultEdu[5] = '("Advanced/Higher/Graduate Diploma","3","")'; defaultEdu[6] = '("Bachelor\'s Degree","4","")'; defaultEdu[7] = '("Post Graduate Diploma","10","")'; defaultEdu[8] = '("Professional Degree","7","")'; defaultEdu[9] = '("Master\'s Degree","5","")'; defaultEdu[10] = '("Doctorate  (PhD)","6","")';
myEdu[0] = '("- Select Qualification -", "0", "")'; myEdu[1] = '("Primary/Secondary School/SPM/\'O\' Level","1","")'; myEdu[2] = '("Higher Secondary/STPM/\'A\' Level/Pre-U","9","")'; myEdu[3] = '("Professional Certificate","8","")'; myEdu[4] = '("Diploma","2","")'; myEdu[5] = '("Advanced/Higher/Graduate Diploma","3","")'; myEdu[6] = '("Bachelor\'s Degree","4","")'; myEdu[7] = '("Post Graduate Diploma","10","")'; myEdu[8] = '("Professional Degree","7","")'; myEdu[9] = '("Master\'s Degree","5","")'; myEdu[10] = '("Doctorate (PhD)","6","")';
inEdu[0] = '("- Select Qualification -", "0", "")';
inEdu[1] = '("X Standard (Secondary School)","2:1","")'; inEdu[2] = '("XII Standard (Higher Secondary/Junior College)","3:9","")'; inEdu[3] = '("Vocational Training/ITI (Professional  Certification)","4:8","")'; inEdu[4] = '("Diploma (3 years) ","5:2","")'; inEdu[5] = '("Advanced Diploma","6:3","")'; inEdu[6] = '("Bachelor of Art (B.A)","7:4","")'; inEdu[7] = '("Bachelor of Commerce (B.Com)","8:4","")'; inEdu[8] = '("Bachelor of Science (B.Sc)","9:4","")'; inEdu[9] = '("Bachelor of Architecture (B.Arch)","10:10","")'; inEdu[10] = '("Bachelor of Business Administration (BBA)","11:10","")'; inEdu[11] = '("Bachelor of Computer Application (BCA)","12:10","")'; inEdu[12] = '("Bachelor of Dental Surgery (BDS)","13:10","")'; inEdu[13] = '("Bachelor of Engineering/Technology (B.E/B.Tech) or Equivalent","14:10","")'; inEdu[14] = '("Bachelor of Hotel Management (BHM)","15:10","")'; inEdu[15] = '("Bachelor of Law (LLB)","16:10","")'; inEdu[16] = '("Bachelor of Medicine/Surgery (MBBS)","17:10","")'; inEdu[17] = '("Bachelor of Pharmacy (B.Pharm)","18:10","")'; inEdu[18] = '("Master of Art (M.A)","19:7","")'; inEdu[19] = '("Master of Commerce (M.Com)","20:7","")'; inEdu[20] = '("Master of Computer Application/Computer Science (MCA/MCS)","21:7","")'; inEdu[21] = '("Master of Science (M.Sc)","22:7","")'; inEdu[22] = '("Master of Architecture (M.Arch)","23:5","")'; inEdu[23] = '("MBA/PGDBA/PGPM or Equivalent","24:5","")'; inEdu[24] = '("Master of Dentistry (MDS)","25:5","")'; inEdu[25] = '("Master of Engineering/Technology (M.E/M.Tech) or Equivalent","26:5","")'; inEdu[26] = '("Master of Law (LLM)","27:5","")'; inEdu[27] = '("Master of Medicine/Surgery (MD/MS)","28:5","")'; inEdu[28] = '("Master of Pharmacy (M.Pharm)","29:5","")'; inEdu[29] = '("Chartered Accountancy (CA)","30:5","")'; inEdu[30] = '("Company Secretary (CS)","31:5","")'; inEdu[31] = '("Institute of Cost Accountancy (ICWA)","32:5","")'; inEdu[32] = '("Doctorate (PhD)","33:6","")';
phEdu[0] = '("- Select Qualification -", "0", "")'; phEdu[1] = '("High School Diploma","1","")'; phEdu[2] = '("Vocational Diploma / Short Course Certificate","8","")'; phEdu[3] = '("Bachelor\'s/College Degree ","4","")'; phEdu[4] = '("Post Graduate Diploma / Master\'s Degree","10","")'; phEdu[5] = '("Professional License (Passed Board/Bar/Professional License Exam)","7","")'; phEdu[6] = '("Doctorate Degree","6","")';
idEdu[0] = '("- Select Qualification -", "0", "")'; idEdu[1] = '("SMU","9","")'; idEdu[2] = '("Associate Degree","2","")'; idEdu[3] = '("Bachelor\'s Degree","4","")'; idEdu[4] = '("Master\'s Degree/Post Graduate Degree","5","")'; idEdu[5] = '("Doctorate","6","")';
sgEdu[0] = '("- Select Qualification -", "0", "")'; sgEdu[1] = '("Primary/Secondary School/\'O\' Level","1","")'; sgEdu[2] = '("Higher Secondary/Pre-U/\'A\' Level","9","")'; sgEdu[3] = '("Professional Certificate/NiTEC","8","")'; sgEdu[4] = '("Diploma","2","")'; sgEdu[5] = '("Advanced/Higher/Graduate Diploma","3","")'; sgEdu[6] = '("Bachelor\'s Degree","4","")'; sgEdu[7] = '("Post Graduate Diploma","10","")'; sgEdu[8] = '("Professional Degree","7","")'; sgEdu[9] = '("Master\'s Degree","5","")'; sgEdu[10] = '("Doctorate (PhD)","6","")';
thEdu[0] = '("- Select Qualification -", "0", "")'; thEdu[1] = '("Primary/Secondary School)'; thEdu[2] = '("Higher Secondary School (ปวช. (ประกาศนียบัตรวิชาชีพ))","9","")'; thEdu[3] = '("Diploma/Certificate (ปวส. (ประกาศนียบัตรวิชาชีพชั้นสูง), อนุปริญญา)","2","")'; thEdu[4] = '("Bachelor’s Degree (ปริญญาตรี)","4","")'; thEdu[5] = '("Master’s Degree (ปริญญาโท)","5","")'; thEdu[6] = '("Doctorate (PhD) (บริญญาเอก)","6","")'; 
vnEdu[0] = '("- Chọn Trình độ học vấn cao nhất -", "0", "")'; vnEdu[1] = '("Tiểu học/Trung học Cơ sở","1","")'; vnEdu[2] = '("Trung Học Phổ Thông/Trung học Kỹ thuật & Trung học nghề","9","")'; vnEdu[3] = '("Chứng chỉ/Văn bằng","8","")'; vnEdu[4] = '("Cao Đẳng","3","")'; vnEdu[5] = '("Cử Nhân","7","")'; vnEdu[6] = '("Thạc Sĩ","5","")'; vnEdu[7] = '("Tiến sĩ","6","")';

var phPosition = new Array();
var idPosition = new Array();
var defaultPosition = new Array();
var inPosition = new Array();
var thPosition = new Array();
var vnPosition = new Array();
defaultPosition[0] = "('- Select Position Level -', '', '')"; defaultPosition[1] = "('Senior Manager','1','')"; defaultPosition[2] = "('Manager','2','')"; defaultPosition[3] = "('Senior Executive','3','')"; defaultPosition[4] = "('Junior Executive','4','')"; defaultPosition[5] = "('Fresh / Entry Level','5','')"; defaultPosition[6] = "('Non-Executive','6','')";
phPosition[0] = "('- Select Position Level -', '', '')"; phPosition[1] = "('CEO / SVP / AVP / VP / Director','1','')"; phPosition[2] = "('Assistant Manager / Manager','2','')"; phPosition[3] = "('Supervisor / 5 Years & Up Experienced Employee','3','')"; phPosition[4] = "('1-4 Years Experienced Employee','4','')"; phPosition[5] = "('Fresh Grad / < 1 Year Experienced Employee','5','')";
idPosition[0] = "('- Select Position Level -', '', '')"; idPosition[1] = "('CEO / GM / Director / Senior Manager','1','')"; idPosition[2] = "('Manager / Assistant Manager','2','')"; idPosition[3] = "('Supervisor / Coordinator','3','')"; idPosition[4] = "('Staff (non-management & non-supervisor)','4','')"; idPosition[5] = "('Fresh Grad / Less than 1 year experience','5','')";
inPosition[0] = "('- Select Position Level -', '', '')"; inPosition[1] = "('Senior Manager','1','')"; inPosition[2] = "('Manager','2','')"; inPosition[3] = "('Senior Executive','3','')"; inPosition[4] = "('Junior Executive','4','')"; inPosition[5] = "('Fresh / Entry Level','5','')";
thPosition[0] = "('- Select Position Level -', '', '')"; thPosition[1] = "('Senior Manager (ระดับผู้จัดการอาวุโสหรือสูงกว่า)','1','')"; thPosition[2] = "('Manager (ระดับผู้จัดการ)','2','')"; thPosition[3] = "('Senior Executive (ระดับพนักงานประสบการณ์ทำงาน 4 ปีขึ้นไป)','3','')"; thPosition[4] = "('Junior Executive (ระดับพนักงานประสบการณ์ทำงาน 1 – 3 ปี)','4','')"; thPosition[5] = "('Fresh/ Entry level (ระดับพนักงานประสบการณ์ทำงาน 0 – 1 ปี)','5','')"; thPosition[6] = "('Non-Executive (พนักงานทั้วไป)','6','')";
vnPosition[0] = "('- Chọn cấp bậc -', '', '')"; vnPosition[1] = "('Quản lý Cấp cao/CEO/Chủ tịch/Phó Chủ tịch/Giám đốc/Tổng Giám đốc','1','')"; vnPosition[2] = "('Trưởng phòng','2','')"; vnPosition[3] = "('Nhân sự Cấp cao/Trưởng nhóm/Giám sát viên','3','')"; vnPosition[4] = "('Nhân viên','4','')"; vnPosition[5] = "('Mới tốt nghiệp','5','')"; 

var fd = new Array();fd[0] = "('- Select Field of Study -','0','')";fd[1] = "('Advertising/Media','2','')";fd[2] = "('Agriculture/Aquaculture/Forestry','3','')";fd[3] = "('Airline Operation/Airport Management','5','')";fd[4] = "('Architecture','4','')";fd[5] = "('Art/Design/Creative Multimedia','1','')";fd[6] = "('Biology','6','')";fd[7] = "('BioTechnology','55','')";fd[8] = "('Business Studies/Administration/Management','36','')";fd[9] = "('Chemistry','7','')";fd[10] = "('Commerce','54','')";fd[11] = "('Computer Science/Information Technology','8','')";fd[12] = "('Dentistry','9','')";fd[13] = "('Economics','15','')";fd[14] = "('Journalism','10','')";fd[15] = "('Education/Teaching/Training','17','')";fd[16] = "('Engineering (Aviation/Aeronautics/Astronautics)','12','')";fd[17] = "('Engineering (Bioengineering/Biomedical)','101','')";fd[18] = "('Engineering (Chemical)','13','')";fd[19] = "('Engineering (Civil)','14','')";fd[20] = "('Engineering (Computer/Telecommunication)','16','')";fd[21] = "('Engineering (Electrical/Electronic)','18','')";fd[22] = "('Engineering (Environmental/Health/Safety)','24','')";fd[23] = "('Engineering (Industrial)','19','')";fd[24] = "('Engineering (Marine)','23','')";fd[25] = "('Engineering (Material Science)','21','')";fd[26] = "('Engineering (Mechanical)','20','')";fd[27] = "('Engineering (Mechatronic/Electromechanical)','102','')";fd[28] = "('Engineering (Metal Fabrication/Tool & Die/Welding)','22','')";fd[29] = "('Engineering (Mining/Mineral)','103','')";fd[30] = "('Engineering (Others)','25','')";fd[31] = "('Engineering (Petroleum/Oil/Gas)','26','')";fd[32] = "('Finance/Accountancy/Banking','28','')";fd[33] = "('Food & Beverage Services Management','27','')";fd[34] = "('Food Technology/Nutrition/Dietetics','104','')";fd[35] = "('Geographical Science','11','')";fd[36] = "('Geology/Geophysics','105','')";fd[37] = "('History','106','')";fd[38] = "('Hospitality/Tourism/Hotel Management','29','')";fd[39] = "('Human Resource Management','30','')";fd[40] = "('Humanities/Liberal Arts','32','')";fd[41] = "('Logistic/Transportation','35','')";fd[42] = "('Law','31','')";fd[43] = "('Library Management','33','')";fd[44] = "('Linguistics/Languages','34','')";fd[45] = "('Mass Communications','37','')";fd[46] = "('Mathematics','38','')";fd[47] = "('Medical Science','40','')";fd[48] = "('Medicine','39','')";fd[49] = "('Maritime Studies','41','')";fd[50] = "('Marketing','49','')";fd[51] = "('Music/Performing Arts Studies','42','')";fd[52] = "('Nursing','43','')";fd[53] = "('Optometry','107','')";fd[54] = "('Personal Services','47','')";fd[55] = "('Pharmacy/Pharmacology','45','')";fd[56] = "('Philosophy','108','')";fd[57] = "('Physical Therapy/Physiotherapy','109','')";fd[58] = "('Physics','46','')";fd[59] = "('Political Science','110','')";fd[60] = "('Property Development/Real Estate Management','111','')";fd[61] = "('Protective Services & Management','48','')";fd[62] = "('Psychology','112','')";fd[63] = "('Quantity Survey','100','')";fd[64] = "('Science & Technology','50','')";fd[65] = "('Secretarial','51','')";fd[66] = "('Social Science/Sociology','113','')";fd[67] = "('Sports Science & Management','114','')";fd[68] = "('Textile/Fashion Design','52','')";fd[69] = "('Urban Studies/Town Planning','115','')";fd[70] = "('Veterinary','53','')";
fd[71] = "('Others','44','')";var rs= new Array(); rs[1] = "0";rs[2] = "-";rs[3] = "-";rs[4] = "99";rs[5] = "99";rs[6] = "99";rs[7] = "0,5,13,14,15,40,43,44,45,51,37,59,62,66,71";rs[8] = "0,10,32";rs[9] = "0,2,6,9,11,35,46,52,59,65,70,34,36,53,57,67,71";rs[10] = "0,4,69";rs[11] = "0,1,8,11,32,39,50,61,71";rs[12] = "11";rs[13] = "12";rs[14] = "0,7,11,49,63,64,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31";rs[15] = "0,33,38";rs[16] = "42";rs[17] = "0,47,48,62";rs[18] = "55";rs[19] = "0,5,13,14,15,40,43,44,45,51,37,59,62,66,71";rs[20] = "0,10,32";rs[21] = "11";rs[22] = "0,2,6,9,11,35,46,52,59,65,70,34,36,53,57,67,71";rs[23] = "0,4,69";rs[24] = "0,1,8,11,32,39,50,61,71";rs[25] = "12";rs[26] = "0,7,11,49,63,64,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31";rs[27] = "42";rs[28] = "0,47,48,62";rs[29] = "55";rs[30] = "32";rs[31] = "65";rs[32] = "32";rs[33] = "99";
var thfd = new Array();thfd[0] = "('- Select Field of Study (สาขาที่ศึกษา) -','0','')";thfd[1] = "('โฆษณา/สื่อ','2','')";thfd[2] = "('เกษตร/ประมง/ป่าไม้','3','')";thfd[3] = "('ปฏิบัติงานสายการบิน/บริหารงานสายการบิน','5','')";thfd[4] = "('สถาปัตยกรรม','4','')";thfd[5] = "('ศิลปะ/ออกแบบ/มัลติมีเดีย','1','')";thfd[6] = "('ชีววิทยา','6','')";thfd[7] = "('เทคโนโลยีชีวภาพ','55','')";thfd[8] = "('บริหารธุรกิจ/การจัดการ','36','')";thfd[9] = "('เคมี','7','')";thfd[10] = "('ธุรกิจการค้า','54','')";thfd[11] = "('วิทยาศาสตร์คอมพิวเตอร์/ไอที','8','')";thfd[12] = "('ทันตกรรม','9','')";thfd[13] = "('เศรษฐศาสตร์','15','')";thfd[14] = "('วารสารศาสตร์','10','')";thfd[15] = "('การศึกษา/การสอน/การฝึกอบรม','17','')";thfd[16] = "('วิศวกรรม (การบิน/อวกาศ)','12','')";thfd[17] = "('วิศวกรรม (ชีววิทยา/ชีวการแพทย์)','101','')";thfd[18] = "('วิศวกรรม (เคมี)','13','')";thfd[19] = "('วิศวกรรม (โยธา)','14','')";thfd[20] = "('วิศวกรรม (คอมพิวเตอร์/โทรคมนาคม)','16','')";thfd[21] = "('วิศวกรรม (ไฟฟ้า/อิเล็กทรอนิกส์)','18','')";thfd[22] = "('วิศวกรรม (สิ่งแวดล้อม/สุขภาพ/ความปลอดภัย)','24','')";thfd[23] = "('วิศวกรรม (อุตสาหการ)','19','')";thfd[24] = "('วิศวกรรม (ทางทะเล)','23','')";thfd[25] = "('วิศวกรรม (วัสดุศาสตร์)','21','')";thfd[26] = "('วิศวกรรม (เครื่องกล)','20','')";thfd[27] = "('วิศวกรรม (หุ่นยนต์)','102','')";thfd[28] = "('วิศวกรรม (ผลิตเหล็ก/แม่พิมพ์/งานเชื่อม)','22','')";thfd[29] = "('วิศวกรรม (เหมืองแร่/สินแร่)','103','')";thfd[30] = "('วิศวกรรม (อื่นๆ)','25','')";thfd[31] = "('วิศวกรรม (ปิโตรเลียม/น้ำมัน/ก๊าซ)','26','')";thfd[32] = "('การเงิน/บัญชี/การธนาคาร','28','')";thfd[33] = "('บริหารงานบริการอาหารและเครื่องดื่ม','27','')";thfd[34] = "('เทคโนโลยีอาหาร/โภชนาการ','104','')";thfd[35] = "('ภูมิศาสตร์','11','')";thfd[36] = "('ธรณีวิทยา/ธรณีฟิสิกซ์','105','')";thfd[37] = "('ประวัติศาสตร์','106','')";thfd[38] = "('อุตสาหกรรมบริการ/ท่องเที่ยว/บริหารการโรงแรม','29','')";thfd[39] = "('บริหารทรัพยากรบุคคล','30','')";thfd[40] = "('มนุษยศาสตร์/ศิลปศาสตร์','32','')";thfd[41] = "('โลจิสติกส์/การขนส่ง','35','')";thfd[42] = "('นิติศาสตร์','31','')";thfd[43] = "('บรรณารักษ์และบริหารจัดการห้องสมุด','33','')";thfd[44] = "('ภาษาศาสตร์','34','')";thfd[45] = "('นิเทศศาสตร์','37','')";thfd[46] = "('คณิตศาสตร์','38','')";thfd[47] = "('วิทยาศาสตร์การแพทย์','40','')";thfd[48] = "('แพทยศาสตร์','39','')";thfd[49] = "('การเดินเรือ/พาณิชย์นาวี','41','')";thfd[50] = "('การตลาด','49','')";thfd[51] = "('ดุริยางคศิลป์/ศิลปะการแสดง','42','')";thfd[52] = "('พยาบาลศาสตร์','43','')";thfd[53] = "('คลินิกสายตาและระบบการมองเห็น','107','')";thfd[54] = "('การบริการส่วนบุคคล','47','')";thfd[55] = "('เภสัชกรรม/เภสัชศาสตร์','45','')";thfd[56] = "('ปรัชญา','108','')";thfd[57] = "('กายภาพบำบัด','109','')";thfd[58] = "('ฟิสิกซ์','46','')";thfd[59] = "('รัฐศาสตร์','110','')";thfd[60] = "('พัฒนาที่ดิน/บริหารจัดการอสังหาริมทรัพย์','111','')";thfd[61] = "('การคุ้มครองผู้บริโภคและการจัดการ','48','')";thfd[62] = "('จิตวิทยา','112','')";thfd[63] = "('การสำรวจปริมาณงาน','100','')";thfd[64] = "('วิทยาศาสตร์และเทคโนโลยี','50','')";thfd[65] = "('เลขานุการ','51','')";thfd[66] = "('สังคมวิทยา','113','')";thfd[67] = "('วิทยาศาสตร์การกีฬาและบริหารการกีฬา','114','')";thfd[68] = "('สิ่งทอ/แฟชั่นดีไซน์','52','')";thfd[69] = "('การศึกษาและวางผังเมือง','115','')";thfd[70] = "('สัตวแพทย์','53','')";
thfd[71] = "('อื่นๆ','44','')";var rs= new Array(); rs[1] = "0";rs[2] = "-";rs[3] = "-";rs[4] = "99";rs[5] = "99";rs[6] = "99";rs[7] = "0,5,13,14,15,40,43,44,45,51,37,59,62,66,71";rs[8] = "0,10,32";rs[9] = "0,2,6,9,11,35,46,52,59,65,70,34,36,53,57,67,71";rs[10] = "0,4,69";rs[11] = "0,1,8,11,32,39,50,61,71";rs[12] = "11";rs[13] = "12";rs[14] = "0,7,11,49,63,64,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31";rs[15] = "0,33,38";rs[16] = "42";rs[17] = "0,47,48,62";rs[18] = "55";rs[19] = "0,5,13,14,15,40,43,44,45,51,37,59,62,66,71";rs[20] = "0,10,32";rs[21] = "11";rs[22] = "0,2,6,9,11,35,46,52,59,65,70,34,36,53,57,67,71";rs[23] = "0,4,69";rs[24] = "0,1,8,11,32,39,50,61,71";rs[25] = "12";rs[26] = "0,7,11,49,63,64,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31";rs[27] = "42";rs[28] = "0,47,48,62";rs[29] = "55";rs[30] = "32";rs[31] = "65";rs[32] = "32";rs[33] = "99";
var vnfd = new Array();vnfd[0] = "('- Chọn Lĩnh vực nghiên cứu -','0','')";vnfd[1] = "('Quảng cáo/Media','2','')";vnfd[2] = "('Nông nghiệp/Thủy sản/Lâm nghiệp','3','')";vnfd[3] = "('Điều tiết không lưu/Quản lý sân bay','5','')";vnfd[4] = "('Kiến trúc','4','')";vnfd[5] = "('Mỹ thuật/Thiết kế/Đa phương tiện Sáng tạo','1','')";vnfd[6] = "('Sinh học','6','')";vnfd[7] = "('Công nghệ sinh học','55','')";vnfd[8] = "('Nghiên cứu Kinh doanh/Quản trị/Quản lý','36','')";vnfd[9] = "('Hóa học','7','')";vnfd[10] = "('Thương mại','54','')";vnfd[11] = "('Khoa học máy tính/Công nghệ thông tin','8','')";vnfd[12] = "('Nha khoa','9','')";vnfd[13] = "('Kinh tế','15','')";vnfd[14] = "('Báo chí','10','')";vnfd[15] = "('Giáo dục/Giảng dạy/Đào tạo','17','')";vnfd[16] = "('Kỹ thuật (Hàng không/Hàng không học/Vũ trụ)','12','')";vnfd[17] = "('Kỹ thuật (Kỹ thuật Sinh học/Y Sinh)','101','')";vnfd[18] = "('Kỹ thuật (Hóa học)','13','')";vnfd[19] = "('Kỹ thuật (Xây dựng)','14','')";vnfd[20] = "('Kỹ thuật (Máy tính/Viễn thông)','16','')";vnfd[21] = "('Kỹ thuật (Điện/Điện tử)','18','')";vnfd[22] = "('Kỹ thuật (Môi trường/Y tế/An toàn)','24','')";vnfd[23] = "('Kỹ thuật (Công nghiệp)','19','')";vnfd[24] = "('Kỹ thuật (Hàng hải)','23','')";vnfd[25] = "('Kỹ thuật (Khoa học Vật liệu)','21','')";vnfd[26] = "('Kỹ thuật (Cơ khí)','20','')";vnfd[27] = "('Kỹ thuật (Cơ điện tử/Điện cơ)','102','')";vnfd[28] = "('Kỹ thuật (Gia công Kim loại/Công cụ &  Khuôn/Hàn)','22','')";vnfd[29] = "('Kỹ thuật (Khai thác Mỏ/Khoáng sản)','103','')";vnfd[30] = "('Kỹ thuật (Khác)','25','')";vnfd[31] = "('Kỹ thuật (Dầu mỏ/Dầu/Khí)','26','')";vnfd[32] = "('Tài chính/Kế toán/Ngân hàng','28','')";vnfd[33] = "('Quản lý Dịch vụ Thực phẩm & Đồ uống','27','')";vnfd[34] = "('Công nghệ thực  phẩm/Dinh dưỡng/Khoa dinh dưỡng','104','')";vnfd[35] = "('Khoa học Địa lý','11','')";vnfd[36] = "('Địa lý/Địa Vật lý','105','')";vnfd[37] = "('Lịch sử','106','')";vnfd[38] = "('Quản lý Nhà nghỉ/Du lịch/Khách sạn','29','')";vnfd[39] = "('Quản lý Nhân sự','30','')";vnfd[40] = "('Xã hội nhân văn/Mỹ thuật Tự do','32','')";vnfd[41] = "('Kho vận/Vận tải','35','')";vnfd[42] = "('Luật','31','')";vnfd[43] = "('Quản lý Thư viện','33','')";vnfd[44] = "('Nhà ngôn ngữ học/Ngôn ngữ','34','')";vnfd[45] = "('Truyền thông Đại chúng','37','')";vnfd[46] = "('Toán học','38','')";vnfd[47] = "('Y học','40','')";vnfd[48] = "('Y khoa','39','')";vnfd[49] = "('Nghiên cứu Hàng hải','41','')";vnfd[50] = "('Tiếp thị','49','')";vnfd[51] = "('Nghiên cứu Âm nhạc/Nghệ thuật Biểu diễn','42','')";vnfd[52] = "('Y tá','43','')";vnfd[53] = "('Nhãn Khoa','107','')";vnfd[54] = "('Dịch vụ cá nhân','47','')";vnfd[55] = "('Dược/Công nghệ Dược','45','')";vnfd[56] = "('Triết học','108','')";vnfd[57] = "('Trị liêu Vật lý/Vật lý Trị liệu','109','')";vnfd[58] = "('Vật lý','46','')";vnfd[59] = "('Khoa học Chính trị','110','')";vnfd[60] = "('Phát triển Nhà đất/Quản lý Bất động sản','111','')";vnfd[61] = "('Dịch vụ Bảo vệ & Quản lý','48','')";vnfd[62] = "('Tâm lý học','112','')";vnfd[63] = "('Giám sát Sản lượng','100','')";vnfd[64] = "('Khoa học & Công nghệ','50','')";vnfd[65] = "('Thư ký','51','')";vnfd[66] = "('Khoa học Xã hội/Xã hội học','113','')";vnfd[67] = "('Khoa học & Quản lý Thể thao','114','')";vnfd[68] = "('Dệt/Thiết kế thời trang','52','')";vnfd[69] = "('Nghiên cứu Đô Thị/Quy hoạch Thành phố','115','')";vnfd[70] = "('Thú y','53','')";
vnfd[71] = "('Khác','44','')";var rs= new Array(); rs[1] = "0";rs[2] = "-";rs[3] = "-";rs[4] = "99";rs[5] = "99";rs[6] = "99";rs[7] = "0,5,13,14,15,40,43,44,45,51,37,59,62,66,71";rs[8] = "0,10,32";rs[9] = "0,2,6,9,11,35,46,52,59,65,70,34,36,53,57,67,71";rs[10] = "0,4,69";rs[11] = "0,1,8,11,32,39,50,61,71";rs[12] = "11";rs[13] = "12";rs[14] = "0,7,11,49,63,64,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31";rs[15] = "0,33,38";rs[16] = "42";rs[17] = "0,47,48,62";rs[18] = "55";rs[19] = "0,5,13,14,15,40,43,44,45,51,37,59,62,66,71";rs[20] = "0,10,32";rs[21] = "11";rs[22] = "0,2,6,9,11,35,46,52,59,65,70,34,36,53,57,67,71";rs[23] = "0,4,69";rs[24] = "0,1,8,11,32,39,50,61,71";rs[25] = "12";rs[26] = "0,7,11,49,63,64,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31";rs[27] = "42";rs[28] = "0,47,48,62";rs[29] = "55";rs[30] = "32";rs[31] = "65";rs[32] = "32";rs[33] = "99";

var roleVn100 = new Array();
roleVn100[0] = "('- Chọn Vai trò -','','')";roleVn100[1] = "('Giám sát viên/Trưởng Nhóm','1352','')"; roleVn100[2] = "('Hoạch định Truyền thông','1350','')"; roleVn100[3] = "('Khác','1354','')"; roleVn100[4] = "('Người Viết Quảng Cáo','1348','')"; roleVn100[5] = "('Nhân viên Điều hành Quảng cáo/Quản lý Tài khoản','1347','')"; roleVn100[6] = "('Quản lý','1353','')"; roleVn100[7] = "('Sáng tạo','1349','')"; roleVn100[8] = "('Tư vấn viên','1351','')"; var roleVn101 = new Array();
roleVn101[0] = "('- Chọn Vai trò -','','')";roleVn101[1] = "('Giám sát viên/Trưởng Nhóm','1055','')"; roleVn101[2] = "('Khác','1057','')"; roleVn101[3] = "('Nghệ nhân Xuất bản Văn phòng','1048','')"; roleVn101[4] = "('Nhà nhiếp ảnh','1050','')"; roleVn101[5] = "('Nhà thiết kế Công nghiệp/Sản phẩm','1052','')"; roleVn101[6] = "('Nhà thiết kế hoa','1051','')"; roleVn101[7] = "('Nhà thiết kế Hoạt hình','1047','')"; roleVn101[8] = "('Nhà thiết kế Thời trang','1049','')"; roleVn101[9] = "('Nhà thiết kế Web','1046','')"; roleVn101[10] = "('Nhà thiết kế Đa phương tiện','1045','')"; roleVn101[11] = "('Nhà thiết kế Đồ họa','1044','')"; roleVn101[12] = "('Nhân viên tạo Hình ảnh','1053','')"; roleVn101[13] = "('Quản lý','1056','')"; roleVn101[14] = "('Thiết kế Mẫu','1054','')"; var roleVn102 = new Array();
roleVn102[0] = "('- Chọn Vai trò -','','')";roleVn102[1] = "('Khác','1359','')"; roleVn102[2] = "('Lâm nghiệp','1356','')"; roleVn102[3] = "('Ngư Nghiệp','1357','')"; roleVn102[4] = "('Nông nghiệp / Trồng rừng','1355','')"; roleVn102[5] = "('Quản lý','1358','')"; var roleVn103 = new Array();
roleVn103[0] = "('- Chọn Vai trò -','','')";roleVn103[1] = "('Khác','1362','')"; roleVn103[2] = "('Nhân viên Thống kê/Nhà toán học','1361','')"; roleVn103[3] = "('Tính toán Bảo hiểm','1156','')"; var roleVn104 = new Array();
roleVn104[0] = "('- Chọn Vai trò -','','')";roleVn104[1] = "('Biên tập viên','1363','')"; roleVn104[2] = "('Giám sát viên/Trưởng Nhóm','1367','')"; roleVn104[3] = "('Khác','1369','')"; roleVn104[4] = "('Nghiên cứu viên','1366','')"; roleVn104[5] = "('Nhà báo/Nhà văn','1364','')"; roleVn104[6] = "('Phiên dịch viên','1365','')"; roleVn104[7] = "('Quản lý','1368','')"; var roleVn105 = new Array();
roleVn105[0] = "('- Chọn Vai trò -','','')";roleVn105[1] = "('Chăm sóc Trẻ em','1370','')"; roleVn105[2] = "('Chuyên viên Thiết kế Nội dung','1377','')"; roleVn105[3] = "('Cố vấn Giáo dục','1378','')"; roleVn105[4] = "('Giảng viên','1374','')"; roleVn105[5] = "('Giáo sư','1375','')"; roleVn105[6] = "('Giáo viên Mầm non','1371','')"; roleVn105[7] = "('Giáo viên Tiểu học/Trung học','1372','')"; roleVn105[8] = "('Hiệu trưởng','1373','')"; roleVn105[9] = "('Khác','1381','')"; roleVn105[10] = "('Nghiên cứu viên','1379','')"; roleVn105[11] = "('Nhân viên Thư viện','1376','')"; roleVn105[12] = "('Quản lý','1380','')"; var roleVn106 = new Array();
roleVn106[0] = "('- Chọn Vai trò -','','')";roleVn106[1] = "('Ca sĩ','1384','')"; roleVn106[2] = "('Khác','1391','')"; roleVn106[3] = "('Nam diễn viên','1382','')"; roleVn106[4] = "('Người mẫu','1385','')"; roleVn106[5] = "('Nhà quay phim','1389','')"; roleVn106[6] = "('Nhà sản xuất (Phim, Truyền hình, Truyền thanh, Ghi âm)','1387','')"; roleVn106[7] = "('Nhà văn (Phim, Truyền hình, Truyền thanh)','1388','')"; roleVn106[8] = "('Nhạc sĩ','1386','')"; roleVn106[9] = "('Quản lý','1390','')"; roleVn106[10] = "('Vũ công','1383','')"; var roleVn107 = new Array();
roleVn107[0] = "('- Chọn Vai trò -','','')";roleVn107[1] = "('Bồi bàn Nhà hàng','1394','')"; roleVn107[2] = "('Chế biến Thức ăn/Phụ bếp','1393','')"; roleVn107[3] = "('Giám sát viên/Trưởng Nhóm','1396','')"; roleVn107[4] = "('Khác','1398','')"; roleVn107[5] = "('Nhân viên Quầy bar','1395','')"; roleVn107[6] = "('Quản lý','1397','')"; roleVn107[7] = "('Đầu bếp','1392','')"; var roleVn108 = new Array();
roleVn108[0] = "('- Chọn Vai trò -','','')";roleVn108[1] = "('Chuyên gia Ăn kiêng/Dinh dưỡng','1200','')"; roleVn108[2] = "('Giám sát/Bảo đảm Chất lượng','1201','')"; roleVn108[3] = "('Khác','1204','')"; roleVn108[4] = "('Nhà công nghệ/Nhà khoa học Thực phẩm','1198','')"; roleVn108[5] = "('Quản lý','1203','')"; roleVn108[6] = "('Trợ lý Phòng thí nghiệm','1199','')"; roleVn108[7] = "('Tư vấn viên','1202','')"; var roleVn109 = new Array();
roleVn109[0] = "('- Chọn Vai trò -','','')";roleVn109[1] = "('Khác','1405','')"; roleVn109[2] = "('Kỹ sư Mỏ và Địa chất','1401','')"; roleVn109[3] = "('Nghiên cứu viên','1403','')"; roleVn109[4] = "('Nhà Địa chất học','1399','')"; roleVn109[5] = "('Nhà Địa Vật lý','1400','')"; roleVn109[6] = "('Quản lý','1404','')"; roleVn109[7] = "('Trợ lý Phòng thí nghiệm','1402','')"; var roleVn110 = new Array();
roleVn110[0] = "('- Chọn Vai trò -','','')";roleVn110[1] = "('Khác','1423','')"; roleVn110[2] = "('Kỹ thuật viên Ô tô','1421','')"; roleVn110[3] = "('Kỹ thuật viên điều hòa không khí','1420','')"; roleVn110[4] = "('Lái xe','1406','')"; roleVn110[5] = "('Lao động Phổ thông','1412','')"; roleVn110[6] = "('Người giúp việc','1409','')"; roleVn110[7] = "('Người trông nhà','1410','')"; roleVn110[8] = "('Nhân viên Điều độ','1411','')"; roleVn110[9] = "('Quản gia','1407','')"; roleVn110[10] = "('Quản lý','1422','')"; roleVn110[11] = "('Thợ may','1414','')"; roleVn110[12] = "('Thợ mộc','1413','')"; roleVn110[13] = "('Thợ ống nước','1415','')"; roleVn110[14] = "('Thợ sơn','1416','')"; roleVn110[15] = "('Thợ tạo Cảnh quan/Làm vườn','1417','')"; roleVn110[16] = "('Thợ xây','1418','')"; roleVn110[17] = "('Thợ điện','1419','')"; roleVn110[18] = "('Trông Trẻ','1408','')"; var roleVn111 = new Array();
roleVn111[0] = "('- Chọn Vai trò -','','')";roleVn111[1] = "('Bác sĩ chỉnh xương','1181','')"; roleVn111[2] = "('Bác sĩ siêu âm','1184','')"; roleVn111[3] = "('Bác sĩ vật lý trị liệu','1186','')"; roleVn111[4] = "('Bác sĩ đo thị lực','1185','')"; roleVn111[5] = "('Cán bộ Y tế/Nhân viên Y tế','1177','')"; roleVn111[6] = "('Chuyên gia trị liệu khác','1187','')"; roleVn111[7] = "('Khác','1190','')"; roleVn111[8] = "('Nghiên cứu Y khoa/Lâm sàng','1180','')"; roleVn111[9] = "('Nhà nghiên cứu bệnh học','1182','')"; roleVn111[10] = "('Nhân viên chụp X quang','1183','')"; roleVn111[11] = "('Nhân viên phiên âm Y tế','1178','')"; roleVn111[12] = "('Nhân viên Xét nghiệm Y khoa','1188','')"; roleVn111[13] = "('Nữ hộ sinh','1176','')"; roleVn111[14] = "('Quản lý','1189','')"; roleVn111[15] = "('Trợ lý phòng thí nghiệm Lâm sàng/Kỹ thuật viên','1179','')"; roleVn111[16] = "('Y tá','1175','')"; var roleVn112 = new Array();
roleVn112[0] = "('- Chọn Vai trò -','','')";roleVn112[1] = "('Dược sĩ','1191','')"; roleVn112[2] = "('Giám sát/Bảo đảm Chất lượng','1194','')"; roleVn112[3] = "('Khác','1197','')"; roleVn112[4] = "('Kỹ thuật viên Dược','1192','')"; roleVn112[5] = "('Nghiên cứu viên','1193','')"; roleVn112[6] = "('Quản lý','1196','')"; roleVn112[7] = "('Trợ lý Phòng thí nghiệm','1195','')"; var roleVn113 = new Array();
roleVn113[0] = "('- Chọn Vai trò -','','')";roleVn113[1] = "('Bác sĩ chuyên khoa tim','1166','')"; roleVn113[2] = "('Bác sĩ Gây mê','1169','')"; roleVn113[3] = "('Bác sĩ nhãn khoa','1172','')"; roleVn113[4] = "('Bác sĩ Nhi khoa','1171','')"; roleVn113[5] = "('Bác sĩ phẫu thuật','1164','')"; roleVn113[6] = "('Bác sĩ phẫu thuật Nha khoa','1165','')"; roleVn113[7] = "('Bác sĩ Phụ khoa','1168','')"; roleVn113[8] = "('Bác sĩ Tâm thần','1167','')"; roleVn113[9] = "('Bác sĩ thú y','1173','')"; roleVn113[10] = "('Bác sĩ Tiết niệu','1170','')"; roleVn113[11] = "('Bác sĩ/Bác sĩ Đa khoa','1163','')"; roleVn113[12] = "('Chuyên gia Y học khác','1174','')"; var roleVn114 = new Array();
roleVn114[0] = "('- Chọn Vai trò -','','')";roleVn114[1] = "('Giám sát viên/Trưởng Nhóm','1433','')"; roleVn114[2] = "('Hướng dẫn viên Du lịch','1427','')"; roleVn114[3] = "('Hướng dẫn viên Khách sạn','1426','')"; roleVn114[4] = "('Khác','1436','')"; roleVn114[5] = "('Lễ tân','1424','')"; roleVn114[6] = "('Nhân viên Bán vé','1432','')"; roleVn114[7] = "('Quản gia Khách sạn','1425','')"; roleVn114[8] = "('Quản lý','1435','')"; roleVn114[9] = "('Quản trị viên Khách sạn','1434','')"; roleVn114[10] = "('Đại lý Casino','1429','')"; roleVn114[11] = "('Điều hành Casino','1430','')"; roleVn114[12] = "('Điều hành Du thuyền','1431','')"; roleVn114[13] = "('Điều phối viên/Đại lý Lữ hành','1428','')"; var roleVn115 = new Array();
roleVn115[0] = "('- Chọn Vai trò -','','')";roleVn115[1] = "('Bảo trì Máy móc','1343','')"; roleVn115[2] = "('Bảo trì Tòa nhà/Thiết bị','1342','')"; roleVn115[3] = "('Giám sát viên/Trưởng Nhóm','1344','')"; roleVn115[4] = "('Khác','1346','')"; roleVn115[5] = "('Quản lý','1345','')"; var roleVn116 = new Array();
roleVn116[0] = "('- Chọn Vai trò -','','')";roleVn116[1] = "('Khác','1538','')"; var roleVn117 = new Array();
roleVn117[0] = "('- Chọn Vai trò -','','')";roleVn117[1] = "('Khác','1439','')"; roleVn117[2] = "('Quản lý','1438','')"; roleVn117[3] = "('Thợ Máy/Kỹ thuật viên In ấn','1437','')"; var roleVn118 = new Array();
roleVn118[0] = "('- Chọn Vai trò -','','')";roleVn118[1] = "('Hướng dẫn viên Thể dục thẩm mỹ','1442','')"; roleVn118[2] = "('Khác','1445','')"; roleVn118[3] = "('Nhân viên Mát-xa trị liệu','1443','')"; roleVn118[4] = "('Quản lý','1444','')"; roleVn118[5] = "('Thợ Làm đẹp/Trang điểm','1440','')"; roleVn118[6] = "('Thợ Uốn tóc','1441','')"; var roleVn119 = new Array();
roleVn119[0] = "('- Chọn Vai trò -','','')";roleVn119[1] = "('Khác','1452','')"; roleVn119[2] = "('Lính cứu hỏa','1450','')"; roleVn119[3] = "('Lính/Quân nhân','1449','')"; roleVn119[4] = "('Quản lý','1451','')"; roleVn119[5] = "('Sĩ quan An ninh','1446','')"; roleVn119[6] = "('Sĩ quan Cảnh sát','1447','')"; roleVn119[7] = "('Vệ sĩ','1448','')"; var roleVn120 = new Array();
roleVn120[0] = "('- Chọn Vai trò -','','')";roleVn120[1] = "('Cố vấn','1454','')"; roleVn120[2] = "('Khác','1456','')"; roleVn120[3] = "('Nhân viên Xã hội','1453','')"; roleVn120[4] = "('Quản lý','1455','')"; var roleVn121 = new Array();
roleVn121[0] = "('- Chọn Vai trò -','','')";roleVn121[1] = "('Đào tạo & Phát triển','1535','')"; var roleVn130 = new Array();
roleVn130[0] = "('- Chọn Vai trò -','','')";roleVn130[1] = "('Khác','1146','')"; roleVn130[2] = "('Kiểm toán','1143','')"; roleVn130[3] = "('Quản lý','1145','')"; roleVn130[4] = "('Quản lý tài sản/Thanh lý','1125','')"; roleVn130[5] = "('Thuế','1144','')"; var roleVn131 = new Array();
roleVn131[0] = "('- Chọn Vai trò -','','')";roleVn131[1] = "('Kế toán & Báo cáo Tài chính','1126','')"; roleVn131[2] = "('Kế toán cơ bản/Sổ sách Kế toán/Điều hành Tài khoản','1124','')"; roleVn131[3] = "('Khác','1130','')"; roleVn131[4] = "('Quản lý','1129','')"; roleVn131[5] = "('Quản lý/Kế toán Chi phí/Phân tích Kinh doanh','1127','')"; var roleVn132 = new Array();
roleVn132[0] = "('- Chọn Vai trò -','','')";roleVn132[1] = "('Khác','1142','')"; roleVn132[2] = "('Kho bạc/Tài chính Doanh nghiệp','1131','')"; roleVn132[3] = "('Môi giới chứng khoán','1139','')"; roleVn132[4] = "('Ngân hàng Đầu tư','1136','')"; roleVn132[5] = "('Phân tích Cổ phiếu/Chứng khoán','1138','')"; roleVn132[6] = "('Quan hệ Đầu tư','1133','')"; roleVn132[7] = "('Quản lý','1141','')"; roleVn132[8] = "('Quản lý Quỹ/Đầu tư','1137','')"; roleVn132[9] = "('Quản lý Rủi ro Doanh nghiệp','1134','')"; roleVn132[10] = "('Thư ký Công ty','1060','')"; var roleVn133 = new Array();
roleVn133[0] = "('- Chọn Vai trò -','','')";roleVn133[1] = "('Khác','1463','')"; roleVn133[2] = "('Lễ tân','1461','')"; roleVn133[3] = "('Nhân viên Hành chính','1457','')"; roleVn133[4] = "('Nhân viên Nhập liệu','1460','')"; roleVn133[5] = "('Quản lý','1462','')"; roleVn133[6] = "('Quản trị Hợp đồng','1458','')"; roleVn133[7] = "('Thư ký','1459','')"; var roleVn134 = new Array();
roleVn134[0] = "('- Chọn Vai trò -','','')";roleVn134[1] = "('Dịch vụ Khách hàng - Chung','1467','')"; roleVn134[2] = "('Giám sát viên/Trưởng Nhóm','1469','')"; roleVn134[3] = "('Khác','1471','')"; roleVn134[4] = "('Nhân viên Trung tâm Cuộc Gọi','1468','')"; roleVn134[5] = "('Quản lý','1470','')"; var roleVn135 = new Array();
roleVn135[0] = "('- Chọn Vai trò -','','')";roleVn135[1] = "('Hoạch định Tài chính/Quản lý Tài sản','1151','')"; roleVn135[2] = "('Khác','1162','')"; roleVn135[3] = "('Khiếu nại/Hòa giải','1152','')"; roleVn135[4] = "('Kiểm toán nội bộ','1157','')"; roleVn135[5] = "('Nhà Bảo hiểm (Bảo hiểm)','1155','')"; roleVn135[6] = "('Nhà Kinh tế','1158','')"; roleVn135[7] = "('Nhà Phân tích','1159','')"; roleVn135[8] = "('Quản lý','1161','')"; roleVn135[9] = "('Quản lý Kho bạc','1149','')"; roleVn135[10] = "('Quản lý Rủi ro','1153','')"; roleVn135[11] = "('Quản lý Tín dụng','1154','')"; roleVn135[12] = "('Tín dụng Bán lẻ/Hoạt động của chi nhánh','1147','')"; roleVn135[13] = "('Tín dụng Doanh nghiệp','1148','')"; roleVn135[14] = "('Tính toán Bảo hiểm','1156','')"; roleVn135[15] = "('Tuân thủ quy định','1150','')"; roleVn135[16] = "('Vay/Thế chấp','1160','')"; var roleVn137 = new Array();
roleVn137[0] = "('- Chọn Vai trò -','','')";roleVn137[1] = "('Khác','1123','')"; roleVn137[2] = "('Lương thưởng & Phúc lợi','1117','')"; roleVn137[3] = "('Nhân sự chung','1115','')"; roleVn137[4] = "('Nhân viên Thống kê Lương','1116','')"; roleVn137[5] = "('Phát triển tổ chức/Quản lý Thay đổi','1119','')"; roleVn137[6] = "('Quan hệ Nhân viên/Lao động','1118','')"; roleVn137[7] = "('Quản lý','1122','')"; roleVn137[8] = "('Sức khỏe & An toàn','1121','')"; roleVn137[9] = "('Tuyển dụng/Nhân sự','1120','')"; var roleVn138 = new Array();
roleVn138[0] = "('- Chọn Vai trò -','','')";roleVn138[1] = "('Khác','1069','')"; roleVn138[2] = "('Luật sư','1058','')"; roleVn138[3] = "('Luật sư Bằng sáng chế/Thương hiệu','1059','')"; roleVn138[4] = "('Nhân viên Quản trị Doanh nghiệp','1062','')"; roleVn138[5] = "('Nhân viên Điều hành Nguyên tắc','1061','')"; roleVn138[6] = "('Quản lý','1068','')"; roleVn138[7] = "('Quản lý Hợp đồng','1067','')"; roleVn138[8] = "('Sinh viên Thực tập Luật/Thực tập','1065','')"; roleVn138[9] = "('Thư ký Công ty','1060','')"; roleVn138[10] = "('Thư ký Luật','1064','')"; roleVn138[11] = "('Trợ lý pháp lý/Trợ lý luật sư','1063','')"; var roleVn139 = new Array();
roleVn139[0] = "('- Chọn Vai trò -','','')";roleVn139[1] = "('Khác','1112','')"; roleVn139[2] = "('Nghiên cứu Thị trường','1107','')"; roleVn139[3] = "('Nhân viên Điều hành Tiếp thị','1105','')"; roleVn139[4] = "('Phát triển Kinh doanh','1109','')"; roleVn139[5] = "('Quản lý','1111','')"; roleVn139[6] = "('Quản lý Nhãn hiệu','1106','')"; roleVn139[7] = "('Quản lý Sản phẩm','1110','')"; roleVn139[8] = "('Quản lý sự kiện','1108','')"; var roleVn140 = new Array();
roleVn140[0] = "('- Chọn Vai trò -','','')";roleVn140[1] = "('Giám sát viên/Trưởng Nhóm','1477','')"; roleVn140[2] = "('Khác','1479','')"; roleVn140[3] = "('Kho bãi','1473','')"; roleVn140[4] = "('Kiểm soát Kho hàng','1475','')"; roleVn140[5] = "('Mua hàng','1472','')"; roleVn140[6] = "('Nhà phân tích/Tư vấn viên','1476','')"; roleVn140[7] = "('Nhân viên Lập Kế hoạch Vật tư','1474','')"; roleVn140[8] = "('Quản lý','1478','')"; var roleVn141 = new Array();
roleVn141[0] = "('- Chọn Vai trò -','','')";roleVn141[1] = "('Quan hệ Công chúng','1113','')"; roleVn141[2] = "('Truyền thông Tiếp thị','1114','')"; var roleVn142 = new Array();
roleVn142[0] = "('- Chọn Vai trò -','','')";roleVn142[1] = "('Bán hàng khu vực','1083','')"; roleVn142[2] = "('Giám sát viên/Trưởng Nhóm','1084','')"; roleVn142[3] = "('Khác','1086','')"; roleVn142[4] = "('Nhân viên Điều hành Bán hàng/Quản trị Tài khoản','1079','')"; roleVn142[5] = "('Phân phối/Kênh bán hàng','1081','')"; roleVn142[6] = "('Quản lý','1085','')"; roleVn142[7] = "('Tư vấn viên Bán hàng','1082','')"; roleVn142[8] = "('Điều phối viên Hỗ trợ Bán hàng','1080','')"; var roleVn143 = new Array();
roleVn143[0] = "('- Chọn Vai trò -','','')";roleVn143[1] = "('Giám sát viên/Trưởng Nhóm','1090','')"; roleVn143[2] = "('Khác','1092','')"; roleVn143[3] = "('Kỹ sư Bán hàng','1088','')"; roleVn143[4] = "('Nhân viên Điều hành Bán hàng/Quản trị Tài khoản','1087','')"; roleVn143[5] = "('Quản lý','1091','')"; roleVn143[6] = "('Tư vấn viên Bán hàng','1089','')"; var roleVn144 = new Array();
roleVn144[0] = "('- Chọn Vai trò -','','')";roleVn144[1] = "('Giám sát viên/Trưởng Nhóm','1096','')"; roleVn144[2] = "('Khác','1098','')"; roleVn144[3] = "('Quản lý','1097','')"; roleVn144[4] = "('Tư vấn viên Dịch vụ Tài chính','1095','')"; roleVn144[5] = "('Đại lý Bán hàng (Các dịch vụ tài chính khác)','1094','')"; roleVn144[6] = "('Đại lý Bảo hiểm','1093','')"; var roleVn145 = new Array();
roleVn145[0] = "('- Chọn Vai trò -','','')";roleVn145[1] = "('Giám sát viên/Trưởng Nhóm','1076','')"; roleVn145[2] = "('Khác','1078','')"; roleVn145[3] = "('Nhân viên Điều hành Bán hàng','1074','')"; roleVn145[4] = "('Quản lý','1077','')"; roleVn145[5] = "('Thu ngân','1075','')"; var roleVn146 = new Array();
roleVn146[0] = "('- Chọn Vai trò -','','')";roleVn146[1] = "('Khác','1466','')"; roleVn146[2] = "('Quản lý','1465','')"; roleVn146[3] = "('Thư ký/Trợ lý cá nhân','1464','')"; var roleVn147 = new Array();
roleVn147[0] = "('- Chọn Vai trò -','','')";roleVn147[1] = "('Chuỗi Cung ứng','1481','')"; roleVn147[2] = "('Giám sát viên/Trưởng Nhóm','1487','')"; roleVn147[3] = "('Khác','1489','')"; roleVn147[4] = "('Kho bãi','1473','')"; roleVn147[5] = "('Kho vận','1480','')"; roleVn147[6] = "('Nhà phân tích/Tư vấn viên','1486','')"; roleVn147[7] = "('Quản lý','1488','')"; roleVn147[8] = "('Vận tải biển','1482','')"; roleVn147[9] = "('Đại lý vận tải','1485','')"; roleVn147[10] = "('Điều hành vận tải biển','1483','')"; var roleVn148 = new Array();
roleVn148[0] = "('- Chọn Vai trò -','','')";roleVn148[1] = "('Giám đốc Công nghệ (CTO)','1493','')"; roleVn148[2] = "('Giám đốc Hoạt động (COO)','1491','')"; roleVn148[3] = "('Giám đốc Tài chính (CFO)','1492','')"; roleVn148[4] = "('Giám đốc Điều hành (CEO)/Giám đốc Quản lý','1490','')"; roleVn148[5] = "('Khác','1495','')"; roleVn148[6] = "('Quản trị viên Khu vực/Quốc gia','1494','')"; var roleVn149 = new Array();
roleVn149[0] = "('- Chọn Vai trò -','','')";roleVn149[1] = "('Khác','1499','')"; roleVn149[2] = "('Người buôn bán','1496','')"; roleVn149[3] = "('Nhân viên tạo Hình ảnh','1053','')"; roleVn149[4] = "('Quản trị viên Thương mại','1498','')"; var roleVn150 = new Array();
roleVn150[0] = "('- Chọn Vai trò -','','')";roleVn150[1] = "('Buôn bán Nhà đất','1503','')"; roleVn150[2] = "('Cho Thuê Nhà đất','1502','')"; roleVn150[3] = "('Khác','1508','')"; roleVn150[4] = "('Nhà phân tích/Tư vấn viên','1506','')"; roleVn150[5] = "('Nhân viên Đàm phán Bất động sản','1500','')"; roleVn150[6] = "('Phát triển Nhà đất','1505','')"; roleVn150[7] = "('Quản lý','1507','')"; roleVn150[8] = "('Quản lý Nhà đất','1504','')"; roleVn150[9] = "('Định giá Nhà đất','1501','')"; var roleVn151 = new Array();
roleVn151[0] = "('- Chọn Vai trò -','','')";roleVn151[1] = "('Giám sát viên/Trưởng Nhóm','1102','')"; roleVn151[2] = "('Khác','1104','')"; roleVn151[3] = "('Nhân viên Điều hành Bán hàng/Quản trị Tài khoản','1099','')"; roleVn151[4] = "('Quản lý','1103','')"; roleVn151[5] = "('Tư vấn viên Bán hàng qua điện thoại','1101','')"; roleVn151[6] = "('Điều phối viên Hỗ trợ Bán hàng','1100','')"; var roleVn152 = new Array();
roleVn152[0] = "('- Chọn Vai trò -','','')";roleVn152[1] = "('Hỗ trợ kỹ thuật CNTT','1536','')"; var roleVn180 = new Array();
roleVn180[0] = "('- Chọn Vai trò -','','')";roleVn180[1] = "('Khác','1225','')"; roleVn180[2] = "('Kiến trúc sư','1220','')"; roleVn180[3] = "('Nhà thiết kế Nội thất','1221','')"; roleVn180[4] = "('Nhân viên Quy hoạch Thành phố','1223','')"; roleVn180[5] = "('Nhân viên Vẽ phác họa/Vẽ Thiết kế','1222','')"; roleVn180[6] = "('Quản lý','1224','')"; var roleVn181 = new Array();
roleVn181[0] = "('- Chọn Vai trò -','','')";roleVn181[1] = "('Bán vé Máy bay','1511','')"; roleVn181[2] = "('Bảo trì Máy bay','1513','')"; roleVn181[3] = "('Khác','1517','')"; roleVn181[4] = "('Kỹ sư Hàng không Vũ trụ','1330','')"; roleVn181[5] = "('Phi công','1510','')"; roleVn181[6] = "('Quản lý','1516','')"; roleVn181[7] = "('Tiếp viên Hàng không','1509','')"; roleVn181[8] = "('Điều hành Sân bay','1514','')"; var roleVn182 = new Array();
roleVn182[0] = "('- Chọn Vai trò -','','')";roleVn182[1] = "('Giám sát viên/Trưởng Nhóm','1521','')"; roleVn182[2] = "('Giám sát/Bảo đảm Chất lượng','1520','')"; roleVn182[3] = "('Khác','1523','')"; roleVn182[4] = "('Nghiên cứu viên/Nhà khoa học','1518','')"; roleVn182[5] = "('Quản lý','1522','')"; roleVn182[6] = "('Trợ lý Phòng thí nghiệm','1519','')"; var roleVn183 = new Array();
roleVn183[0] = "('- Chọn Vai trò -','','')";roleVn183[1] = "('Giám sát viên/Trưởng Nhóm','1526','')"; roleVn183[2] = "('Khác','1528','')"; roleVn183[3] = "('Nhà Hóa học/Nghiên cứu viên','1524','')"; roleVn183[4] = "('Quản lý','1527','')"; roleVn183[5] = "('Trợ lý Phòng thí nghiệm','1525','')"; var roleVn184 = new Array();
roleVn184[0] = "('- Chọn Vai trò -','','')";roleVn184[1] = "('Giám sát viên/Trưởng Nhóm','1215','')"; roleVn184[2] = "('Giám sát/Bảo đảm Chất lượng','1213','')"; roleVn184[3] = "('Khác','1218','')"; roleVn184[4] = "('Kỹ sư công trường','1207','')"; roleVn184[5] = "('Kỹ sư kết cấu','1206','')"; roleVn184[6] = "('Kỹ sư Môi trường, Y tế & An toàn','1208','')"; roleVn184[7] = "('Kỹ sư xây dựng','1205','')"; roleVn184[8] = "('Nhân viên vẽ Xây dựng/Kết cấu','1209','')"; roleVn184[9] = "('Quản lý','1217','')"; roleVn184[10] = "('Quản lý Dự án','1216','')"; roleVn184[11] = "('Quản lý Hợp đồng','1211','')"; roleVn184[12] = "('Quản đốc/Kỹ thuật viên','1214','')"; roleVn184[13] = "('Thanh tra Đất đai','1210','')"; roleVn184[14] = "('Thư ký Việc làm/Giám sát công trường','1212','')"; var roleVn185 = new Array();
roleVn185[0] = "('- Chọn Vai trò -','','')";roleVn185[1] = "('Giám sát viên/Trưởng Nhóm','1300','')"; roleVn185[2] = "('Giám sát/Bảo đảm Chất lượng','1295','')"; roleVn185[3] = "('Khác','1304','')"; roleVn185[4] = "('Kỹ sư Hóa học','1292','')"; roleVn185[5] = "('Kỹ sư Nghiên cứu & Phát triển','1299','')"; roleVn185[6] = "('Kỹ sư Quy trình','1293','')"; roleVn185[7] = "('Kỹ thuật viên/Trợ lý','1294','')"; roleVn185[8] = "('Người viết chuyên Kỹ thuật','1297','')"; roleVn185[9] = "('Quản lý','1303','')"; roleVn185[10] = "('Quản lý Dự án','1301','')"; roleVn185[11] = "('Quản lý Sản phẩm','1302','')"; roleVn185[12] = "('Trợ lý Phòng thí nghiệm','1296','')"; roleVn185[13] = "('Tư vấn viên','1298','')"; var roleVn186 = new Array();
roleVn186[0] = "('- Chọn Vai trò -','','')";roleVn186[1] = "('Giám sát viên/Trưởng Nhóm','1253','')"; roleVn186[2] = "('Giám sát/Bảo đảm Chất lượng','1247','')"; roleVn186[3] = "('Khác','1257','')"; roleVn186[4] = "('Kỹ sư Kiểm tra','1245','')"; roleVn186[5] = "('Kỹ sư Nghiên cứu & Phát triển','1249','')"; roleVn186[6] = "('Kỹ sư Quy trình','1244','')"; roleVn186[7] = "('Kỹ sư SMT','1242','')"; roleVn186[8] = "('Kỹ sư Viễn thông','1243','')"; roleVn186[9] = "('Kỹ sư Điện tử','1241','')"; roleVn186[10] = "('Kỹ thuật viên/Trợ lý Điện tử','1248','')"; roleVn186[11] = "('Người viết chuyên Kỹ thuật','1250','')"; roleVn186[12] = "('Nhân Viên vẽ CAD-CAM/Điện tử','1246','')"; roleVn186[13] = "('Quản lý','1256','')"; roleVn186[14] = "('Quản lý Dự án','1255','')"; roleVn186[15] = "('Quản lý Sản phẩm','1254','')"; var roleVn187 = new Array();
roleVn187[0] = "('- Chọn Vai trò -','','')";roleVn187[1] = "('Giám sát viên/Trưởng Nhóm','1236','')"; roleVn187[2] = "('Giám sát/Bảo đảm Chất lượng','1230','')"; roleVn187[3] = "('Khác','1240','')"; roleVn187[4] = "('Kỹ sư Kiểm tra','1228','')"; roleVn187[5] = "('Kỹ sư Nghiên cứu & Phát triển','1232','')"; roleVn187[6] = "('Kỹ sư Quy trình','1227','')"; roleVn187[7] = "('Kỹ sư điện','1226','')"; roleVn187[8] = "('Kỹ thuật viên/Trợ lý Điện','1231','')"; roleVn187[9] = "('Người viết chuyên Kỹ thuật','1233','')"; roleVn187[10] = "('Nhân Viên vẽ CAD-CAM/Kỹ thuật điện','1229','')"; roleVn187[11] = "('Quản lý','1239','')"; roleVn187[12] = "('Quản lý Dự án','1238','')"; roleVn187[13] = "('Quản lý Sản phẩm','1237','')"; var roleVn188 = new Array();
roleVn188[0] = "('- Chọn Vai trò -','','')";roleVn188[1] = "('Giám sát viên/Trưởng Nhóm','1339','')"; roleVn188[2] = "('Khác','1341','')"; roleVn188[3] = "('Kỹ sư Hàng hải/Hải quân','1329','')"; roleVn188[4] = "('Kỹ sư Hàng không Vũ trụ','1330','')"; roleVn188[5] = "('Kỹ sư Hạt nhân','1333','')"; roleVn188[6] = "('Kỹ sư Luyện kim','1334','')"; roleVn188[7] = "('Kỹ sư Nghiên cứu & Phát triển','1336','')"; roleVn188[8] = "('Kỹ sư Nông nghiệp','1332','')"; roleVn188[9] = "('Kỹ sư Sinh học','1331','')"; roleVn188[10] = "('Kỹ thuật viên/Trợ lý','1335','')"; roleVn188[11] = "('Người viết chuyên Kỹ thuật','1338','')"; roleVn188[12] = "('Quản lý','1340','')"; roleVn188[13] = "('Tư vấn viên','1337','')"; var roleVn189 = new Array();
roleVn189[0] = "('- Chọn Vai trò -','','')";roleVn189[1] = "('Giám sát viên/Trưởng Nhóm','1311','')"; roleVn189[2] = "('Giám sát/Bảo đảm Chất lượng','1307','')"; roleVn189[3] = "('Khác','1313','')"; roleVn189[4] = "('Kỹ sư Môi trường, Y tế & An toàn','1208','')"; roleVn189[5] = "('Kỹ sư Nghiên cứu & Phát triển','1308','')"; roleVn189[6] = "('Kỹ thuật viên/Trợ lý','1306','')"; roleVn189[7] = "('Người viết chuyên Kỹ thuật','1310','')"; roleVn189[8] = "('Quản lý','1312','')"; roleVn189[9] = "('Tư vấn viên','1309','')"; var roleVn190 = new Array();
roleVn190[0] = "('- Chọn Vai trò -','','')";roleVn190[1] = "('Giám sát viên/Trưởng Nhóm','1325','')"; roleVn190[2] = "('Giám sát/Bảo đảm Chất lượng','1321','')"; roleVn190[3] = "('Khác','1328','')"; roleVn190[4] = "('Kỹ sư Dầu khí/Bể chứa','1314','')"; roleVn190[5] = "('Kỹ sư Khoan/Giếng','1315','')"; roleVn190[6] = "('Kỹ sư Nghiên cứu & Phát triển','1322','')"; roleVn190[7] = "('Kỹ sư Quá trình','1317','')"; roleVn190[8] = "('Kỹ sư Sản xuất','1318','')"; roleVn190[9] = "('Kỹ sư Thiết bị','1316','')"; roleVn190[10] = "('Kỹ thuật viên/Trợ lý','1320','')"; roleVn190[11] = "('Người viết chuyên Kỹ thuật','1324','')"; roleVn190[12] = "('Nhân Viên vẽ CAD-CAM/Vẽ kỹ thuật','1319','')"; roleVn190[13] = "('Quản lý','1327','')"; roleVn190[14] = "('Quản lý Dự án','1326','')"; var roleVn191 = new Array();
roleVn191[0] = "('- Chọn Vai trò -','','')";roleVn191[1] = "('Bảo mật Phần mềm','1007','')"; roleVn191[2] = "('Bảo đảm Chất lượng Phần mềm','1005','')"; roleVn191[3] = "('Giám sát viên/Trưởng Nhóm','1011','')"; roleVn191[4] = "('Giáo viên Phần mềm/Ứng dụng','1009','')"; roleVn191[5] = "('Khác','1015','')"; roleVn191[6] = "('Kiểm toán viên CNTT','1008','')"; roleVn191[7] = "('Kiến trúc sư Phần mềm','1002','')"; roleVn191[8] = "('Kỹ sư/Lập trình viên Phần mềm','1000','')"; roleVn191[9] = "('Người viết chuyên Kỹ thuật','1006','')"; roleVn191[10] = "('Nhà nghiên cứu','1010','')"; roleVn191[11] = "('Nhà phân tích Hệ thống','1001','')"; roleVn191[12] = "('Nhà phân tích Kinh doanh/Tư vấn viên Chức năng','1003','')"; roleVn191[13] = "('Quản lý','1014','')"; roleVn191[14] = "('Quản lý Dự án','1012','')"; roleVn191[15] = "('Quản lý Sản phẩm','1013','')"; var roleVn192 = new Array();
roleVn192[0] = "('- Chọn Vai trò -','','')";roleVn192[1] = "('Giám sát viên/Trưởng Nhóm','1041','')"; roleVn192[2] = "('Giáo viên CNTT','1038','')"; roleVn192[3] = "('Khác','1043','')"; roleVn192[4] = "('Kiểm soát/Bảo đảm Chất lượng','1036','')"; roleVn192[5] = "('Kỹ sư Phần cứng Máy tính','1032','')"; roleVn192[6] = "('Kỹ thuật viên','1033','')"; roleVn192[7] = "('Người viết chuyên Kỹ thuật','1035','')"; roleVn192[8] = "('Nhân viên Tư vấn','1037','')"; roleVn192[9] = "('Quản lý','1042','')"; roleVn192[10] = "('Quản lý Dự án','1039','')"; roleVn192[11] = "('Quản lý Sản phẩm','1040','')"; roleVn192[12] = "('Trợ lý Kỹ thuật','1034','')"; var roleVn193 = new Array();
roleVn193[0] = "('- Chọn Vai trò -','','')";roleVn193[1] = "('Bảo mật Hạ tầng','1020','')"; roleVn193[2] = "('Chuyên viên CNTT/MIS','1026','')"; roleVn193[3] = "('Giám sát viên/Trưởng Nhóm','1027','')"; roleVn193[4] = "('Giáo viên CNTT','1021','')"; roleVn193[5] = "('Khác','1031','')"; roleVn193[6] = "('Kiểm soát/Bảo đảm Chất lượng','1022','')"; roleVn193[7] = "('Kiểm toán viên CNTT','1023','')"; roleVn193[8] = "('Kỹ sư Mạng/Hệ thống','1016','')"; roleVn193[9] = "('Người viết chuyên Kỹ thuật','1024','')"; roleVn193[10] = "('Quản lý','1030','')"; roleVn193[11] = "('Quản lý Dự án','1028','')"; roleVn193[12] = "('Quản lý Sản phẩm','1029','')"; roleVn193[13] = "('Quản trị viên Cơ sở dữ liệu','1019','')"; roleVn193[14] = "('Quản trị viên Hệ thống','1017','')"; var roleVn194 = new Array();
roleVn194[0] = "('- Chọn Vai trò -','','')";roleVn194[1] = "('Giám sát viên/Trưởng Nhóm','1288','')"; roleVn194[2] = "('Khác','1291','')"; roleVn194[3] = "('Kỹ sư Kiểm tra','1277','')"; roleVn194[4] = "('Kỹ sư Nghiên cứu & Phát triển','1286','')"; roleVn194[5] = "('Kỹ sư Quy trình','1276','')"; roleVn194[6] = "('Kỹ thuật viên/Nhà điều hành Sản xuất','1282','')"; roleVn194[7] = "('Người viết chuyên Kỹ thuật','1285','')"; roleVn194[8] = "('Nhà thiết kế Công nghiệp/Sản phẩm','1052','')"; roleVn194[9] = "('Nhà thiết kế Khuôn','1278','')"; roleVn194[10] = "('Nhân Viên vẽ CAD-CAM/Vẽ kỹ thuật','1283','')"; roleVn194[11] = "('Quản lý','1290','')"; roleVn194[12] = "('Quản lý Dự án','1289','')"; roleVn194[13] = "('Thợ dụng cụ/Thợ máy','1279','')"; roleVn194[14] = "('Thợ hàn','1281','')"; roleVn194[15] = "('Thợ máy Chính xác','1280','')"; var roleVn195 = new Array();
roleVn195[0] = "('- Chọn Vai trò -','','')";roleVn195[1] = "('Giám sát viên/Trưởng Nhóm','1271','')"; roleVn195[2] = "('Giám sát/Bảo đảm Chất lượng','1266','')"; roleVn195[3] = "('Khác','1275','')"; roleVn195[4] = "('Kỹ sư Cơ khí','1261','')"; roleVn195[5] = "('Kỹ sư Kiểm tra','1264','')"; roleVn195[6] = "('Kỹ sư Nghiên cứu & Phát triển','1268','')"; roleVn195[7] = "('Kỹ sư Ô tô','1262','')"; roleVn195[8] = "('Kỹ sư Quy trình','1263','')"; roleVn195[9] = "('Kỹ thuật viên/Trợ lý','1267','')"; roleVn195[10] = "('Người viết chuyên Kỹ thuật','1269','')"; roleVn195[11] = "('Nhân Viên vẽ CAD-CAM/Cơ khí','1265','')"; roleVn195[12] = "('Quản lý','1274','')"; roleVn195[13] = "('Quản lý Dự án','1273','')"; roleVn195[14] = "('Quản lý Sản phẩm','1272','')"; var roleVn196 = new Array();
roleVn196[0] = "('- Chọn Vai trò -','','')";roleVn196[1] = "('Kỹ sư Dụng cụ','1258','')"; roleVn196[2] = "('Kỹ sư Hệ thống Điều khiển','1259','')"; var roleVn197 = new Array();
roleVn197[0] = "('- Chọn Vai trò -','','')";roleVn197[1] = "('Giám sát/Bảo đảm Chất lượng','1537','')"; var roleVn198 = new Array();
roleVn198[0] = "('- Chọn Vai trò -','','')";roleVn198[1] = "('Thanh tra Sản lượng','1219','')"; var roleVn199 = new Array();
roleVn199[0] = "('- Chọn Vai trò -','','')";roleVn199[1] = "('Giám sát viên/Trưởng Nhóm','1532','')"; roleVn199[2] = "('Giám sát/Bảo đảm Chất lượng','1531','')"; roleVn199[3] = "('Khác','1534','')"; roleVn199[4] = "('Nghiên cứu viên/Nhà khoa học','1529','')"; roleVn199[5] = "('Quản lý','1533','')"; roleVn199[6] = "('Trợ lý Phòng thí nghiệm','1530','')"; var roleVn200 = new Array();
roleVn200[0] = "('- Chọn Vai trò -','','')";roleVn200[1] = "('Kỹ sư Công nghiệp/Sản xuất','1260','')"; 

