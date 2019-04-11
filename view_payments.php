
<?php
include('navBar.php');

require_once "httpManager.php";
echo('<form method="get">
    <p>Provider_id:
        <input type="text" name="provider_id"></p>
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
