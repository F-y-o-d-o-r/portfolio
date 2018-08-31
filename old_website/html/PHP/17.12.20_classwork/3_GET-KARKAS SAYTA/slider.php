<div id="slider" style="width:200px; float:left; text-align:center;">
</div>

<script>
  var mass_img = new Array('lenovo.jpg', 'acer.jpg', 'hp.jpg');
  var i = 0;
  setInterval('func_img()', <?PHP
      if(isset($_GET['interval'])){
        echo 500;
      } else {
        echo 1500;
      }
      ?>);
  function func_img() {
    i++;
    if (i == mass_img.length) {
      i = 0;
    }
    var sl = document.getElementById('slider');
    sl.innerHTML = '<img src=' + mass_img[i] + '>';
  }
</script>