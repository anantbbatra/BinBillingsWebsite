<?php
include ('login_nav.php');
require_once "httpManager.php";

if ( isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (($username == $password)&& ($username == "root")){
        allow(0, "employee");
    }else{
        $userId = confirmCredentials($username,$password);
        if ($userId=="0"){
            echo 'Invalid Credentials';
        }else{
            allow($userId, "firm");
        }
    }
}

function allow ($userID, $userType){
    $key = "binBillingsBestApp";
    echo $userType;
    $token = array(
        "userId" => $userID,
        "userType" => $userType,
    );
    $hashValue= hash_hmac("sha256", implode($token), $key);

    $token["hash"] = $hashValue;

    setcookie("jwtToken", json_encode($token), time() + (86400 * 30), "/");
    header("Location: transaction_history.php");
}

?>
<h2> Login </h2>
<form method="post">
    <p>User name:
        <input type="text" name="username"></p>
    <p>Password:
        <input type="password" name="password"></p>
    <p><input type="submit" value="login"/></p>
</form>

