<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\Books;
use App\Models\Publisher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Authors::all();
        $publisher = Publisher::all();
        $books = Books::all();

        

        return view('dashboard', compact('authors', 'publisher'), ['books'=>Books::get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Authors::all();
        $publisher = Publisher::all();

        return view('books.create', compact('authors', 'publisher'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'publisher_id' => 'required',
            'authors_id' => 'required',
            'title' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'year' => 'required',
        ]);
    
        $coverPath = $request->file('cover')->store('covers', 'public');
    
        Books::create([
            'publisher_id' => $validatedData['publisher_id'],
            'authors_id' => $validatedData['authors_id'],
            'title' => $validatedData['title'],
            'cover' => $coverPath, 
            'year' => $validatedData['year'],
        ]);
    
        return redirect()->route('dashboard')->with('success', 'Add successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Books::findOrFail($id);

        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $authors = Authors::all();
        $publisher = Publisher::all();

        $books = Books::findOrFail($id);
        return view('books.edit', compact('authors', 'publisher', 'books'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id, Books $books)
{
    $validatedData = $request->validate([
        'publisher_id' => 'required',
        'authors_id' => 'required',
        'title' => 'required',
        'cover' => 'image|mimes:jpeg,png,jpg,gif,svg', // Validation for image upload (optional)
        'year' => 'required',
    ]);

    $books = Books::find($id);

    if ($request->hasFile('cover')) {
        Storage::disk('public')->delete($books->cover);

        $coverPath = $request->file('cover')->store('covers', 'public');
        
        $validatedData['cover'] = $coverPath;
    }

    $books->update($validatedData);

    return redirect()->route('dashboard')->with('update', 'Update successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Books $books)
    {
        $book = Books::findOrFail($id);

        $book->delete();

        return redirect(route('dashboard'))->with('remove', 'Remove successfully');
        
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $books = Books::where('title', 'like', "%" . $keyword . "%")->paginate(5);
        return view('dashboard', compact('books'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
