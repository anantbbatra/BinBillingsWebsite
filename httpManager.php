<?php
require 'vendor/autoload.php';

function getBins($cust_id)
{

    $client = new GuzzleHttp\Client();
    $res = $client->get('http://192.168.0.192:3000/transactions', [
        'query' => ['cust_id' => $cust_id]
    ]);

    //echo $res->getStatusCode();           // 200
    //echo $res->getHeader('content-type'); // 'application/json; charset=utf8'
    $output = json_decode($res->getBody(), true);        // {"type":"User"...'
    return $output;
}
?>