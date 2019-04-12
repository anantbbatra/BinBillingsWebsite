
<?php
include('navBar.php');
//------------------------------Authentication----------------------------------------
include ("authenticate.php");
$userInfo = authenticateUser();
$usertype = $userInfo["userType"];
$userId = $userInfo["userId"];
//------------------------------Authentication----------------------------------------

require_once "httpManager.php";
echo('<form method="get">');

echo('<h1>Historical Payments</h1>');


if ($usertype=="employee"){echo('



    <p>Provider_id:
        <input type="text" name="provider_id"></p>
        ');
        }

        echo('
    <p>Month:
        <select name="month">
            <option value="Jan">Jan</option>
            <option value="Feb">Feb</option>
            <option value="Mar">Mar</option>
            <option value="Apr">Apr</option>
            <option value="May">May</option>
            <option value="Jun">Jun</option>
            <option value="Jul">Jul</option>
            <option value="Aug">Aug</option>
            <option value="Sep">Sep</option>
            <option value="Oct">Oct</option>
            <option value="Nov">Nov</option>
            <option value="Dec">Dec</option>
        </select></p>
    <p>Year:
        <input type="text" name="cust_id"></p>
    <p><input type="submit" value="Search"/>
    </p>
</form>');

if (!empty($_GET['provider_id'])) {
    $result = getPayments($_GET['provider_id'], 1);
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
    echo('<a href="edit_bin.php?bin_id=' . htmlentities($transaction['bin_id']) . '">Edit</a>');
    echo("</td>");

    echo("</tr>\n");
}
?>
</table></div>
