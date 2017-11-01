<?php
require_once __DIR__ . '/lib/Standards.php';
doIncludes(
    [
        'lib/Database.php',
        'config.php'
    ]
);
setActiveDbConnection('dbConnection', getPgConnection(DB_NAME, DB_USER, DB_PWD, DB_SERVER, DB_PORT));
session_start();