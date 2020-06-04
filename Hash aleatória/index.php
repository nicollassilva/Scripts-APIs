<?php

function generatePassword($s) {
    $a = "0123456789abcdefghijklmnopqrstuvwxyz+-&%#@()ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $b = str_shuffle($a);
    $c = substr($b, 0, $s);
    return $c;
}

echo generatePassword(15);
// 5UuIxw&4t)+AGLe