<?php
const e = 2.72;

res(1,11);

function res($y, $x)
{
    $z = pow($y, $x) + sqrt(abs($x) + pow(e, $y)) - log(abs($x ** +7 * $x + 5));
    echo $z;
};