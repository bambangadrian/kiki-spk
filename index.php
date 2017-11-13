<?php
require_once __DIR__ . '/global.php';
protectLoginPage();
$message = '';
if (array_key_exists('submit', $_POST) === true) {
    $username = getPostValue('uac_username');
    $password = md5(getPostValue('uac_password'));
    if ($username !== null and $password !== null) {
        $strSql = 'SELECT
                    usr.uac_username,
                    usr.uac_password
                FROM
                    "public"."user" AS usr
                WHERE
                    usr.uac_username = ' . pgEscape($username) . '
                AND usr.uac_password = ' . pgEscape($password) . '
                GROUP BY
                    usr.uac_id';
        $record = pgFetchRow($strSql);
        if ($record !== false) {
            $_SESSION['is_login'] = true;
            $_SESSION['username'] = $record['uac_username'];
            header('Location: dashboard.php');
            exit();
        }
        $message = 'Username And Password Wrong';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DSS System - Login Page</title>
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
<div class="container login">
    <div class="text-note text-center margin-bottom-10">Welcome user, please verify yourself first</div>
    <fieldset class="login">
        <legend>Login Form - DSS System</legend>
        <div class="message error"><?php echo $message; ?></div>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form field">
                <label for="uac_username">Username</label>
                <input id="uac_username" type="text" name="uac_username" required />
            </div>
            <div class="form field">
                <label for="uac_password">Password</label>
                <input id="uac_password" type="password" name="uac_password" required />
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
