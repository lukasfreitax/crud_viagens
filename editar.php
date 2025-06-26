<?php
include("conexao.php");

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $destino = $_POST['destino'];
    $codigo_pacote = $_POST['codigo_pacote'];
    $duracao_dias = $_POST['duracao_dias'];
    $quantidade_vagas = $_POST['quantidade_vagas'];

    $stmt = $conn->prepare("UPDATE viagens SET destino = ?, codigo_pacote = ?, duracao_dias = ?, quantidade_vagas = ? WHERE id = ?");
    $stmt->bind_param("ssiii", $destino, $codigo_pacote, $duracao_dias, $quantidade_vagas, $id);
    $stmt->execute();

    header("Location: index.php");
    exit;
}

$resultado = $conn->query("SELECT * FROM viagens WHERE id = $id");
$viagem = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Viagem - Agência de Viagens</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f0f8ff;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            color: #2c3e50;
        }
        .header h2 {
            margin: 0;
            color: #f39c12;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #2c3e50;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus, input[type="number"]:focus {
            border-color: #f39c12;
            outline: none;
        }
        .btn {
            padding: 12px 24px;
            margin: 8px;
            text-decoration: none;
            border-radius: 6px;
            display: inline-block;
            border: none;
            cursor: pointer;
            font-size: 16px;
            transition: all 0.3s;
        }
        .btn-warning {
            background-color: #f39c12;
            color: white;
        }
        .btn-secondary {
            background-color: #95a5a6;
            color: white;
        }
        .btn:hover {
            opacity: 0.8;
            transform: translateY(-1px);
        }
        .form-actions {
            text-align: center;
            margin-top: 30px;
        }
        .icon {
            font-size: 20px;
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>✏️ Editar Viagem</h2>
            <p>Atualize os dados do pacote de viagem</p>
        </div>
        
        <form method="post">
            <div class="form-group">
                <label for="destino">🌍 Destino:</label>
                <input type="text" name="destino" id="destino" value="<?= $viagem['destino'] ?>" required>
            </div>
            
            <div class="form-group">
                <label for="codigo_pacote">🎫 Código do Pacote:</label>
                <input type="text" name="codigo_pacote" id="codigo_pacote" value="<?= $viagem['codigo_pacote'] ?>" maxlength="20" required>
            </div>
            
            <div class="form-group">
                <label for="duracao_dias">📅 Duração (dias):</label>
                <input type="number" name="duracao_dias" id="duracao_dias" value="<?= $viagem['duracao_dias'] ?>" min="1" required>
            </div>
            
            <div class="form-group">
                <label for="quantidade_vagas">👥 Quantidade de Vagas:</label>
                <input type="number" name="quantidade_vagas" id="quantidade_vagas" value="<?= $viagem['quantidade_vagas'] ?>" min="1" required>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-warning">
                    <span class="icon">🔄</span>Atualizar Viagem
                </button>
                <a href="index.php" class="btn btn-secondary">
                    <span class="icon">↩️</span>Cancelar
                </a>
            </div>
        </form>
    </div>
</body>
</html>

