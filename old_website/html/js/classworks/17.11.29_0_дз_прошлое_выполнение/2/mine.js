function setCookie(name, val, expMonth) {
  var cook = name + "=" + escape(val) + ";";
  if (expMonth != 0) {
    var d = new Date();
    d.setMonth(d.getMonth() + expMonth);
    cook += "expires=" + d.toUTCString() + ";";
  }
  document.cookie = cook;
}
function getCookieValue(name) {
  var cookieValue = document.cookie;
  var r = new RegExp("\\b" + name + "\\b");
  var cookieStart = cookieValue.search(r);
  if (cookieStart == -1)
    cookieValue = null;
  else {
    cookieStart = cookieValue.indexOf("=", cookieStart) + 1;
    var cookieEnd = cookieValue.indexOf(";", cookieStart);
    if (cookieEnd == -1)
      cookieEnd = cookieValue.length;
    cookieValue = unescape(cookieValue.substring(cookieStart, cookieEnd));
  }
  return cookieValue;
}

function col(elem) {
  var rdiv = document.body.getElementsByTagName("div");
  for (var i = 0; i < rdiv.length; i++) {
    if (rdiv[i] == elem) {
      rdiv[i].setAttribute("style", "background-color:red;");
    }
    else {
      rdiv[i].setAttribute("style", "background-color:gold;");
    }
  }
  setCookie("red", elem.getAttribute("id"), 6);
}
function load_page1() {
  if (getCookieValue("red") != null) {
    var elemm = document.getElementById(getCookieValue("red"));
    elemm.setAttribute("style", "background-color:red;");
  }
}

function load_page2() {
  if (getCookieValue("red") != null) {
    var rdiv = document.body.getElementsByTagName("div");
    for (var i = 0; i < rdiv.length; i++) {
      if (rdiv[i].getAttribute("id") == getCookieValue("red")) {
        rdiv[i].setAttribute("style", "background-color:red;");
      }
      else {
        rdiv[i].setAttribute("style", "background-color:gold;");
      }
    }
  }
}


