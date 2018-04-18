<?php

function debug($variable){
	echo "<pre>";
	print_r($variable);
	echo "</pre>";
}

function str_random($length){
    $alphabet = "1234567890azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
    return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
}
