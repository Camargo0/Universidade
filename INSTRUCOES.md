# Instruções para Executar o Sistema

## ✅ Ajustes Realizados

1. **Removida dependência de banco de dados** - O sistema agora funciona apenas com arquivos JSON
2. **Configuração simplificada** - Removidas configurações desnecessárias
3. **Modelos ajustados** - User e CadastroForm funcionam com JSON
4. **Views simplificadas** - Removidas dependências de banco de dados
5. **Logo substituído** - Agora usa texto em vez de imagem

## 🚀 Como Executar

### 1. Certifique-se de que o XAMPP está rodando
- Apache deve estar ativo
- PHP deve estar funcionando

### 2. Acesse o sistema
Abra seu navegador e acesse:
```
http://localhost/yii2-academico/web/
```

### 3. Funcionalidades disponíveis

#### Para Visitantes:
- **Página inicial**: `http://localhost/yii2-academico/web/`
- **Sobre a instituição**: `http://localhost/yii2-academico/web/site/sobre`
- **Lista de cursos**: `http://localhost/yii2-academico/web/curso/index`

#### Para Alunos:
- **Login**: `http://localhost/yii2-academico/web/site/login-aluno`
- **Cadastro**: `http://localhost/yii2-academico/web/site/registrar`
- **Dashboard**: `http://localhost/yii2-academico/web/site/dashboard-aluno` (após login)

## 🔑 Dados de Teste

**Usuário existente:**
- Usuário: `kaua`
- Email: `camargokaua10@gmail.com`
- Senha: (está no arquivo `data/usuario.json`)

## 📁 Estrutura dos Dados

### Arquivo de Usuários: `data/usuario.json`
```json
[
    {
        "username": "kaua",
        "email": "camargokaua10@gmail.com",
        "password": "$2y$10$TKlb7/MApuupT4uL0KT6OOwj6.4OAtpnuEZE/TdyWf4hPsTzuSp0a"
    }
]
```

### Cursos: `controllers/CursoController.php`
Os cursos estão definidos diretamente no controlador.

## 🔧 Possíveis Problemas e Soluções

### 1. Erro 404 - Página não encontrada
- Verifique se o mod_rewrite está habilitado no Apache
- Certifique-se de que o arquivo `.htaccess` está na pasta `web/`

### 2. Erro de permissão
- Certifique-se de que a pasta `runtime/` tem permissão de escrita
- Certifique-se de que a pasta `web/assets/` tem permissão de escrita

### 3. Erro de autoload
- Execute: `composer dump-autoload`

### 4. Página em branco
- Verifique os logs de erro do PHP
- Certifique-se de que todas as extensões PHP necessárias estão habilitadas

## 📝 Extensões PHP Necessárias

Certifique-se de que estas extensões estão habilitadas no php.ini:
- intl
- mbstring
- openssl
- pdo
- json

## 🎯 Funcionalidades Implementadas

✅ **Sistema de Login/Cadastro**
- Login de alunos
- Cadastro de novos usuários
- Autenticação com JSON

✅ **Páginas Institucionais**
- Página inicial
- Sobre a instituição
- Lista de cursos

✅ **Portal do Aluno**
- Dashboard do aluno
- Visualização de matérias (simulado)
- Sistema de notas (simulado)

✅ **Interface Moderna**
- Design responsivo
- Tema escuro moderno
- Animações CSS

## 🔄 Próximos Passos

Se quiser expandir o sistema:
1. Adicione mais cursos no `CursoController.php`
2. Implemente sistema de notas real
3. Adicione funcionalidades para professores
4. Implemente sistema de matrículas

## 📞 Suporte

Se ainda houver problemas, verifique:
1. Logs do Apache em `xampp/apache/logs/error.log`
2. Logs do PHP
3. Console do navegador para erros JavaScript 