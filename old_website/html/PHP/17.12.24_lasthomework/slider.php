<div id="slider" style="width:200px; background-color:white; border-top:1px solid gainsboro; box-sizing:border-box; float:left; text-align:center;">
</div>

<script>
var mass_img=new Array();
<?php
if(isset($_FILES['userfile']['name'])) {
for($i=0; $i<count($_FILES['userfile']['name']); $i++) {
?>
mass_img[<?php echo $i; ?>]='<?php echo $_FILES['userfile']['name'][$i]; ?>';
<?php
}
?>
setInterval('func_img()', 1500);
<?php
}
?>
//var mass_img=new Array('lenovo.jpg', 'acer.jpg', 'hp.jpg');
var i=0;
//setInterval('func_img()', 1500);
function func_img() {
if(i==mass_img.length) {i=0;}
var sl=document.getElementById('slider');
sl.innerHTML='<img src='+mass_img[i]+'>';
i++;
}
</script>