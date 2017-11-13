<?php
require_once __DIR__ . '/lib/Standards.php';
doIncludes(
    [
        'spk/lib/Database.php',
        'spk/lib/Sessions.php',
        'spk/lib/Requests.php',
        'spk/config.php',
        'spk/vendor/autoload.php'
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
    $strSqlRelationUserRole = 'SELECT
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
    return getQuery($strSqlRelationUserRole, $wheres);
}

function getCriteriaRange(array $wheres = [])
{
    $strSqlCriteriaRange = 'SELECT
                                rgt.rgt_id,
                                rgt.rgt_name,
                                rgt.rgt_value
                            FROM
                                "public".criteria_range_type AS rgt';
    return getQuery($strSqlCriteriaRange, $wheres);
}

function getCriteriaMaster(array $wheres = [])
{
    $strSqlCriteriaMaster = 'SELECT
                                crm.crm_id,
                                crm.crm_code,
                                crm.crm_name
                            FROM
                                "public".criteria_master AS crm';
    return getQuery($strSqlCriteriaMaster, $wheres);
}

function getSqlRelationCriteria(array $wheres = [])
{
    $strSqlCriteria = 'SELECT
                        crt.crt_id,
                        crt.crt_code,
                        crt.crt_name,
                        crt.crt_parent_id,
                        crt.crt_range_type_id,
                        rgt.rgt_id,
                        rgt.rgt_name,
                        rgt.rgt_value,
                        crm.crm_id,
                        crm.crm_code,
                        crm.crm_name
                    FROM
                        "public".criteria AS crt
                    INNER JOIN "public".criteria_range_type AS rgt ON crt.crt_range_type_id = rgt.rgt_id
                    INNER JOIN "public".criteria_master AS crm ON crt.crt_parent_id = crm.crm_id';
    return getQuery($strSqlCriteria, $wheres);
}

function getSqlSociety(array $wheres = [])
{
    $strSqlSociety = 'SELECT
                            sct.sct_id,
                            sct.sct_name,
                            sct.sct_address,
                            sct.sct_condition_home,
                            sct.sct_work,
                            sct.sct_income,
                            sct.sct_dependents,
                            sct.sct_assets,
                            crt.crt_name AS home,
                            crt1.crt_name AS working,
                            crt2.crt_name AS income,
                            crt3.crt_name AS dependents,
                            crt4.crt_name AS assets,
                            rgt.rgt_value AS home_value,
                            rgt1.rgt_value AS work_value,
                            rgt2.rgt_value AS income_value,
                            rgt4.rgt_value AS dependents_value,
                            rgt3.rgt_value AS assets_value
                        FROM
                            "public".society AS sct
                        INNER JOIN "public".criteria AS crt ON sct.sct_condition_home = crt.crt_id
                        INNER JOIN "public".criteria AS crt1 ON sct.sct_work = crt1.crt_id
                        INNER JOIN "public".criteria AS crt2 ON sct.sct_income = crt2.crt_id
                        INNER JOIN "public".criteria AS crt3 ON sct.sct_dependents = crt3.crt_id
                        INNER JOIN "public".criteria AS crt4 ON sct.sct_assets = crt4.crt_id
                        INNER JOIN "public".criteria_range_type AS rgt ON crt.crt_range_type_id = rgt.rgt_id
                        INNER JOIN "public".criteria_range_type AS rgt1 ON crt1.crt_range_type_id = rgt1.rgt_id
                        INNER JOIN "public".criteria_range_type AS rgt2 ON crt2.crt_range_type_id = rgt2.rgt_id
                        INNER JOIN "public".criteria_range_type AS rgt3 ON crt3.crt_range_type_id = rgt3.rgt_id
                        INNER JOIN "public".criteria_range_type AS rgt4 ON crt4.crt_range_type_id = rgt4.rgt_id';
    return getQuery($strSqlSociety, $wheres);
}

function getCriteria(array $wheres = [])
{
    $strSqlCriteria = 'SELECT
                            crt.crt_id,
                            crt.crt_code,
                            crt.crt_name,
                            crt.crt_parent_id,
                            crt.crt_range_type_id
                        FROM
                            "public".criteria AS crt';
    return getQuery($strSqlCriteria, $wheres);
}

function getDssMaster(array $wheres = [])
{
    $strSqlDssMaster = 'SELECT
                            dsm.dsm_id,
                            dsm.dsm_name,
                            dsm.dsm_start_period,
                            dsm.dsm_end_period,
                            dsm.dsm_max_selection
                        FROM
                            "public".dss_master AS dsm';
    return getQuery($strSqlDssMaster, $wheres);
}

function getDssResult(array $wheres = [])
{
    $strDssResult = 'SELECT
                            dsr.dsr_id,
                            dsr.dsr_weight,
                            dsr.dsr_dss_id,
                            dsr.dsr_society_id,
                            dss.dsm_name,
                            dss.dsm_max_selection,
                            dss.dsm_start_period,
                            dss.dsm_end_period,
                            sct.sct_name,
                            sct.sct_address
                        FROM
                            "public".dss_result AS dsr
                        INNER JOIN "public".dss_master AS dss ON dsr.dsr_dss_id = dss.dsm_id
                        INNER JOIN "public".society AS sct ON dsr.dsr_society_id = sct.sct_id';
    return getQuery($strDssResult, $wheres);
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

function fixShellArgs($command)
{
    if (strpos($command, ' ') !== false) {
        return '"' . $command . '"';
    }
    return $command;
}
