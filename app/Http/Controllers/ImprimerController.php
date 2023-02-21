<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pcg;
use PDF;

class ImprimerController extends Controller
{
    //
    public function liste_compte_imprimer(){
        //$pcgs = Pcg::All()->where('COMPTE', '380');
        $pcgs = Pcg::All()->whereIn('COMPTE', [380, 412]);
        return view('admin.liste_compte_imprimer')->with('pcgs', $pcgs);
    }
}
