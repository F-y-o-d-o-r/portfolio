<html>
<head>
  <meta http-equiv="Content-Type" content="texthtml; charset=utf-8"/>
</head>
<body>

<?php
//arrays
$arr2[0] = 4;
$arr2[] = 2; //push
print_r($arr2);
echo "<hr>";
//arrays 2
$arr3 = array(4, 2 => 8);//=>index of 8 is 2
$arr3[1] = 2;
for ($i = 0; $i < count($arr3); $i++) {
    echo "$i - $arr3[$i]<br>";
}
echo '<hr>';
//for each
$arr3 = array(4, 'a' => 8);//=>index of 8 is 2
$arr3[1] = 2;
foreach ($arr3 as $k1 => $arr31)
    echo "$k1 - $arr31 <br>";
echo '<hr>';
$arr4 = array(array(4, 2, 8), 'char' => array('b', 'a', 'c'));
for ($i = 0; $i < count($arr4); $i++) {
	for ($j = 0; $j < count($arr4[$i]); $j++) {
		echo "$i-$j-".$arr4[$i][$j]."<br>";
	}
}

echo '<hr>';

foreach ($arr4 as $k1 => $arr41) {
	foreach ($arr41 as $k2 => $arr42) {
		echo "$k1 $k2 $arr42 ". "<br>";
		if($k1 === 0) {
			 $arr4[$k1][$k2]++;// = $arr4[0][$k2]++;
		}
	}
}
echo '<hr>';
print_r($arr4);

echo '<hr>';


?>

<script>
</script>
</body>
</html>
