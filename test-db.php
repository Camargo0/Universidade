<?php
// Teste de conexão com banco de dados
$passwords = ['', 'root', 'xampp', 'admin'];

foreach ($passwords as $password) {
    try {
        echo "Tentando conectar com senha: " . ($password ? $password : '(vazia)') . "\n";
        $pdo = new PDO('mysql:host=localhost;dbname=yii2basic', 'root', $password);
        echo "Conexão com banco de dados OK!\n";
        
        // Criar tabela de teste se não existir
        $pdo->exec("CREATE TABLE IF NOT EXISTS test_table (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");
        echo "Tabela de teste criada/verificada com sucesso!\n";
        
        // Salvar a senha que funcionou
        file_put_contents('db-password.txt', $password);
        echo "Senha salva em db-password.txt\n";
        break;
        
    } catch (PDOException $e) {
        echo "Erro na conexão: " . $e->getMessage() . "\n";
        
        // Tentar criar o banco de dados
        try {
            $pdo = new PDO('mysql:host=localhost', 'root', $password);
            $pdo->exec("CREATE DATABASE IF NOT EXISTS yii2basic");
            echo "Banco de dados yii2basic criado com sucesso!\n";
            file_put_contents('db-password.txt', $password);
            echo "Senha salva em db-password.txt\n";
            break;
        } catch (PDOException $e2) {
            echo "Erro ao criar banco: " . $e2->getMessage() . "\n";
        }
    }
    echo "---\n";
}
?> 