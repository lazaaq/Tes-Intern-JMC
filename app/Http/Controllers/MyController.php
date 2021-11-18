<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class MyController extends Controller
{
    public function index()
    {
        return view("index" , [
            'provinsis' => Provinsi::all()
        ]);
    }
}
