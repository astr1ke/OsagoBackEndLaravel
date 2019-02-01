<?php

namespace App\Http\Controllers;

use App\News;
use App\Zayavka;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index() {
        $articles = News::all()->reverse();
        $countNews = count($articles);
        $gallery = Storage::disk('public')->allFiles('inputScans');
        $countFiles = count($gallery);
        $zayavki = Zayavka::all()->reverse();
        $countZayavki = count($zayavki);
        $countZayavkiToday = count(Zayavka::whereDate('created_at', Carbon::today())->get());

        return view('admin.index')->with([
            'countNews' => $countNews,
            'gallery' => $gallery,
            'articles' => $articles,
            'countFiles' => $countFiles,
            'zayavki' => $zayavki,
            'countZayavki' => $countZayavki,
            'countZayavkiToday' => $countZayavkiToday,
        ]);
    }

    public function newsCatalog() {
        $articles = News::all();
        $countNews = count(News::all());
        $zayavki = Zayavka::all()->reverse();
        $countZayavki = count($zayavki);

        return view ('admin.newsTable')->with([
            'articles' => $articles,
            'countNews' => $countNews,
            'countZayavki' => $countZayavki,
        ]);
    }

    public function addNews() {
        $countNews = count(News::all());
        $zayavki = Zayavka::all()->reverse();
        $countZayavki = count($zayavki);

        return view ('admin.editor')->with([
            'countNews' => $countNews,
            'countZayavki' => $countZayavki,
            ]);
    }

    public function editNews($id) {
        $articles = News::find($id);
        $countNews = count(News::all());
        $zayavki = Zayavka::all()->reverse();
        $countZayavki = count($zayavki);

        return view ('admin.editor')->with([
            'articles' => $articles,
            'countNews' => $countNews,
            'countZayavki' => $countZayavki,
        ]);
    }

    public function viewNews($id) {
        $countNews = count(News::all());
        $zayavki = Zayavka::all()->reverse();
        $countZayavki = count($zayavki);
        $article = News::find($id);

        return view('admin.viewNews')->with([
            'article' => $article,
            'countNews' => $countNews,
            'countZayavki' => $countZayavki,
        ]);
    }

    public function viewZayavka($id) {
        $countNews = count(News::all());
        $zayavki = Zayavka::all()->reverse();
        $countZayavki = count($zayavki);
        $zayavka = Zayavka::find($id);
        $images = Storage::disk('public')->files('inputScans/' . preg_replace("/[^0-9]/", '', $zayavka->number));

        return view('admin.viewZayavka')->with([
            'countNews' => $countNews,
            'countZayavki' => $countZayavki,
            'zayavka' => $zayavka,
            'images' => $images,
        ]);
    }

    public function zayavkiCatalog() {
        $countNews = count(News::all());
        $zayavki = Zayavka::all()->reverse();
        $countZayavki = count($zayavki);
        $zayavki = Zayavka::all()->reverse();

        return view ('admin.zayavkiTable')->with([
            'countNews' => $countNews,
            'countZayavki' => $countZayavki,
            'zayavki' => $zayavki,
        ]);
    }
}
