<?php

namespace App\Http\Controllers;
use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Publisher::class);
        $publishers = Publisher::all();
        return view('publishers.index' , compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Publisher::class);
        return view('publishers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->authorize('create', Publisher::class);
        $validateData = $request->validate([
            'name'=> 'required|string|max:255',
            'address' => 'required|string|max:255|min:5'
        ]);

        Publisher::create($validateData);

        return redirect()->route('publishers.index')->with('success', 'Editora criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        $this->authorize('view', $publisher);
        return view('publishers.show' , compact('publisher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publisher $publisher)
    {
        $this->authorize('update', $publisher);
        return view('publishers.edit' , compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publisher  $publisher)
    {
         $this->authorize('update', $publisher);
        $validateData = $request->validate([
            'name'=> 'required|string|max:255',
            'address' => 'required|string|max:255|min:5'
        ]);
        $publisher->update($validateData);

        return redirect()->route('publishers.index')->with('success', 'Editora atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
        $this->authorize('delete', $publisher);
        $publisher->delete();
        return redirect()->route('publishers.index')->with('success', 'Editora apagada com sucesso.');
    }
}
