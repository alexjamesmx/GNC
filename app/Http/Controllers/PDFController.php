<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rep_enterprise;
use App\Models\Rep_transformador;
use App\Models\Rep_electrica;
use App\Models\Anomalias;
use App\Models\Inspecciones;
use PDF;

class PDFController extends Controller
{
    public function enterprise(Request $request)
    {
        $rep_enterprise = Rep_enterprise::where('inspeccion_id', '=', $request->id)->get();
        $anomalias = Anomalias::where('inspeccion_id', '=', $request->id)
            ->where('tipo_inspeccion_id', '=', '1')
            ->get();

        // dd($anomalias);
        $inspecciones = Inspecciones::where('id', '=', $request->id)
            ->with('subestacion')
            ->with('tecnico')
            ->with('enterprise')
            ->get();

        $datas = [
            'title' => 'Reporte de inspección de empresa',
            'data_inspeccion' => $inspecciones,
            'data' => $rep_enterprise,
            'anomalias' => $anomalias
        ];
        //dd($datas);
        $pdf = PDF::loadView('reportes/empresa/empresa', $datas);

        return $pdf->stream();
    }

    public function transformador(Request $request)
    {
        $rep_transformador = Rep_transformador::where('inspeccion_id', '=', $request->id)->get();
        $anomalias = Anomalias::where('inspeccion_id', '=', $request->id)
            ->where('tipo_inspeccion_id', '=', '3')
            ->get();
        $inspecciones = Inspecciones::where('id', '=', $request->id)
            ->with('subestacion')
            ->with('tecnico')
            ->with('enterprise')
            ->get();

        $datas = [
            'title' => 'Reporte de inspección de empresa',
            'data_inspeccion' => $inspecciones,
            'data' => $rep_transformador,
            'anomalias' => $anomalias
        ];
        //dd($datas);
        $pdf = PDF::loadView('reportes/transformador/transformador', $datas);

        return $pdf->stream();
    }

    public function electrica(Request $request)
    {
        $rep_electrica = Rep_electrica::where('inspeccion_id', '=', $request->id)->get();
        $anomalias = Anomalias::where('inspeccion_id', '=', $request->id)
            ->where('tipo_inspeccion_id', '=', '2')
            ->get();
        $inspecciones = Inspecciones::where('id', '=', $request->id)
            ->with('subestacion')
            ->with('tecnico')
            ->with('enterprise')
            ->get();

        $datas = [
            'title' => 'Reporte de inspección de empresa',
            'data_inspeccion' => $inspecciones,
            'data' => $rep_electrica,
            'anomalias' => $anomalias
        ];
        dd($datas);


        $pdf = PDF::loadView('reportes/electrica/electrica', $datas);

        return $pdf->stream();
    }
}
