<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;   

class BookController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Book::class);
        $books = Book::with('author')->paginate(20);
        return view('books.index', compact('books'));
    }

    public function createWithId()
    {
        $this->authorize('create', Book::class);
        return view('books.create-id');
    }

    public function storeWithId(Request $request)
    {
        $this->authorize('create', Book::class);
        $validateData = $request->validate([
            'title' => 'required|string|max:255',
            'publisher_id' => 'required|exists:publishers,id',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'published_year' => 'required|integer|min:1000|max:' . date('Y'),
            'cover' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        if ($request->hasFile('cover')) {
            $validateData['cover'] = $request->file('cover')->store('covers', 'public');
        }

        Book::create($validateData);

        return redirect()->route('books.index')->with('success', 'Livro criado com sucesso.');
    }

    public function createWithSelect()
    {
        $this->authorize('create', Book::class);
        $publishers = Publisher::all();
        $authors = Author::all();
        $categories = Category::all();
        return view('books.create-select', compact('publishers', 'authors', 'categories'));
    }

    public function storeWithSelect(Request $request)
    {
        $this->authorize('create', Book::class);
        $validateData = $request->validate([
            'title' => 'required|string|max:255',
            'publisher_id' => 'required|exists:publishers,id',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'published_year' => 'required|integer|min:1000|max:' . date('Y'),
            'cover' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        if ($request->hasFile('cover')) {
            $validateData['cover'] = $request->file('cover')->store('covers', 'public');
        }

        Book::create($validateData);

        return redirect()->route('books.index')->with('success', 'Livro criado com sucesso.');
    }

    public function show(Book $book)
    {
        $this->authorize('view', $book);
        $book->load(['author', 'publisher', 'category']);
        $users = User::all();

        return view('books.show', compact('book', 'users'));
    }

    public function edit(Book $book)
    {
        $this->authorize('update', $book);
        $publishers = Publisher::all();
        $authors = Author::all();
        $categories = Category::all();

        return view('books.edit', compact('book', 'publishers', 'authors', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $this->authorize('update', $book);
        $validateData = $request->validate([
            'title' => 'required|string|max:255',
            'publisher_id' => 'required|exists:publishers,id',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'published_year' => 'required|integer|min:1000|max:' . date('Y'),
            'cover' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        // Se tiver nova capa, remove a antiga
        if ($request->hasFile('cover')) {
            if ($book->cover && Storage::disk('public')->exists($book->cover)) {
                Storage::disk('public')->delete($book->cover);
            }

            $validateData['cover'] = $request->file('cover')->store('covers', 'public');
        }

        $book->update($validateData);

        return redirect()->route('books.index')->with('success', 'Livro atualizado com sucesso.');
    }

    public function destroy(Book $book)
    {
        $this->authorize('delete', $book);
    
        if ($book->cover && Storage::disk('public')->exists($book->cover)) {
            Storage::disk('public')->delete($book->cover);
        }

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Livro deletado com sucesso.');
    }
}
