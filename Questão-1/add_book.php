<?php
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $author = $_POST['author'] ?? '';
    $year = $_POST['year'] ?? '';

    if (!empty($title) && !empty($author) && is_numeric($year)) {
        $stmt = $db->prepare("
            INSERT INTO books (title, author, year) 
            VALUES (:title, :author, :year)
        ");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':year', $year);
        $stmt->execute();
    } else {
        echo "Por favor, preencha todos os campos corretamente.";
    }
}

header('Location: index.php');
exit();
