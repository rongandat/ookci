// JavaScript Document


/*//////////////////////////////////////////////////////////////////////////////
//                                                                            //
//  An Array object extensions                                                //
//                                                                            //
//////////////////////////////////////////////////////////////////////////////*/

if (!Array.prototype.push) {
  Array.prototype.push = function(oElem) {
    this[this.length] = oElem;
    return this.length;
  }
}

if (!Array.prototype.shift) {
  Array.prototype.shift = function() {
    var response = this[0];
    for (var i=0; i < this.length-1; i++) { this[i] = this[i + 1]; }
    this.length--;
    return response;
  }
}

Array.prototype.contains = function(value) {
  for (var i=0; i < this.length; i++) {
    if (this[i] == value) {
      return true;
    }
  }
  return false;
}

/*//////////////////////////////////////////////////////////////////////////////
//                                                                            //
//  A String object extensions                                                //
//                                                                            //
//////////////////////////////////////////////////////////////////////////////*/

String.prototype.trim = function() {
  var startsAt = 0;
  var endsAt = this.length;
  
  for(var six = 0; six < this.length; six++) {
    var ch = this.charAt(six);
    if (ch == ' ' || ch == '\r' || ch == '\n' || ch == '\t' ) {
      startsAt++;
    }
    else {
      break;
    }
  }

  for(var eix = this.length - 1; eix >= 0 ; eix--) {
    var ch = this.charAt(six);
    if (ch == ' ' || ch == '\r' || ch == '\n' || ch == '\t' ) {
      endsAt--;
    }
    else {
      break;
    }
  }
  
  return startsAt >= endsAt ? '' : this.slice(startsAt, endsAt);
}


String.prototype.isStartsWith = function(str) {
	return this.indexOf(str) == 0;
}

/*//////////////////////////////////////////////////////////////////////////////
//                                                                            //
//  Helpers                                                    								//
//                                                                            //
//////////////////////////////////////////////////////////////////////////////*/

function $(sElemId) {
  return document.getElementById(sElemId);
}


function $t(sTag,oObj) {
  oObj = oObj || document;
	
	var oElems = oObj.getElementsByTagName(sTag);
	var aResult = [];
	for (var i = 0; i < oElems.length; i++) {
		aResult.push(oElems.item(i));
	}
	
  return aResult;
}

function $c(sClass,oObj,sTag) {
  oObj = oObj || document;
  if (!oObj.length) { oObj = [oObj]; }
  var aElements = [];
  for(var i = 0; i<oObj.length; i++) {
    oEl = oObj[i];
    if(oEl.getElementsByTagName) {
      oObj.children = oEl.getElementsByTagName(sTag || '*');
      for (var j = 0; j<oObj.children.length; j++) {
        oObj.child = oObj.children[j];
        if(oObj.child.className&&(new RegExp('\\b'+sClass+'\\b').test(oObj.child.className))) {
          aElements.push(oObj.child);
        }
      }
    }
  }
  return aElements;
}


/*//////////////////////////////////////////////////////////////////////////////
//                                                                            //
//  Object helpers                                            								//
//                                                                            //
//////////////////////////////////////////////////////////////////////////////*/

var common = new Object();

common.extendObject = function(oWhat, oWith, bReplace) {
  for(property in oWith) {
    if (bReplace == true) {
      oWhat[property] = oWith[property];
    }
    else {
      if (!(oWhat[property])) {
        oWhat[property] = oWith[property];
      }
    }
    
  }
}

common.extendPrototype = function(oWhat, oWith, bReplace) {
  this.extendObject(oWhat.prototype, oWith.prototype, bReplace);
}


/*//////////////////////////////////////////////////////////////////////////////
//                                                                            //
//  BrowserInfo                                                               //
//                                                                            //
//////////////////////////////////////////////////////////////////////////////*/

function BrowserInfo() {
  // simplify things
  var agent   = navigator.userAgent.toLowerCase();
  
  // detect platform
  this.isMac    = (agent.indexOf('mac') != -1);
  this.isWin    = (agent.indexOf('win') != -1);
  this.isWin2k  = (this.isWin && (
      agent.indexOf('nt 5') != -1));
  this.isWinSP2 = (this.isWin && (
      agent.indexOf('xp') != -1 || 
      agent.indexOf('sv1') != -1));
  this.isOther  = (
      agent.indexOf('unix') != -1 || 
      agent.indexOf('sunos') != -1 || 
      agent.indexOf('bsd') != -1 ||
      agent.indexOf('x11') != -1 || 
      agent.indexOf('linux') != -1);
  
  // detect browser
  this.isSafari = (agent.indexOf('safari') != -1);
  this.isSafari2 = (this.isSafari && (parseFloat(agent.substring(agent.indexOf("applewebkit/")+"applewebkit/".length,agent.length).substring(0,agent.substring(agent.indexOf("applewebkit/")+"applewebkit/".length,agent.length).indexOf(' '))) >=  300));
  this.isOpera  = (agent.indexOf('opera') != -1);
  this.isIE   = (agent.indexOf('msie') != -1);
	this.isGecko =  (agent.indexOf('Gecko') != -1);
}
var browser = new BrowserInfo();


/*//////////////////////////////////////////////////////////////////////////////
//                                                                            //
//  Window utils                                                              //
//                                                                            //
//////////////////////////////////////////////////////////////////////////////*/

var wnd = new Object();

wnd.openedWindows = new Array ();

wnd.popupWindowDefaults = {
  resizable: "yes",
  width: 500,
  height: 550,
	location: "no",
  toolbar: "no",  
  menubar: "no",  
  status:  "no",  
  scrollbars: "yes",
  titlebar: "no"
};

wnd.propertiesToString = function(oObj, sNameValueSeparator, sPairsSeaparator) {
  
  if (!sNameValueSeparator) {
    sNameValueSeparator = "=";
  }
  
  if (!sPairsSeaparator) {
    sPairsSeaparator = ","; 
  }
  
  var bIsFirst = true;
  var sRet = "";
  
  for(property in oObj) {
    if (!bIsFirst) {
      sRet += sPairsSeaparator;
    }
    else {
      bIsFirst = false;
    }
    
    sRet += property + sNameValueSeparator + oObj[property];
  }
  
  return sRet;
}

/*////////////////////////////////////////////////////////////////////////////////*/

wnd.showPopup = function (osUrlContainer, sName, oOptions, bReplace) {
  
  if (sName == null || sName == "") {
    sName = "_blank";
  }
  
  var sUrl = null;
  
  if (oOptions) {
    common.extendObject(oOptions, this.popupWindowDefaults);
  }
    
  if (!osUrlContainer.length && (osUrlContainer && osUrlContainer.tagName.toLowerCase() == "a")) {
    sUrl = osUrlContainer.href;
  }
  else {
    sUrl = osUrlContainer;
  }
  
  if (sUrl == null) {
    return false;
  }
  
  if (sName != null && 
      sName != "_blank" && 
      wnd.openedWindows[sName] != null &&
      !wnd.openedWindows[sName].closed) {
    
    if (wnd.openedWindows[sName].href != sUrl) {
      wnd.openedWindows[sName].href = sUrl;
    }
    
    wnd.openedWindows[sName].focus();   
  }
  else {
    
    var sOptions = "";
    
    if (oOptions) { 
      common.extendObject(oOptions, this.popupWindowDefaults);
      sOptions = this.propertiesToString(oOptions);
    }
    else {
      sOptions = this.propertiesToString(this.popupWindowDefaults);
    }

    window.open(sUrl, sName, sOptions, bReplace).focus();
  }
  return false;
}

wnd.closeThisWindow = function(bUpdateOpener) {
  var opener = window.opener;
  if (bUpdateOpener == true && (opener)) {
    opener.location = opener.location;
  }

  if (opener) {
    opener.focus();
  }

  window.close();
}
