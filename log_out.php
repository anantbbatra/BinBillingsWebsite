<?php
setcookie("jwtToken", "expired", time() - 86400, "/");

header("Location: login.php");

?>