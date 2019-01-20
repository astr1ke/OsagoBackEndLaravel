<?php

namespace App\Services\SDK;

use App\Services\SDK;
use Illuminate\Support\Facades\Storage;

class _utils
{
    /**
     * @param $request
     * @return Client
     */
    public function getDataFromRequest($request) {
        $clientNumber = $request->number;
        $comment = $request->comment;

        $allFile = array();
        $allFile['passport_1_'] = $request->hiddenField1;
        $allFile['passport_2_'] = $request->hiddenField2;
        $allFile['sts_1_']      = $request->hiddenField3;
        $allFile['sts_2_']      = $request->hiddenField4;
        $allFile['pts_1_']      = $request->hiddenField5;
        $allFile['pts_2_']      = $request->hiddenField6;
        $allFile['dkp_']        = $request->hiddenField7;
        $allFile['prava_1_1_']  = $request->hiddenField10;
        $allFile['prava_1_2_']  = $request->hiddenField101;
        $allFile['prava_2_1_']  = $request->hiddenField20;
        $allFile['prava_2_2_']  = $request->hiddenField201;
        $allFile['prava_3_1_']  = $request->hiddenField30;
        $allFile['prava_3_2_']  = $request->hiddenField301;
        $allFile['prava_4_1_']  = $request->hiddenField40;
        $allFile['prava_4_2_']  = $request->hiddenField401;

        $client = new SDK\Client($clientNumber, $comment, $allFile);
        return $client;
    }

    public function saveFileToDisk($files, $dir) {

        foreach ($files as $item => $value) {
            $img = $value;
            $img = str_replace('data:image/jpeg;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $img = base64_decode($img);
            $fileName = $item . time() . '.jpg';
            $fileDir = 'ВходящиеСканы/' . $dir;

            if ($img != "") {
                Storage::disk('local')->put($fileDir . '/' . $fileName, $img);
            }
        }
    }
}
