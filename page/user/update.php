<?php
require_once __DIR__ . '/../../global.php';
protectApplicationPage();
$messageError = '';
$messageInfo = '';
$messageSuccess = getFlashMessage('success');
$uacUsername = '';
$uacPassword = '';
$id = getGetValue('id');
$recordUser = [];
$uacId = '';
if (array_key_exists('submit', $_POST) === true) {
    $uacId = getPostValue('uac_id');
    $uacUsername = getPostValue('uac_username');
    $uacPassword = getPostValue('uac_password');
    $criteria = ' and uac_password = ' . pgEscape($uacPassword);
    if ($id !== null) {
        $criteria .= ' and uac_id <>' . pgEscape($id);
    }
    $continue = true;
    if ($uacUsername !== null and $uacPassword !== null and
        pgIsDataExists('user', 'uac_username', $uacUsername, $criteria) === true
    ) {
        $messageInfo = 'Data already exists';
        $continue = false;
    }
    if ($continue === true) {
        $result = false;
        $modelData = [
            'uac_username' => $uacUsername,
            'uac_password' => $uacPassword
        ];
        if ($id !== null) {
            $updateWhere = ['uac_id' => $uacId];
            $result = pgUpdate('user', $modelData, $updateWhere);
        } else {
            $result = pgInsert('user', $modelData);
            $uacId = pgGetLastInsertId('user', 'uac_id');
        }
        if ($result === true) {
            pgCommitTransaction();
            setFlashMessage('success', 'Successful to update User  # ' . $uacId);
            header('Location: update.php?id=' . $uacId);
        } else {
            pgRollbackTransaction();
            $messageError = 'Failed to update data User ';
        }
    }
}
if ($id !== null) {
    $uacId = $id;
    $whereUsrId [] = 'uac_id = ' . pgEscape($id);
    $recordUser = pgFetchRow(getSqluser($whereUsrId));
    if (count($recordUser) > 0) {
        $uacUsername = $recordUser['uac_username'];
        $uacPassword = $recordUser['uac_password'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../assets/css/style.css" />
</head>
<body>
<?php include_once __DIR__ . '/../../menu.php'; ?>
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
                            <input type="hidden" name="uac_id" value="<?php echo $uacId; ?>" />
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
                                <input type="reset" name="submit" value="reset" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
