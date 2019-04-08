<?php
include('navBar.php');
require_once "httpManager.php";

if (isset($_POST['refund'])) {
        $firm = refund($_POST['recharge_id']);
//        echo "<pre>\n$firm\n</pre>\n";
        if ($firm==null){
            echo 'Balance too low to issue refund - <a href="manage_customers.php">Continue...</a>';
        } else {
            echo 'Amount has been has been refunded and reduced from customer balance - <a href="manage_customers.php">Continue...</a>';
        }
        return;
}

$cust_id = $_GET['cust_id'];

echo '<div style="overflow-y:auto;width:max-content ;height: 250px; border: 1px solid red"><table border="1">' . "\n";
$result = getRechargeHistory($cust_id);

echo "<tr>";
foreach($result[0] as $header => $value) {
    echo "<td><b>";
    echo(htmlentities($header));
    echo("</b></td>");
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
    if ($transaction["amount"]>0){
        echo('<form method="post"> <input type="hidden" name="recharge_id" value=');echo($transaction["recharge_id"]);echo('> <input type="submit" value="Refund" name="refund"> </form>');
    }
    echo("</td>");

    echo("</tr>\n");
}
?>

</table></div>
