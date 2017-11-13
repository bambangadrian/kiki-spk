<?php
require_once __DIR__ . '/../../global.php';
protectApplicationPage();
$recordSociety = pgFetchRows(getSqlSociety());
$pageUrl = HOST . '/page/warga/';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Warga</title>
    <link rel="stylesheet" href="../../assets/css/style.css" />
</head>
<body>
<?php include_once __DIR__ . '/../../menu.php'; ?>
<div class="container main clearfix">
    <div class="panel">
        <h1 class="panel title">Listing Data Warga</h1>
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
                    <th>Alamat</th>
                    <th>Kondisi Rumah</th>
                    <th>Pekerjaan</th>
                    <th>Penghasilan</th>
                    <th>Tanggungan</th>
                    <th>Aset</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($recordSociety as $row): ?>
                    <tr>
                        <td><?php echo $row['sct_id']; ?></td>
                        <td><?php echo $row['sct_name']; ?></td>
                        <td><?php echo $row['sct_address']; ?></td>
                        <td><?php echo $row['home']; ?></td>
                        <td><?php echo $row['working']; ?></td>
                        <td><?php echo $row['income']; ?></td>
                        <td><?php echo $row['dependents']; ?></td>
                        <td><?php echo $row['assets']; ?></td>
                        <td>
                            <a href="<?php echo $pageUrl; ?>update.php?id=<?php echo $row['sct_id']; ?>">Edit</a>
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
