// JavaScript Document
function ajaxLoadPage(pageURL,contentID)
{
    if (pageURL.length > 0){
        //        $("#loading").show();
        $.ajax({
            url: pageURL, 
            cache: false, 
            success: function(message) {                                    
                $(contentID).empty().append(message);
            //              $("#loading").hide();             
            }
        });                         
    }
}

function simpleTabSelected(tabsID, tabPageURL,tabContentID)
{
    ajaxLoadPage(tabPageURL,tabContentID); 
    $('ul.'+tabsID+' a').removeClass('selected');
    $(this).addClass('selected');		
}

//Check All/Un Check All checkbox elements
//ref	=1 --> Check All element clicked
//red	=0	-> Check Box element clicked
// checkAllId	=	ID of the check all checkbox, exm: 'checkAll'
// checkAllListId	=	ID(array) of the checkboxes list, exm: 'del[]'
function checkAllCheckBoxes(ref,checkAllId, checkAllListId) {
    var chkAll = document.getElementById(checkAllId);
    var checks = document.getElementsByName(checkAllListId);
    var boxLength = checks.length;
    var allChecked = false;
    var totalChecked = 0;
    if ( ref == 1 ) {
        if ( chkAll.checked == true ) {
            for ( i=0; i < boxLength; i++ ) {
                checks[i].checked = true;
            }
        }
        else {
            for ( i=0; i < boxLength; i++ ) {
                checks[i].checked = false;
            }
        }
    }
    else {
        for ( i=0; i < boxLength; i++ ) {
            if ( checks[i].checked == true ) {
                allChecked = true;
                continue;
            }
            else {
                allChecked = false;
                break;
            }
        }
        if ( allChecked == true ) {
            chkAll.checked = true;
        }
        else {
            chkAll.checked = false;
        }
    }
    for ( j=0; j < boxLength; j++ ) {
        if ( checks[j].checked == true ) {
            totalChecked++;
        }
    }
}

// reload secure image(turining number image)
function refreshSecureImage()
{
    document.getElementById('secure_image').src = document.getElementById('secure_image').src + '&' + (new Date()).getMilliseconds();
}

//redirect to new URL
function redirect(url)
{
    window.location.href	=	url;
}

// open center popup window
function openPopup(windowUri,windowHeight, windowWidth, windowName)
{
    var centerWidth = (window.screen.width - windowWidth) / 2;
    var centerHeight = (window.screen.height - windowHeight) / 2;

    newWindow = window.open(windowUri, windowName, 'resizable=0,width=' + windowWidth + 
        ',height=' + windowHeight + 
        ',left=' + centerWidth + 
        ',top=' + centerHeight);

    newWindow.focus();
    return newWindow.name;
}



var crc32 = (function() {
    function utf8encode(str) {
        var utf8CharCodes = [];

        for (var i = 0, len = str.length, c; i < len; ++i) {
            c = str.charCodeAt(i);
            if (c < 128) {
                utf8CharCodes.push(c);
            } else if (c < 2048) {
                utf8CharCodes.push((c >> 6) | 192, (c & 63) | 128);
            } else {
                utf8CharCodes.push((c >> 12) | 224, ((c >> 6) & 63) | 128, (c & 63) | 128);
            }
        }
        return utf8CharCodes;
    }

    var cachedCrcTable = null;

    function buildCRCTable() {
        var table = [];
        for (var i = 0, j, crc; i < 256; ++i) {
            crc = i;
            j = 8;
            while (j--) {
                if ((crc & 1) == 1) {
                    crc = (crc >>> 1) ^ 0xEDB88320;
                } else {
                    crc >>>= 1;
                }
            }
            table[i] = crc >>> 0;
        }
        return table;
    }

    function getCrcTable() {
        if (!cachedCrcTable) {
            cachedCrcTable = buildCRCTable();
        }
        return cachedCrcTable;
    }

    return function(str) {
        var utf8CharCodes = utf8encode(str), crc = -1, crcTable = getCrcTable();
        for (var i = 0, len = utf8CharCodes.length, y; i < len; ++i) {
            y = (crc ^ utf8CharCodes[i]) & 0xFF;
            crc = (crc >>> 8) ^ crcTable[y];
        }
        return (crc ^ -1) >>> 0;
    };
})();