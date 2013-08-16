//******************************************
//				autolabel.js				
//			by Cameron Gaut, 2006			
//				www.modcam.com				
//
//******************************************/	

/*
Description: Automatically searches for all text boxes with values and converts their values into grayed
text that disappears when the input receives focus. If the user has not typed anything and switches the
focus to another input, the default value will re-appear. To use this script, upload to your web site
and link to it in the <head> area.

if the auto-label feature does not work, change your body tag to <body onload="labelFields()">

<script language="JavaScript" type="text/javascript" src="autolabel.js"></script>

If you have dynamically generated fields, convert them to labeled fields with "initField(FIELD_NAME)"
Enjoy!

*/
function labelFields() {
	if (!document.getElementsByTagName){ return; }
	var allfields = document.getElementsByTagName("input");	
	for (var i=0; i<allfields.length; i++){ 	// loop through all input tags and add events
		initField(allfields[i]);
	}
	var allfields2 = document.getElementsByTagName("textarea");	
	for (var i=0; i<allfields2.length; i++){ 	// loop through all textarea tags and add events
		initField(allfields2[i]);
	}
}
function initField(field) {
	if (field) { //prevent misfire
		var graycolor = "#888";
		if ((field.type == "text" || field.type == "textarea" || field.type == "password") && (field.value != null)) {	// include text boxes, exclude empty ones
			field.style.color = graycolor;
			field.graytext = field.value;
			field.onfocus = function () {
				if (this.value==this.graytext){
					this.style.color="#000";
					this.value="";
				} else {
					this.select();
				}
			}
			field.onblur = function () {
				if (this.value=="") {
					this.style.color=graycolor;
					this.value=this.graytext;
				}
			}
		}
	}
}
window.onload = function() {
	labelFields();
}

