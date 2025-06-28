<?php
// Teste do sistema de login
require_once 'vendor/autoload.php';

// Configura o Yii2
$config = require 'config/web.php';
$app = new yii\web\Application($config);

// Testa buscar o usuário "Kaua Everton Camargo"
$user = \app\models\User::findByUsername('Kaua Everton Camargo');

if ($user) {
    echo "✅ Usuário encontrado: " . $user->username . "<br>";
    echo "ID: " . $user->id . "<br>";
    
    // Testa a senha (você precisa saber qual senha foi usada)
    $senha_teste = "123456"; // Substitua pela senha real
    if ($user->validatePassword($senha_teste)) {
        echo "✅ Senha válida!<br>";
    } else {
        echo "❌ Senha inválida<br>";
    }
} else {
    echo "❌ Usuário não encontrado<br>";
}

echo "<br><a href='http://localhost:8080/index.php?r=site/login-aluno'>Ir para Login</a>";
?> 