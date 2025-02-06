<?php
require_once 'Task.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
$taskManager = new Task($pdo);
$task = $taskManager->getTaskById($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $taskManager->updateTask($id, $title, $description);
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj zadanie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edytuj zadanie</h1>
        <form method="POST">
            <label for="title">Tytuł:</label>
            <input type="text" id="title" name="title" value="<?= htmlspecialchars($task['title']) ?>" required>
            
            <label for="description">Opis:</label>
            <textarea id="description" name="description" rows="4"><?= htmlspecialchars($task['description']) ?></textarea>
            
            <button type="submit" class="btn">Zapisz zmiany</button>
        </form>
        <a href="index.php" class="btn">Powrót do listy zadań</a>
    </div>
</body>
</html>
