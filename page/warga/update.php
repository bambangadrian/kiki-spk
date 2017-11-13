<?php
require_once __DIR__ . '/../../global.php';
protectApplicationPage();
$recordHome = pgFetchRows(getSqlRelationCriteria(['crm_id = ' . pgEscape('1')]));
$recordIncome = pgFetchRows(getSqlRelationCriteria(['crm_id = ' . pgEscape('2')]));
$recordWork = pgFetchRows(getSqlRelationCriteria(['crm_id = ' . pgEscape('3')]));
$recordDependents = pgFetchRows(getSqlRelationCriteria(['crm_id = ' . pgEscape('4')]));
$recordAsset = pgFetchRows(getSqlRelationCriteria(['crm_id = ' . pgEscape('5')]));
$messageError = '';
$messageInfo = '';
$messageSuccess = getFlashMessage('success');
$selectedConditionHome = '';
$selectedIncome = '';
$selectedWork = '';
$selectedDependents = '';
$selectedAssets = '';
$id = getGetValue('id');
$recordSociety = [];
$sctId = '';
$sctName = '';
$sctAddress = '';
if (array_key_exists('submit', $_POST) === true) {
    $sctId = getPostValue('sct_id');
    $sctName = getPostValue('sct_name');
    $sctAddress = getPostValue('sct_address');
    $sctConditionHome = getPostValue('sct_condition_home');
    $sctIncome = getPostValue('sct_income');
    $sctWork = getPostValue('sct_work');
    $sctDependents = getPostValue('sct_dependents');
    $sctAssets = getPostValue('sct_assets');
    $criteria = ' and sct_name = ' . pgEscape($sctName);
    if ($id !== null) {
        $criteria .= ' and sct_id <>' . pgEscape($id);
    }
    $continue = true;
    if ($sctName !== null and $sctAddress !== null and
        pgIsDataExists('society', 'sct_name', $sctName, $criteria) === true
    ) {
        $messageInfo = 'Data already exists';
        $continue = false;
    }
    if ($continue === true) {
        $result = false;
        $modelData = [
            'sct_name'           => $sctName,
            'sct_address'        => $sctAddress,
            'sct_condition_home' => $sctConditionHome,
            'sct_income'         => $sctIncome,
            'sct_work'           => $sctWork,
            'sct_dependents'     => $sctDependents,
            'sct_assets'         => $sctAssets,
        ];
        if ($id !== null) {
            $updateWhere = ['sct_id' => $sctId];
            $result = pgUpdate('society', $modelData, $updateWhere);
        } else {
            $result = pgInsert('society', $modelData);
            $sctId = pgGetLastInsertId('society', 'sct_id');
        }
        if ($result === true) {
            pgCommitTransaction();
            setFlashMessage('success', 'Successful to update Society # ' . $sctId);
            header('Location: update.php?id=' . $sctId);
        } else {
            pgRollbackTransaction();
            $messageError = 'Failed to update data Society';
        }
    }
}
if ($id !== null) {
    $sctId = $id;
    $whereUarId [] = 'sct_id = ' . pgEscape($id);
    $recordSociety = pgFetchRow(getSqlSociety($whereUarId));
    if (count($recordSociety) > 0) {
        $sctName = $recordSociety['sct_name'];
        $sctAddress = $recordSociety['sct_address'];
        $selectedConditionHome = $recordSociety['sct_condition_home'];
        $selectedIncome = $recordSociety['sct_income'];
        $selectedWork = $recordSociety['sct_work'];
        $selectedDependents = $recordSociety['sct_dependents'];
        $selectedAssets = $recordSociety['sct_assets'];
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
                <h1 class="panel title">Society</h1>
                <div class="panel header">
                    <?php displayMessage($messageError, 'error'); ?>
                    <?php displayMessage($messageSuccess, 'success'); ?>
                    <?php displayMessage($messageInfo, 'info'); ?>
                </div>
                <div class="panel content">
                    <div class="block block-12">
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                            <input type="hidden" name="sct_id" value="<?php echo $sctId; ?>" />
                            <div class="form field">
                                <label for="sct_name">Name</label>
                                <input id="sct_name" type="text" name="sct_name" value="<?php echo $sctName; ?>" />
                            </div>
                            <div class="form field">
                                <label for="sct_address">Address</label>
                                <textarea id="sct_address"
                                          name="sct_address"
                                ><?php echo $sctAddress; ?></textarea>
                            </div>
                            <div class="form field">
                                <label for="sct_condition_home">Condition Home</label>
                                <select id="sct_condition_home" name="sct_condition_home">
                                    <?php foreach ($recordHome as $row): ?>
                                        <?php
                                        $selectedOptUser = '';
                                        if ($row['crt_id'] === $selectedConditionHome) {
                                            $selectedOptUser = 'selected';
                                        }
                                        ?>
                                        <option <?php echo $selectedOptUser; ?> value="<?php echo $row['crt_id']; ?>"><?php echo $row['crt_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form field">
                                <label for="sct_income">Income</label>
                                <select id="sct_income" name="sct_income">
                                    <?php foreach ($recordIncome as $row): ?>
                                        <?php
                                        $selectedOptUser = '';
                                        if ($row['crt_id'] === $selectedIncome) {
                                            $selectedOptUser = 'selected';
                                        }
                                        ?>
                                        <option <?php echo $selectedOptUser; ?> value="<?php echo $row['crt_id']; ?>"><?php echo $row['crt_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form field">
                                <label for="sct_work">Work</label>
                                <select id="sct_work" name="sct_work">
                                    <?php foreach ($recordWork as $row): ?>
                                        <?php
                                        $selectedOptUser = '';
                                        if ($row['crt_id'] === $selectedWork) {
                                            $selectedOptUser = 'selected';
                                        }
                                        ?>
                                        <option <?php echo $selectedOptUser; ?> value="<?php echo $row['crt_id']; ?>"><?php echo $row['crt_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form field">
                                <label for="sct_dependents">Dependents</label>
                                <select id="sct_dependents" name="sct_dependents">
                                    <?php foreach ($recordDependents as $row): ?>
                                        <?php
                                        $selectedOptUser = '';
                                        if ($row['crt_id'] === $selectedDependents) {
                                            $selectedOptUser = 'selected';
                                        }
                                        ?>
                                        <option <?php echo $selectedOptUser; ?> value="<?php echo $row['crt_id']; ?>"><?php echo $row['crt_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form field">
                                <label for="sct_assets">Assets</label>
                                <select id="sct_assets" name="sct_assets">
                                    <?php foreach ($recordAsset as $row): ?>
                                        <?php
                                        $selectedOptUser = '';
                                        if ($row['crt_id'] === $selectedAssets) {
                                            $selectedOptUser = 'selected';
                                        }
                                        ?>
                                        <option <?php echo $selectedOptUser; ?> value="<?php echo $row['crt_id']; ?>"><?php echo $row['crt_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
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
