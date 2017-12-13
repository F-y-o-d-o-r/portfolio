<html>
<head>
  <meta http-equiv="Content-Type" content="texthtml; charset=utf-8"/>
</head>
<body>

<?php
//echo 'hello Привет'
$a = 5;
$b = 3;
$col = 'green';
//echo '<a href = "#" id = "link" onclick = "link.style.color=\'green\';return false;">link</a><br>';
echo '<a href = "#" id = "link" onclick = "func_color(); return false;">link</a><br>';
echo "Sum $a and $b<br>";
echo "<b>" . ($a + $b) . "</b><br>";
/*echo '<script>';
echo 'function func_color(){';
echo "link.style.color='$col';}";
echo '</script>';*/

for ($i = 0; $i <= 5; $i++) {
    if ($i < 3) {
        echo "$i<br>";
    }
}

$str = 'Hello';
echo strlen($str) . "<br>";
echo substr($str, 2, 2);
echo strpos($str, 'e');
echo strpos($str, 'e', 2);
$hello = 'Hello mr Alex';
$arr1 = explode(' ', $hello);
//to see arrow
print_r($arr1);
echo strstr($str, 'e') . '<br>';//false по умолчанию
echo strstr($str, 'e', true) . '<br>';
//str_replace strip_tags - innertext like

///////////////////////////////
//arrays
$arr2[0] = 4;
$arr2[] = 2; //push
//arrays 2
$arr3 = array(4, 2 => 8);//=>index of 8 is 2
$arr3[1] = 2;
for ($i = 0; $i < count($arr3); $i++) {
  echo "$i - $arr3[$i]<br>";
}
//for each
$arr3 = array(4,'a' => 8);//=>index of 8 is 2
$arr3[1] = 2;
foreach ($arr3 as $k1 => $arr31)
  echo "$k1 - $arr31 <br>";
?>

<form action="test.post.php" method="post">
  <input type="text" name="param">
  <input type="submit" value="go">
</form>
<script>
  //php - js
  var cislo = <?php echo $a + $b; ?>;
  var coll = '<?php echo $col ?>';
  function func_color() {
    console.log(cislo);
    link.style.color = coll;
  };
  //js - php
  var user_width = screen.width;
  var user_height = screen.height;
  //location.href = 'test.get.php?w='+user_width+'&h='+user_height;
</script>
</body>
</html>
