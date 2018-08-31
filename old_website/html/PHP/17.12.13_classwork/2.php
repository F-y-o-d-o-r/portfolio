<?php
echo date('d.m.Y___H:i:s') . '<br>';
echo date('01.m.Y') . '<br>';
echo date('d.m.Y', time() + 60 * 60 * 24 * 3) . '<br>';//+3 days
echo date('d.m.Y', strtotime("-3 month")) . '<br>';//-3
//types of var
$a = 3;
if (isset($a) and !empty($a)) {
    echo ($a * 3) . '<br>';
}
////
if (gettype($a) != 'string') {
    settype($a, 'string');
    echo $a.'b<br>';
}
echo "<hr>";
//
$b = '7c';
if (gettype($b) != 'integer') {
    $b = intval($b); //perevod k cifre i ybrat 4to posle + dlya zagiti ot inyekcii
    echo $b * 5;
}
echo "<hr>";
//
//is_string is_bool is_array
$arr = array('i' => array(1,2,3), 's' => array('a','b','c'));
print_r($arr);
echo '<br>';
print_r($arr['i'][1]);
echo '<br>';
$arr_obj = (object)$arr;
print_r($arr_obj);
echo '<br>';
print_r($arr_obj -> i[1]);
echo '<br>';
$arr_arr = (array)$arr_obj;//back to arr
print_r($arr_arr);

echo "<hr>";

///////////super global arrays
///$_... _post, _get, _session, _server_name, _remote_addr, _cookie[''], _request[''](get+post+cookie), globals[''], _files
echo "super global arrays";
echo '<br>';

?>






