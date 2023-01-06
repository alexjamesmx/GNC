<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rep_enterprise;
use App\Models\Anomalias;
use PDF;

class PDFController extends Controller
{
    public function enterprise(Request $request)
    {
        $rep_enterprise = Rep_enterprise::where('inspeccion_id', '=', $request->id)->get();
        $anomalias = Anomalias::where('inspeccion_id', '=', $request->id)->get();

        $datas = [
            'title' => 'Reporte de inspección de empresa',
            'date' => date('d-m-Y'),
            'data' => $rep_enterprise,
            'anomalias' => $anomalias
        ];
        //dd($datas);
        //$pdf = PDF::loadView('reportes/empresa', $datas);

        $contxt = stream_context_create([
            'ssl' => [
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
                'allow_self_signed' => TRUE
            ]
        ]);
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf->getDomPDF()->setHttpContext($contxt);

        // dd('sdf');
        return $pdf->loadView('reportes/empresa', $datas)->stream();
    }
}
