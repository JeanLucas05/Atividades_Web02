<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Book;
use App\Models\Borrowing;

use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , Book $book)
    {
        $request->validate([
        'user_id' => 'required|exists:users,id',
    ]);
    $hasponed = Borrowing::where('book_id',$book->id)
    -> whereNull('Returned_at')
    -> exists();

    if($hasponed){
       return redirect()->route('books.show', $book)->with('Error', 'Este livro já está emprestado e ainda não foi devolvido.');
    }


    Borrowing::create([
        'user_id' => $request->user_id,
        'book_id' => $book->id,
        'borrowed_at' => now(),
    ]);

    return redirect()->route('books.show', $book)->with('success', 'Empréstimo registrado com sucesso.');
    }

    /*Alterar a funcionalidade de empréstimo para que não seja realizado o empréstimo de um livro que tem um empréstimo em aberto.
    Dica: verifique se existe um empréstimo com a data de retorno nula.*/

    public function returnBook(Borrowing $borrowing)
{
    $borrowing->update([
        'returned_at' => now(),
    ]);

    return redirect()->route('books.show', $borrowing->book_id)->with('success', 'Devolução registrada com sucesso.');
}

    public function userBorrowings(User $user)
{
    $borrowings = $user->books()->withPivot('borrowed_at', 'returned_at')->get();

    return view('users.borrowings', compact('user', 'borrowings'));
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
