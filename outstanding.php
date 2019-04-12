<?php
include('navBar.php');
require_once "httpManager.php";
//------------------------------Authentication----------------------------------------
include ("authenticate.php");
$userInfo = authenticateUser();
$usertype = $userInfo["userType"];
$userId = $userInfo["userId"];
//------------------------------Authentication----------------------------------------

echo('<h1>View Current Outstanding</h1>');

echo '<div style="overflow-y:auto;height: 250px;width: max-content; border: 1px solid red"><table border="1">' . "\n";

if ($usertype=="employee") {
    $result = getPayments();
}else{
    $result = getPayments($userId);
}

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

</table></div>
