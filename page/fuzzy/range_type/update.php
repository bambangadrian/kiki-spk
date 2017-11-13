<?php
require_once __DIR__ . '/../../../global.php';
protectApplicationPage();
$messageError = '';
$messageInfo = '';
$messageSuccess = getFlashMessage('success');
$rgtName = '';
$rgtValue = '';
$uacPassword = '';
$id = getGetValue('id');
$recordCriteriaRange = [];
$rgtId = '';
if (array_key_exists('submit', $_POST) === true) {
    $rgtId = getPostValue('rgt_id');
    $rgtName = getPostValue('rgt_name');
    $rgtValue = getPostValue('rgt_value');
    $criteria = ' and rgt_name = ' . pgEscape($rgtName);
    if ($id !== null) {
        $criteria .= ' and rgt_id <>' . pgEscape($id);
    }
    $continue = true;
    if ($rgtName !== null and pgIsDataExists('criteria_range_type', 'rgt_name', $rgtName, $criteria) === true
    ) {
        $messageInfo = 'Data already exists';
        $continue = false;
    }
    if ($continue === true) {
        $result = false;
        $modelData = [
            'rgt_name'  => $rgtName,
            'rgt_value' => $rgtValue
        ];
        if ($id !== null) {
            $updateWhere = ['rgt_id' => $rgtId];
            $result = pgUpdate('criteria_range_type', $modelData, $updateWhere);
        } else {
            $result = pgInsert('criteria_range_type', $modelData);
            $rgtId = pgGetLastInsertId('criteria_range_type', 'rgt_id');
        }
        if ($result === true) {
            pgCommitTransaction();
            setFlashMessage('success', 'Successful to update criteria_range_type  # ' . $rgtId);
            header('Location: update.php?id=' . $rgtId);
        } else {
            pgRollbackTransaction();
            $messageError = 'Failed to update data criteria_range_type ';
        }
    }
}
if ($id !== null) {
    $rgtId = $id;
    $whereUsrId [] = 'rgt_id = ' . pgEscape($id);
    $recordCriteriaRange = pgFetchRow(getCriteriaRange($whereUsrId));
    if (count($recordCriteriaRange) > 0) {
        $rgtName = $recordCriteriaRange['rgt_name'];
        $rgtValue = $recordCriteriaRange['rgt_value'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bobot</title>
    <link rel="stylesheet" href="../../../assets/css/style.css" />
</head>
<body>
<?php include_once __DIR__ . '/../../../menu.php'; ?>
<div class="container main">
    <div class="container">
        <div class="block block-12">
            <div class="panel">
                <h1 class="panel title">Form Bobot</h1>
                <div class="panel header">
                    <?php displayMessage($messageError, 'error'); ?>
                    <?php displayMessage($messageSuccess, 'success'); ?>
                    <?php displayMessage($messageInfo, 'info'); ?>
                </div>
                <div class="panel content">
                    <div class="block block-5">
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                            <input type="hidden" name="rgt_id" value="<?php echo $rgtId; ?>" />
                            <div class="form field">
                                <label for="rgt_name">Nama</label>
                                <input id="rgt_name"
                                       type="text"
                                       name="rgt_name"
                                       value="<?php echo $rgtName; ?>" />
                            </div>
                            <div class="form field">
                                <label for="rgt_value">Nilai</label>
                                <input id="rgt_value"
                                       type="text"
                                       name="rgt_value"
                                       value="<?php echo $rgtValue; ?>" />
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
