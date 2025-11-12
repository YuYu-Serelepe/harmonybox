<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultados da Busca</title>
    <style> 
        body { 
            font-family: Arial, sans-serif; 
            margin: 0; 
            background-color: #1f1f1f; 
            color: #f0f0f0; 
            background-attachment: fixed;
            min-height: 100vh;
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
        h2, h3 { color: #f0f0f0; }
        a { color: #4a90e2; }
        ul { list-style: none; padding-left: 0; }
        ul li { 
            background-color: #333; 
            padding: 10px; 
            border-radius: 5px; 
            margin-bottom: 5px;
        }
        
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
                    <input type="text" id="termo" name="termo" placeholder="Nome do usuário..." value="<?= htmlspecialchars($termo ?? '') ?>">
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
        <h2>Resultados da Busca</h2>

        <?php if (empty($termo)): ?>
            <p>Você não digitou um termo de busca.</p>
        <?php elseif (empty($resultados)): ?>
            <p>Nenhum usuário encontrado para "<?= htmlspecialchars($termo) ?>".</p>
        <?php else: ?>
            <h3>Resultados para "<?= htmlspecialchars($termo) ?>"</h3>
            <ul>
                <?php foreach ($resultados as $usuario): ?>
                    <li>
                        <a href="index.php?action=perfil&id=<?= $usuario['id'] ?>">
                            <?= htmlspecialchars($usuario['nome_usuario']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>

</body>
</html>