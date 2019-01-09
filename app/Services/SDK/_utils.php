<?php

namespace App\Services\SDK;

use App\Services\SDK;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class _utils
{
    /**
     * @param $request
     * @return Client
     */
    public function getDataFromRequest($request) {
        $clientId = rand(100,999);
        $clientNumber = $request->number;
        $comment = $request->comment;
        $files = $request->file('uploadFiles');
        $client = new SDK\Client($clientId, $clientNumber, $comment, $files);
        return $client;
    }

    public function saveFileToDisk($files, $dir) {
        $dirPath = 'скрины/' . $dir;
        Storage::disk('local')->makeDirectory($dirPath);
        foreach ($files as $file) {
            Storage::disk('local')->putFile($dirPath, $file);
        }

        try{
            $this->_resizeFile($dirPath);
        }catch (Exception $e) {
            echo 'Ошибка со сменой размера файла: ',  $e->getMessage(), "\n";
        }


    }

    private function _resizeFile($dirPath) {
        $savedFiles = Storage::disk('local')->files($dirPath);
        foreach ($savedFiles as $file){
            $tempImage = Image::make('../storage/app/'.$file);
            $tempImage->resize(800, 800);
            $ext = substr(strrchr($file,'.'),1);
            $pathToFile = strrchr($file,'/');
            Storage::disk('local')->put($dirPath . $pathToFile, $tempImage->encode($ext, 80));
        }
    }
}