// JavaScript Document

/*//////////////////////////////////////////////////////////////////////////////
//                                                                            //
//  Element effects wrapper                                                   //
//                                                                            //
//////////////////////////////////////////////////////////////////////////////*/

function ElementEffects(oWrapElem) {
  this.wrappedElem = oWrapElem;
  this.framerate = 30;
}

ElementEffects.prototype.show = function(bShow) {
  this.wrappedElem.style.display = (bShow != false) ? '' : 'none';  
}

ElementEffects.prototype.hide = function() {
  this.show(false);
}

ElementEffects.setElementOpacity = function(oElem, iOpacity) {
  oElem.style.opacity = (iOpacity / 101);
  oElem.style.MozOpacity = (iOpacity / 100);
  oElem.style.KhtmlOpacity = (iOpacity / 100);
  oElem.style.filter = "alpha(opacity=" + iOpacity + ")"; 
  if (iOpacity > 0) {
    oElem.style.display = "";
  }
}


ElementEffects.prototype.setOpacity = function(iOpacity) {
  ElementEffects.setElementOpacity(this.wrappedElem, iOpacity);
}

ElementEffects.prototype.getIsVisible = function(iOpacity) {
  return this.wrappedElem.style.display != 'none';
}

ElementEffects.getElementPosition = function(oElem) {
  var pos = new Object();
  
  pos.left = oElem.offsetLeft;
  pos.top = oElem.offsetTop;
  pos.width = oElem.offsetWidth;
  pos.height = oElem.offsetHeight;  
  
  while (oElem.offsetParent != null) {
    oElem = oElem.offsetParent;
    pos.left += oElem.offsetLeft;
    pos.top += oElem.offsetTop;
  }
  

  return pos;
}



ElementEffects.prototype.getPosition = function() {
  return  ElementEffects.getElementPosition(this.wrappedElem)
}

ElementEffects.prototype.setLeft = function(i) {
	this.wrappedElem.style.left = i+"px";
}

ElementEffects.prototype.setTop = function(i) {
	this.wrappedElem.style.top = i+"px";
}

ElementEffects.prototype.setWidth = function(i) {
	this.wrappedElem.style.width = i+"px";
}

ElementEffects.prototype.setHeight = function(i) {
	this.wrappedElem.style.height = i+"px";
}


ElementEffects.addElementEvent = function (oElem, sEvent, func) {
  if (oElem.addEventListener) {
    oElem.addEventListener(sEvent, func, false);
  } 
  if (oElem.attachEvent) {
    oElem.attachEvent('on' + sEvent, func);
  }
}

ElementEffects.prototype.addEvent = function (sEvent, func) {
  ElementEffects.addElementEvent(this.wrappedElem, sEvent, func);
}

ElementEffects.prototype.fade = function(iStartOpacity, iEndOpacity, iDuration, func) {
  
  
  if (this.fadeParams != null) {
		this.fadeParams.needStop = true;
	}
	
  this.fadeParams = new Object();
   
  this.fadeParams.frameTime = 1000/this.framerate;
  this.fadeParams.startTime = new Date();
  this.fadeParams.startOpacity = iStartOpacity;
  this.fadeParams.endOpacity = iEndOpacity;
  this.fadeParams.duration = iDuration; 
  this.fadeParams.func = func;
  
  var caller = this;
  
  this.fadeParams.timeoutFunc = function() {
    
		if (caller.fadeParams.needStop) {
			return;
		}
		
    var fTimeSpent = (new Date()).getTime() - caller.fadeParams.startTime.getTime();
    var fTimeSpentCoef = fTimeSpent/caller.fadeParams.duration;
    var fOpacityInc = (iEndOpacity - iStartOpacity)* fTimeSpentCoef;
    var currentOpacity = iStartOpacity + fOpacityInc;
    caller.setOpacity(currentOpacity);
    
		if (fTimeSpent >= caller.fadeParams.duration) {
      caller.setOpacity(caller.fadeParams.endOpacity);
    }
    else {
      caller.fadeParams.timeout = setTimeout(caller.fadeParams.timeoutFunc, caller.fadeParams.frameTime);
      caller.setOpacity(currentOpacity);      
    }
    
  }
  
  this.setOpacity(this.fadeParams.startOpacity);
  this.fadeParams.timeout = setTimeout(this.fadeParams.timeoutFunc, this.fadeParams.frameTime);
}

ElementEffects.prototype.fadeAbort = function() {
  if (this.fadeParams != null) {
		this.fadeParams.needStop = true;
	}	
}
																							

ElementEffects.prototype.isOfClass = function(sName) {
	var classes = elem.className.trim().split(' ');
	for (var cix = 0; cix < classes.length; cix ++) {
		if (classes[cix] == sName) {
			return true;
		}
	}
	
	return false;
}

ElementEffects.prototype.addClass = function(sName) {
	var elem = this.wrappedElem;
	var sClasses = elem.className.trim();
	
	if(sClasses != '') {
		sClasses += ' ' + sName;
	}
	else {
		sClasses = sName;
	}
	
	elem.className = sClasses;
}

ElementEffects.prototype.removeClass = function(sName) {
	var elem = this.wrappedElem;
	var classes = elem.className.trim().split(' ');
	if (classes.contains(sName)) {
		var sNewClasses = '';
		
		for (var cix = 0; cix < classes.length; cix ++) {
			var sCurClass = classes[cix];
			if (sCurClass != sName) {
				sNewClasses += sCurClass + ' ';
			}
		}
		
		elem.className = sNewClasses;
	}
}

////////////////////////////////////////////////////////////////////////////////

var aWrappedElemntsCache = new Array();

function $ee(obj, bUseCache) {
  var oObj = (typeof obj == 'string') ? $(obj) : obj;
  if (bUseCache == true) {
    var oWrapper = aWrappedElementsCache[oObj];
    if (!(oWrapper)) {
      oWrapper = new ElementEffects(oObj);
      aWrappedElementsCache[oObj] = oWrapper;
    }
    return oWrapper;
  }
  else {
    return new ElementEffects(oObj);
  }
}
