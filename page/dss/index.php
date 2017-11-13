<?php
require_once __DIR__ . '/../../global.php';
protectApplicationPage();
$recordDssMaster = pgFetchRows(getDssMaster());
$pageUrl = HOST . '/page/dss/';
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
<div class="container main clearfix">
    <div class="panel">
        <h1 class="panel title">Listing DSS Master</h1>
        <div class="panel description">Page description container.</div>
        <div class="panel header">
        </div>
        <div class="panel content">
            <div class="panel control">
                <div class="buttons">
                    <input type="button" value="Add" onclick="window.location.href='update.php'" />
                </div>
            </div>
            <table>
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal Mulai Periode</th>
                    <th>Tanggal Akhir Periode</th>
                    <th>Maximal Seleksi</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($recordDssMaster as $row): ?>
                    <tr>
                        <td><?php echo $row['dsm_id']; ?></td>
                        <td><?php echo $row['dsm_name']; ?></td>
                        <td><?php echo $row['dsm_start_period']; ?></td>
                        <td><?php echo $row['dsm_end_period']; ?></td>
                        <td><?php echo $row['dsm_max_selection']; ?></td>
                        <td>
                            <a href="<?php echo $pageUrl; ?>report.php?id=<?php echo $row['dsm_id']; ?>&max=<?php echo $row['dsm_max_selection']; ?>">Show</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="panel footer">
            This is panel footer container.
        </div>
    </div>
</div>
</body>

</html>
