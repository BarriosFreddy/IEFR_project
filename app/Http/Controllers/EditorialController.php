<?php

namespace App\Http\Controllers;

use App\Models\Editorial;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\EditorialRequest;
use App\Http\Controllers;
use Illuminate\Support\Facades\Session;

class EditorialController extends Controller
{
    public function index()
    {
        $editoriales = Editorial::all();
        return view('biblioteca.editoriales.index', compact('editoriales'));
    }

    public function create()
    {
        return view('biblioteca.editoriales.create');
    }

    public function store(EditorialRequest $request)
    {
        try {
            Editorial::create($request->all());
            return redirect('biblioteca/editoriales');
        } catch (QueryException $e) {
            Session::flash('datosExistente', "");
            return Redirect::to('biblioteca/editoriales/create');
        }


    }

    public function show($id)
    {
        $editorial = Editorial::find($id);
        return view('biblioteca.editoriales.show', compact('editorial'));
    }

    public function edit($id)
    {
        $editorial = Editorial::find($id);
        return view('biblioteca.editoriales.edit', compact('editorial'));
    }

    public function update($id, EditorialRequest $request)
    {
        try {
            $editorial = Editorial::find($id);
            $editorial->update($request->all());
            return redirect('biblioteca/editoriales');
        } catch (QueryException $e) {
            Session::flash('datosExistente', "");
            return view('biblioteca.editoriales.edit', compact('editorial'));
        }
    }

    public function destroy($id)
    {
        Editorial::destroy($id);
        return redirect('biblioteca/editoriales');
    }
}
