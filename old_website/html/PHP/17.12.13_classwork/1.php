<?php
$arr1 = array(4, 2, 8);
$arr2 = array(array(4, 2, 8), array('b', 'a', 'c'));
if (in_array(2, $arr1)) {//true-false
    $val = $arr1[array_search(2, $arr1)];//index = arr 1 1
    $arr1[array_search(2, $arr1)] = 7;
    $arr1[] = $val;
}
print_r($arr1);
/////////////////////////
echo '<hr>';
print_r($arr2);
echo '<hr>';
foreach ($arr2 as $k1 => $arr21) {
    if (in_array('a', $arr21)) {//true-false
        $val = $arr21[array_search('a', $arr21)];//index = arr 1 1
        $arr2[$k1][array_search('a', $arr21)] = 'd';
        $arr2[$k1][] = $val;
    }
}
print_r($arr2);
///////////////////////////
echo '<hr>';

foreach ($arr2 as $k1 => $arr21) {
    if (in_array('a', $arr21)) {//true-false
        $val = $arr21[array_search('a', $arr21)];//index = arr 1 1
        $arr2[$k1][array_search('a', $arr21)] = 'd';
        //$arr2[$k1][] = $val;
        $arr2[] = $val;
    }
}
print_r($arr2);
///////////////////////////

$user = array('alex' => array('Kiev', 'skype', 'phone'), 'status' => 'root');
/////////////////////
echo '<hr>';

$arr1 = array(4, 2, 8);
$arr2 = array(array(4, 2, 8), array('b', 'a', 'c'));
if (in_array(2, $arr1)) {//true-false
   unset($arr1[array_search(2, $arr1)]);//del 2
    $arr1 = array_values($arr1);//удаляет все пустые индексы и перестраивает их
}
print_r($arr1);
/////////////////////////
echo '<hr>';

foreach ($arr2 as $k1 => $arr21) {
    if (in_array('a', $arr21)) {//true-false
       unset($arr2[$k1][array_search('a', $arr21)]);//$arr21 === $arr2[$k1]
       $arr2[$k1] = array_values($arr2[$k1]);
    }
}
print_r($arr2);

/////////////////////////-----
echo '<hr>';

$arr1 = array(4, 2, 8);
$arr2 = array(array(4, 2, 8), array('b', 'a', 'c'));
if (in_array(2, $arr1)) {//true-false
    array_splice($arr1, array_search(2, $arr1), 0, 7);
}
print_r($arr1);
/////////////////////////
echo '<hr>';

foreach ($arr2 as $k1 => $arr21) {
    if (in_array('a', $arr21)) {//true-false
        //array_splice($arr2[$k1], array_search('a', $arr2[$k1]), 0, 'd');
        array_splice($arr2, $k1, 0, array($arr1));
    }
}
print_r($arr2);
/////////////////////////
echo '<hr>';

$arr1 = array(4, 2, 8);
foreach ($arr1 as $k1 => $arr21) {
    $arr1['a'.$k1] = $arr21;
    unset($arr1[$k1]);
}
print_r($arr1);
///////////////////////// mathematic function
echo '<hr>';
$arr2 = array(array(4, 2, 8), array('b', 'a', 'c'));
//print_r(min($arr2));
foreach ($arr2 as $k1 => $arr21) {
    echo "$k1 - " . min($arr21) . '<br>';
}

/////////////////////////
echo '<hr>';
//mt_rand(1,1000)
//mt - кодировка
?>