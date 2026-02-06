<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BorrowingController extends Controller
{
    /**
     * Lista de empréstimos
     */
    public function index()
    {
        $borrowings = Borrowing::with(['user', 'book'])
            ->latest()
            ->get();

        return view('borrowings.index', compact('borrowings'));
    }

    /**
     * Criar empréstimo
     */
    public function store(Request $request, Book $book)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $user = User::findOrFail($request->user_id);

        // Não permite empréstimo com débito
        if ($user->debit > 0) {
            return redirect()
                ->route('books.show', $book)
                ->with('error', 'Usuário possui débitos pendentes.');
        }

        // Verifica se o livro já está emprestado
        $hasOpened = Borrowing::where('book_id', $book->id)
            ->whereNull('returned_at')
            ->exists();

        if ($hasOpened) {
            return redirect()
                ->route('books.show', $book)
                ->with('error', 'Este livro já está emprestado.');
        }

        // Limite de 5 empréstimos ativos
        $activeBorrowings = Borrowing::where('user_id', $user->id)
            ->whereNull('returned_at')
            ->count();

        if ($activeBorrowings >= 5) {
            return redirect()
                ->route('books.show', $book)
                ->with('error', 'Usuário já possui 5 empréstimos ativos.');
        }

        // Criar empréstimo
        Borrowing::create([
            'user_id'     => $user->id,
            'book_id'     => $book->id,
            'borrowed_at' => now(),
        ]);

        return redirect()
            ->route('books.show', $book)
            ->with('success', 'Empréstimo registrado com sucesso.');
    }

    /**
     * Devolução do livro
     */
    public function returnBook(Borrowing $borrowing)
    {
        
        
        $borrowDate = Carbon::parse($borrowing->borrowed_at);

        
        //$dueDate = $borrowDate->copy()->addSeconds(5);

        // PRODUÇÃO (15 dias)
        $dueDate = $borrowDate->copy()->addDays(15);
        // // equivalente a 1.296.000 segundos

        
        if (now()->greaterThan($dueDate)) {

            $delayDays = $dueDate->diffInDays(now());
            $fine = $delayDays * 0.50; // R$ 0,50 por segundo (teste)


            $user = $borrowing->user;
            $user->debit += $fine;
            $user->save();

            $borrowing->update([
            'returned_at' => now(),
        ]);

            return redirect()
                ->route('books.show', $borrowing->book_id)
                ->with(
                    'success',
                    'Devolução registrada. Multa aplicada: R$ ' .
                    number_format($fine, 2, ',', '.')
                );
        }

        return redirect()
            ->route('books.show', $borrowing->book_id)
            ->with('success', 'Devolução registrada sem atraso.');
    }

    /**
     * Empréstimos de um usuário
     */
    public function userBorrowings(User $user)
    {
        $this->authorize('viewBorrowings', $user);

        $borrowings = Borrowing::where('user_id', $user->id)
            ->with('book')
            ->get();

        return view('users.borrowings', compact('user', 'borrowings'));
    }

    public function show(string $id) {}
    public function create() {}
    public function edit(string $id) {}
    public function update(Request $request, string $id) {}
    public function destroy(string $id) {}
}
