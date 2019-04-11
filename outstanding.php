<?php
include('navBar.php');
require_once "httpManager.php";


echo '<div style="overflow-y:auto;height: 250px;width: max-content; border: 1px solid red"><table border="1">' . "\n";
$result = getPayments();


//if searched for outstanding using provider_id, $result = getOutStanding($provider_id, 0);

echo "<tr>";
foreach($result[0] as $header => $value) {
    echo "<td><b>";
    echo(htmlentities($header));
    echo("</b></td>");
}
echo "</b></tr>";

foreach ($result as $key => $transaction){
    echo "<tr>";

    foreach($transaction as $key => $value) {
        echo "<td>";
        echo(htmlentities($value));
        echo("</td>");
    }

    echo("</tr>\n");
}
?>

</table></div><br/> <a href="add_firm.php">Add New</a>
