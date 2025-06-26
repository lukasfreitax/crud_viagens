<?php
include("conexao.php");

$resultado = $conn->query("SELECT * FROM viagens");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agência de Viagens - Sistema de Gestão</title>
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
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            color: #2c3e50;
        }
        .header h1 {
            margin: 0;
            color: #3498db;
        }
        .header p {
            margin: 5px 0;
            color: #7f8c8d;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #3498db;
            color: white;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        tr:hover {
            background-color: #e3f2fd;
        }
        .btn {
            padding: 8px 16px;
            margin: 2px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            font-size: 14px;
            transition: all 0.3s;
        }
        .btn-primary {
            background-color: #3498db;
            color: white;
        }
        .btn-warning {
            background-color: #f39c12;
            color: white;
        }
        .btn-danger {
            background-color: #e74c3c;
            color: white;
        }
        .btn:hover {
            opacity: 0.8;
            transform: translateY(-1px);
        }
        .add-btn {
            margin-bottom: 20px;
            text-align: center;
        }
        .stats {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
            background-color: #ecf0f1;
            padding: 15px;
            border-radius: 8px;
        }
        .stat-item {
            text-align: center;
        }
        .stat-number {
            font-size: 24px;
            font-weight: bold;
            color: #3498db;
        }
        .stat-label {
            color: #7f8c8d;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🌍 Agência de Viagens</h1>
            <p>Sistema de Gestão de Pacotes de Viagem</p>
        </div>
        
        <?php
        $total_viagens = $conn->query("SELECT COUNT(*) as total FROM viagens")->fetch_assoc()['total'];
        $total_vagas = $conn->query("SELECT SUM(quantidade_vagas) as total FROM viagens")->fetch_assoc()['total'];
        ?>
        
        <div class="stats">
            <div class="stat-item">
                <div class="stat-number"><?= $total_viagens ?></div>
                <div class="stat-label">Pacotes Cadastrados</div>
            </div>
            <div class="stat-item">
                <div class="stat-number"><?= $total_vagas ?: 0 ?></div>
                <div class="stat-label">Total de Vagas</div>
            </div>
        </div>
        
        <div class="add-btn">
            <a href="inserir.php" class="btn btn-primary">✈️ Nova Viagem</a>
        </div>

        <table>
            <tr>
                <th>ID</th>
                <th>Destino</th>
                <th>Código do Pacote</th>
                <th>Duração (dias)</th>
                <th>Quantidade de Vagas</th>
                <th>Ações</th>
            </tr>
            <?php while ($linha = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?= $linha['id'] ?></td>
                <td><?= $linha['destino'] ?></td>
                <td><?= $linha['codigo_pacote'] ?></td>
                <td><?= $linha['duracao_dias'] ?></td>
                <td><?= $linha['quantidade_vagas'] ?></td>
                <td>
                    <a href="editar.php?id=<?= $linha['id'] ?>" class="btn btn-warning">✏️ Editar</a>
                    <a href="excluir.php?id=<?= $linha['id'] ?>" class="btn btn-danger" onclick="return confirm('Deseja excluir esta viagem?')">🗑️ Excluir</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>

