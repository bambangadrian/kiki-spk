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
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../assets/css/style.css" />
</head>
<body>
<?php include_once __DIR__ . '/../../menu.php'; ?>
<div class="container main clearfix">
    <div class="panel">
        <h1 class="panel title">Test page</h1>
        <div class="panel description">Page description container.</div>
        <div class="panel header">
        </div>
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
                <th>Name</th>
                <th>Address</th>
                <th>Condition Home</th>
                <th>Work</th>
                <th>Income</th>
                <th>Dependents</th>
                <th>Assets</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($recordSociety as $row): ?>
                <tr>
                    <td><?php echo $row['sct_id']; ?></td>
                    <td><?php echo $row['sct_name']; ?></td>
                    <td><?php echo $row['sct_address']; ?></td>
                    <td><?php echo $row['sct_condition_home']; ?></td>
                    <td><?php echo $row['sct_work']; ?></td>
                    <td><?php echo $row['sct_income']; ?></td>
                    <td><?php echo $row['sct_dependents']; ?></td>
                    <td><?php echo $row['sct_assets']; ?></td>
                    <td>
                        <a href="<?php echo $pageUrl; ?>update.php?id=<?php echo $row['sct_id']; ?>">Edit</a>
                        <a href="<?php echo $pageUrl; ?>index.php?action=delete&id=<?php echo $row['sct_id']; ?>">Delete</a>
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
