<?php
/**
 * Teste do sistema de logout
 * 
 * Este arquivo testa o funcionamento do botão "Sair" no header
 * quando o usuário está logado.
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
    <title>Teste - Sistema de Logout</title>
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
            max-width: 800px;
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
        .btn-danger {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        }
        .btn-danger:hover {
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.4);
        }
        .code {
            background: #f1f3f4;
            padding: 15px;
            border-radius: 5px;
            font-family: 'Courier New', monospace;
            margin: 10px 0;
            border-left: 4px solid #667eea;
        }
    </style>
</head>
<body>
    <div class='container'>
        <h1>🧪 Teste do Sistema de Logout</h1>
        
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

// Teste 2: Verificar se a action logout existe
echo "<div class='test-section'>
            <h3>🔧 Verificação da Action Logout</h3>";

$controller = new app\controllers\SiteController('site', Yii::$app);
if (method_exists($controller, 'actionLogout')) {
    echo "<div class='status success'>✅ Action 'actionLogout' existe no SiteController</div>";
} else {
    echo "<div class='status error'>❌ Action 'actionLogout' NÃO existe no SiteController</div>";
}

// Teste 3: Verificar se o botão está no layout
$layoutFile = __DIR__ . '/../views/layouts/main.php';
if (file_exists($layoutFile)) {
    $layoutContent = file_get_contents($layoutFile);
    if (strpos($layoutContent, 'btn-sair') !== false) {
        echo "<div class='status success'>✅ Botão 'Sair' está presente no layout</div>";
    } else {
        echo "<div class='status error'>❌ Botão 'Sair' NÃO está presente no layout</div>";
    }
    
    if (strpos($layoutContent, 'Yii::$app->user->isGuest') !== false) {
        echo "<div class='status success'>✅ Verificação de login está presente no layout</div>";
    } else {
        echo "<div class='status error'>❌ Verificação de login NÃO está presente no layout</div>";
    }
} else {
    echo "<div class='status error'>❌ Arquivo de layout não encontrado</div>";
}

echo "</div>";

// Teste 4: Instruções de teste
echo "<div class='test-section'>
            <h3>🧪 Como Testar</h3>
            <p><strong>Para testar o sistema de logout:</strong></p>
            <ol>
                <li>Faça login como aluno usando o formulário de matrícula</li>
                <li>Verifique se o header mostra 'Dashboard' e 'Sair' em vez de 'Sou Aluno' e 'Matricular-se'</li>
                <li>Clique no botão 'Sair' e confirme a ação</li>
                <li>Verifique se foi redirecionado para a página inicial</li>
                <li>Verifique se o header voltou a mostrar 'Sou Aluno' e 'Matricular-se'</li>
            </ol>
        </div>";

// Teste 5: Links de teste
echo "<div class='test-section'>
            <h3>🔗 Links de Teste</h3>
            <p><strong>Links úteis para testar:</strong></p>
            <a href='index.php?r=site/registrar' class='btn'>📝 Matricular-se (Login)</a>
            <a href='index.php?r=site/login-aluno' class='btn'>👤 Login Aluno</a>
            <a href='index.php?r=site/dashboard-aluno' class='btn'>📊 Dashboard</a>
            <a href='index.php?r=site/logout' class='btn btn-danger'>🚪 Sair (Logout)</a>
        </div>";

// Teste 6: Código do botão
echo "<div class='test-section'>
            <h3>💻 Código do Botão Sair</h3>
            <div class='code'>
&lt;?php if (Yii::\$app->user->isGuest): ?&gt;
    &lt;?= Html::a('Sou Aluno', ['site/portal-aluno'], ['class' => 'btn-aluno']) ?&gt;
    &lt;?= Html::a('Matricular-se', ['site/registrar'], ['class' => 'btn-registrar']) ?&gt;
&lt;?php else: ?&gt;
    &lt;?= Html::a('Dashboard', ['site/dashboard-aluno'], ['class' => 'btn-aluno']) ?&gt;
    &lt;?= Html::a('Sair', ['site/logout'], [
        'class' => 'btn-sair',
        'data' => [
            'method' => 'post',
            'confirm' => 'Tem certeza que deseja sair?'
        ]
    ]) ?&gt;
&lt;?php endif; ?&gt;
            </div>
        </div>";

echo "</div>
</body>
</html>";
?> 