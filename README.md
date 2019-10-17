# SQL Generator

A class to generate SQL queries.

Only *INSERT* queries are available.

## Usage

```php
$table = "user";
$columns = ["username", "password", "email"];
$values = [
    ["theAdmin", "myPwdSucks", "admin@gmail.com"],
    ["bob", "myPwdSucks", "bob@gmail.com"],
    ["zog", "myPwdSucks", "zog@gmail.com"]
];

echo SqlGenerator::generateQuery($table, $columns, $values);
SqlGenerator::generateFile($table, $columns, $values);
```