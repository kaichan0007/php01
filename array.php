<?php

$arr = ['a', 'b', 'c'];
echo $arr[0];
$arr[] = "d";

echo "<pre>";
var_dump($arr);
echo "</pre>";

$str = "one, two, three";

$result = explode(",", $str);

echo "<pre>";
var_dump($result);
echo "</pre>";

?>
