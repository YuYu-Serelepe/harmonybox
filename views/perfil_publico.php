<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Perfil de <?= htmlspecialchars($usuario['nome_usuario']) ?></title>
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
        h2 { color: #f0f0f0; }
        a { color: #4a90e2; } 

        input[type="text"] {
            padding: 10px;
            border: 1px solid #555;
            border-radius: 8px;
            background-color: #444;
            color: white;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
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
        <h2>Avaliações de: <?= htmlspecialchars($usuario['nome_usuario']) ?></h2>

        <table>
            <thead>
                <tr>
                    <th>Álbum</th>
                    <th>Artista</th>
                    <th>Nota</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($avaliacoes)): ?>
                    <tr>
                        <td colspan="3">Este usuário ainda não avaliou nenhum álbum.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($avaliacoes as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['nome_album']) ?></td>
                            <td><?= htmlspecialchars($item['artista']) ?></td>
                            <td><?= htmlspecialchars($item['nota']) ?> / 10</td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>
</html>