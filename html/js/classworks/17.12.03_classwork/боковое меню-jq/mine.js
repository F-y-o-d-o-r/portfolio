var BaseRecord = (function () {
  $(document).ready(function () {
    $("body").on("mouseover", "li", function () {
      BaseRecord.mouse("over", $(this).attr("class"));
    });
    $("body").on("mouseout", "li", function () {
      BaseRecord.mouse("out", '');
    });
    $("body").on("change", "[name = 'select1']", function () {
      BaseRecord.list = form1.select1.options[form1.select1.selectedIndex].text;
    });
  });

  return {
    mouse: function (over_out, li_select) {
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
        //a = '<ol style="list-style-type:none;"><li>' + a1 + '</li><br><li>' + a2 + '</li><br><li>' + a3 + '</li></ol>';
        a = this.model(a1, a2, a3, this.list);
      }
      else if (over_out === 'out') {
        a = '';
      }
//container_right.innerHTML=a;
      $("#container_right").html(a);
    },
    model: function (a1, a2, a3, list) {
      return '<' + list + '><li>' + a1 + '</li><br><li>' + a2 + '</li><br><li>' + a3 + '</li></' + list + '>';
    },
    list: 'ul'
  }
})();









