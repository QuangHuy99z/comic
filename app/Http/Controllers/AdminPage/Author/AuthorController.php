<?php

namespace App\Http\Controllers\AdminPage\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Author;

class AuthorController extends Controller
{
    public function get_list_authors()
    {
        $authors = Author::latest()->paginate(10);
  
        return view('admin.authors.index',compact('authors'));
    }

    public function create(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            return view('admin.authors.create'); 
        }
        Author::create([
            'name' => $request->name,
            'slug' => $this->uniqueSlug($request->name),
        ]);
        return redirect()->route('admin.authors.index')->with('message', 'Add author successfully');
    }

    public function edit(Request $request, $id)
    {
        if ($request->isMethod('get')){
            $author = Author::findOrFail($id);
            return view('admin.authors.detail', compact('author'));
        }
        $author = Author::findOrFail($id);
        $author->name = $request->name;
        $author->description = $request->description;
        $author->slug = $this->uniqueSlug($request->name);
        $author->save();
        return redirect()->route('admin.authors.edit', $id)->with('message', 'Update author successfully');
    }

    public function destroy($id)
    {
        $genre  = Author::findOrFail($id);
        $genre->delete();
        return redirect()->route('admin.genres.index')->with('message', 'Delete genre successfully');
    }
    
    public function uniqueSlug($title)
    {
        $slug = Str::slug($title, '-');
        $count = Author::where('slug', 'LIKE', "{$slug}%")->count();
        $newCount = $count > 0 ? ++$count : '';
        return $newCount > 0 ? "$slug-$newCount" : $slug;
    }
}

