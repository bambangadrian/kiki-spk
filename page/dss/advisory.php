<?php
require_once __DIR__ . '/../../global.php';
$id = getGetValue('id');
$max = getGetValue('max');
$where = [];
$recordDssResult = [];
if ($id !== null and $max !== null) {
    $where [] = 'dsr_dss_id = ' . pgEscape($id) . ' ORDER BY
                        dsr.dsr_weight DESC 
                        LIMIT' . pgEscape($max);
    $recordDssResult = pgFetchRows(getDssResult($where));
}
$pageUrl = HOST . '/page/dss/';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DSS Hasil</title>
    <link rel="stylesheet" href="../../assets/css/style.css" />
</head>
<body>
<div class="container main clearfix">
    <div class="panel">
        <h1 class="panel title">Laporan Raskin </h1>
        <div class="panel description">
            <!--Staf : <strong>--><?php //echo $_SESSION['username']; ?><!--</strong>-->
            <!--<br />-->
            <!--Nama Raskin :-->
            <!--<br />-->
            <!--Periode :-->
        </div>
        <div class="panel header">
        </div>
        <div class="panel content">
            <table>
                <thead>
                <tr>
                    <th>No</th>
                    <th>Warga</th>
                    <th>Alamat</th>
                    <th>Nilai</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($recordDssResult as $row): ?>
                    <tr>
                        <td><?php echo $row['dsr_id']; ?></td>
                        <td><?php echo $row['sct_name']; ?></td>
                        <td><?php echo $row['sct_address']; ?></td>
                        <td><?php echo $row['dsr_weight']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="panel footer">

        </div>
    </div>
</div>
</body>

</html>
