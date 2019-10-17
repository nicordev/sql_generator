<?php
require __DIR__ . "/SqlGenerator/SqlGenerator.php";

$table = "user";
$columns = ["username", "password", "email"];
$values = [
    ["theAdmin", "mdp", "admin@gmail.com"],
    ["bob", "mdp", "bob@gmail.com"],
    ["zog", "mdp", "zog@gmail.com"]
];

echo SqlGenerator::generateQuery($table, $columns, $values);
SqlGenerator::generateFile($table, $columns, $values);