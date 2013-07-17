// JavaScript Document

//var cdt_defaults_hourText = "hour";
//var cdt_defaults_hourText = "hour";

var cdt_aTimers = new Array();

function cdt_createTimer(sTimerName, oElementToWriteTo, fCallback, oDateStart, oDateStop, bShowMilliseconds) {
	
	if (!oElementToWriteTo || !oDateStart) {
		return;
	}
	
	if (!bShowMilliseconds) {
		bShowMilliseconds = false;
	}

	if (!oDateStop) {
		oDateStop = new Date(0, 0, 0, 0, 0, 0, 0);
	}
	
	
	cdt_aTimers[sTimerName] = {
		element: oElementToWriteTo,
		callback: fCallback,
		startAt: oDateStart,
		stopAt: oDateStop,
		showMilliseconds: bShowMilliseconds
	}
}


function cdt_runTimer(sTimerName) {
	
	var timerProps = cdt_aTimers[sTimerName];
	
//	window.alert(timerProps.startAt.toTimeString());
	
	if (!timerProps) {
		return;
	}
	
	if (timerProps.stopAt.getTime() == timerProps.startAt.getTime()) {
		timerProps.callback();
		return;
	}
	
	var bIsDecremental = timerProps.startAt.getTime() > timerProps.stopAt.getTime();

	if (bIsDecremental) {
		if (timerProps.showMilliseconds) {
			timerProps.startAt.setMilliseconds(timerProps.startAt.getMilliseconds() - 1);
		}
		else {
			timerProps.startAt.setSeconds(timerProps.startAt.getSeconds() - 1);
		}
	}
	else {
		if (timerProps.showMilliseconds) {
			timerProps.startAt.setMilliseconds(timerProps.startAt.getMilliseconds() + 1);
		}
		else {
			timerProps.startAt.setSeconds(timerProps.startAt.getSeconds() + 1);
		}
	}

	timerProps.element.innerHTML = cdt_formatTime(timerProps.startAt);

	setTimeout("cdt_runTimer('"+sTimerName+"')", timerProps.showMilliseconds ? 1 : 1000);
	
}

function cdt_formatTime(oDate) {
	return oDate.getMinutes() + " min. " +oDate.getSeconds()+" sec.";
}



