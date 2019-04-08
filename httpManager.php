<?php

use GuzzleHttp\Client;

require 'vendor/autoload.php';
$GLOBALS['client'] = new GuzzleHttp\Client();

function getBins($cust_id)
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
    $res = $GLOBALS['client']->get('http://192.168.0.192:3000/firms'/*, [
        'query' => ['cust_id' => $cust_id]
    ]*/);
    //echo $res->getStatusCode();           // 200
    //echo $res->getHeader('content-type'); // 'application/json; charset=utf8'
    $output = json_decode($res->getBody(), true);        // {"type":"User"...'
    return $output;
}


function addFirm($provider_name,$provider_email,$firm_contact_num,$firm_address,$green_rate,$brown_rate,$red_rate,$paymentInfo)
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
        ]
    ]);
    echo $res->getStatusCode();           // 200
    //echo $res->getHeader('content-type'); // 'application/json; charset=utf8'
    $output = json_decode($res->getBody(), true);        // {"type":"User"...'
    return $output;
}

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