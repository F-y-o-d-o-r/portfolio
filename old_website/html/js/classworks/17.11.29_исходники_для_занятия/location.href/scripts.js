$(document).ready(function () {
  var elem_img = decodeURIComponent(location.search.substring(1));
  var img_name = elem_img.substr(elem_img.indexOf("=") + 1);
  /*var arr_img = document.body.getElementsByTagName("img");
  for (var i = 0; i < arr_img.length; i++) {
    if (arr_img[i].getAttribute("name") === img_name) {
      arr_img[i].style.opacity = 0.5;
    }
  }*/
  $("[name = '" + img_name + "']").css('opacity', '0.5');
  $('body').on('click', '[name = "menu_first"]', function () {
    location.href='index.html?name=menu_first';
  });
  $('body').on('click', '[name = "menu_demo"]', function () {
    location.href='view_demo.html?name=menu_demo';
  });
  $('body').on('click', '[name = "menu_login"]', function () {
    location.href='view_user_login.html?name=menu_login';
  });
});
