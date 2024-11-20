<?php
require 'database.php';

$descricao = $_POST['descricao'] ?? '';
$data_vencimento = $_POST['data_vencimento'] ?? '';

if (!empty($descricao) && !empty($data_vencimento)) {
    $stmt = $db->prepare("INSERT INTO tarefas (descricao, data_vencimento) VALUES (?, ?)");
    $stmt->execute([$descricao, $data_vencimento]);
} else {
    echo "Por favor, preencha todos os campos.";
    exit;
}

header("Location: index.php");
exit;
