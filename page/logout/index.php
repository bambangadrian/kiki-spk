<?php
require_once __DIR__ . '/../../global.php';
session_destroy();
header('Location: ' . HOST . '/index.php');
exit;
?>