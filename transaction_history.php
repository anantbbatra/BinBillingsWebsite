
<?php
require_once "httpManager.php";
include('navBar.php');


//------------------------------Authentication----------------------------------------
include ("authenticate.php");
$userInfo = authenticateUser();
$usertype = $userInfo["userType"];
$userId = $userInfo["userId"];
//------------------------------Authentication----------------------------------------


echo('<form method="get">
');
if ($usertype == "employee"){
    echo ('
    <p>Provider_id:
        <input type="text" name="provider_id"></p>
        ');
}
echo('
    <p>Customer_id:
        <input type="text" name="cust_id"></p>
    <p><input type="submit" value="Search"/>
    </p>
</form>');

if (!empty($_GET['cust_id'])) {
    if (!empty($_GET['provider_id'])){
        $result = getTransactions($_GET['cust_id'],$_GET['provider_id'],2);
    }else{
        if($usertype=="employee") {
            $result = getTransactions($_GET['cust_id'], null, 0);
        }else{

            $result = getTransactions($_GET['cust_id'], $userId,2);
        }
    }
//    return;
}else if(!empty($_GET['provider_id'])){
    $result = getTransactions(null, $_GET['provider_id'],1);
//    return;
}

echo '<div style="overflow-y:auto;width:max-content ;height: 250px; border: 1px solid red"><table border="1">' . "\n";

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
    if ($transaction["status"]=="conflict"){
        echo('<a href="inspect.php?transaction_id=' . htmlentities($transaction['transaction_id']) . '">Inspect Issue</a>');
    }
    echo("</td>");

    echo("</tr>\n");
}
?>

</table></div>
