<?php
require_once __DIR__ . '/../../../global.php';
protectApplicationPage();
$messageError = '';
$messageInfo = '';
$messageSuccess = getFlashMessage('success');
$crmCode = '';
$crmName = '';
$id = getGetValue('id');
$recordCriteria = [];
$crmId = '';
if (array_key_exists('submit', $_POST) === true) {
    $crmId = getPostValue('crm_id');
    $crmCode = getPostValue('crm_code');
    $crmName = getPostValue('crm_name');
    $criteria_master = ' and crm_name = ' . pgEscape($crmName);
    if ($id !== null) {
        $criteria_master .= ' and crm_id <>' . pgEscape($id);
    }
    $continue = true;
    if ($crmCode !== null and $crmName !== null and
        pgIsDataExists('criteria_master', 'crm_code', $crmCode, $criteria_master) === true
    ) {
        $messageInfo = 'Data already exists';
        $continue = false;
    }
    if ($continue === true) {
        $result = false;
        $modelData = [
            'crm_code' => $crmCode,
            'crm_name' => $crmName
        ];
        if ($id !== null) {
            $updateWhere = ['crm_id' => $crmId];
            $result = pgUpdate('criteria_master', $modelData, $updateWhere);
        } else {
            $result = pgInsert('criteria_master', $modelData);
            $crmId = pgGetLastInsertId('criteria_master', 'crm_id');
        }
        if ($result === true) {
            pgCommitTransaction();
            setFlashMessage('success', 'Successful to update Criteria Master # ' . $crmId);
            header('Location: update.php?id=' . $crmId);
        } else {
            pgRollbackTransaction();
            $messageError = 'Failed to update data Criteria Master';
        }
    }
}
if ($id !== null) {
    $crmId = $id;
    $whereUarId [] = 'crm_id = ' . pgEscape($id);
    $recordCriteria = pgFetchRow(getCriteriaMaster($whereUarId));
    if (count($recordCriteria) > 0) {
        $crmCode = $recordCriteria['crm_code'];
        $crmName = $recordCriteria['crm_name'];
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
                    <div class="block block-12">
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                            <input type="hidden" name="crm_id" value="<?php echo $crmId; ?>" />
                            <div class="form field">
                                <label for="crm_code">Code</label>
                                <input id="crm_code" type="text" name="crm_code" value="<?php echo $crmCode; ?>" />
                            </div>
                            <div class="form field">
                                <label for="crm_name">Name</label>
                                <input id="crm_name" type="text" name="crm_name" value="<?php echo $crmName; ?>">
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
