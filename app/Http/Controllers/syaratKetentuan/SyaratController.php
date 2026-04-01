<?php

namespace App\Http\Controllers\syaratKetentuan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SyaratController extends Controller
{
    public function index()
    {
        return view('syarat-ketentuan.hak');
    }
}
