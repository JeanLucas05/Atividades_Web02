# 🚗 CRUD de Carros – Laravel

Este projeto implementa um CRUD completo para gerenciamento de carros utilizando o framework **Laravel**. O sistema permite cadastrar, visualizar, editar e excluir carros, cada um com diversos atributos.

---

## 🛠️ Funcionalidades

- **Listagem de Carros:** Exibe todos os carros cadastrados.
- **Cadastro de Carro:** Permite adicionar um novo carro com os campos:
  - Marca (string)
  - Modelo (string)
  - Ano (year)
  - Cor (string)
  - Preço (double)
  - Estoque (integer)
- **Visualização:** Mostra os detalhes de um carro específico.
- **Edição:** Permite alterar os dados de um carro.
- **Exclusão:** Remove um carro do sistema.

---

## 📂 Estrutura

- **Model:** [`App\Models\Carro`](app/Models/Carro.php)
- **Controller:** [`App\Http\Controllers\CarroController`](app/Http/Controllers/CarroController.php)
- **Views:** 
  - [`resources/views/carros/index.blade.php`](resources/views/carros/index.blade.php)
  - [`resources/views/carros/create.blade.php`](resources/views/carros/create.blade.php)
  - [`resources/views/carros/edit.blade.php`](resources/views/carros/edit.blade.php)
  - [`resources/views/carros/show.blade.php`](resources/views/carros/show.blade.php)
- **Migration:** [`database/migrations/2025_09_30_010044_create_carros_table.php`](database/migrations/2025_09_30_010044_create_carros_table.php)
- **Rotas:** Definidas em [`routes/web.php`](routes/web.php) com `Route::resource('carros', CarroController::class);`

---

## 💻 Como usar

1. **Instale as dependências:**  
   `composer install`
2. **Configure o banco de dados** no `.env`.
3. **Execute as migrations:**  
   `php artisan migrate`
4. **Inicie o servidor:**  
   `php artisan serve`
5. Acesse `http://localhost:8000/carros` para utilizar o CRUD.

---

## 👨‍💻 Autor

**Jean Lucas**  
[Seu Email](mailto:jeanlucas091410@gmail.com)

---

⭐ Se este projeto te ajudou, deixe uma estrela!
