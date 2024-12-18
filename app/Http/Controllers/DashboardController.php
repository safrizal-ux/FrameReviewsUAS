<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Article;


class DashboardController extends Controller
{
    /**
     * Dashboard untuk Admin.
     */
    // public function adminDashboard()
    // {
    //     return view('dashboard.admin', [
    //         'userName' => Auth::user()->name, // Nama Admin
    //         'role' => 'Admin', // Role untuk ditampilkan
    //     ]);
    // }

    // /**
    //  * Dashboard untuk User.
    //  */
    // public function userDashboard()
    // {
    //     $articles = Article::latest()->get(); // Mengambil artikel terbaru

    //     return view('dashboard.user', [
    //         'userName' => Auth::user()->name,
    //         'articles' => $articles, // Kirim artikel ke view
    //         'role' => 'User', // Role untuk ditampilkan
    //     ]); 
    // }
    
}

