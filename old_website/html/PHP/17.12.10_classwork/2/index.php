<?php
$arr1 = array(4, 5, 8);
$arr2 = array(array(4, 2, 8), array('b', 'a', 'c'));
//f-cii arr
echo count($arr1) . "<br>";
echo count($arr2) . "<br>";
foreach ($arr2 as $k1 => $arr21) {
    echo "$k1 " . count($arr21) . "<br>";
}

echo '<hr>';

$arr1 = array(4, 5, 8);
echo key($arr1) . " " . current($arr1) . "<br>";
next($arr1);
echo key($arr1) . " " . current($arr1) . "<br>";
echo key($arr1) . " " . end($arr1) . "<br>";
//prev, end
reset($arr1);
echo key($arr1) . " " . current($arr1) . "<br>";

echo '<hr>';

$arr2 = array(array(4, 2, 8), array('b', 'a', 'c'));
echo key($arr2) . " " . current($arr2) . "<br>";
foreach ($arr2 as $k1 => $arr21) {
    next($arr21);
    echo key($arr21) . " " . current($arr21) . "<br>";
}

echo '<hr>';

$arr1 = array(10, 'a' => 5, 8);
$arr2 = array(array(4, 2, 8), array('b', 'a', 'c'));
asort($arr1);
//sort($arr1);//убирает а и меняет ключ - значение. надо asort
print_r($arr1) . '<br>';
//rsrort, ksort - key, krsort - reverse

echo '<hr>';

/*asort($arr2);*/
foreach ($arr2 as $k1 => $arr21) {
    asort($arr2[$k1]);
}
print_r($arr2) . '<br>';

echo '<hr>';

$day = array('Вторник', 'Среда', 'Понедельник');
//asort($day);
usort($day, 'func_sort');
function func_sort($a1, $a2)
{
    $day_null = array(1 => 'Понедельник', 2 => 'Вторник', 3 => 'Среда');
    foreach ($day_null as $kd => $dd) {
        if ($dd == $a1) {
            $ka1 = $kd;
        }
        if ($dd == $a2) {
            $ka2 = $kd;
        }
    }
    if ($ka1 > $ka2) {
        return 1;
    } else if ($ka1 == $ka2) {
        return 0;
    } else return -1;
}

print_r($day);

echo '<hr>';

$arr2 = array(array(4, 2, 8), array('b', 'a', 'c'));
for ($i = 0; $i < count($arr2); $i++) {
    for ($j = 0; $j < count($arr2[$i]); $j++) {
        if ($arr2[$i][$j] == 'a') {
            $letter = $arr2[$i][$j];
            //echo $letter;
            $arr2[$i][$j] = "<span style='color: red'>" . $arr2[$i][$j] . "</span>";
        }
    }
}
print_r($arr2);
//сделать через  foreach

echo "<hr>";

$arr2 = array(array(4, 2, 8), array('b', 'a', 'c'));
foreach ($arr2 as $index_arr2 => $elemtns_arr2) {
    foreach ($elemtns_arr2 as $elemtns_elemtns_arr2) {
        //echo $elemtns_elemtns_arr2;
        if ($elemtns_elemtns_arr2 === 'a') {
            //echo "<span style='color: red'>" . $elemtns_elemtns_arr2 . "</span>";
            $elemtns_elemtns_arr2 = "<span style='color: red'>" . $elemtns_elemtns_arr2 . "</span>";
        }
    }
}
print_r($arr2);