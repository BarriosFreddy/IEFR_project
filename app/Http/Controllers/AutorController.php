<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Database\QueryException;
use App\util\Data;
use App\Http\Requests;
use App\Http\Requests\AutorRequest;
use App\Http\Controllers;
use Illuminate\Support\Facades\Session;

class AutorController extends Controller
{

    public function index()
    {
        $authors = Autor::all();

        $autores = json_encode($authors);

        return view('biblioteca.autores.index', compact('autores'));
    }


    public function create()
    {
        $paises = Data::paises();
        return view('biblioteca.autores.create', compact('paises'));
    }

    public function store(AutorRequest $request)
    {
        try {
            Autor::create($request->all());
            return redirect('biblioteca/autores');
        } catch (QueryException $e) {
            Session::flash('datosExistente', "");
            $paises = Data::paises();
            return Redirect::to('biblioteca/autores/create', compact('paises'));
        }

    }

        public function show($id)
    {
        $autor = Autor::find($id);
        return view('biblioteca.autores.show', compact('autor'));
    }


    public function edit($id)
    {
        $paises = Data::paises();
        $autor = Autor::find($id);
        return view('biblioteca.autores.edit', compact('autor', 'paises'));
    }


    public function update($id, AutorRequest $request)
    {
        $paises = Data::paises();
        try {
            $autor = Autor::find($id);
            $autor->update($request->all());
            return redirect('biblioteca/autores');
        } catch (QueryException $e) {
            Session::flash('datosExistente', "");
            return view('biblioteca.autores.edit', compact('autor', 'paises'));
        }
    }

    public function destroy($id)
    {
        Autor::destroy($id);
        return redirect('biblioteca/autores');
    }
}
