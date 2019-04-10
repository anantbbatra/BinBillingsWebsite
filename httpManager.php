<?php

use GuzzleHttp\Client;

require 'vendor/autoload.php';
$GLOBALS['client'] = new GuzzleHttp\Client(['base_uri' => 'http://192.168.0.192:3000/']);

//this works but needs to be edited according to functions
function getBins($provider_id){
    $res = $GLOBALS['client']->request('get','binsForWebsite', [
            'query' => ['provider_id' => $provider_id]]);

    //echo $res->getStatusCode();           // 200
    //echo $res->getHeader('content-type'); // 'application/json; charset=utf8'
    $output = json_decode($res->getBody(), true);        // {"type":"User"...'
    return $output;
}

//this works but needs to be edited according to functions
function getTransactions($cust_id, $provider_id, $option)
{
    if ($option==0){
        $res = $GLOBALS['client']->request('get','transactions/byCust', [
            'query' => ['cust_id' => $cust_id]
        ]);
    }else if ($option==1){
        $res = $GLOBALS['client']->request('get','transactions/byFirm', [
            'query' => ['provider_id' => $provider_id]
        ]);
    }else{
        $res = $GLOBALS['client']->request('get','transactions/byBoth', [
            'query' => ['cust_id' => $cust_id, 'provider_id' => $provider_id]
        ]);
    }
    //echo $res->getStatusCode();           // 200
    //echo $res->getHeader('content-type'); // 'application/json; charset=utf8'
    $output = json_decode($res->getBody(), true);        // {"type":"User"...'
    return $output;
}

function getUsers()
{
    $res = $GLOBALS['client']->request('get','customers');
    //echo $res->getStatusCode();           // 200
    //echo $res->getHeader('content-type'); // 'application/json; charset=utf8'
    $output = json_decode($res->getBody(), true);        // {"type":"User"...'
    return $output;
}



function getRechargeHistory($cust_id = 1)
{
    $res = $GLOBALS['client']->request('get','rechargeHistory', [
        'query' => ['cust_id' => $cust_id]
    ]);
    //echo $res->getStatusCode();           // 200
    //echo $res->getHeader('content-type'); // 'application/json; charset=utf8'
    $output = json_decode($res->getBody(), true);        // {"type":"User"...'
    return $output;
}

function getFirms()
{
    $res = $GLOBALS['client']->request('get','firms');
    //echo $res->getStatusCode();           // 200
    //echo $res->getHeader('content-type'); // 'application/json; charset=utf8'
    $output = json_decode($res->getBody(), true);        // {"type":"User"...'
    return $output;
}

function getFirm($provider_id)
{
    $res = $GLOBALS['client']->request('get','providerInfo', [
        'query' => ['provider_id' => $provider_id]
    ]);
    //echo $res->getStatusCode();           // 200
    //echo $res->getHeader('content-type'); // 'application/json; charset=utf8'
    $output = json_decode($res->getBody(), true);        // {"type":"User"...'
    return $output;
}


function getBin($bin_id)
{

    $res = $GLOBALS['client']->request('get','bin', [
        'query' => ['bin_id' => $bin_id]
    ]);
    //echo $res->getStatusCode();           // 200
    //echo $res->getHeader('content-type'); // 'application/json; charset=utf8'
    $output = json_decode($res->getBody(), true);        // {"type":"User"...'
    return $output;
}



function refund($recharge_id)
{
    $res = $GLOBALS['client']->request('post','refund', [
        'form_params' => ['recharge_id' => $recharge_id]
    ]);
    //echo $res->getStatusCode();           // 200
    //echo $res->getHeader('content-type'); // 'application/json; charset=utf8'
    $output = json_decode($res->getBody(), true);        // {"type":"User"...'
    return $output;
}

function updateQuery($query_id, $admin_comments, $resolved)
{
    $res = $GLOBALS['client']->request('post','updateQuery', [
        'form_params' => ['query_id' => $query_id, 'admin_comments' => $admin_comments, 'resolved' => (($resolved=="on") ? 1:0)]
    ]);
    //echo $res->getStatusCode();           // 200
    //echo $res->getHeader('content-type'); // 'application/json; charset=utf8'
    $output = json_decode($res->getBody(), true);        // {"type":"User"...'
    return $output;
}

function getCust($cust_id)
{
    $res = $GLOBALS['client']->request('get','userInfo', [
        'query' => ['cust_id' => $cust_id]
    ]);
    //echo $res->getStatusCode();           // 200
    //echo $res->getHeader('content-type'); // 'application/json; charset=utf8'
    $output = json_decode($res->getBody(), true);        // {"type":"User"...'
    return $output;
}

function getQuery($transaction_id)
{
    $res = $GLOBALS['client']->request('get','query', [
        'query' => ['transaction_id' => $transaction_id]
    ]);
    //echo $res->getStatusCode();           // 200
    //echo $res->getHeader('content-type'); // 'application/json; charset=utf8'
    $output = json_decode($res->getBody(), true);        // {"type":"User"...'
    return $output;
}




function addFirm($provider_name,$provider_email,$firm_contact_num,$firm_address,$green_rate,$brown_rate,$red_rate,$paymentInfo,$provider_id = "",$account_comments = "")
{
    $res = $GLOBALS['client']->request('post','firm', [
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

function uploadBin($status,$community_id,$x_coordinate ="",
        $y_coordinate = "",$color,$provider_id,$bin_id ="")
{
    $res = $GLOBALS['client']->request('post','bin', [
        'form_params' => [
            'status' => $status,
            'community_id' => $community_id,
            'x_coordinate' => $x_coordinate,
            'y_coordinate' => $y_coordinate,
            'color' => $color,
            'provider_id' => $provider_id,
            'bin_id' => $bin_id,
        ]
    ]);
    echo $res->getStatusCode();           // 200
    //echo $res->getHeader('content-type'); // 'application/json; charset=utf8'
    $output = json_decode($res->getBody(), true);        // {"type":"User"...'
    return $output;
}

function updateCust($cust_id,$cust_name,$cust_email,$community_id,$balance,$provider_id,$account_comments)
{
    $res = $GLOBALS['client']->request('post','registration', [
        'form_params' => [
            'cust_id' => $cust_id,
            'cust_name' => $cust_name,
            'cust_email' => $cust_email,
            'community_id' => $community_id,
            'balance' => $balance,
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
    $res = $GLOBALS['client']->request('post','firm/status', [
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

function setCustStatus($cust_id, $account_status)
{
    $res = $GLOBALS['client']->request('post','cust/status', [
        'form_params' => [
            'cust_id' => $cust_id,
            'account_status' => $account_status,
        ]
    ]);
//    echo $res->getStatusCode();           // 200
//    //echo $res->getHeader('content-type'); // 'application/json; charset=utf8'
//    $output = json_decode($res->getBody(), true);        // {"type":"User"...'
//    return $output;
}


?>