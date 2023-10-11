<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Documento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class DocumentoController
 * @package App\Http\Controllers
 */
class DocumentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.documentos.index')->only('index');
        $this->middleware('can:admin.documentos.edit')->only('edit', 'update');
        $this->middleware('can:admin.documentos.create')->only('create', 'store');
        $this->middleware('can:admin.documentos.show')->only('show');
        $this->middleware('can:admin.documentos.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentos = Documento::with(['contrato'])->get();

        return view('documento.index', compact('documentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documento = new Documento();
        $contratos = Contrato::pluck('descripcion', 'id');
        return view('documento.create', compact('documento', 'contratos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request()->validate(Documento::$rules);

        // $documento = Documento::create($request->all());

        $documento = request()->except('_token');

        if ($request->hasFile('url')) {
            $documento['url'] = $request->file('url')->store('uploads', 'public');
        }

        Documento::insert($documento);

        return redirect()->route('archivos.index')
            ->with('success', 'Documento created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $documento = Documento::find($id);

        return view('documento.show', compact('documento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $documento = Documento::find($id);
        $contratos = Contrato::pluck('descripcion', 'id');
        return view('documento.edit', compact('documento', 'contratos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Documento $documento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // request()->validate(Documento::$rules);

        // $documento->update($request->all());

        $datosDocumento = request()->except(['_token', '_method']);

        if ($request->hasFile('url')) {
            $documento = Documento::findOrFail($id);

            Storage::delete('public/'.$documento->url);

            $datosDocumento['url'] = $request->file('url')->store('uploads', 'public');
        }

        Documento::where('id', '=', $id)->update($datosDocumento);

        return redirect()->route('archivos.index')
            ->with('success', 'Documento updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $documento = Documento::find($id)->delete();

        return redirect()->route('archivos.index')
            ->with('success', 'Documento deleted successfully');
    }
}
