<?php
require_once "httpManager.php";
include('navBar.php');
$bin_id = $_GET['bin_id'];

if ( isset($_POST['edit'])) {
    $bin = uploadBin($_POST['status'],$_POST['community_id'],$_POST['x_coordinate'],
        $_POST['y_coordinate'],$_POST['color'],$_POST['provider_id'],$_POST['bin_id']);

    //echo "<pre>\n$bin\n</pre>\n";
    echo 'Firm has been updated. - <a href="manage_bins.php">Continue...</a>';
    return;
}

$bin = getBin($bin_id);

echo('
<p>Edit Bin</p>
<form method="post">
<table border="1">

    <tr>
        <td>Field</td>
        <td>Old Value</td>
    </tr>
    <tr>
        <td>bin_id</td>
        <td>'.$bin["bin_id"].'</td>
    </tr>
    <input type="hidden" name="bin_id" value = "'.$bin["bin_id"].'">    
    <tr>
        <td>community_id</td>
        <td>'.$bin["community_id"].'</td>
    </tr>
    <input type="hidden" name="community_id" value = "'.$bin["community_id"].'">    
    <tr>
        <td>x_coordinate</td>
        <td>'.$bin["x_coordinate"].'</td>
    </tr>
    <input type="hidden" name="x_coordinate" value = "'.$bin["x_coordinate"].'">
    <tr>
        <td>y_coordinate</td>
        <td>'.$bin["y_coordinate"].'</td>
    </tr>
    <input type="hidden" name="y_coordinate" value = "'.$bin["y_coordinate"].'">
    <tr>
        <td>color</td>
        <td><input type="text" name="color" value = "'.$bin["color"].'"></p></td>
    </tr>
    <tr>
        <td>provider_id</td>
        <td><input type="text" name="provider_id" value = "'.$bin["provider_id"].'"></p></td>
    </tr>
    <tr>
        <td>status</td>
        <td>'.$bin["status"].'</td>
    </tr>
    <input type="hidden" name="status" value = "'.$bin["status"].'">
    <tr>
        <td>unlockCode</td>
        <td>'.$bin["unlockcode"].'</td>
    </tr>
</table>
    
    <p><input type="submit" value="Edit" name="edit"/>
    <a href="manage_firms.php">Cancel</a></p>
</form>

');
?>