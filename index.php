<?php
require __DIR__ . "/SqlGenerator.php";

$table = "user";
$columns = ["username", "password", "email"];
$values = [
    ["theAdmin", "mdp", "admin@gmail.com"],
    ["bob", "mdp", "bob@gmail.com"],
    ["zog", "mdp", "zog@gmail.com"]
];

echo SqlInsertGenerator::generateQuery($table, $columns, $values);
SqlInsertGenerator::generateFile($table, $columns, $values);