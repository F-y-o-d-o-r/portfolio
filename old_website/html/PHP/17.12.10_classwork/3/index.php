<?php

//[a, b, c], [1, 2, 3] => [a, 1, b, 2, c, 3]
function func_combines($a, $b)
{
    $ab = array();
    foreach ($a as $ka => $aa) {
        $ab[] = $aa;
        $ab[] = $ka;
    }
    return $ab;
}

print_r($ab);

$a = array('a', 'b', 'c');
$b = array(1, 2, 3);
print_r(func_combines($a, $b));
echo '<br>';
//

?>