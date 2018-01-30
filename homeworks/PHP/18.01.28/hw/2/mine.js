$(document).ready(function () {

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


