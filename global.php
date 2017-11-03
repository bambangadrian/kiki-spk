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

function getSqlUser(array $wheres = [])
{
    $strSqlUser = 'SELECT
                    uac.uac_id,
                    uac.uac_username,
                    uac.uac_password
                FROM
                    "public"."user" AS uac';
    return getQuery($strSqlUser, $wheres);
}

function getSqlRole(array $wheres = [])
{
    $strSqlRole = 'SELECT
                    usr.usr_id,
                    usr.usr_code,
                    usr.usr_name
                FROM
                    "public"."role" AS usr';
    return getQuery($strSqlRole, $wheres);
}

function getSqlUserRole(array $wheres = [])
{
    $strSqlUserRole = 'SELECT
                            uar.uar_id,
                            uar.uar_role_id,
                            uar.uar_account_id
                        FROM
                            "public".user_role AS uar';
    return getQuery($strSqlUserRole, $wheres);
}

function getSqlRelationUserRole(array $wheres = [])
{
    $strSqlSqlRelationUserRole = 'SELECT
                                        uac.uac_id,
                                        uac.uac_username,
                                        uac.uac_password,
                                        uar.uar_id,
                                        uar.uar_role_id,
                                        uar.uar_account_id,
                                        usr.usr_id,
                                        usr.usr_code,
                                        usr.usr_name
                                    FROM
                                        "public"."user" AS uac
                                    INNER JOIN "public".user_role AS uar ON uar.uar_account_id = uac.uac_id
                                    INNER JOIN "public"."role" AS usr ON uar.uar_role_id = usr.usr_id';
    return getQuery($strSqlSqlRelationUserRole, $wheres);
}

function getSqlSociety(array $wheres = []){
    $strSqlSociety = 'SELECT
                            sct.sct_id,
                            sct.sct_name,
                            sct.sct_address,
                            sct.sct_condition_home,
                            sct.sct_work,
                            sct.sct_income,
                            sct.sct_dependents,
                            sct.sct_assets
                        FROM
                            "public".society AS sct';
    return getQuery($strSqlSociety, $wheres);
}

function getQuery($strSql, array $wheres = [])
{
    if (count($wheres) > 0) {
        $strSql .= ' WHERE ' . implodeArray($wheres, ' AND ');
    }
    return ($strSql);
}

function displayMessage($message = '', $type = 'error')
{
    if ($message !== '') {
        echo ' <div class="panel message"><div class="' . $type . '">' . $message . '</div></div>';
    }
}
