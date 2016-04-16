<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Categoria;
use App\Http\Controllers\Controller;

class RecursosLibrosController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('recursosLibros', compact('categorias'));
    }
}
