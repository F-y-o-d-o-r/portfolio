<?php

require_once 'a.php';
require_once 'b.php';

use A\A as A;
use B\A as B;

A::say();
B::say();

?>