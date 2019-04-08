
<form method="get">
    <p>Provider_id:
        <input type="text" name="provider_id"></p>
    <p>Customer_id:
        <input type="text" name="cust_id"></p>
    <p><input type="submit" value="Search"/>
    </p>
</form>

<?php

require_once "httpManager.php";

if (!empty($_GET['cust_id'])) {
    if (!empty($_GET['provider_id'])){
        $result = getTransactions($_GET['cust_id'],$_GET['provider_id'],2);
    }else{
        $result = getTransactions($_GET['cust_id'],null,0);
    }
//    return;
}else if(!empty($_GET['provider_id'])){
    $result = getTransactions(null, $_GET['provider_id'],1);
//    return;
}

echo '<div style="overflow-y:auto;width:max-content ;height: 250px; border: 1px solid red"><table border="1">' . "\n";

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

//    echo "<td>";
//    if ($transaction["amount"]>0){
//        echo('<form method="post"> <input type="hidden" name="recharge_id" value=');echo($transaction["recharge_id"]);echo('> <input type="submit" value="Refund" name="refund"> </form>');
//    }
//    echo("</td>");

    echo("</tr>\n");
}
?>

</table></div>
