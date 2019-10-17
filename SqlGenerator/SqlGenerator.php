<?php

/**
 * A tool to make SQL queries
 *
 * Class SqlGenerator
 */
class SqlGenerator
{
    /**
     * Generate a SQL file
     *
     * @param string $table
     * @param array $columns
     * @param array $values
     * @param string $file
     */
    public static function generateFile(
        string $table,
        array $columns,
        array $values,
        string $file = "insert_stuff.sql"
    ) {
        self::buildSqlFile(
            self::generateQuery($table, $columns, $values) . ";",
            $file
        );
    }

    /**
     * Generate the SQL insert query
     *
     * @param string $table
     * @param array $columns
     * @param array $values
     * @return string
     */
    public static function generateQuery(
        string $table,
        array $columns,
        array $values
    ) {
        $queryColumns = implode(", ", $columns);
        $queryValues = "";

        foreach ($values as $value) {
            $queryValues .= self::generateSqlSetOfValues($value) . ",\n";
        }

        $queryValues = substr($queryValues, 0, strlen($queryValues) - 2);

        return "INSERT INTO $table($queryColumns) VALUES $queryValues";
    }

    /**
     * Generate a line of VALUES (..., ...)
     *
     * @param $setOfValues
     * @return string
     */
    private static function generateSqlSetOfValues($setOfValues)
    {
        $values = implode(", ", array_map(function ($value) {
            return self::addQuotes($value);
        }, $setOfValues));

        return "($values)";
    }

    /**
     * Add simple quotes on strings
     *
     * @param $value
     * @return string
     */
    public static function addQuotes($value)
    {
        if (is_string($value)) {
            return "'$value'";
        }
        return $value;
    }

    /**
     * Write the file
     *
     * @param string $content
     * @param string $file
     */
    private static function buildSqlFile(string $content, string $file)
    {
        file_put_contents($file, $content);
    }
}