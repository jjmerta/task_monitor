<?php
require_once 'Task.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $taskManager = new Task($pdo);
    $taskManager->addTask($title, $description);

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj zadanie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Dodaj nowe zadanie</h1>
        <form method="POST">
            <label for="title">Tytuł:</label>
            <input type="text" id="title" name="title" required>
            
            <label for="description">Opis:</label>
            <textarea id="description" name="description" rows="4"></textarea>
            
            <button type="submit" class="btn">Dodaj zadanie</button>
        </form>
        <a href="index.php" class="btn">Powrót do listy zadań</a>
    </div>
</body>
</html>
