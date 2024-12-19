<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function toggleBookmark($articleId, Request $request)
{
    $user = Auth::user();
    $bookmark = Bookmark::where('user_id', $user->id)->where('article_id', $articleId)->first();

    if ($request->isMethod('post')) {
        if (!$bookmark) {
            Bookmark::create([
                'user_id' => $user->id,
                'article_id' => $articleId,
            ]);
            return response()->json(['success' => true, 'bookmarked' => true]);
        }
    } elseif ($request->isMethod('delete') && $bookmark) {
        $bookmark->delete();
        return response()->json(['success' => true, 'bookmarked' => false]);
    }

    return response()->json(['success' => false]);
}




    public function index()
{
    $user = Auth::user();

    // Ambil bookmarks beserta artikel dan kategori terkait
    $bookmarks = $user->bookmarks()->with('article.category')->get();
    // dd($bookmarks);  // Debug data yang didapatkan   

    return view('article.bookmark', compact('bookmarks'));
}


}

