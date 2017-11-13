<?php
require_once __DIR__ . '/../../../global.php';
protectApplicationPage();
$messageError = '';
$messageInfo = '';
$messageSuccess = getFlashMessage('success');
$recordCriteria = pgFetchRows(getCriteria());
$selectedUserId = '';
$id = getGetValue('id');
$recordCriteriaFuzzy = [];
$uarId = '';
if (array_key_exists('submit', $_POST) === true) {
    $uarId = getPostValue('uar_id');
    $uarRoleId = getPostValue('uar_role_id');
    $uarAccountId = getPostValue('uar_account_id');
    $criteria = ' and uar_account_id = ' . pgEscape($uarAccountId);
    if ($id !== null) {
        $criteria .= ' and uar_id <>' . pgEscape($id);
    }
    $continue = true;
    if ($uarRoleId !== null and $uarAccountId !== null and
        pgIsDataExists('user_role', 'uar_role_id', $uarRoleId, $criteria) === true
    ) {
        $messageInfo = 'Data already exists';
        $continue = false;
    }
    if ($continue === true) {
        $result = false;
        $modelData = [
            'uar_account_id' => $uarAccountId,
            'uar_role_id'    => $uarRoleId
        ];
        if ($id !== null) {
            $updateWhere = ['uar_id' => $uarId];
            $result = pgUpdate('user_role', $modelData, $updateWhere);
        } else {
            $result = pgInsert('user_role', $modelData);
            $uarId = pgGetLastInsertId('user_role', 'uar_id');
        }
        if ($result === true) {
            pgCommitTransaction();
            setFlashMessage('success', 'Successful to update User Role # ' . $uarId);
            header('Location: update.php?id=' . $uarId);
        } else {
            pgRollbackTransaction();
            $messageError = 'Failed to update data User Role';
        }
    }
}
if ($id !== null) {
    $uarId = $id;
    $whereUarId [] = 'uar_id = ' . pgEscape($id);
    $recordCriteriaFuzzy = pgFetchRow(getSqlUserRole($whereUarId));
    if (count($recordCriteriaFuzzy) > 0) {
        $selectedUserId = $recordCriteriaFuzzy['uar_account_id'];
        $selectedRoleId = $recordCriteriaFuzzy['uar_role_id'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../../assets/css/style.css" />
</head>
<body>
<?php include_once __DIR__ . '/../../../menu.php'; ?>
<div class="container main">
    <div class="container">
        <div class="block block-12">
            <div class="panel">
                <h1 class="panel title">Warga</h1>
                <div class="panel header">
                    <?php displayMessage($messageError, 'error'); ?>
                    <?php displayMessage($messageSuccess, 'success'); ?>
                    <?php displayMessage($messageInfo, 'info'); ?>
                </div>
                <div class="panel content">
                    <div class="block block-5">
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                            <input type="hidden" name="uar_id" value="<?php echo $uarId; ?>" />
                            <div class="form field">
                                <label for="uar_account_id">User</label>
                                <select id="uar_account_id" name="uar_account_id">
                                    <?php foreach ($recordCriteria as $row): ?>
                                        <?php
                                        $selectedOptUser = '';
                                        if ($row['uac_id'] === $selectedUserId) {
                                            $selectedOptUser = 'selected';
                                        }
                                        ?>
                                        <option <?php echo $selectedOptUser; ?> value="<?php echo $row['uac_id']; ?>"><?php echo $row['uac_username']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form field">
                                <label for="uac_username">Username</label>
                                <input id="uac_username"
                                       type="text"
                                       name="uac_username"
                                       value="<?php echo $uacUsername; ?>" />
                            </div>
                            <div class="form field">
                                <label for="uac_password">Password</label>
                                <input id="uac_password"
                                       type="password"
                                       name="uac_password"
                                       value="<?php echo $uacPassword; ?>" />
                            </div>
                            <div class="form button">
                                <input type="submit" name="submit" value="Save" />
                                <input type="button"
                                       value="Bact to Listing"
                                       onclick="window.location.href='index.php'" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
