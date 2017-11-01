<?php
require_once __DIR__ . '/../../../global.php';
protectApplicationPage();
$strSql = 'SELECT
        rgt.rgt_name,
        rgt.rgt_id
    FROM
        "public".criteria_range_type AS rgt';
$record = pgFetchRows($strSql);
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
            <div class="panel message">
                <div class="error">
                    This is error message
                </div>
                <div class="success">
                    This is success message
                </div>
                <div class="info">
                    This is info message
                </div>
            </div>

        </div>
        <div class="panel content">
            <div class="panel control">
                <div class="buttons">
                    <input type="button" value="Add" />
                    <input type="button" value="Add" />
                </div>
            </div>
            <table>
                <thead>
                <tr>
                    <th>No</th>
                    <th>Code</th>
                    <th>Range Name</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($record as $row): ?>
                    <tr>
                        <td><?php echo $row['rgt_id']; ?></td>
                        <td><?php echo $row['rgt_name']; ?></td>
                        <td></td>
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
