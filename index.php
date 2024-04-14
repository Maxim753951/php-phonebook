<!DOCTYPE html>
<html>
<head>
    <title>Телефонный справочник</title>
    <meta charset="utf-8" />
</head>
<body>
<h3>Новый контакт</h3>
<form action="add.php" method="POST">
    <p>Имя: <input type="text" name="name" size="22"/></p>
    <p>Номер: <input type="number" name="phone" /></p>
    <input type="submit" value="добавить" style=" width: 225px">
</form>

<h3>Все контакты</h3>

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

        echo "<td style='text-align: center'>";
            ?>
            <a href="/delete.php?key=<?php echo $key ?>">удалить</a>
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