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
        // Só ADMIN pode ver a lista de usuários
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
}
