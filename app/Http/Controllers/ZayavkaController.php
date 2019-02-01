<?php

namespace App\Http\Controllers;

use App\Zayavka;
use Illuminate\Http\Request;

class ZayavkaController extends Controller
{
    public function deleteZayavka($id) {
        Zayavka::find($id)->delete();
        return redirect('/admin/zayavki');
    }
}
