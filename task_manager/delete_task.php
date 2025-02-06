<?php
require_once 'Task.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
$taskManager = new Task($pdo);
$taskManager->deleteTask($id);

header('Location: index.php');
exit;
?>