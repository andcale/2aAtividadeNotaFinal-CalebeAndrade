<?php
require 'database.php';

$id = $_GET['id'] ?? '';

if (empty($id) || !is_numeric($id)) {
    echo "Erro: ID inválido ou não fornecido. Por favor, tente novamente.";
    exit;
}

$stmt = $db->prepare("DELETE FROM tarefas WHERE id = ?");
$stmt->execute([$id]);

echo "Tarefa excluída com sucesso!";
header("Location: index.php");
exit;
