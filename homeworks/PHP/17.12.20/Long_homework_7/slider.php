<div id="slider" style="width:200px; float:left; text-align:center; margin-top: 70px;">
  <img src=hp.jpg>
</div>

<script>
  var mass_img = new Array();

  <?php

  if(isset($_FILES['file']['name'])) {
  for($i = 0; $i < count($_FILES['file']['name']); $i++) {
  ?>

  mass_img[<?php echo $i; ?>] = '<?php echo $_FILES['file']['name'][$i]; ?>';

  <?php
  }
  ?>

  setInterval('func_img()', 1500);

  <?php
  }
  ?>

  var i = 0;
  function func_img() {
    if (i == mass_img.length) {
      i = 0;
    }
    var sl = document.getElementById('slider');
    sl.innerHTML = '<img src=' + mass_img[i] + '>';
    i++;
  }
</script>