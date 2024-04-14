<?php

$key = $_GET["key"];

$json = file_get_contents(__DIR__ . '/data.json');
$array = json_decode($json, true);

unset($array[$key]);

$json = json_encode($array, JSON_UNESCAPED_UNICODE);
file_put_contents(__DIR__ . '/data.json', $json);

header("Location: index.php");