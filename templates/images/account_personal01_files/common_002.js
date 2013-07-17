
function setInfotableEvents () {

	var infotables = $c("infotable", document, "table");
	
	for (var itix = 0; itix < infotables.length; itix++) {
		var oIt = infotables[itix];
		var tbody = $t("tbody", oIt)[0]; 
		
		if (tbody) {
			var trs = $t("tr", tbody);
			
			for (var trix = 0; trix < trs.length; trix++) {
				var oTr = trs[trix];
				oTr.onmouseover = function() {eval("this.className = 'hover'");};
				oTr.onmouseout = function() {eval("this.className = ''");};
			}
		}
		
	}
}

function openHelp(sUrl) {

	//alert(browser.isIE);

	var oHelpWindow = window.open(sUrl, "LR_HELP");


	if (browser.isIE) {
		oHelpWindow.focus();

	}
	else {
		if (!oHelpWindow.closed) {
			oHelpWindow.close();
			window.open(sUrl, "LR_HELP");
		}
	}
	
}



