<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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
    // $request->validate([
    //     'title' => 'required|max:255',
    //     'content' => 'required',
    //     'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     'category' => 'required' // Pastikan category yang dipilih valid
    // ]);

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
         $article = DB::table('articles')
             ->join('categories', 'articles.category_id', '=', 'categories.category_id')
             ->join('users', 'articles.user_id', '=', 'users.id')
             ->where('articles.article_id', $id)
             ->select(
                 'articles.article_id',
                 'articles.title',
                 'articles.content',
                 'articles.post_image',
                 'articles.likes',
                 'categories.name as category_name',
                 'users.name as author_name'
             )
             ->first();
     
         $comments = Comment::where('article_id', $id)->with('user')->get();
     
         if (!$article) {
             abort(404);
         }
     
         // Konfigurasi HTMLPurifier
         $config = HTMLPurifier_Config::createDefault();
         $config->set('HTML.Allowed', 'b,i,strong,em,p,ul,li,ol,a[href],br,img[src|alt|width|height]');
         $config->set('URI.AllowedSchemes', ['http' => true, 'https' => true]); // Hanya izinkan HTTP/HTTPS
         $purifier = new HTMLPurifier($config);
     
         // Membersihkan konten artikel
         $article->content = $purifier->purify($article->content);
     
         return view('article.show', compact('article', 'comments'));
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
    public function destroy(Article $article)
{
    if ($article->user_id !== Auth::id()) {
        abort(403, 'Unauthorized action.');
    }
    $article->delete();
    return redirect()->route('article.history')->with('success', 'Artikel berhasil dihapus.');
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
    
    public function history()
    {
        // Mengambil artikel berdasarkan user yang sedang login
        $articles = Article::where('user_id', Auth::id())->get();
        return view('article.history', compact('articles'));
    }

    public function like($id)
{
    // Fetch the article to increment likes
    $article = DB::table('articles')->where('article_id', $id)->first();
    
    if ($article) {
        // Increment likes
        DB::table('articles')->where('article_id', $id)->increment('likes');
        
        return response()->json([
            'success' => true,
            'likes' => $article->likes + 1, // Return updated like count
        ]);
    }
    
    return response()->json(['success' => false]);
}

}
