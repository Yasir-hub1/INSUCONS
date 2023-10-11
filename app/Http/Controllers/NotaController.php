<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Materiale;
use App\Models\Nota;
use App\Models\Proveedore;
use App\Models\Tipo;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/**
 * Class NotaController
 * @package App\Http\Controllers
 */
class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notas = Nota::with(['empleado', 'proveedore', 'tipo'])->get();

        return view('nota.index', compact('notas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* Auth::user()->name */
        $user =Auth::user()->name;
        $nota = new Nota();
        $empleados = Empleado::pluck('nombre', 'id');
        $proveedores = Proveedore::pluck('empresa', 'id');
        $tipos = Tipo::pluck('nombre', 'id');
        $materiales = Materiale::pluck('nombre', 'id');

        return view('nota.create', compact('nota', 'empleados', 'proveedores', 'tipos', 'materiales','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Nota::$rules);

        $nota = Nota::create($request->all());

        $nota->materiales()->sync($request->input('materiales', []));

        return redirect()->route('notas.index')
            ->with('success', 'Nota created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nota = Nota::find($id);

        return view('nota.show', compact('nota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nota = Nota::find($id);
        $user =Auth::user()->name;
        $empleados = Empleado::pluck('nombre', 'id');
        $proveedores = Proveedore::pluck('empresa', 'id');
        $tipos = Tipo::pluck('nombre', 'id');
        $materiales = Materiale::pluck('nombre', 'id');
        return view('nota.edit', compact('nota', 'empleados', 'proveedores', 'tipos','materiales','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Nota $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nota $nota)
    {
        request()->validate(Nota::$rules);

        $nota->update($request->all());

        return redirect()->route('notas.index')
            ->with('success', 'Nota updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $nota = Nota::find($id)->delete();

        return redirect()->route('notas.index')
            ->with('success', 'Nota deleted successfully');
    }
}
