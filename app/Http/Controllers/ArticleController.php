<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // Import query builder facade
use HTMLPurifier;
use HTMLPurifier_Config;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua artikel beserta kategori terkait, diurutkan berdasarkan published_at dari yang terbaru
        $articles = Article::with('category')->whereNotNull('published_at')->orderBy('published_at', 'desc')->get();
        // Mengirim data ke view
        return view('article.index', compact('articles'));
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
    // Validasi input
    // dd($request->all());
    $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'category' => 'required' // Pastikan category yang dipilih valid
    ]);

    // Data yang akan disimpan
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
    return redirect()->route('article.index')->with('success', 'Article created successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Using Query Builder to fetch article data along with the category
        $article = DB::table('articles')
            ->join('categories', 'articles.category_id', '=', 'categories.category_id')
            ->where('articles.article_id', $id)
            ->select(
                'articles.title',
                'articles.content',
                'articles.post_image',
                'categories.name as category_name'
            )
            ->first();

        // Check if the article exists
        if (!$article) {
            abort(404);
        }

        $config = HTMLPurifier_Config::createDefault();
        $config->set('HTML.Allowed', 'b,strong,i,em,u,a[href|title],ul,ol,li,p,br,img[alt|src]');
        $purifier = new HTMLPurifier($config);

        $clean_html = $purifier->purify($article->content);

        return view('article.show', compact('article', 'clean_html'));
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

    public function search(Request $request)
    {
        $query = $request->input('query');
    
        $articles = DB::table('articles')
            ->join('categories', 'articles.category_id', '=', 'categories.category_id') // Asumsikan kolom di categories adalah 'id'
            ->select('articles.article_id', 'articles.title', 'articles.content', 'articles.post_image', 'articles.published_at', 'categories.name as category_name') // Ganti 'category_id' dengan 'categories.name'
            ->where('articles.title', 'like', '%' . $query . '%')
            ->orWhere('articles.content', 'like', '%' . $query . '%')
            ->paginate(10);
    
        return view('article.searchresult', compact('articles'));
    }
    

}
