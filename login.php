<?php

echo($_COOKIE["jwtToken"]);

include ('login_nav.php');

$key = "binBillingsBestApp";

if ( isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (($username!=$password) || (empty($username))){
        echo 'Invalid Credentials';
    }else{
        $token = array(
            "userId" => 1,
            "userType" => $password,
        );

        $hashValue= hash_hmac("sha256", implode($token), $key );

        $token["hash"] = $hashValue;

        setcookie("jwtToken", json_encode($token), time() + (86400 * 30), "/");
        header("Location: transaction_history.php");
    }


}

?>
<h2> Login </h2>
<form method="post">
    <p>User name:
        <input type="text" name="username"></p>
    <p>Password:
        <input type="text" name="password"></p>
    <p><input type="submit" value="login"/></p>
</form>

