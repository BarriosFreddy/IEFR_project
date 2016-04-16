<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CategoriaRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('biblioteca.categorias.index', compact('categorias'));

    }

    public function create()
    {
        return view('biblioteca.categorias.create');
    }

    public function store(CategoriaRequest $request)
    {
        try {
        Categoria::create($request->all());
        return redirect('biblioteca/categorias');
    } catch (QueryException $e) {
        Session::flash('datosExistente', "");
        return Redirect::to('biblioteca/categorias/create');
    }

    }


    public function show($id)
    {
        $categoria = Categoria::find($id);
        return view('biblioteca.categorias.show', compact('categoria'));
    }

    public function edit($id)
    {
        $categoria = Categoria::find($id);
        return view('biblioteca.categorias.edit', compact('categoria'));
    }

    public function update(CategoriaRequest $request, $id)
    {
        try {
            $categoria = Categoria::find($id);
            $categoria->update($request->all());
            return redirect('biblioteca/categorias');
        } catch (QueryException $e) {
            Session::flash('datosExistente', "");
            return view('biblioteca.categorias.edit', compact('categoria'));
        }
    }

    public function destroy($id)
    {
        Categoria::destroy($id);
        return redirect('biblioteca/categorias');
    }
}

