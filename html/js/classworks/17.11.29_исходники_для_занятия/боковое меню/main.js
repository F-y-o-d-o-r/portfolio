/**
 * Created by user on 29.11.2017.
 */
$(document).ready(function () {
  $('body').on('mouseout', 'li', function () {
    func_mouse('out', '');
  });
  $('body').on('mouseover', 'li', function () {
    func_mouse('over', $(this).attr('class'));
  });
});
function func_mouse(over_out, li_select) {
  var a, a1, a2, a3;
  if (over_out === 'over') {
    switch (li_select) {
      case "computer":
        a1 = "Lenovo";
        a2 = "Acer";
        a3 = "Asus";
        break;
      case "printer":
        a1 = "HP";
        a2 = "Samsung";
        a3 = "Epson";
        break;
      case "router":
        a1 = "TP-Link";
        a2 = "D-Link";
        a3 = "Ericsson";
        break;
    }
    a = '<ol style="list-style-type:none;"><li>' + a1 + '</li><br><li>' + a2 + '</li><br><li>' + a3 + '</li></ol>';
  }
  else if (over_out === 'out') {
    a = '';
  }
  container_right.innerHTML = a;
}