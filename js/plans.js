/* global xmlHttp */

function GetXmlHttpObject() {
    var xmlHttp = null;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    } catch (e) {
        // Internet Explorer
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}

function keyset(key, e) {

    if (e.keyCode == 13) {
        document.getElementById(key).focus();
    }
}

function got_focus(key) {
    document.getElementById(key).style.backgroundColor = "#000066";

}

function lost_focus(key) {
    document.getElementById(key).style.backgroundColor = "#000000";
}

function newent() {


    document.getElementById('entryNoTxt').value = "";
    document.getElementById('visitorTypeCombo').value = "STANDRED VISIT";

    document.getElementById('msg_box').innerHTML = "";
    document.getElementById('msg_box1').innerHTML = "";
    document.getElementById('approveCombo').value = "Mr Yasiru";

    getdt();
}


function del_item(cdate) {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "plans_data.php";
    url = url + "?Command=" + "setitem";
    url = url + "&Command1=" + "del_item";
    url = url + "&home_no=" + cdate;

    xmlHttp.onreadystatechange = del;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}
function del_item1() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "plans_data.php";
    url = url + "?Command=" + "setitem1";
    url = url + "&home_no=" + document.getElementById('itemdesc').value;
    
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function save_inv() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    if (document.getElementById('home_no').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block' style='float:left; margin-top: -10px;'>Home No Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('owner').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block' style='float:left; margin-top: -10px;'>Owner Not Enterd</span></div>";
        return false;
    }
    if (document.getElementById('address').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block' style='float:left; margin-top: -10px;'>Address Not Enterd</span></div>";
        return false;
    }

    if (document.getElementById('itemdetails').innerHTML == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block' style='float:left; margin-top: -10px;'>Family Details Not Enterd</span></div>";
        return false;
    }

    var url = "plans_data.php";
    url = url + "?Command=" + "save_item";

    url = url + "&home_no=" + document.getElementById('home_no').value;
    url = url + "&owner=" + document.getElementById('owner').value;
    url = url + "&enter_date=" + document.getElementById('enter_date').value;
    url = url + "&address=" + document.getElementById('address').value;

    if (document.getElementById('sex').checked == true) {
        url = url + "&check" + "=1";
    } else {
        url = url + "&check" + "=0";
    }

    xmlHttp.onreadystatechange = salessaveresult;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function salessaveresult() {

    document.getElementById('home_no').value = "";
    document.getElementById('enter_date').value = "";
    document.getElementById('name').value = "";
    document.getElementById('job').value = "";
    document.getElementById('nic').value = "";
    document.getElementById('bday').value = "";
    document.getElementById('sex').checked = false;
    document.getElementById('itemdetails').innerHTML = "";

    setTimeout(function () {
        location.reload()
    }, 10);

}


function ADD(cdata) {
//shan 04/24
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "plans_data.php";
    url = url + "?Command=" + "setitem";
    url = url + "&Command1=" + "add_tmp";

    if (document.getElementById('sex').checked == true) {
        url = url + "&check" + "=1";
    } else {
        url = url + "&check" + "=0";
    }
    url = url + "&home_no=" + document.getElementById('home_no').value;
    url = url + "&name=" + document.getElementById('name').value;
    url = url + "&job=" + document.getElementById('job').value;
    url = url + "&nic=" + document.getElementById('nic').value;
    url = url + "&bday=" + document.getElementById('bday').value;

    xmlHttp.onreadystatechange = added_tmp;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function added_tmp() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
        document.getElementById('itemdetails').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;

        document.getElementById('name').value = "";
        document.getElementById('job').value = "";
        document.getElementById('nic').value = "";
        document.getElementById('bday').value = "";
        document.getElementById('sex').checked = false;

    }
}
