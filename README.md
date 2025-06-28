# 🎓 Frai do Vale - Sistema Acadêmico Universitário

Este projeto é um sistema acadêmico desenvolvido em PHP com o framework Yii2, simulando um ambiente completo de gestão universitária. O sistema permite cadastro, login, painel do aluno, visualização de notas, presença, extensão, serviços de apoio e muito mais, com interface moderna e responsiva.

Todos os dados são armazenados em arquivos JSON, sem necessidade de banco de dados.

---

## 🚀 Funcionalidades

- Cadastro de novos alunos (Matricular-se)
- Login seguro para alunos e professores
- Logout de sessão
- Dashboard do aluno com:
  - Notas, matérias, presença (por curso)
  - Visualização de dados pessoais e acadêmicos
- Portal do Aluno com abas dinâmicas
- Página de Extensão Universitária (cursos, projetos, eventos, serviços)
- Central de Apoio ao Estudante (procedimentos, bolsas, suporte, administrativo)
- Página institucional, cursos, serviços e pesquisa
- Interface moderna, responsiva e com temas claro/escuro
- Armazenamento dos dados em arquivos JSON

---

## 🛠️ Tecnologias utilizadas

- PHP 8+
- Yii2 Framework
- HTML, CSS e Bootstrap
- Composer (gerenciador de dependências)
- Armazenamento em JSON (sem banco de dados)

---

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

4. Execute o servidor local do PHP ou utilize XAMPP, Laragon, WAMP, etc:

   ```bash
   php yii serve
   ```

   Ou acesse via navegador:  
   `http://localhost/yii2-academico/web`

> ✅ Não é necessário configurar banco de dados. Os dados ficam em `/data/usuarios.json`.

---

## 📁 Estrutura de diretórios

```
/controllers   -> Controladores (lógica das páginas)
/models        -> Modelos e regras de negócio
/views         -> Arquivos de visualização (frontend)
/data          -> Arquivos JSON com os dados do sistema
/config        -> Arquivos de configuração do Yii2
/web           -> Pasta pública (index.php, uploads, css, favicon, etc)
```

---

## ✨ Principais Páginas

- **Página Inicial:** Apresentação institucional
- **Matricular-se:** Cadastro de novos alunos
- **Login:** Acesso de alunos e professores
- **Dashboard do Aluno:** Notas, matérias, presença, dados pessoais
- **Extensão:** Cursos, projetos, eventos e serviços de extensão universitária
- **Central de Apoio:** Procedimentos, bolsas, suporte e serviços administrativos

---

## 👨‍💻 Autores

- **Kauã Everton Camargo**
- **Leonardo Zonta**
- **Alexandre Ribeiro**

[GitHub](https://github.com/Camargo0)
