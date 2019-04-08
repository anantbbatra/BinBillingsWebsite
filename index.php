<?php

    require_once "httpManager.php";
    echo '<table border="1">' . "\n";
    $result = getBins(1);

    foreach ($result as $key => $transaction){
        echo "<tr>";

        foreach($transaction as $key => $value) {
            echo "<td>";
            echo(htmlentities($value));
            echo("</td>");
        }
        echo "<td>";
        echo('<a href="edit.php?id=' . htmlentities($value) . '">Edit</a> / ');
        echo('<a href="delete.php?id=' . htmlentities($value) . '">Delete</a>');
        echo("</td></tr>\n");
    }

?>
</table> <a href="add.php">Add New</a>
