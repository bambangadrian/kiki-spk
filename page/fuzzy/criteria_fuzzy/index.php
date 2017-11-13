<?php
require_once __DIR__ . '/../../../global.php';
protectApplicationPage();
$recordCiteriaFuzzy = pgFetchRows(getCriteriaMaster());
$pageUrl = HOST . '/page/fuzzy/criteria_fuzzy/';
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
<div class="container main clearfix">
    <div class="panel">
        <h1 class="panel title">Test page</h1>
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
                    <th>Criteria</th>
                    <th>Container</th>
                    <th>Index</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($recordCiteriaFuzzy as $row): ?>
                    <tr>
                        <td><?php echo $row['crf_id']; ?></td>
                        <td><?php echo $row['crt_name']; ?></td>
                        <td><?php echo $row['crf_container']; ?></td>
                        <td><?php echo $row['crf_index']; ?></td>
                        <td>
                            <a href="<?php echo $pageUrl; ?>update.php?id=<?php echo $row['crf_id']; ?>">Edit</a>
                            <a href="<?php echo $pageUrl; ?>index.php?action=delete&id=<?php echo $row['crf_id']; ?>">Delete</a>
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
