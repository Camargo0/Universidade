<?php
/**
 * Teste do dashboard com dados vazios
 * 
 * Este arquivo testa o dashboard do aluno com notas e presença vazias
 */

// Inclui o arquivo de bootstrap do Yii2
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

// Configuração básica
$config = require __DIR__ . '/../config/web.php';

// Cria a aplicação
$app = new yii\web\Application($config);

echo "<!DOCTYPE html>
<html lang='pt-BR'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Teste - Dashboard com Dados Vazios</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin: 0;
            padding: 20px;
            min-height: 100vh;
            color: #333;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        h1 {
            color: #667eea;
            text-align: center;
            margin-bottom: 30px;
        }
        .test-section {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
            border-left: 4px solid #667eea;
        }
        .test-section h3 {
            color: #495057;
            margin-top: 0;
        }
        .status {
            padding: 10px 15px;
            border-radius: 5px;
            margin: 10px 0;
            font-weight: bold;
        }
        .status.success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .status.error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .status.info {
            background: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 600;
            margin: 10px 5px;
            transition: all 0.3s ease;
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .data-table th, .data-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }
        .data-table th {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-weight: 600;
        }
        .data-table tr:hover {
            background: #f8f9fa;
        }
        .empty-cell {
            color: #6c757d;
            font-style: italic;
            opacity: 0.7;
        }
        .status-nao-lancado {
            background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            text-align: center;
            display: inline-block;
            box-shadow: 0 4px 15px rgba(108, 117, 125, 0.3);
        }
    </style>
</head>
<body>
    <div class='container'>
        <h1>🧪 Teste - Dashboard com Dados Vazios</h1>
        
        <div class='test-section'>
            <h3>📋 Status do Sistema</h3>";

// Teste 1: Verificar se o usuário está logado
echo "<div class='status info'>";
if (Yii::$app->user->isGuest) {
    echo "❌ Usuário NÃO está logado";
} else {
    echo "✅ Usuário está logado como: " . Yii::$app->user->identity->username;
}
echo "</div>";

// Teste 2: Simular dados vazios
echo "<div class='test-section'>
            <h3>📊 Dados de Notas (Vazios)</h3>";

$notas = [
    ['materia' => 'Matemática Financeira', 'nota1' => '-', 'nota2' => '-', 'nota3' => '-', 'media' => '-', 'status' => 'Não lançado'],
    ['materia' => 'Gestão de Pessoas', 'nota1' => '-', 'nota2' => '-', 'nota3' => '-', 'media' => '-', 'status' => 'Não lançado'],
    ['materia' => 'Marketing', 'nota1' => '-', 'nota2' => '-', 'nota3' => '-', 'media' => '-', 'status' => 'Não lançado'],
    ['materia' => 'Contabilidade', 'nota1' => '-', 'nota2' => '-', 'nota3' => '-', 'media' => '-', 'status' => 'Não lançado'],
    ['materia' => 'Administração Financeira', 'nota1' => '-', 'nota2' => '-', 'nota3' => '-', 'media' => '-', 'status' => 'Não lançado'],
];

echo "<table class='data-table'>
    <thead>
        <tr>
            <th>Matéria</th>
            <th>1ª Nota</th>
            <th>2ª Nota</th>
            <th>3ª Nota</th>
            <th>Média</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>";

foreach ($notas as $nota) {
    echo "<tr>
        <td><strong>" . htmlspecialchars($nota['materia']) . "</strong></td>
        <td class='empty-cell'>" . $nota['nota1'] . "</td>
        <td class='empty-cell'>" . $nota['nota2'] . "</td>
        <td class='empty-cell'>" . $nota['nota3'] . "</td>
        <td class='empty-cell'><strong>" . $nota['media'] . "</strong></td>
        <td>
            <span class='status-nao-lancado'>
                " . htmlspecialchars($nota['status']) . "
            </span>
        </td>
    </tr>";
}

echo "</tbody>
</table>";

// Teste 3: Dados de presença vazios
echo "<div class='test-section'>
            <h3>📝 Dados de Presença (Vazios)</h3>";

$presenca = [
    ['materia' => 'Matemática Financeira', 'total_aulas' => 0, 'presencas' => 0, 'faltas' => 0, 'percentual' => 0.0],
    ['materia' => 'Gestão de Pessoas', 'total_aulas' => 0, 'presencas' => 0, 'faltas' => 0, 'percentual' => 0.0],
    ['materia' => 'Marketing', 'total_aulas' => 0, 'presencas' => 0, 'faltas' => 0, 'percentual' => 0.0],
    ['materia' => 'Contabilidade', 'total_aulas' => 0, 'presencas' => 0, 'faltas' => 0, 'percentual' => 0.0],
    ['materia' => 'Administração Financeira', 'total_aulas' => 0, 'presencas' => 0, 'faltas' => 0, 'percentual' => 0.0],
];

echo "<table class='data-table'>
    <thead>
        <tr>
            <th>Matéria</th>
            <th>Total de Aulas</th>
            <th>Presenças</th>
            <th>Faltas</th>
            <th>Percentual</th>
        </tr>
    </thead>
    <tbody>";

foreach ($presenca as $p) {
    echo "<tr>
        <td><strong>" . htmlspecialchars($p['materia']) . "</strong></td>
        <td class='empty-cell'>" . $p['total_aulas'] . "</td>
        <td class='empty-cell'>" . $p['presencas'] . "</td>
        <td class='empty-cell'>" . $p['faltas'] . "</td>
        <td class='empty-cell'>" . $p['percentual'] . "%</td>
    </tr>";
}

echo "</tbody>
</table>";

// Teste 4: Links de teste
echo "<div class='test-section'>
            <h3>🔗 Links de Teste</h3>
            <p><strong>Links úteis para testar:</strong></p>
            <a href='index.php?r=site/registrar' class='btn'>📝 Matricular-se (Login)</a>
            <a href='index.php?r=site/dashboard-aluno' class='btn'>📊 Dashboard do Aluno</a>
            <a href='index.php?r=site/portal-aluno' class='btn'>🏠 Portal do Aluno</a>
        </div>";

// Teste 5: Instruções
echo "<div class='test-section'>
            <h3>📋 Instruções de Teste</h3>
            <p><strong>Para testar o dashboard com dados vazios:</strong></p>
            <ol>
                <li>Faça login como aluno usando 'Matricular-se'</li>
                <li>Acesse o 'Dashboard do Aluno'</li>
                <li>Verifique se as notas mostram '-' e status 'Não lançado'</li>
                <li>Verifique se a presença mostra 0 aulas, 0 presenças, 0 faltas</li>
                <li>Verifique se o estilo está adequado para dados vazios</li>
            </ol>
        </div>";

echo "</div>
</body>
</html>";
?> 