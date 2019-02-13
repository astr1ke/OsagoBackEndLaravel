<?php

namespace App\Http\Controllers;

use App\News;
use App\Services\ClientService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    /**
     * @param Request $request
     * @return string
     */
    public function addClient(Request $request) {
        $clientsService = new ClientService($request);
        $clientsService->saveFileToServer();
        $clientsService->saveRequestToBase($request);
        $clientsService->sendMailToAdmin();

        return json_encode(['done' => 'true']);
    }

    public function articlesGetAll($index) {
        $articles = News::all()->reverse();
        $i = 0;
        foreach ($articles as $article) {
            if ($article->isActive) {   //проверка на активность статьи
                if ( $i >= (($index-1)*6) && $i < ($index*6) ) {  // пагинация по 6 записей на страницу
                    $result[$i]['file'] = 'http://localhost:8000/storage/' . $article->file;
                    $result[$i]['title'] = $article->title;
                    $result[$i]['text'] = $article->text;
                }
                $i++;
            }
        }
        return json_encode($result);
    }
}
