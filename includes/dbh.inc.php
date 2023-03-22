<?php

$serverName = "sql976.main-hosting.eu";
$dBUsername = "u244364460_daan";
$dBPassword = "[DoubzAx^94i";
$dBName = "u244364460_dev";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}