<?php
require_once __DIR__ . '/../../../global.php';
protectApplicationPage();
$messageError = '';
$messageInfo = '';
$messageSuccess = getFlashMessage('success');
$recordCriteriaRange = pgFetchRows(getCriteriaRange());
$recordCriteriaMaster = pgFetchRows(getCriteriaMaster());
$crtCode = '';
$crtName = '';
$selectedRangeTypeId = '';
$selectedParentId = '';
$id = getGetValue('id');
$recordCriteria = [];
$crtId = '';
if (array_key_exists('submit', $_POST) === true) {
    $crtId = getPostValue('crt_id');
    $crtCode = getPostValue('crt_code');
    $crtName = getPostValue('crt_name');
    $crtParentId = getPostValue('crt_parent_id');
    $crtRangeTypeId = getPostValue('crt_range_type_id');
    $criteria = ' and crt_name = ' . pgEscape($crtName);
    if ($id !== null) {
        $criteria .= ' and crt_id <>' . pgEscape($id);
    }
    $continue = true;
    if ($crtCode !== null and $crtName !== null and
        pgIsDataExists('criteria', 'crt_code', $crtCode, $criteria) === true
    ) {
        $messageInfo = 'Data already exists';
        $continue = false;
    }
    if ($continue === true) {
        $result = false;
        $modelData = [
            'crt_code'          => $crtCode,
            'crt_name'          => $crtName,
            'crt_range_type_id' => $crtRangeTypeId,
            'crt_parent_id'     => $crtParentId
        ];
        if ($id !== null) {
            $updateWhere = ['crt_id' => $crtId];
            $result = pgUpdate('criteria', $modelData, $updateWhere);
        } else {
            $result = pgInsert('criteria', $modelData);
            $crtId = pgGetLastInsertId('criteria', 'crt_id');
        }
        if ($result === true) {
            pgCommitTransaction();
            setFlashMessage('success', 'Successful to update Criteria # ' . $crtId);
            header('Location: update.php?id=' . $crtId);
        } else {
            pgRollbackTransaction();
            $messageError = 'Failed to update data Criteria';
        }
    }
}
if ($id !== null) {
    $crtId = $id;
    $whereUarId [] = 'crt_id = ' . pgEscape($id);
    $recordCriteria = pgFetchRow(getSqlRelationCriteria($whereUarId));
    if (count($recordCriteria) > 0) {
        $crtCode = $recordCriteria['crt_code'];
        $crtName = $recordCriteria['crt_name'];
        $selectedRangeTypeId = $recordCriteria['crt_range_type_id'];
        $selectedParentId = $recordCriteria['crt_parent_id'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kriteria</title>
    <link rel="stylesheet" href="../../../assets/css/style.css" />
</head>
<body>
<?php include_once __DIR__ . '/../../../menu.php'; ?>
<div class="container main">
    <div class="container">
        <div class="block block-12">
            <div class="panel">
                <h1 class="panel title">Form Kriteria</h1>
                <div class="panel header">
                    <?php displayMessage($messageError, 'error'); ?>
                    <?php displayMessage($messageSuccess, 'success'); ?>
                    <?php displayMessage($messageInfo, 'info'); ?>
                </div>
                <div class="panel content">
                    <div class="block block-12">
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                            <input type="hidden" name="crt_id" value="<?php echo $crtId; ?>" />
                            <div class="form field">
                                <label for="crt_code">Code</label>
                                <input id="crt_code" type="text" name="crt_code" value="<?php echo $crtCode; ?>" />
                            </div>
                            <div class="form field">
                                <label for="crt_name">Nama</label>
                                <input id="crt_name" type="text" name="crt_name" value="<?php echo $crtName; ?>">
                            </div>
                            <div class="form field">
                                <label for="crt_parent_id">Parent</label>
                                <select id="crt_parent_id" name="crt_parent_id">
                                    <?php foreach ($recordCriteriaMaster as $row): ?>
                                        <?php
                                        $selectedOptRole = '';
                                        if ($row['crm_id'] === $selectedParentId) {
                                            $selectedOptRole = 'selected';
                                        }
                                        ?>
                                        <option <?php echo $selectedOptRole; ?> value="<?php echo $row['crm_id']; ?>">
                                            <?php echo $row['crm_name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form field">
                                <label for="crt_range_type_id">Bobot</label>
                                <select id="crt_range_type_id" name="crt_range_type_id">
                                    <?php foreach ($recordCriteriaRange as $row): ?>
                                        <?php
                                        $selectedOptRole = '';
                                        if ($row['rgt_id'] === $selectedRangeTypeId) {
                                            $selectedOptRole = 'selected';
                                        }
                                        ?>
                                        <option <?php echo $selectedOptRole; ?> value="<?php echo $row['rgt_id']; ?>">
                                            <?php echo $row['rgt_name']; ?>
                                        </option>
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
