<?php
require_once __DIR__ . '/../../../global.php';
protectApplicationPage();
$recordCriteria = pgFetchRows(getSqlRelationCriteria());
$pageUrl = HOST . '/page/criteria/sub_criteria/';
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
<div class="container main clearfix">
    <div class="panel">
        <h1 class="panel title">Listing Kriteria</h1>
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
                    <th>Code</th>
                    <th>Nama</th>
                    <th>Parent</th>
                    <th>Bobot</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($recordCriteria as $row): ?>
                    <tr>
                        <td><?php echo $row['crt_id']; ?></td>
                        <td><?php echo $row['crt_code']; ?></td>
                        <td><?php echo $row['crt_name']; ?></td>
                        <td><?php echo $row['crm_name']; ?></td>
                        <td><?php echo $row['rgt_name']; ?></td>
                        <td>
                            <a href="<?php echo $pageUrl; ?>update.php?id=<?php echo $row['crt_id']; ?>">Edit</a>
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
