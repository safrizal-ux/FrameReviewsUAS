<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Article;
use Illuminate\Http\Request;

class AdminArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('admin.article.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all(); // Ambil semua kategori dari database
        return view('article.create', compact('categories')); // Ganti 'your-view-name' dengan nama view Anda
        // return view('admin.article.create');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'content' => 'required',
        // ]);

        // Article::create($request->all());
        // return redirect()->route('admin.article.index')->with('success', 'Article created successfully.');
        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category,
            'published_at' => now(),
            'user_id' => $request->user_id // Menggunakan ID pengguna yang sedang login
        ];
    
        // Jika ada file gambar yang diunggah
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension(); // Nama file unik
            $request->image->storeAs('images', $imageName, 'public'); // Simpan di folder public/images
            $data['post_image'] = $imageName; // Tambahkan ke array data
        }
    
        // Gunakan model untuk menyimpan data
        Article::create($data); // Menggunakan model untuk menyimpan agar lebih rapi
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.article.index')->with('success', 'Article created successfully.');
    }

    public function show(Article $article)
    {
        return view('admin.article.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('admin.article.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        $article->update($request->all());
        return redirect()->route('admin.article.index')->with('success', 'Article updated successfully.');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.article.index')->with('success', 'Article deleted successfully.');
    }
}
