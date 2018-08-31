<div id="slider" style="width:200px; float:left; text-align:center; margin-top: 70px;">
  <img src=hp.jpg>
</div>

<script>
  //var mass_img = new Array();

  <?php

  if(isset($_FILES['file']['name'])) {
  for($i = 0; $i < count($_FILES['file']['name']); $i++) {
  ?>

  mass_img[<?php echo $i; ?>] = '<?php echo $_FILES['file']['name'][$i]; ?>';

  <?php
  }
  ?>

  var interv = setInterval('func_img()', 1500);

  <?php
  }

  ?>

var interv = setInterval('func_img()', 1500);
  var i = 0;
  function func_img() {
    //var mass_img_all = document.getElementById('tbody').getElementsByTagName('img');
    //console.log(mass_img_all);
    //console.log(mass_img_all.length);
    for(var i = 0; i < mass_img_all.length; i++) {
      //mass_img[i] = mass_img_all[i].getAttribute('src');
      console.log(mass_img_all[i].getAttribute("src"));
    }

    //console.log(mass_img);


    /*if (i == mass_img.length) {
      i = 0;
    }
    var sl = window.parent.document.getElementById('slider');
    sl.innerHTML = '<img src=' + mass_img[i] + '>';
    i++;*/
  }
</script>