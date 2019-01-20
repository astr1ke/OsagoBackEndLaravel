<?php

namespace App\Services;

use App\Services\SDK;
use Illuminate\Support\Facades\Storage;
use App\Mail\mailToAdmin;
use Illuminate\Support\Facades\Mail;

class ClientService
{
    private $_utils;

    private $_client;

    /**
     * ClientService constructor.
     * @param $request
     */
    public function __construct($request) {
        $this->_utils = new SDK\_utils();
        $this->_client = $this->_utils->getDataFromRequest($request);
    }

    /**
     * Saving Files to Server storage
     */
    public function saveFileToServer() {
        $files = $this->_client->getFiles();
        $dir = $this->_client->getPhoneNumber();
        $this->_utils->saveFileToDisk($files, $dir);
    }

    /**
     * Sending Mail with Data to Admin
     */
    public function sendMailToAdmin() {
        $filesDir = $this->_client->getPhoneNumber();
        $comment = $this->_client->getComment();
        $sendDir = Storage::disk('local')->files('ВходящиеСканы/'.$filesDir);

        $attach = new mailToAdmin();
        $attach->attach = $sendDir;
        $attach->number = $filesDir;
        $attach->comment = $comment;
        Mail::to('mail.usa.va@gmail.com')->send($attach);
    }

    /**
     * @return SDK\Client
     */
    public function getClientData() {
        return $this->_client;
    }
}
