<!DOCTYPE html>
<html>
<head>
    <title>Телефонный справочник</title>
    <meta charset="utf-8" />
</head>
<body>
<h3>Новый</h3>
<form action="add.php" method="POST">
    <p>Имя: <input type="text" name="name" size="22"/></p>
    <p>Номер: <input type="number" name="phone" /></p>
    <input type="submit" value="добавить" style=" width: 225px">
</form>

<h3>Старые</h3>

<?php

/*
$array = array
(
    array
    (
        'name' => 'test1',
        'item_id' => 348644538
),
array
(
    'name' => 'test2',
    'item_id' => '22284534453'
)
    );
*/

//header('Content-Type: application/json');
//echo $json;

$json = file_get_contents(__DIR__ . '/data.json');
$array = json_decode($json, true);

//print_r($array);

echo "<table>";


echo "<thead>";

echo "<tr>";
echo "<th>Имя</th>";
echo "<th>Номер</th>";
echo "<th>Действие</th>";
echo "</tr>";

echo "</thead>";


echo "<tbody>";

foreach ($array as $key => $row) {
    echo "<tr>";

        foreach ($row as $column) {
            echo "<td>$column</td>";
        }

        echo "<td>";
        ?>
        <form action="delete.php" method="POST">
            <input type="hidden" name="key" value="<?php $key ?>"/>
            <input type="submit" value="удалить">
        </form>
        <?php
        echo "</td>";



    echo "</tr>";
}

echo "</tbody>";


echo "</table>";

//exit();

?>

</body>
</html>