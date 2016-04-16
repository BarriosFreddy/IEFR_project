<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Ubicacion;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UbicacionRequest;
use App\Http\Controllers;
use Illuminate\Support\Facades\Session;

class UbicacionController extends Controller
{

    public function index()
    {
        $ubicaciones = Ubicacion::all();
        return view('biblioteca.ubicaciones.index', compact('ubicaciones'));
    }


    public function create()
    {
        return view('biblioteca.ubicaciones.create');
    }

    public function store(UbicacionRequest $request)
    {
        try {
            Ubicacion::create($request->all());
            return redirect('biblioteca/ubicaciones');
        } catch (QueryException $e) {
            Session::flash('datosExistente', "");
            return Redirect::to('biblioteca/ubicaciones/create');
        }


    }

    public function show($id)
    {
        $ubicacion = Ubicacion::find($id);
        return view('biblioteca.ubicaciones.show', compact('ubicacion'));
    }

    public function edit($id)
    {
        $errorPDO = null;
        $ubicacion = Ubicacion::find($id);
        return view('biblioteca.ubicaciones.edit', compact('ubicacion', 'errorPDO'));
    }

    public function update($id, UbicacionRequest $request)
    {
        $errorPDO = null;
        try {
            $ubicacion = Ubicacion::find($id);
            $ubicacion->update($request->all());
            return redirect('biblioteca/ubicaciones');
        } catch (QueryException $e) {
            Session::flash('datosExistente', "");
            return view('biblioteca.ubicaciones.edit', compact('ubicacion', 'errorPDO'));
        }
    }

    public function destroy($id)
    {
        $errorPDO = "Ha ocurrido un error al momento de Eliminar el item seleccionado";
        try {
            Ubicacion::destroy($id);
            return redirect('biblioteca/ubicaciones');
        } catch (Exception $e) {
            $ubicacion = Ubicacion::find($id);
            return view('biblioteca.ubicaciones.edit', compact('ubicacion', 'errorPDO'));

        } catch (QueryException $ex) {
            $ubicacion = Ubicacion::find($id);
            return view('biblioteca.ubicaciones.edit', compact('ubicacion', 'errorPDO'));
        }


    }
}
