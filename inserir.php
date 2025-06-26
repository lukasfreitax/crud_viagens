<?php
include("conexao.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $destino = $_POST['destino'];
    $codigo_pacote = $_POST['codigo_pacote'];
    $duracao_dias = $_POST['duracao_dias'];
    $quantidade_vagas = $_POST['quantidade_vagas'];

    $stmt = $conn->prepare("INSERT INTO viagens (destino, codigo_pacote, duracao_dias, quantidade_vagas) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssii", $destino, $codigo_pacote, $duracao_dias, $quantidade_vagas);
    $stmt->execute();

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Viagem - Agência de Viagens</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-image: url('assets/fundo.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            
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
            color: #3498db;
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
            border-color: #3498db;
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
        .btn-primary {
            background-color: #3498db;
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
            <h2>✈️ Cadastrar Nova Viagem</h2>
            <p>Preencha os dados do pacote de viagem</p>
        </div>
        
        <form method="post">
            <div class="form-group">
                <label for="destino">🌍 Destino:</label>
                <input type="text" name="destino" id="destino" placeholder="Ex: Paris, França" required>
            </div>
            
            <div class="form-group">
                <label for="codigo_pacote">🎫 Código do Pacote:</label>
                <input type="text" name="codigo_pacote" id="codigo_pacote" placeholder="Ex: PAR001" maxlength="20" required>
            </div>
            
            <div class="form-group">
                <label for="duracao_dias">📅 Duração (dias):</label>
                <input type="number" name="duracao_dias" id="duracao_dias" placeholder="Ex: 7" min="1" required>
            </div>
            
            <div class="form-group">
                <label for="quantidade_vagas">👥 Quantidade de Vagas:</label>
                <input type="number" name="quantidade_vagas" id="quantidade_vagas" placeholder="Ex: 20" min="1" required>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <span class="icon">💾</span>Salvar Viagem
                </button>
                <a href="index.php" class="btn btn-secondary">
                    <span class="icon">↩️</span>Cancelar
                </a>
            </div>
        </form>
    </div>
</body>
</html>

