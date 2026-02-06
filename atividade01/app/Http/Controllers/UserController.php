<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $this->authorize('viewAny', User::class);

        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // Admin pode ver qualquer usuário
        // Bibliotecário pode ver apenas se quiser permitir
        $this->authorize('view', $user);

        return view('users.show' , compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // Apenas ADMIN pode alterar papel dos usuários
        $this->authorize('update', $user);

        return view('users.edit' , compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $user->update($request->only('name', 'email', 'role'));

        return redirect()
            ->route('users.index')
            ->with('success', 'Usuário atualizado com sucesso.');
    }

    public function debts(Request $request , User $user)
{
    $this->authorize('viewDebts' , $user);
    $users = User::where('debit', '>', 0)->get();

    return view('users.debts', compact('users'));
}
    public function clearDebt(User $user)
{
    //$this->authorize('clearDebt', $user);
    $user->update([
        'debit' => 0
    ]);

    return redirect()
        ->route('users.index')
        ->with('success', 'Débito zerado com sucesso.');
}


}
