<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import query builder facade

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with('category')->get();  // Mengambil semua artikel beserta kategori terkait
        return view('article.index', compact('articles'));  // Mengirim data ke view
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(); // Ambil semua kategori dari database
        return view('article.create', compact('categories')); // Ganti 'your-view-name' dengan nama view Anda
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category,
            'published_at' => now()
        ];
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension(); // Create a unique image file name
            // Store the image in the 'public/images' folder on the public disk
            $request->image->storeAs('images', $imageName, 'public');
            $data['post_image'] = $imageName; // Store image name in the array to save in the database or use later
        }

        DB::table('articles')->insert($data);

        return redirect()->route('article.index')->with('success', 'Article created successfully.');
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
