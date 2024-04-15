<?php

$name = "нет";
$phone = "нет";

if(!empty($_POST["name"])){
    $name = $_POST["name"];
}
if(!empty($_POST["phone"])){

    $phone = $_POST["phone"];
}

$json = file_get_contents(__DIR__ . '/data.json');
$array = json_decode($json, true);

function insert($user = [])
{

    $users['name'] = $user[0];
    $users['phone'] = $user[1];
    return $users;
}

$array[] = insert([$name,$phone]);

$json = json_encode($array, JSON_UNESCAPED_UNICODE);
file_put_contents(__DIR__ . '/data.json', $json);

header("Location: index.php");