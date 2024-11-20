<?php
require 'database.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $db->prepare("DELETE FROM books WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

header('Location: index.php');
exit();
