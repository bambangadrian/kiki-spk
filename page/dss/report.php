<?php
require_once __DIR__ . '/../../global.php';
protectApplicationPage();
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
if (array_key_exists('advisory', $_POST) === true) {
    $content = $pageUrl . 'advisory.php?id=' . $id . '&max=' . $max . '';
    $pdf = new \Knp\Snappy\Pdf(fixShellArgs(WKHTMLTOPDF));
    $pdf->setTemporaryFolder(FILEDIRECTORY);
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="Laporan' . date('d-m-Y') . '.pdf"');
    echo $pdf->getOutput($content);
}
if (array_key_exists('card', $_POST) === true) {
    $content = $pageUrl . 'advisory.php?id=' . $id . '&max=' . $max . '';
    $pdf = new \Knp\Snappy\Pdf(fixShellArgs(WKHTMLTOPDF));
    $pdf->setTemporaryFolder(FILEDIRECTORY);
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="Laporan' . date('d-m-Y') . '.pdf"');
    echo $pdf->getOutput($content);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DSS Hasil</title>
    <link rel="stylesheet" href="../../assets/css/style.css" />
</head>
<body>
<?php include_once __DIR__ . '/../../menu.php'; ?>
<div class="container main clearfix">
    <div class="panel">
        <h1 class="panel title">Listing DSS Hasil</h1>
        <div class="panel description">Page description container.</div>
        <div class="panel header">
        </div>
        <div class="panel content">
            <table>
                <thead>
                <tr>
                    <th>No</th>
                    <th>Warga</th>
                    <th>Alamat</th>
                    <th>Dss Master</th>
                    <th>Nilai</th>
                    <th>Tanggal Mulai Periode</th>
                    <th>Tanggal Akhir Periode</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($recordDssResult as $row): ?>
                    <tr>
                        <td><?php echo $row['dsr_id']; ?></td>
                        <td><?php echo $row['sct_name']; ?></td>
                        <td><?php echo $row['sct_address']; ?></td>
                        <td><?php echo $row['dsm_name']; ?></td>
                        <td><?php echo $row['dsr_weight']; ?></td>
                        <td><?php echo $row['dsm_start_period']; ?></td>
                        <td><?php echo $row['dsm_end_period']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="panel footer">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="submit" name="advisory" value="Advisory">
                <input type="submit" name="card" value="Card">
            </form>
        </div>
    </div>
</div>
</body>

</html>
