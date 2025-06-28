<?php
// Teste do sistema de login
require_once '../vendor/autoload.php';

// Configura o Yii2
$config = require '../config/web.php';
$app = new yii\web\Application($config);

echo "<h2>Teste do Sistema de Login</h2>";

// Mostra todos os usuários disponíveis
$usuarios = \app\models\User::getUsuariosFromJson();
echo "<h3>Usuários cadastrados:</h3>";
foreach ($usuarios as $usuario) {
    echo "Username: <strong>" . $usuario['username'] . "</strong><br>";
    echo "Email: " . $usuario['email'] . "<br>";
    echo "Senha hash: " . substr($usuario['password'], 0, 20) . "...<br><br>";
}

// Testa buscar o usuário específico
$username_teste = "Kaua Everton Camargo";
$user = \app\models\User::findByUsername($username_teste);

if ($user) {
    echo "<h3>✅ Usuário encontrado:</h3>";
    echo "Username: " . $user->username . "<br>";
    echo "ID: " . $user->id . "<br>";
    
    // Testa algumas senhas comuns
    $senhas_teste = ["123456", "123", "password", "admin"];
    foreach ($senhas_teste as $senha) {
        if ($user->validatePassword($senha)) {
            echo "✅ Senha válida: <strong>$senha</strong><br>";
            break;
        }
    }
} else {
    echo "<h3>❌ Usuário não encontrado: $username_teste</h3>";
}

echo "<br><a href='http://localhost:8080/index.php?r=site/login-aluno'>Ir para Login</a>";
?> 