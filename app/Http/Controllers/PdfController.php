<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
Use App\Models\Periode;
Use PDF;


class PdfController extends Controller
{
    public function imprimer_pdf(Periode $periodes){

        $periodes = Periode::all();
        $pdf = PDF::loadView('admin.periode', compact('periodes'));
        return $pdf->download('test.pdf');

    }
}

