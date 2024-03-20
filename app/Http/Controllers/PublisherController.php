<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session ;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publisher = Publisher::all();

        return view('publisher', ['publisher'=>Publisher::get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publisher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_publisher' => 'required',
            'address' => 'required',
        ]);

        Publisher::create($validatedData);

        Session::flash('success', 'created successfully');

        return redirect()->route('publisher');
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
    public function edit(Publisher $publisher)
    {
        return view('publisher.edit', compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publisher $publisher)
    {
        $validatedData = $request->validate([
            'name_publisher' => 'required',
            'address' => 'required',
        ]);

        $publisher->update($validatedData);

        Session::flash('update', 'update successfully');

        return redirect()->route('publisher');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();

        Session::flash('remove', 'Remove successfully');

        return redirect()->route('publisher');
    }
}
