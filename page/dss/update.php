<?php
require_once __DIR__ . '/../../global.php';
protectApplicationPage();
$messageError = '';
$messageInfo = '';
$messageSuccess = getFlashMessage('success');
$dsmStartPeriod = '';
$dsmEndPeriod = '';
$dsmName = '';
$dsmMaxSelection = '';
$resultDss = [];
$resultDssTotal = [];
$maxCndHome = [];
$maxWork = [];
$maxIncome = [];
$maxDependents = [];
$maxAssets = [];
$wheres = [];
$dssId = '';
$criteria = '';
if (array_key_exists('submit', $_POST) === true) {
    $dssId = getPostValue('dsm_id');
    $dsmStartPeriod = getPostValue('dsm_start_period');
    $dsmEndPeriod = getPostValue('dsm_end_period');
    $dsmName = getPostValue('dsm_name');
    $dsmMaxSelection = getPostValue('dsm_max_selection');
    $continue = true;
    if ($dsmName !== null and
        pgIsDataExists('dss_master', 'dsm_name', $dsmName, $criteria) === true
    ) {
        $messageInfo = 'Data already exists';
        $continue = false;
    }
    if ($continue === true) {
        $result = false;
        $modelData = [
            'dsm_start_period'  => $dsmStartPeriod,
            'dsm_end_period'    => $dsmEndPeriod,
            'dsm_name'          => $dsmName,
            'dsm_max_selection' => $dsmMaxSelection
        ];
        $recordWeightSociety = pgFetchRows(getSqlSociety());
        if ($recordWeightSociety !== []) {
            $result = pgInsert('dss_master', $modelData);
            $dssId = pgGetLastInsertId('dss_master', 'dsm_id');
            foreach ($recordWeightSociety as $record) {
                $societyId = $record['sct_id'];
                if (array_key_exists('C1', $resultDssTotal) === false) {
                    $resultDssTotal['C1'] = [
                        'ttl_condition_home' => 0,
                        'ttl_assets'         => 0,
                        'ttl_work'           => 0,
                        'ttl_income'         => 0,
                        'ttl_dependents'     => 0
                    ];
                }
                $resultDss[$societyId]['sct_id'] = $societyId;
                $resultDss[$societyId]['home_value'] = $record['home_value'];
                $resultDss[$societyId]['work_value'] = $record['work_value'];
                $resultDss[$societyId]['income_value'] = $record['income_value'];
                $resultDss[$societyId]['dependents_value'] = $record['dependents_value'];
                $resultDss[$societyId]['assets_value'] = $record['assets_value'];
                $resultDssTotal['C1']['ttl_condition_home'] += $record['home_value'];
                $resultDssTotal['C1']['ttl_assets'] += $record['assets_value'];
                $resultDssTotal['C1']['ttl_work'] += $record['work_value'];
                $resultDssTotal['C1']['ttl_income'] += $record['income_value'];
                $resultDssTotal['C1']['ttl_dependents'] += $record['dependents_value'];
                $maxCndHome [] .= $resultDss[$societyId]['home_value'];
                $maxWork [] .= $resultDss[$societyId]['work_value'];
                $maxIncome [] .= $resultDss[$societyId]['income_value'];
                $maxDependents [] .= $resultDss[$societyId]['dependents_value'];
                $maxAssets [] .= $resultDss[$societyId]['assets_value'];
            }
            foreach ($resultDss as $recordDssFinal) {
                $societyIdFinal = $recordDssFinal['sct_id'];
                $resultDssFinal[$societyIdFinal]['sct_id'] = $societyIdFinal;
                $resultDssFinal[$societyIdFinal]['home_value'] =
                    ($recordDssFinal['home_value'] / (int)max(
                            $maxCndHome
                        ) * $resultDssTotal['C1']['ttl_condition_home']);
                $resultDssFinal[$societyIdFinal]['work_value'] =
                    $recordDssFinal['work_value'] / (int)max(
                        $maxWork
                    );
                $resultDssFinal[$societyIdFinal]['income_value'] =
                    $recordDssFinal['income_value'] / (int)max(
                        $maxIncome
                    );
                $resultDssFinal[$societyIdFinal]['assets_value'] =
                    $recordDssFinal['assets_value'] / (int)max(
                        $maxDependents
                    );
                $resultDssFinal[$societyIdFinal]['work_value'] =
                    $recordDssFinal['work_value'] / (int)max(
                        $maxAssets
                    );
                $modelDataDssResult = [
                    'dsr_society_id' => (int)$societyIdFinal,
                    'dsr_weight'     => array_sum($resultDssFinal[$societyIdFinal]),
                    'dsr_dss_id'     => $dssId,
                ];
                $result = pgInsert('dss_result', $modelDataDssResult);
            }
            if ($result === true) {
                pgCommitTransaction();
                setFlashMessage('success', 'Successful to update DSS Master # ' . $dssId);
                header('Location: index.php');
            } else {
                pgRollbackTransaction();
                $messageError = 'Failed to update data DSS Master';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dss Master</title>
    <link rel="stylesheet" href="../../assets/css/style.css" />
</head>
<body>
<?php include_once __DIR__ . '/../../menu.php'; ?>
<div class="container main">
    <div class="container">
        <div class="block block-12">
            <div class="panel">
                <h1 class="panel title">Form DSS Master</h1>
                <div class="panel header">
                    <?php displayMessage($messageError, 'error'); ?>
                    <?php displayMessage($messageSuccess, 'success'); ?>
                    <?php displayMessage($messageInfo, 'info'); ?>
                </div>
                <div class="panel content">
                    <div class="block block-12">
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                            <input type="hidden" name="dsm_id" value="<?php echo $dssId; ?>" />
                            <div class="form field">
                                <label for="dsm_start_period">Tanggal Mulai Periode</label>
                                <input id="dsm_start_period"
                                       type="date"
                                       name="dsm_start_period"
                                       required
                                       value="<?php echo $dsmStartPeriod; ?>" />
                            </div>
                            <div class="form field">
                                <label for="dsm_end_period">Tanggal Akhir Periode</label>
                                <input id="dsm_end_period"
                                       type="date"
                                       name="dsm_end_period"
                                       required
                                       value="<?php echo $dsmEndPeriod; ?>">
                            </div>
                            <div class="form field">
                                <label for="dsm_name">Name</label>
                                <input id="dsm_name" type="text" name="dsm_name" required value="<?php echo $dsmName; ?>">
                            </div>
                            <div class="form field">
                                <label for="dsm_max_selection">Maximal Seleksi</label>
                                <input id="dsm_max_selection"
                                       type="number"
                                       name="dsm_max_selection"
                                       required
                                       value="<?php echo $dsmMaxSelection; ?>">
                            </div>
                            <div class="form button">
                                <input type="submit" name="submit" value="Proses Selection" />
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
</body>