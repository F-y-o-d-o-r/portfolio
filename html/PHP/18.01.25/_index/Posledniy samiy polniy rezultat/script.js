function func_select_extract(el_form, el_select) {
var arr_options=document.forms[el_form].elements[el_select].options;
for(var i=0; i<arr_options.length; i++) {
if(arr_options[i].text.indexOf("#")!=-1) {      //!!!!!...
var option_value=arr_options[i].text.substring(0, arr_options[i].text.indexOf("#"));
var option_text=arr_options[i].text.substr(arr_options[i].text.indexOf("#")+1);
arr_options[i].value=option_value;
arr_options[i].text=option_text;
}
}
}

function func_bold_before(marker) {
  var elem_tbody=document.getElementById("tbody")
  var tr_mas=elem_tbody.getElementsByTagName("tr");
  for(var i=0; i<tr_mas.length; i++) {
     if(tr_mas[i].childNodes[0].textContent==marker) {
        tr_mas[i].style.fontWeight="bold";
        elem_tbody.insertBefore(tr_mas[i], elem_tbody.firstChild);
     }
  }
}