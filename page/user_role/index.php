<?php
require_once __DIR__ . '/../../global.php';
protectApplicationPage();
$recordRelationUserRole = pgFetchRows(getSqlRelationUserRole());
$pageUrl = HOST . '/page/user_role/';
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
        <h1 class="panel title">Peran User</h1>
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
                    <th>User</th>
                    <th>Peran</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($recordRelationUserRole as $row): ?>
                    <tr>
                        <td><?php echo $row['uar_id']; ?></td>
                        <td><?php echo $row['uac_username']; ?></td>
                        <td><?php echo $row['usr_name']; ?></td>
                        <td>
                            <a href="<?php echo $pageUrl; ?>update.php?id=<?php echo $row['uar_id']; ?>">Edit</a>
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
