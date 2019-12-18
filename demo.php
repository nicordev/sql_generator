<?php
require __DIR__ . "/SqlGenerator/SqlGenerator.php";

$table = "user";
$columns = ["username", "password", "email"];
$values = [
    ["theAdmin", '$2y$13$KzkQJ/pKDLL.w2wWtpqkzeLe/SuQ9xU9CORRyD4qoAHFr61sbKrOy', "admin@gmail.com"]
];

SqlGenerator::printQuery($table, $columns, $values);
SqlGenerator::generateFile($table, $columns, $values, "user.sql");

$table = "task";
$columns = ["created_at", "title", "content", "is_done"];
$values = generateTasks(10000);

function generateTasks(int $count)
{
    $tasks = [];

    for ($i = 1; $i <= $count; $i++) {
        $task = [
            (new DateTime())->format("Y-m-d H:i:s"),
            "Task title $i",
            "Task content $i",
            0
        ];
        $tasks[] = $task;
    }

    return $tasks;
}

SqlGenerator::generateFile($table, $columns, $values, "task.sql");