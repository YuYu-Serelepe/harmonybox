<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Avaliação</title>
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
        
        /* Estilos do formulário */
        h2, label { color: #f0f0f0; }
        a { color: #4a90e2; } 
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"] {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #555;
            border-radius: 8px;
            background-color: #444; 
            color: white; 
            box-sizing: border-box;
            margin-top: 5px;
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
        <h2>Editar Avaliação (UPDATE)</h2>

        <?php if (isset($avaliacao)): ?>
            <form action="index.php" method="POST">
                <input type="hidden" name="action" value="processar_edicao">
                <input type="hidden" name="id_avaliacao" value="<?= $avaliacao['id'] ?>">
                
                <div class="form-group">
                    <label>Álbum:</label>
                    <input type="text" name="album" value="<?= htmlspecialchars($avaliacao['nome_album']) ?>" required>
                </div>
                <div class="form-group">
                    <label>Artista:</label>
                    <input type="text" name="artista" value="<?= htmlspecialchars($avaliacao['artista']) ?>" required>
                </div>
                <div class="form-group">
                    <label>Nota (1-10):</label>
                    <input type="number" name="nota" min="1" max="10" value="<?= htmlspecialchars($avaliacao['nota']) ?>" required>
                </div>
                
                <button type="submit">Salvar Alterações</button>
            </form>
        <?php else: ?>
            <p>Avaliação não encontrada.</p>
        <?php endif; ?>

        <p><a href="index.php?action=dashboard">Voltar para o Dashboard</a></p>
    </div>

</body>
</html>