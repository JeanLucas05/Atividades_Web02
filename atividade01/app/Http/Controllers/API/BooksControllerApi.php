<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookApi;

class BooksControllerApi extends Controller
{
    // LISTAR TODOS
    public function index()
    {
        return response()->json(BookApi::all(), 200);
    }

    // CRIAR
    public function create(Request $request)
    {
        $book = BookApi::create($request->all());
        return response()->json($book, 201);
    }

    // MOSTRAR UM
    public function show(string $id)
    {
        $book = BookApi::find($id);

        if (!$book) {
            return response()->json(['message' => 'Livro não encontrado'], 404);
        }

        return response()->json($book, 200);
    }

    // ATUALIZAR
    public function update(Request $request, string $id)
    {
        $book = BookApi::find($id);

        if (!$book) {
            return response()->json(['message' => 'Livro não encontrado'], 404);
        }

        $book->update($request->all());

        return response()->json($book, 200);
    }

    // DELETAR
    public function destroy(string $id)
    {
        $book = BookApi::find($id);

        if (!$book) {
            return response()->json(['message' => 'Livro não encontrado'], 404);
        }

        $book->delete();

        return response()->json(['message' => 'Livro removido'], 200);
    }
}
