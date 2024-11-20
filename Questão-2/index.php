<?php
require 'database.php';

$tarefas = $db->query("SELECT * FROM tarefas ORDER BY concluida ASC, data_vencimento ASC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do-List</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #7B68EE;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container{
            background-color: #ffffff;
            width: x;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1,h2{
            text-align: center;
            color: #333;
        }

        form{
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 20px;
        }

        input,button{
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input:focus, button:focus{
            outline: none;
            border-color: #007bff;
        }

        button{
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        button:hover{
            background-color: #0056b3;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td{
            text-align: left;
            padding: 10px;
            border: 1px solid #ddd;
            font-weight: 700;
        }

        th{
            background-color: #6c757d;
            color: white;
        }

        tr:nth-child(even){
            background-color: #f9f9f9;
        }

        tr:hover{
            background-color: #e9ecef;
        }

        .concluida{
            text-decoration: line-through;
            color: #6c757d;
        }
        a{
            color: white;
            padding: 5px;
            text-decoration: none;      
            border-radius: 3px;      
        }        
        #done{
            background-color: #0056b3;          
        }
        #del{
            background-color: #b81414 ;            
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>To-Do-List</h1>
        <form action="add_tarefa.php" method="post">
            <input type="text" name="descricao" placeholder="Descrição da tarefa" required>
            <input type="date" name="data_vencimento" required>
            <button type="submit">Adicionar Tarefa</button>
        </form>
        <h2>Tarefas</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Data de Vencimento</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tarefas as $tarefa): ?>
                    <tr>
                        <td><?= $tarefa['id'] ?></td>
                        <td class="<?= $tarefa['concluida'] ? 'concluida' : '' ?>"><?= htmlspecialchars($tarefa['descricao']) ?></td>
                        <td><?= htmlspecialchars($tarefa['data_vencimento']) ?></td>
                        <td><?= $tarefa['concluida'] ? 'Concluída' : 'Pendente' ?></td>
                        <td>
                            <a href="update_tarefa.php?id=<?= $tarefa['id'] ?>" id="done">Concluir</a>
                            <a href="delete_tarefa.php?id=<?= $tarefa['id'] ?>" id="del">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
