<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<style>
.men {
display:table;
display:table-cell;
text-align:center;
vertical-align:middle;
width:150px;
height:30px;
color:slategray;
background-color:powderblue;
font-weight:bold;
font-size:10pt;
border:1px solid darkseagreen;
border-radius:4px;
cursor:pointer;
}
.men:hover {
background-color:honeydew;
}
 td {background-color:whitesmoke; border:1px solid blue;}
</style>
</head>
<body style="margin:0px;">

<div id="container" style="background-color:white; width:1024px; margin:0px auto; border:1px solid gainsboro; border-radius:6px; box-sizing:content-box;">

<?php

//echo '<div id="header" style="width:1024px;">';        
include_once 'header1.php';     
include_once 'header2.php';   
//echo '</div>';        

//echo '<div id="slider_okno" style="width:1024px;">';
include_once 'slider.php';    
echo '<div id="okno" style="width:824px; background-color:white; border-left:1px solid gainsboro; box-sizing:border-box; float:right;">';
if(isset($_GET['menu'])) {
   switch($_GET['menu']) {
   case forma_img: include_once 'forma_img.php'; break;
   case forma_poisk: include_once 'forma_poisk.php'; break;
   }                                      
}
include_once 'shapka.php';  
include_once 'function.php';   
tableDOM();  
echo '</div>';
//echo '</div>';

echo '<div id="clear" style="clear:both;"></div>';

include_once 'footer.php';  

?>

<script>
<?php if(isset($_GET['menu'])) { ?>
$("[name="+'<?php echo $_GET['menu']; ?>'+"]").css("background-color", "silver").css("color", "white");
<?php } ?>
</script>

</div>

</body>
</html>
