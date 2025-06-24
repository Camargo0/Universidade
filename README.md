# 🎓 Universidade - Sistema Acadêmico

Este projeto é um sistema acadêmico desenvolvido em PHP utilizando o framework Yii2. O objetivo é simular um ambiente de gestão universitária, permitindo cadastro de usuários, login, painel do aluno e funcionalidades básicas de uma instituição de ensino.

O sistema não utiliza banco de dados tradicional. Todos os dados são armazenados em arquivos JSON simples, garantindo praticidade para testes locais e aprendizado.

## 🚀 Funcionalidades

- Cadastro de novos alunos
- Login e autenticação segura
- Logout de sessão
- Página inicial institucional
- Área restrita para alunos
- Armazenamento dos dados em arquivos JSON
- Estrutura preparada para expansão (cursos, professores, notas, etc.)

## 🛠️ Tecnologias utilizadas

- PHP 8+
- Yii2 Framework
- Armazenamento em JSON (sem banco de dados)
- HTML, CSS e Bootstrap para a interface
- Composer (gerenciador de dependências)

## ⚙️ Como rodar o projeto localmente

1. Clone este repositório:

```bash
git clone https://github.com/Camargo0/Universidade.git
```

2. Navegue até a pasta do projeto:

```bash
cd Universidade
```

3. Instale as dependências do Yii2:

```bash
composer install
```

4. Execute o servidor local do PHP ou utilize Laragon, XAMPP ou WAMP:

```bash
php yii serve
```

Ou acesse via navegador no ambiente local (ex.: http://localhost/universidade/web).

> ✅ Não é necessário configurar banco de dados, pois os dados são armazenados diretamente em arquivos JSON na pasta /data ou onde estiver configurado.

## 📁 Estrutura de diretórios

```
/controllers   -> Lógica dos controladores
/models        -> Modelos e regras de negócio
/views         -> Arquivos de visualização (frontend)
/data          -> Arquivos JSON com os dados do sistema
/config        -> Arquivos de configuração
/web           -> Pasta pública acessível (index.php)
```

## ✍️ Autores

- **Kauã Everton Camargo**  
- **Leonardo Zonta**  
- **Alexandre Ribeiro**  

[GitHub](https://github.com/Camargo0)
