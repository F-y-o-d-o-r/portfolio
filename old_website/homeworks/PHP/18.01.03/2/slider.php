<div id="slider" style="width:200px; float:left; text-align:center; margin-top: 70px;">
  <img src=hp.jpg>
</div>

<script>

  var i = 0;
  var interv = setInterval('func_img()', 2000);

  function func_img() {
    if (mass_img_all.length) {
      if (i == mass_img_all.length) {
        i = 0;
      }
      var sl = window.parent.document.getElementById('slider');
      sl.innerHTML = '<img src=' + mass_img_all[i].getAttribute('src') + '>';
      i++;
    }

  }
</script>