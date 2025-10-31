<?php

namespace App\Http\Controllers;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();
        return view ('authors.index' , compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email|max:255',
            'birth_date' => 'required|date',
        ]);

        Author::create($validateData);

        return redirect()->route('authors.index')->with('success', 'Author criada com sucesso!');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return view('authors.show' , compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('authors.edit' , compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:authors,email,' . $author->id . '|max:255',
        'birth_date' => 'required|date',
    ]);

    $author->update($validatedData);

    return redirect()->route('authors.index')->with('success', 'Autor atualizado com sucesso.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('authors.index')->with('success', 'Author excluída com sucesso.');
    }
}
