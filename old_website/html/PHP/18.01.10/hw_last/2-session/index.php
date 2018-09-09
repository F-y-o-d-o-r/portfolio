<?php
session_start(); //%%%%%  
?>
<html>
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script type="text/javascript" src="ajax_post_get_jq.js"></script>
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

include_once 'header1.php';
include_once 'header2.php';   

include_once 'slider.php';    
echo '<div id="okno" style="width:824px; background-color:white; border-left:1px solid gainsboro; box-sizing:border-box; float:right;">';

echo '<div id="knopki_menu"></div>';

include_once 'shapka.php';  
include_once 'function.php';
               
echo '</div>';

echo '<div id="clear" style="clear:both;"></div>';

include_once 'footer.php';  

?>

</div>

</body>
</html>
