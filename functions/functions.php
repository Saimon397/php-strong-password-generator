<?php

function getRandomPsw($string): string
{
    $length = strlen($string) - 1;
    $randomNumber = rand(0, $length);
    return $string[$randomNumber];
};
