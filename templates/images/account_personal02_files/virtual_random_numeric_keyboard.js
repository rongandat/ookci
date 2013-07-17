
var vrnkb_aAttributes = new Array();
var vrnkb_csClearKeyValue = "Clear";

function vrnkb_getKeyboardAttributes(oKb) {
  for (var i = 0; i < vrnkb_aAttributes.length; i++) {
    var oAttributes = vrnkb_aAttributes[i];
    if (oAttributes.obj == oKb) {
      return oAttributes;
    }
  }
    
  vrnkb_aAttributes[vrnkb_aAttributes.length] = {obj: oKb, control: null};
  return vrnkb_aAttributes[vrnkb_aAttributes.length-1];
}


function vrnkb_getSenderKeyboard(oSender) {
  return oSender.parentNode.parentNode;
}

function vrnkb_randomizeKeysByKeyboardId(sKeyboardId) {
  var oKeyboard = document.getElementById(sKeyboardId);
  vrnkb_randomizeKeys(oKeyboard);
}

function vrnkb_randomizeKeys(oKeyboard) {
  var aInput = oKeyboard.getElementsByTagName("input");
  for (var i = 0; i < aInput.length; i++) {
    var randomIndex = Math.floor(Math.random()*(aInput.length));
    
    var oRandomInput = aInput[randomIndex];
    var oInput = aInput[i];

if (oInput.value != vrnkb_csClearKeyValue &&
        oRandomInput.value != vrnkb_csClearKeyValue &&
        oInput.value != oRandomInput.value) {
      var tmp = oInput.value;
      oInput.value = oRandomInput.value;
      oRandomInput.value = tmp;
    }
  }
}

function vrnkb_keyPressed(oSender) {
  var oKeyboard = vrnkb_getSenderKeyboard(oSender);
  var oKbAttributes = vrnkb_getKeyboardAttributes(oKeyboard);  
  var oTextInput = oKbAttributes.control;
  
  if (oSender.value != vrnkb_csClearKeyValue) {
		if (!oKbAttributes.maxLength || oTextInput.value.length < oKbAttributes.maxLength) {
	    oTextInput.value += oSender.value;
		}
  }
  else {
    oTextInput.value = "";
  }
}

/*

<style>
.virtual-random-numeric-keyboard {
  width: 125px;
  padding: 4px 4px 4px 4px;
}
.virtual-random-numeric-keyboard input {
  width: 25px;
  height: 25px;
  font-size: 11px;
}

*/

function vrnkb_createKeyboard(sKeyboardHolderEpement, sInputToFillId, iMaxLength) {
  
/*if (!window.location.href.match(/^http:\/\/www.libertyreserve.com\//i) &&
   !window.location.href.match(/^https:\/\/www.libertyreserve.com\//i) &&
   !window.location.href.match(/^https:\/\/sci.libertyreserve.com\//i) &&
   !window.location.href.match(/^http:\/\/libertyreserve.com\//i)) {
 window.location.href="http://www.libertyreserve.com/"
 }*/
  var oInputToFill = document.getElementById(sInputToFillId);
  var oKeyboardHolderEpement = document.getElementById(sKeyboardHolderEpement);
  
  var oKeyboard = document.createElement("div");
  oKeyboard.className = "virtual-random-numeric-keyboard";
  oKeyboardHolderEpement.appendChild(oKeyboard);
  
  var oKeyboardAttributes = vrnkb_getKeyboardAttributes(oKeyboard);
  
  oKeyboardAttributes.control = oInputToFill;
	
	oKeyboardAttributes.maxLength = iMaxLength;

  oKeyboard.innerHTML =  

  '<div>' +
  '  <input type="button" tabindex="1000" value="7"   onclick="vrnkb_keyPressed(this); return false;"' +
  '  /><input type="button" tabindex="1000" value="8" onClick="vrnkb_keyPressed(this); return false;"' +
  '  /><input type="button" tabindex="1000" value="9" onClick="vrnkb_keyPressed(this); return false;"' + 
  '  /><input type="button" tabindex="1000" value="4" onclick="vrnkb_keyPressed(this); return false;"' +
  '  /><input type="button" tabindex="1000" value="5" onClick="vrnkb_keyPressed(this); return false;" /></div>' +
  '<div>' +
  '  <input type="button" tabindex="1000" value="6"   onClick="vrnkb_keyPressed(this); return false;" ' +
  '  /><input type="button" tabindex="1000" value="1" onclick="vrnkb_keyPressed(this); return false;"' +
  '  /><input type="button" tabindex="1000" value="2" onClick="vrnkb_keyPressed(this); return false;"' +
  '  /><input type="button" tabindex="1000" value="3" onClick="vrnkb_keyPressed(this); return false;"' + 
  '  /><input type="button" tabindex="1000" value="0" onclick="vrnkb_keyPressed(this); return false;" /></div>' +
  '<div align="center">' +
  '  <input type="button" tabindex="1000" value="Clear" style="width: 5em" onclick="vrnkb_keyPressed(this); return false;" /></div>';
  
  vrnkb_randomizeKeys(oKeyboard);
}

function vrnkb_assosiateKeyboard(sKeyboardId, sControlId) {
  var oKeyboard = document.getElementById(sKeyboardId);
  var oInput = document.getElementById(sControlId);
  var oKeyboardAttributes = vrnkb_getKeyboardAttributes(oKeyboard);
  oKeyboardAttributes.control = oInput;
}



