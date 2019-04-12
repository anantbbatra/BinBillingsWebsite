<?php
include('navBar.php');
require_once "httpManager.php";



if ( isset($_POST['edit'])) {
    $query = updateQuery($_POST['query_id'],$_POST['admin_comments'],$_POST['resolved']);
    echo 'Query has been updated.';
    return;

}

$transaction_id = $_GET['transaction_id'];
$query = getQuery($transaction_id);

echo('<h1>Inspect Customer Query</h1>');

echo('
<form method="post">
<table border="1">

    <tr>
        <td>Field</td>
        <td>Old Value</td>
    </tr>
    <tr>
        <td>query_id</td>
        <td>'.$query["query_id"].'</td>
    </tr>
    <tr>
        <td>custid</td>
        <td>'.$query["custid"].'</td>
    </tr>
    <tr>
        <td>resolved</td>
        <td><input type="checkbox" id="scales" name="resolved"></td>
    </tr>
    <tr>
        <td>Customer comments</td>
        <td>'.$query["cusstomer_comments"].'</td>
    </tr>
    <tr>
        <td>date timestamp</td>
        <td>'.$query["date"].'</td>
    </tr>
    <tr>
        <td>transaction_id</td>
        <td>'.$query["transaction_id"].'</td>
    </tr>
    <tr>
        <td>admin_comments</td>
        <td><input type="text" name="admin_comments" value = "'.$query["admin_comments"].'"></td>
    </tr>
    
    </table>
    <input type="hidden" name="query_id" value = "'.$query["query_id"].'" />
    <p><input type="submit" value="Edit" name="edit"/>
    <a href="transaction_history.php">Cancel</a></p>
</form>

');
?>