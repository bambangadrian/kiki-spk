<?php
require_once __DIR__ . '/global.php';
protectApplicationPage();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
<?php include_once __DIR__ . '/menu.php'; ?>
<div class="container main clearfix">
    <div class="panel">
        <h1 class="panel title">
            Welcome, <?php echo $_SESSION['username']; ?>
        </h1>
    </div>
</body>
</html>
