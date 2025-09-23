# 📚 Atividade 01 – Migrations no Laravel

Este projeto faz parte da disciplina **Web 2** e tem como objetivo **familiarizar-se com o uso das migrations no Laravel** para criar, modificar e gerenciar a estrutura de tabelas no banco de dados.

---

## 🎯 Objetivo
- Aprender a utilizar migrations no Laravel.
- Criar e modificar tabelas no banco de dados.
- Aplicar **constraints** e definir **relacionamentos**.
- Utilizar comandos do Artisan para **migrar, reverter e refazer** migrations.

---

## 📖 Contexto
O desafio consiste na implementação de um **Sistema de Gerenciamento de Biblioteca**, com as seguintes entidades:
- **Authors** (autores)  
- **Categories** (categorias)  
- **Publishers** (editoras)  
- **Books** (livros)  

Cada tabela foi criada com suas respectivas colunas, constraints e relacionamentos.

---

## 🛠️ Tecnologias Utilizadas
- [Laravel 12.30.1](https://laravel.com/)
- PHP 8.3.6
- MySQL
- Composer
- Artisan CLI

---

## 📂 Estrutura da Atividade
### 🔹 Passo 1 – Configuração Inicial
- Criar projeto Laravel com `laravel new atividade_01` ou `composer create-project`.
- Configurar credenciais do banco no arquivo `.env`.

### 🔹 Passo 2 – Tabela **Authors**
- Campos: `id`, `name`, `email (unique)`, `birth_date (nullable)`, `timestamps`.

### 🔹 Passo 3 – Tabela **Categories**
- Campos: `id`, `name (unique)`, `timestamps`.

### 🔹 Passo 4 – Tabela **Publishers**
- Campos: `id`, `name (unique)`, `address (nullable)`, `timestamps`.

### 🔹 Passo 5 – Tabela **Books**
- Campos: `id`, `title`, `pages`, `timestamps`.
- Relacionamentos:
  - `author_id` → FK para `authors` (delete cascade).
  - `category_id` → FK para `categories` (delete cascade).
  - `publisher_id` → FK para `publishers` (delete cascade).

### 🔹 Passo 6 – Testando Rollbacks
- `php artisan migrate:rollback --step=1` → desfaz última migration.
- `php artisan migrate:refresh` → refaz todas migrations.

### 🔹 Passo 7 – Nova Coluna
- Migration `add_published_year_to_books_table` para adicionar coluna:
```php
Schema::table('books', function (Blueprint $table) {
    $table->integer('published_year')->nullable();
});
