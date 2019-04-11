<?php


include ('login_nav.php');

?>

    <h1>Contact Info:</h1>

    <p>Office address:</p>

    <p>Contact Number:</p>

<h2>Enquire</h2>
<form method="post" style="border: double; width: max-content" id="enquiryForm">
    <p>Name:
        <input type="text" name="provider_name"></p>
    <p>Email:
        <input type="text" name="provider_email"></p>
    <p>Comments:
        <textarea rows="4" cols="50" name="comment" form="enquiryForm"></textarea></p>

    <p><input type="submit" value="Submit"/></p>

</form>


