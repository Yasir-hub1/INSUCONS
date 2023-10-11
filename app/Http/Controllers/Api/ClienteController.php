<?php

namespace App\Http\Controllers\Api;

use App\Models\Informe;
use App\Models\Contrato;
use App\Models\Proyecto;
use App\Models\Documento;
use App\Models\Presupuesto;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Empleado;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    use ApiResponder;
    /**
     * Handle the incoming request.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function getContratos(Request  $request)
    {
        $contrato = Contrato::select(["id", "nombre", "user_id", "presupuesto_id", "proyecto_id"])
            ->get();

        return $this->success(
            "contratos",
            $contrato->toArray(),
        );
    }


    // OBTENER LOS DOCUMENTOS
    public function getDocumento()
    {
        $docu = Documento::select(["id", "contrato_id", "nombre", "url"])->get();
        return $this->success(
            "documentos ",
            $docu->toArray(),
        );
    }

    // INSERTAR DOCUMENTO
    public  function postDocumento(Request $request)
    {
        if ($request->hasFile("document")) {
            $file = $request->File("document");

            $nombre = $request->File("document")->getClientOriginalName();

            $ruta = public_path("documentos/" . $nombre);

            // virificacion si el archivo es un pdf
            if ($file->guessExtension() == "pdf") {
                copy($file, $ruta);
            } else {
                dd("No es un PDF");
            }
            $doc = new Documento;
            $doc->contrato_id = $request->id_contrato;
            $doc->nombre = $nombre;
            $doc->url = "https://insucons.website/documentos/" . $nombre;
            $doc->save();
        }




        return $this->success(
            "documentos",
            $doc->toArray(),
        );
    }

    // Obteniendo datos del proyectos
    public function ObtenerProyecto(Request $request): JsonResponse
    {
        // $empreado= Empleado::select(['id'])->get();

        $proyecto = DB::table('proyectos')
            ->select(["proyectos.id", "proyectos.nombre", "proyectos.estado", "proyectos.ubicacion", "proyectos.fecha_inicio", "proyectos.fecha_fin", "empleados.nombre as empleadoNombre"])
            ->join('empleados', 'empleados.id', '=', 'proyectos.empleado_id')
            ->where('proyectos.id', $request->id_proyecto)
            ->first();

        /*  $proyecto = Proyecto::select(["id", "nombre", "estado", "ubicacion", "fecha_inicio", "fecha_fin"])
            ->where('id', $request->id_proyecto)

            ->first(); */

        return $this->success(
            "Obteniendo Proyectos ",
            $proyecto,
        );
    }

    // obtiene el informe por ID que recibe por el request

    public function ObtenerInforme(Request $request): JsonResponse
    {
        $informes = Informe::select(["id", "titulo", "descripcion", "fecha"])
            ->where('proyecto_id', $request->id_informe)
            ->get();

        return $this->success(
            "Obteniendo Informe",
            $informes->toArray(),

        );
    }
    // Obteniendo presupuesto por ID
    public function ObtenerPresupuesto(Request $request): JsonResponse
    {
        $presupuesto = Presupuesto::select(["id", "usuario", "descripcion", "total"])
            ->where("id", $request->id_presupuesto)
            ->first();
        if (!empty($presupuesto)) {
            return $this->success(
                "Obteniendo presupuesto",
                $presupuesto->toArray(),

            );
        } else {
            return null;
        }
    }

    // Obtener servicios por un ID presupuesto
    public function ObtenerServicio(Request $request): JsonResponse
    {
        $servicios = DB::table("presupuestos")
            ->select(["servicios.id", "servicios.nombre", "servicios.descripcion", "servicios.costo"])
            ->join("presupuesto_servicio", "presupuesto_servicio.presupuesto_id", "=", "presupuestos.id")
            ->join("servicios", "servicios.id", "=", "presupuesto_servicio.servicio_id")
            ->where("presupuestos.id", $request->id_presupuesto)
            ->get();





        return $this->success(
            "Obteniendo servicio",
            $servicios->toArray(),


        );
    }

    public function SumCostoTotalServicios(Request $request): JsonResponse
    {

        $sumTotalCostoServicios = DB::table("presupuestos")
            ->select(["servicios.id", "servicios.nombre", "servicios.descripcion", "servicios.costo"])
            ->join("presupuesto_servicio", "presupuesto_servicio.presupuesto_id", "=", "presupuestos.id")
            ->join("servicios", "servicios.id", "=", "presupuesto_servicio.servicio_id")
            ->where("presupuestos.id", $request->id_presupuesto)
            ->sum('servicios.costo');

        return $this->success(
            "sum costo total de servicio",
            $sumTotalCostoServicios,

        );
    }


    // conteo de ccontratos para el cliente en especifico
    public function CountContrato()
    {
        $countContrato = Contrato::where('cliente_id', Auth::user()->id)->count();

        return $this->success(
            "Total de contrato",
            $countContrato,

        );
    }


    // conteo de DOCUMENTOS para el cliente en especifico
    public function CountDocumentos()
    {
        $countDocumentos = DB::table("contratos")
            ->join("documentos", "documentos.contrato_id", "=", "contratos.id")
            ->where("contratos.cliente_id", Auth::user()->id)
            ->count();

        return $this->success(
            "Total de Documentos",
            $countDocumentos,

        );
    }

    // conteo de INFORMES para el cliente

    public function CountInformes()
    {
        $countInformes = DB::table("contratos")
            ->join("proyectos", "proyectos.id", "=", "contratos.proyecto_id")
            ->join("informes", "informes.proyecto_id", "=", "proyectos.id")
            ->where("contratos.cliente_id", Auth::user()->id)
            ->count();

        return $this->success(
            "Total de Informes",
            $countInformes,

        );
    }
}
