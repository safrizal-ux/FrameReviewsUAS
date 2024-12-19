<?php

namespace App\Http\Controllers;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AccountController extends Controller
{
    /**
     * Display the account page for the authenticated user.
     */
    public function index()
{
    $user = Auth::user();

    if (!$user) {
        abort(404, 'User not found.');
    }

    return view('article.account', [
        'name' => $user->name,
        'bio' => $user->bio,
    ]);
}

}
