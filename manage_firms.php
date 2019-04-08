<?php

    require_once "httpManager.php";
    if (isset($_GET['id'])) {
        if (isset($_GET['enable'])) {
            $firm = setFirmStatus($_GET['id'], 'Active');
            echo "<pre>\n$firm\n</pre>\n";
            echo 'Firm has been enabled - <a href="manage_firms.php">Continue...</a>';
            return;
        }else{
            $firm = setFirmStatus($_GET['id'], 'Inactive');
            echo "<pre>\n$firm\n</pre>\n";
            echo 'Firm has been Disabled - <a href="manage_firms.php">Continue...</a>';
            return;
        }
    }

    echo '<table border="1">' . "\n";
    $result = getFirms();

    echo "<tr>";
    foreach($result[0] as $header => $value) {
        echo "<td>";
        echo(htmlentities($header));
        echo("</td>");
    }
    echo "</tr>";

    foreach ($result as $key => $transaction){
        echo "<tr>";

        foreach($transaction as $key => $value) {
            echo "<td>";
            echo(htmlentities($value));
            echo("</td>");
        }
        echo "<td>";
        echo('<a href="edit.php?id=' . htmlentities($transaction['provider_id']) . '">Edit</a> / ');
        echo("</td>");


        echo "<td>";
        if ($transaction["account_status"]=="Inactive"){
//            echo('<a href="edit.php?id=' . htmlentities($value) . '">Enable</a>');
            echo('<form method="get"> <input type="hidden" name="id" value=');echo($transaction["provider_id"]);echo('> <input type="submit" value="Enable" name="enable"> </form>');
        }else{
            echo('<form method="get"> <input type="hidden" name="id" value=');echo($transaction["provider_id"]);echo('> <input type="submit" value="Disable" name="disable"> </form>');

        }
        echo("</td>");

        echo("</tr>\n");
    }
?>

</table> <a href="add_firm.php">Add New</a>
