
<?php
include('navBar.php');


//------------------------------Authentication----------------------------------------
include ("authenticate.php");
$userInfo = authenticateUser();
$usertype = $userInfo["userType"];
$userId = $userInfo["userId"];
//------------------------------Authentication----------------------------------------


require_once "httpManager.php";

if (isset($_GET['id'])) {
    if (isset($_GET['enable'])) {
        $firm = setBinStatus($_GET['id'], 1);
        echo "<pre>\n$firm\n</pre>\n";
        echo 'Bin has been enabled - <a href="manage_bins.php">Continue...</a>';
    }else{
        $firm = setBinStatus($_GET['id'], 0);
        echo "<pre>\n$firm\n</pre>\n";
        echo 'Bin has been Disabled - <a href="manage_bins.php">Continue...</a>';
    }
}

echo('<h1>Manage Bins</h1>');


if ($usertype=="employee") {
    echo('<form method="get">
    <p>Provider_id:
        <input type="text" name="provider_id"></p>
    <p><input type="submit" value="Search"/>
    </p></form>');
}

if (!empty($_GET['provider_id'])) {
    $result = getBins($_GET['provider_id']);
}
if ($usertype != "employee"){
    $result = getBins($userId);
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

    if ($usertype!="employee") {
        echo "<td>";
        if ($transaction["status"] == 0) {
            echo('<form method="get"> <input type="hidden" name="id" value=');
            echo($transaction["bin_id"]);
            echo('> <input type="submit" value="Activate" name="enable"> </form>');
        } else {
            echo('<form method="get"> <input type="hidden" name="id" value=');
            echo($transaction["bin_id"]);
            echo('> <input type="submit" value="DeActivate" name="disable"> </form>');
        }
        echo("</td>");
    }

    echo("</tr>\n");
}


echo('</table></div>');

if ($usertype=="employee") {
    echo('
    <br/> <a href = "add_bin.php" > Add New</a >
    ');
}

?>