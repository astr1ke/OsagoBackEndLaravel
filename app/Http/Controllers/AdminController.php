<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index() {
        $countNews = count(News::all());
        $gallery = Storage::disk('public')->allFiles('inputScans');
        return view('admin.index')->with(['countNews' => $countNews, 'gallery' => $gallery]);
    }

    public function newsCatalog() {
        $articles = News::all();
        $countNews = count(News::all());
        return view ('admin.newsTable')->with(['articles' => $articles, 'countNews' => $countNews]);
    }

    public function addNews() {
        $countNews = count(News::all());
        return view ('admin.editor')->with(['countNews' => $countNews]);
    }

    public function editNews($id) {
        $articles = News::find($id);
        $countNews = count(News::all());
        return view ('admin.editor')->with(['articles' => $articles, 'countNews' => $countNews]);
    }

    public function viewNews($id) {
        $countNews = count(News::all());
        $article = News::find($id);
        return view('admin.viewNews')->with(['article' => $article, 'countNews' => $countNews]);
    }
}
