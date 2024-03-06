<?php
$arr = [1, 0, -34, 533, 2, 31, -40, 999, -100, 100];
foreach ($arr as  $element)
{
    if ($element < 0)
        echo $element . ' ';
}