<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Authors;
use Illuminate\Support\Facades\Storage;

class AuthorsController extends Controller
{
    public function index()
    {
        $authors = Authors::all();

        return view('authors', ['authors'=>Authors::get()]);
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_authors' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
    
        $photoPath = $request->file('photo')->store('public/authors');
    
        Authors::create([
            'name_authors' => $request->input('name_authors'),
            'photo' => $photoPath,
        ]);
    
        return redirect()->route('authors')->with('success', 'Add successfully');
    }
    

    public function edit(Authors $authors, $id)
    {
        $authors = Authors::findOrFail($id);

        return view('authors.edit', compact('authors'));
    }

    
    public function update(Request $request, Authors $authors, $id)
    {
        
        $this->validate($request, [
            'name_authors' => ['required'],
            'photo' => ['image', 'mimes:jpeg,png,jpg,gif,svg'],
        ]);
    
        $author = Authors::find($id);
    
        if (!$author) {
            return redirect()->route('author')->with('error', 'Author not found');
        }
    
        // If a new photo is uploaded, delete the old one
        if ($request->hasFile('photo')) {
            if (Storage::exists($author->photo)) {
                Storage::delete($author->photo);
            }
            $photoPath = $request->file('photo')->store('public/authors');
            $author->photo = str_replace('public/', '', $photoPath);
        }
    
        $author->name_authors = $request->name_authors;
        $author->save();
    
        session()->flash('update', 'Updated Successfully');
    
        return redirect()->route('authors');
    }        
        
        public function destroy($id)
    {
        $author = Authors::findOrFail($id);
        $author->delete();

        return redirect(route('authors'))->with('remove', 'Remove successfully');
    }
}
