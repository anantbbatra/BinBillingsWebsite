<?php

require_once "httpManager.php";
if (isset($_GET['id'])) {
    if (isset($_GET['enable'])) {
        $firm = setCustStatus($_GET['id'], 'Active');
        echo "<pre>\n$firm\n</pre>\n";
        echo 'Customer has been enabled - <a href="manage_customers.php">Continue...</a>';
        return;
    }else{
        $firm = setCustStatus($_GET['id'], 'Inactive');
        echo "<pre>\n$firm\n</pre>\n";
        echo 'Customer has been Disabled - <a href="manage_customers.php">Continue...</a>';
        return;
    }
}

echo '<div style="overflow-y:auto;width:max-content; height: 250px; border: 1px solid red"><table border="1">' . "\n";
$result = getUsers();

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
    echo('<a href="edit_cust.php?id=' . htmlentities($transaction['cust_id']) . '">Edit</a>');
    echo("</td>");


    echo "<td>";
    if ($transaction["account_status"]=="Active"){
        echo('<form method="get"> <input type="hidden" name="id" value=');echo($transaction["cust_id"]);echo('> <input type="submit" value="Disable" name="disable"> </form>');
    }else{
        echo('<form method="get"> <input type="hidden" name="id" value=');echo($transaction["cust_id"]);echo('> <input type="submit" value="Enable" name="enable"> </form>');
    }
    echo("</td>");

    echo("</tr>\n");
}
?>

</table></div>
