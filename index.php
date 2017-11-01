<?php
require_once 'global.php';
if (array_key_exists('submit', $_POST) === true) {
    $username = getPostValue('uac_username');
    $password = md5(getPostValue('uac_username'));
    if ($username !== null and $password !== null) {
        $strSql = 'SELECT
                    usr.uac_username,
                    usr.uac_password
                FROM
                    "public"."user" AS usr
                WHERE
                    usr.uac_username = \'admin\'
                AND usr.uac_password = \'21232F297A57A5A743894A0E4A801FC3\'';
        $record = pgFetchRows($strSql);
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DSS System - Login Page</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="container login">
    <div class="text-note text-center margin-bottom-10">Welcome user, please verify yourself first</div>
    <fieldset class="login">
        <legend>Login Form - DSS System</legend>
        <form>
            <div class="form field">
                <label for="uac_username">Username</label>
                <input id="uac_username" type="text" name="uac_username" required/>
            </div>
            <div class="form field">
                <label for="uac_password">Password</label>
                <input id="uac_password" type="password" name="uac_password" required/>
            </div>
            <div class="form button">
                <input type="submit" name="submit" value="Login" />
            </div>
        </form>
    </fieldset>
    <div class="text-note text-center ">
        DSS System Powered By PHP 5.6<br />
        SDXPRODUCTION &reg; 2017
    </div>
</div>
</body>
</html>
