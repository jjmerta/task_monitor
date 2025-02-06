<?php
require_once 'Task.php';

$taskManager = new Task($pdo);
$tasks = $taskManager->getAllTasks();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> 
    <title>Task Manager</title>
    
</head>
<body>
    <h1>Lista zadań</h1>
    <a href="add_task.php">Dodaj nowe zadanie</a>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <strong><?= htmlspecialchars($task['title']) ?></strong>
                <p><?= htmlspecialchars($task['description']) ?></p>
                <a href="edit_task.php?id=<?= $task['id'] ?>">Edytuj</a>
                <a href="delete_task.php?id=<?= $task['id'] ?>" onclick="return confirm('Czy na pewno chcesz usunąć to zadanie?')">Usuń</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>