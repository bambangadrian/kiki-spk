<?php
require_once __DIR__ . '/../../../global.php';
protectApplicationPage();
$recordCriteriaRange = pgFetchRows(getCriteriaRange());
$pageUrl = HOST . '/page/fuzzy/range_type/';
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
<div class="container main clearfix">
    <div class="panel">
        <h1 class="panel title">Listing Bobot</h1>
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
                    <th>Nilai</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($recordCriteriaRange as $row): ?>
                    <tr>
                        <td><?php echo $row['rgt_id']; ?></td>
                        <td><?php echo $row['rgt_name']; ?></td>
                        <td><?php echo $row['rgt_value']; ?></td>
                        <td>
                            <a href="<?php echo $pageUrl; ?>update.php?id=<?php echo $row['rgt_id']; ?>">Edit</a>
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
