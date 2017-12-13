<html>
<head>
    <meta http-equiv="Content-Type" content="texthtml; charset=utf-8"/>
</head>
<body>

<?php

$aa = 5;
$bb = 10;
echo '<input type="button" value="Нажать" onclick="func_size();"><br>';
echo '<div id="div0"></div>';
/*
echo '<script>';
echo 'function func_size() {';
echo 'var var_size='.($aa+$bb).';';
echo 'div0.innerHTML="<span style=\'font-size:"+var_size+"pt;\'>Текст размером 15px</span><br>";';
echo '}';
echo '</script>';
*/

?>

<script>

  function func_size() {
    var var_size = '<?php echo $aa + $bb; ?>';
    div0.innerHTML = "<span style='font-size:" + var_size + "pt;'>Текст размером 15px</span><br>";
  }

</script>

<form name="form1">
    <select name="select1" onchange="chang()">
        <option value="var1">Вариант 1</option>
        <option value="var1">Вариант 2</option>
        <option value="var1">Вариант 3</option>
    </select>
</form>

<script>

  function chang() {
    location.href = "test.php?variant_index=" + (form1.select1.selectedIndex + 1) + "&variant_text=" + form1.select1.options[form1.select1.selectedIndex].text;
  }

</script>

<?php
$a = 6;
$result = 0;
if ($a <= 5) {
    $i = 1;
    while ($i <= $a) {
        $result = $result + $i;
        $i += 2;
    }
    echo "Результат: $result";
} else {
    $i = 2;
    while ($i <= $a) {
        $result = $result + $i;
        $i += 2;
    }
    echo "Результат: $result";
}

?>

</body>
</html>
