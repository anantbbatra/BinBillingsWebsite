<?php

use GuzzleHttp\Client;

require 'vendor/autoload.php';
$GLOBALS['client'] = new GuzzleHttp\Client();

//this works but needs to be edited according to functions
function getTransactions($cust_id)
{
    $res = $GLOBALS['client']->get('http://192.168.0.192:3000/transactions', [
        'query' => ['cust_id' => $cust_id]
    ]);
    //echo $res->getStatusCode();           // 200
    //echo $res->getHeader('content-type'); // 'application/json; charset=utf8'
    $output = json_decode($res->getBody(), true);        // {"type":"User"...'
    return $output;
}

function getFirms()
{
    $res = $GLOBALS['client']->get('http://192.168.0.192:3000/firms');
    //echo $res->getStatusCode();           // 200
    //echo $res->getHeader('content-type'); // 'application/json; charset=utf8'
    $output = json_decode($res->getBody(), true);        // {"type":"User"...'
    return $output;
}

function getFirm($provider_id)
{
    $res = $GLOBALS['client']->get('http://192.168.0.192:3000/providerInfo', [
        'query' => ['provider_id' => $provider_id]
    ]);
    //echo $res->getStatusCode();           // 200
    //echo $res->getHeader('content-type'); // 'application/json; charset=utf8'
    $output = json_decode($res->getBody(), true);        // {"type":"User"...'
    return $output;
}


function addFirm($provider_id = "",$provider_name,$provider_email,$firm_contact_num,$firm_address,$green_rate,$brown_rate,$red_rate,$paymentInfo,$account_comments = "")
{
    $res = $GLOBALS['client']->post('http://192.168.0.192:3000/firm', [
        'form_params' => [
            'provider_name' => $provider_name,
            'provider_email' => $provider_email,
            'firm_contact_num' => $firm_contact_num,
            'firm_address' => $firm_address,
            'green_rate' => $green_rate,
            'brown_rate' => $brown_rate,
            'red_rate' => $red_rate,
            'paymentInfo' => $paymentInfo,
            'provider_id' => $provider_id,
            'account_comments' => $account_comments,
        ]
    ]);
    echo $res->getStatusCode();           // 200
    //echo $res->getHeader('content-type'); // 'application/json; charset=utf8'
    $output = json_decode($res->getBody(), true);        // {"type":"User"...'
    return $output;
}

//change this to return firm name and test it
function setFirmStatus($provider_id, $account_status)
{
    $res = $GLOBALS['client']->post('http://192.168.0.192:3000/firm/status', [
        'form_params' => [
            'provider_id' => $provider_id,
            'account_status' => $account_status,
        ]
    ]);
//    echo $res->getStatusCode();           // 200
//    //echo $res->getHeader('content-type'); // 'application/json; charset=utf8'
//    $output = json_decode($res->getBody(), true);        // {"type":"User"...'
//    return $output;
}
?>