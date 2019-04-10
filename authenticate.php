<?php


function authenticateUser()
{

    $key = "binBillingsBestApp";


    if (!isset($_COOKIE["jwtToken"])) {
        http_response_code(401);
        header("login.php");
        return;
    }
    $decodedCookie = json_decode($_COOKIE["jwtToken"], true);

    $token = array(
        "userId" => $decodedCookie["userId"],
        "userType" => $decodedCookie["userType"],
    );

    if (hash_hmac("sha256", implode($token), $key) == $decodedCookie["hash"]) {
        return $decodedCookie;
    } else {
        http_response_code(401);
        header("login.php");
    }
}

?>