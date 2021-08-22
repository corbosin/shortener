<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'shortener';
$base_url='http://localhost:shortener';


function generateRandomURL($length = 3) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

Print_r('http://localhost:3333/' . generateRandomURL());
