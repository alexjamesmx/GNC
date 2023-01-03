<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rep_enterprise;
use PDF;

class PDFController extends Controller
{
    public function enterprise(Request $request)
    {
        $rep_enterprise = Rep_enterprise::where('inspeccion_id', '=', $request->id)->get();

        $datas = [
            'title' => 'Reporte de inspección de empresa',
            'date' => date('d-m-Y'),
            'data' => $rep_enterprise
        ];
        //dd($datas);
        $pdf = PDF::loadView('reportes/empresa', $datas);
        return $pdf->stream();
    }
}
