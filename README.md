# 🚀 Atividades – Disciplina Web 2 (Laravel)

Bem-vindo ao repositório das minhas atividades da disciplina **Web 2**, onde estudamos o framework Laravel e suas principais funcionalidades.  
Aqui você encontrará implementações práticas de conceitos como *migrations*, *rotas*, *controllers*, **Eloquent ORM**, relacionamentos e muito mais.

---

## 📂 Estrutura do Repositório

### 📘 Atividade 01 – Sistema de Biblioteca

Implementação de um sistema completo de gerenciamento de biblioteca.

#### 🎯 Funcionalidades

- **Migrations:** Estrutura completa do banco de dados
- **Models:** Entidades do sistema (`Book`, `Author`, `Category`, `Publisher`, `User`)
- **Seeders e Factories:** Dados de teste e população do banco
- **CRUD Completo:** Operações para todas as entidades
- **Relacionamentos Avançados:** Sistema de empréstimos N para N
- **Eloquent ORM:** Consultas complexas e operações avançadas
- **Views Blade:** Interface completa com layout unificado

#### 🗂️ Estrutura de Pastas

```
atividade01/
├── app/
│   ├── Models/
│   │   ├── Author.php
│   │   ├── Book.php
│   │   ├── Category.php
│   │   ├── Publisher.php
│   │   └── User.php
│   ├── Http/
│   │   └── Controllers/
│   │       ├── AuthorController.php
│   │       ├── BookController.php
│   │       ├── CategoryController.php
│   │       ├── PublisherController.php
│   │       └── UserController.php
│   └── Providers/
├── database/
│   ├── migrations/
│   ├── seeders/
│   └── factories/
├── resources/
│   └── views/
│       ├── authors/
│       ├── books/
│       ├── categories/
│       ├── publishers/
│       └── users/
├── routes/
│   └── web.php
```

---

### 🚗 CRUD_CARROS – Sistema de Gerenciamento de Veículos

Sistema completo para cadastro e gestão de automóveis.

#### 🎯 Funcionalidades

- **CRUD Completo:** Create, Read, Update e Delete de carros
- **Migrations:** Estrutura otimizada para dados veiculares
- **Model Car:** Entidade principal com atributos específicos
- **Controllers:** Operações dedicadas para gestão de veículos
- **Views Especializadas:** Interfaces para cadastro e listagem
- **Validações:** Regras de negócio para os dados dos carros

#### 🗂️ Estrutura de Pastas

```
CRUD_CARROS/
├── app/
│   ├── Models/
│   │   └── Car.php
│   ├── Http/
│   │   └── Controllers/
│   │       └── CarController.php
├── database/
│   └── migrations/
├── resources/
│   └── views/
│       └── cars/
├── routes/
│   └── web.php
```

---

## 🛠️ Tecnologias Utilizadas

- **Laravel 10+**
- **PHP 8.3.6**
- **MySQL**
- **Eloquent ORM**
- **Blade Templates**
- **Bootstrap**
- **Composer**
- **Artisan CLI**

---

## 🎯 Objetivo do Repositório

Este repositório tem como principais finalidades:

- 📘 Servir como material de estudo e portfólio
- 💡 Consolidar os conhecimentos adquiridos em Laravel
- 🧩 Demonstrar boas práticas de desenvolvimento web
- ⚙️ Apresentar implementações completas de sistemas reais
- 🚀 Mostrar versatilidade em diferentes domínios (biblioteca e veículos)

---

## 👨‍💻 Autor

**Jean Lucas de Lima Cruz**  
[![Email](https://img.shields.io/badge/Email-jeanlucas091410%40gmail.com-red?logo=gmail&logoColor=white)](mailto:jeanlucas091410@gmail.com)  
[![LinkedIn](https://img.shields.io/badge/LinkedIn-Jean%20Lucas-blue?logo=linkedin&logoColor=white)](https://www.linkedin.com/in/jeanlucasdelimacruz/)

⭐ **Se este repositório foi útil para você, não esqueça de deixar uma star!**
