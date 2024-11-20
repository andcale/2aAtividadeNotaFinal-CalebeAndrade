<?php
require 'database.php';
$books = $db->query("SELECT * FROM books ORDER BY id ASC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Biblioteca</title>
    <style>
        body{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #FAF3E0;            
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1{
            color: #5D4037;            
            text-align: center;
            margin-bottom: 20px;
            font-size: 2em;
        }

        .container{
            width: 90%;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }

        .form-section,.books-section{
            margin-bottom: 30px;
            padding: 20px;
            background-color: #FBEEC1;            
            border-radius: 10px;
            border: 1px solid #E0C097;           
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        form{
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label{
            width: 100%;
            max-width: 500px;
            font-weight: bold;
            margin-bottom: 5px;
            color: #5D4037;
        }

        input[type="text"], input[type="number"]{
            width: 100%;
            max-width: 500px;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #BDC3C7;
            border-radius: 4px;
            font-size: 1em;
        }

        button{
            width: 100%;
            max-width: 500px;
            padding: 12px;
            background-color: #6A4E23;            
            color: white;
            font-size: 1.1em;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover{
            background-color: #5D4037;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table,th,td{
            border: 1px solid #D7B89E;
        }

        th,td{
            padding: 12px;
            text-align: left;
        }

        th{
            background-color: #6A4E23;            
            color: white;
        }

        tr:nth-child(even){
            background-color: #F5E8C7;
        }

        tr:hover{
            background-color: #E0C097;
        }

        td a{
            color: #6A4E23;
            text-decoration: none;
            font-weight: bold;
        }

        td a:hover{
            color: #5D4037;
        }

        .no-books-message{
            text-align: center;
            color: #7F8C8D;
            font-size: 1.2em;
        }

        footer{
            text-align: center;
            margin-top: 20px;
            color: #333;
            font-size: 0.9em;
        }
    </style>
</head>

<body>
    <div class="container">        
        <div class="form-section">
            <h1>Adicionar Novo Livro</h1>
            <form action="add_book.php" method="post">
                <label for="title">Título:</label>
                <input type="text" name="title" id="title" required>
                <label for="author">Autor:</label>
                <input type="text" name="author" id="author" required>
                <label for="year">Ano de Publicação:</label>
                <input type="number" name="year" id="year" required>
                <button type="submit">Adicionar Livro</button>
            </form>
        </div>
        <div class="books-section">
            <h1>Catalogo de Livros</h1>
            <?php if ($books): ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Ano</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($books as $book): ?>
                            <tr>
                                <td><?= htmlspecialchars($book['id']) ?></td>
                                <td><?= htmlspecialchars($book['title']) ?></td>
                                <td><?= htmlspecialchars($book['author']) ?></td>
                                <td><?= htmlspecialchars($book['year']) ?></td>
                                <td>
                                    <a href="delete_book.php?id=<?= $book['id'] ?>">Excluir</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="no-books-message">Nenhum livro cadastrado.</p>
            <?php endif; ?>
        </div>
    </div>
    <footer>
        Criado por Calebe Andrade
    </footer>
</body>

</html>