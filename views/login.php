<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Musiquinha</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; 
            margin: 0;
            background-image: url('assets/poppunkemo.png'); 
            background-size: cover;
            background-position: center;
            color: #333;
        }
        .login-container {
            background-color: rgba(255, 255, 255, 0.9); 
            padding: 30px;
            border-radius: 15px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px; 
        }
        .logo-area {
            margin-bottom: 20px;
        }
        .logo-area img {
            max-width: 150px; 
            height: auto;
            border-radius: 8px; 
        }
        h2 {
            margin-top: 0;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
            text-align: left; 
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px); 
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px; 
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
            margin-top: 10px;
            width: 100%; 
        }
        button:hover {
            background-color: #0056b3; 
        }
        .register-link {
            margin-top: 20px;
        }
        .register-link a {
            color: #007bff; 
            text-decoration: none;
            font-weight: bold;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
        .error-message {
            color: red;
            margin-bottom: 15px;
            font-size: 0.9em;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <div class="logo-area">
            <img src="assets/logo.png" alt="Logo da Musiquinha"> </div>
        <h2>Login</h2>

        <?php if (isset($erro)): ?>
            <p class="error-message"><?= htmlspecialchars($erro) ?></p>
        <?php endif; ?>

        <form action="index.php" method="POST">
            <input type="hidden" name="action" value="processar_login">
            
            <div class="form-group">
                <label for="nome_usuario">Nome de Usuário:</label>
                <input type="text" id="nome_usuario" name="nome_usuario" required>
            </div>
            
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            
            <button type="submit">Entrar</button>
        </form>

        <div class="register-link">
            <a href="index.php?action=cadastro">Ainda não tem conta? Cadastre-se!</a>
        </div>
    </div>

</body>
</html>