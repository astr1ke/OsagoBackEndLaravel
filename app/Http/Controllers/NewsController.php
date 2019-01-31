<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function saveNews(Request $request) {
        if (!$request->id) {
            $file = $this->saveToStorage($request->file);
            News::create([
                'title' => $request->title,
                'text' => $request->text,
                'file' => $file,
                'isActive' => true,
            ]);
        } else {
            if ($request->file) {
                $file = $this->saveToStorage($request->file);
                News::where('id', $request->id)->update([
                    'title' => $request->title,
                    'text' => $request->text,
                    'file' => $file,
                    'isActive' => true,
                ]);
            } else {
                News::where('id', $request->id)->update([
                    'title' => $request->title,
                    'text' => $request->text,
                    'isActive' => true,
                ]);
            }
        }
        return redirect('/admin/news');
    }

    public function deleteNews($id) {
        News::destroy($id);
        return redirect('/admin/news');
    }

    public function activateNews($id) {
        News::where('id', $id)->update([
           'isActive' => true,
        ]);
        return redirect('admin/news');
    }

    public function deactivateNews($id) {
        News::where('id', $id)->update([
            'isActive' => false,
        ]);
        return redirect('admin/news');
    }

    private function saveToStorage ($file) {
        $file = Storage::disk('public')->put('newsImages', $file);
        return $file;
    }
}
