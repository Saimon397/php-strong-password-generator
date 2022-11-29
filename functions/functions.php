<?php

function getRandomPsw($string): string
{
    $length = strlen($string) - 1;
    $random = rand(0, $length);
    return $string[$random];
};
