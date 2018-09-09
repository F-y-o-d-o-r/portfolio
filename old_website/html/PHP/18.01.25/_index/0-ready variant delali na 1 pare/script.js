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