<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Meu Dashboard</title>
    <style> 
        body { 
            font-family: Arial, sans-serif; 
            margin: 0; 
            background-color: #1f1f1f; 
            color: #f0f0f0; 
            background-attachment: fixed;
            min-height: 100vh;
        }
        table { 
            border-collapse: collapse; 
            width: 100%; 
            margin-top: 20px; 
            background-color: #333; 
        }
        th, td { 
            border: 1px solid #444; 
            padding: 12px; 
            text-align: left;
        }
        th { 
            background-color: #404040; 
        }
        
        .container { 
            background-color: #2d2d2d; 
            padding: 25px;
            margin: 30px auto;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 900px; 
            color: #f0f0f0;
        }
        
        .header {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between; 
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        .header-logo {
            height: 100px; 
            width: auto;
            vertical-align: middle; 
        }
        .header-right {
            display: flex;
            align-items: center;
        }
        .header .search-form form {
            margin: 0 20px 0 0; 
        }
        .logout-button {
            color: #ffc; 
            text-decoration: none;
            font-weight: bold;
            padding: 8px 12px;
            border: 1px solid #ffc;
            border-radius: 8px;
            transition: background-color 0.2s, color 0.2s;
        }
        .logout-button:hover {
            background-color: #ffc;
            color: #333;
        }

        
        h2, h3, label { color: #f0f0f0; }
        a { color: #4a90e2; } 
        hr { border: 0; border-top: 1px solid #444; } 

        input[type="text"],
        input[type="number"] {
            padding: 10px;
            border: 1px solid #555;
            border-radius: 8px;
            background-color: #444; 
            color: white; 
            box-sizing: border-box;
            margin: 5px;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
        form[action="index.php?action=adicionar_avaliacao"] button {
            background-color: #28a745; 
        }
        form[action="index.php?action=adicionar_avaliacao"] button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

    <header class="header">
        <a href="index.php?action=dashboard">
            <img src="assets/logo.png" alt="Logo" class="header-logo">
        </a>
        
        <div class="header-right">
            <div class="search-form">
                <form action="index.php" method="GET">
                    <input type="hidden" name="action" value="buscar">
                    <label for="termo" style="color: white;">Buscar Usuários:</label>
                    <input type="text" id="termo" name="termo" placeholder="Nome do usuário...">
                    <button type="submit">Buscar</button>
                </form>
            </div>
            
            <a href="index.php?action=logout" class="logout-button" 
               onclick="return confirm('Tem certeza que deseja sair?');">
                Sair
            </a>
        </div>
    </header>

    <div class="container">
        
        <h2>Olá, <?= htmlspecialchars($_SESSION['user_nome'] ?? 'Usuário') ?>!</h2>
        <hr>

        <h3>Adicionar Nova Avaliação</h3>
        <form action="index.php" method="POST">
            <input type="hidden" name="action" value="adicionar_avaliacao">
            
            <label>Álbum:</label>
            <input type="text" name="album" required>
            <label>Artista:</label>
            <input type="text" name="artista" required>
            <label>Nota (1-10):</label>
            <input type="number" name="nota" min="1" max="10" required>
            
            <button type="submit">Adicionar</button>
        </form>

        <hr>

        <h3>Minhas Avaliações</h3>
        
        <table>
            <thead>
                <tr>
                    <th>Álbum</th>
                    <th>Artista</th>
                    <th>Nota</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($avaliacoes)): ?>
                    <tr>
                        <td colspan="4">Você ainda não avaliou nenhum álbum.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($avaliacoes as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['nome_album']) ?></td>
                            <td><?= htmlspecialchars($item['artista']) ?></td>
                            <td><?= htmlspecialchars($item['nota']) ?> / 10</td>
                            <td>
                                <a href="index.php?action=editar&id=<?= $item['id'] ?>">Editar</a>
                                <a href="index.php?action=deletar&id=<?= $item['id'] ?>" onclick="return confirm('Tem certeza?');">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>
</html>