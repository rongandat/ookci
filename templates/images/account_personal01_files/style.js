
var style = new Object();

style.setInfotableEvents = function () {

	var infotables = $c("infotable", document, "table");
	
	for (var itix = 0; itix < infotables.length; itix++) {
		var oIt = infotables[itix];
		var tbody = $t("tbody", oIt)[0];
		
		if (tbody) {
			var trs = $t("tr", tbody);
			
			for (var trix = 0; trix < trs.length; trix++) {
				var oTr = trs[trix];
				oTr.onmouseover = function() {eval("$ee(this, false).addClass('hover')");};
				oTr.onmouseout = function() {eval("$ee(this, false).removeClass('hover')");};
			}
		}
		
	}
}


function PopupHint(oBehindElem, sMessage, iPosition) {
	this.message = sMessage;
	this.behindElem = $ee(oBehindElem, false);
	this.attachHintEvents();
	
	if (!iPosition) {
		iPosition = PopupHint.POSITION_BOTTOM;
	}
	
	this.position = iPosition;
	
}

PopupHint.POSITION_TOP = 1;
PopupHint.POSITION_BOTTOM = 2;
PopupHint.POSITION_LEFT = 3;
PopupHint.POSITION_RIGHT = 4;



PopupHint.minWidth = 200;
PopupHint.maxWidth = 300;
PopupHint.opacity = 85;
//PopupHint.minWidth = 200;
PopupHint.hintIco = "/img/icons/hint.gif";

PopupHint.prototype.createHint = function() {
	if (!this.hint) {
		var oHint = document.createElement("div");
		$t("body")[0].appendChild(oHint);
		
		this.hint = $ee(oHint, false);
		this.hint.addClass("popup-hint");
		this.hint.wrappedElem.style.position = "absolute";
		this.hint.wrappedElem.style.zIndex = 10;
		this.hint.wrappedElem.tabIndex = -1;
		
		
		this.hint.wrappedElem.innerHTML = 
			'<table cellpadding="0" cellspacing="0" border="0"><tr><td style="vertical-align: top; padding: 0 3px 3px 0;"><img src="'+PopupHint.hintIco+'"></td><td>'+
			this.message +
			'</td></tr></table>';
		this.hint.hide();
		this.hint.setOpacity(PopupHint.opacity);
		this.hint.hide();
	}
}


PopupHint.prototype.alignHint = function() {
	var behindElemPos = this.behindElem.getPosition();
	var hintPos = this.hint.getPosition();
	
	if (this.position == PopupHint.POSITION_BOTTOM || this.position == PopupHint.POSITION_TOP) {
		this.hint.setWidth((behindElemPos.width > PopupHint.maxWidth) ? (PopupHint.maxWidth) : ((behindElemPos.width < PopupHint.minWidth) ? PopupHint.minWidth : behindElemPos.width));		
		if (this.position == PopupHint.POSITION_BOTTOM) {
			this.hint.setLeft(behindElemPos.left);
			this.hint.setTop(behindElemPos.top + behindElemPos.height);
		}
		else if (this.position == PopupHint.POSITION_TOP) {
			this.hint.setLeft(behindElemPos.left);
			this.hint.setTop(behindElemPos.top - hintPos.height);
		}
	}
	
	if (this.position == PopupHint.POSITION_LEFT || this.position == PopupHint.POSITION_RIGHT) {
		this.hint.setWidth(PopupHint.minWidth);
		if (this.position == PopupHint.POSITION_LEFT) {
			this.hint.setLeft(behindElemPos.left - behindElemPos.width);
			this.hint.setTop(behindElemPos.top);
		}
		else if (this.position == PopupHint.POSITION_RIGHT) {
			var hintPos = this.hint.getPosition();
			this.hint.setLeft(behindElemPos.left + behindElemPos.width);
			this.hint.setTop(behindElemPos.top);
		}		
	}
	
}

PopupHint.prototype.show = function() {
	if (!this.hint) {
		this.createHint();
	}
	this.hint.show();	
	this.alignHint();
	
	this.hint.fade(1, PopupHint.opacity, 200);
}



PopupHint.prototype.hide = function() { 
	if (!this.hint) {
		this.createHint();
	}

	this.hint.fadeAbort();
	this.hint.hide();

}

PopupHint.prototype.attachHintEvents = function() {
	this.behindElem.wrappedElem.onmouseover = function() {eval("this.onmouseover.hint.show();");};
	this.behindElem.wrappedElem.onmouseover.hint = this;
	this.behindElem.wrappedElem.onmouseout 	= function() {eval("if (!this.onmouseover.isFocused) {this.onmouseover.hint.hide();};");};
	this.behindElem.wrappedElem.onblur 	= function() {eval("this.onmouseover.hint.hide();");};
}

PopupHint.attachHintUtil = function(oBehindElem, oTextContainer, iPosition) {
	var hint = new PopupHint(oBehindElem, oTextContainer.innerHTML, iPosition);
	oTextContainer.innerHTML = "&nbsp;"; 
	return hint;
}



