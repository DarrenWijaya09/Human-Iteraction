<?php

namespace App\Http\Controllers\syaratKetentuan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EdukasiController extends Controller
{
            public function index()
    {
        return view('syarat-ketentuan.edukasi');
    }
}
