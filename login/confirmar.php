<?php
$email = $_GET['email'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Confirmação de Código</title>
    <link rel="stylesheet" href="../assets/style.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
        }

        .confirm-box {
            background: white;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            max-width: 450px;
            width: 100%;
            text-align: center;
        }

        .confirm-box h2 {
            margin-bottom: 1.2rem;
            color: #333;
        }

        .confirm-box p {
            font-size: 1rem;
            margin-bottom: 2rem;
            color: #555;
        }

        .confirm-box input[type="text"] {
            width: 100%;
            padding: 1rem;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin-bottom: 1.5rem;
            font-size: 1rem;
        }

        .confirm-btn {
            background: linear-gradient(45deg, #28a745, #20c997);
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .confirm-btn:hover {
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="confirm-box">
        <h2>Confirme seu código</h2>
        <p>Enviamos um código de verificação para o e-mail <strong><?= htmlspecialchars($email) ?></strong>.</p>

        <form action="verificar_codigo.php" method="post">
            <input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">
            <input type="text" name="codigo" placeholder="Digite o código de 6 dígitos" required>
            <button class="confirm-btn" type="submit">Confirmar</button>
        </form>
    </div>
</body>
</html>
