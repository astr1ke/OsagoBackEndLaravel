<?php

namespace App\Http\Controllers;

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
        $clientsService->sendMailToAdmin();

        return json_encode(['done' => 'true']);
    }
}
