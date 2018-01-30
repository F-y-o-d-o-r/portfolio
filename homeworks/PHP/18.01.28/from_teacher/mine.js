$(document).ready(function () {
//$("body").on("click", "[name='button_translate']", function(){jquery_send("#translate_result", "post", "translate.php?type_translate="+form_translate.select_translate.options[form_translate.select_translate.selectedIndex].text, ["russian_sentence"], [form_translate.russian_sentence.value]);});
//$("body").on("keypress", "[name='russian_sentence']", function(){if(event.which==13) {jquery_send("#translate_result", "post", "translate.php?type_translate="+form_translate.select_translate.options[form_translate.select_translate.selectedIndex].text, ["russian_sentence"], [form_translate.russian_sentence.value]);return false;}});
  $("body").on("change", "[name='select_translate']", function () {
    jquery_send("#translate_result", "post", "translate.php?type_translate=" + form_translate.select_translate.options[form_translate.select_translate.selectedIndex].text, ["russian_sentence"], [form_translate.russian_sentence.value]);
  });
});


function jquery_send(elemm, method, program, param_arr, value_arr) {
  var str = '';
  for (var i = 0; i < param_arr.length; i++) {
    str += param_arr[i] + '=' + encodeURIComponent(value_arr[i]) + '&';
  }
  $.ajax({
    type: method, url: program, data: str, success: function (data) {
      $(elemm).html(data);
    }
  });
}
