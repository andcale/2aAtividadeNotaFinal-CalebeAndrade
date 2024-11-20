<?php
require 'database.php';

$id = $_GET['id'] ?? '';

if (empty($id) || !is_numeric($id)) {
    echo "Erro: ID inválido ou não fornecido. Por favor, tente novamente.";
    exit;
}

$stmt = $db->prepare("UPDATE tarefas SET concluida = 1 WHERE id = ?");
$stmt->execute([$id]);

echo "Tarefa marcada como concluída com sucesso!";
header("Location: index.php");
exit;
