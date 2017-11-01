<?php
require_once __DIR__ . '/lib/Standards.php';
doIncludes(
    [
        'spk/lib/Database.php',
        'spk/lib/Sessions.php',
        'spk/lib/Requests.php',
        'spk/config.php'
    ]
);
setActiveDbConnection('dbConnection', getPgConnection(DB_NAME, DB_USER, DB_PWD, DB_SERVER, DB_PORT));
function protectLoginPage()
{
    if (array_key_exists('is_login', $_SESSION) === true) {
        header('Location: dashboard.php');
        exit();
    }
}

function protectApplicationPage()
{
    if (array_key_exists('is_login', $_SESSION) === false) {
        header('Location: index.php');
        exit();
    }
}
