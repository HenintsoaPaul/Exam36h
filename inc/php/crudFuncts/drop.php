<?php

/**
 * Generalized function to delete rows from a table based on a given condition.
 *
 * @param string $tableName The name of the table from which to delete records.
 * @param string $columnName The name of the column to match against.
 * @param mixed $columnValue The value of the column to match for deletion.
 * @return int The number of deleted rows.
 * @throws Exception
 */
function deleteById($connection, $tableName, $columnName, $columnValue)
{
    // Prepare the DELETE query.
    $query = sprintf(
        "DELETE FROM `%s` WHERE `%s` = '%s'",
        mysqli_real_escape_string($connection, $tableName),
        mysqli_real_escape_string($connection, $columnName),
        mysqli_real_escape_string($connection, $columnValue)
    );

    // Execute the query.
    $result = mysqli_query($connection, $query);

    // Check for errors.
    if (!$result) {
        throw new Exception('Failed to delete records: ' . mysqli_error($connection));
    }

    // Return the number of deleted rows.
    return mysqli_affected_rows($connection);
}