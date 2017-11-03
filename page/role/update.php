<?php
require_once __DIR__ . '/../../global.php';
protectApplicationPage();
$messageError = '';
$messageInfo = '';
$messageSuccess = getFlashMessage('success');
$usrCode = '';
$usrName = '';
$id = getGetValue('id');
$recordRole = [];
$usrId = '';
if (array_key_exists('submit', $_POST) === true) {
    $usrId = getPostValue('usr_id');
    $usrCode = getPostValue('usr_code');
    $usrName = getPostValue('usr_name');
    $criteria = ' and usr_name = ' . pgEscape($usrName);
    if ($id !== null) {
        $criteria .= ' and usr_id <>' . pgEscape($id);
    }
    $continue = true;
    if ($usrCode !== null and $usrName !== null and
        pgIsDataExists('role', 'usr_code', $usrCode, $criteria) === true
    ) {
        $messageInfo = 'Data already exists';
        $continue = false;
    }
    if ($continue === true) {
        $result = false;
        $modelData = [
            'usr_code' => $usrCode,
            'usr_name' => $usrName
        ];
        if ($id !== null) {
            $updateWhere = ['usr_id' => $usrId];
            $result = pgUpdate('role', $modelData, $updateWhere);
        } else {
            $result = pgInsert('role', $modelData);
            $usrId = pgGetLastInsertId('role', 'usr_id');
        }
        if ($result === true) {
            pgCommitTransaction();
            setFlashMessage('success', 'Successful to update User Role # ' . $usrId);
            header('Location: update.php?id=' . $usrId);
        } else {
            pgRollbackTransaction();
            $messageError = 'Failed to update data User Role';
        }
    }
}
if ($id !== null) {
    $usrId = $id;
    $whereUsrId [] = 'usr_id = ' . pgEscape($id);
    $recordRole = pgFetchRow(getSqlRole($whereUsrId));
    if (count($recordRole) > 0) {
        $usrCode = $recordRole['usr_code'];
        $usrName = $recordRole['usr_name'];
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
                            <input type="hidden" name="usr_id" value="<?php echo $usrId; ?>" />
                            <div class="form field">
                                <label for="usr_code">Code</label>
                                <input id="usr_code"
                                       type="text"
                                       name="usr_code"
                                       value="<?php echo $usrCode; ?>" />
                            </div>
                            <div class="form field">
                                <label for="usr_name">Name</label>
                                <input id="usr_name"
                                       type="text"
                                       name="usr_name"
                                       value="<?php echo $usrName; ?>" />
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
