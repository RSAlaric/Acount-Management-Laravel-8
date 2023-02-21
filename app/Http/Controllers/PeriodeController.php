<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periode;
use PDF;

class PeriodeController extends Controller
{
    //

    public function addperiode(){
        return view('admin.periode');
    }
    public function saveperiode(Request $request){
        $this->validate($request, ['date_debut_p' => 'required',
                                   'date_fin_p' => 'required',
                                   'mois_p' => 'required',
                                   'rang_traitement_p' => 'required',
                                   'rang_anterieure_p' => 'required']);
        $periode = new Periode();
        $periode->date_debut_p = $request->input('date_debut_p');
        $periode->date_fin_p = $request->input('date_fin_p');
        $periode->mois_p = $request->input('mois_p');
        $periode->rang_traitement_p = $request->input('rang_traitement_p');
        $periode->rang_anterieure_p = $request->input('rang_anterieure_p');
        $periode->save();

        return back()->with('status', 'La période a été bien ajouter');
    }
    public function periodes(){
        $periodes = Periode::All();
        return view('admin.periode')->with('periodes', $periodes);
    }
    public function editperiode($id){
        $periode = Periode::find($id);
        return view('admin.editperiode')->with('periode', $periode);
    }
    public function updateperiode(Request $request){

        $periode = Periode::find($request->input('id'));
        $periode->date_debut_p = $request->input('date_debut_p');
        $periode->date_fin_p = $request->input('date_fin_p');
        $periode->mois_p = $request->input('mois_p');
        $periode->rang_traitement_p = $request->input('rang_traitement_p');
        $periode->rang_anterieure_p = $request->input('rang_anterieure_p');

        $periode->update();

        return redirect('/periode')->with('status', 'la periode à été bien mise à jour');
    }
    public function deleteperiode($id){
        $periode = Periode::find($id);
        $periode->delete();

        return back()->with('status', 'la periode à été bien supprimer');
    }

    public function exportpdf(){
        $periodes = Periode::All();
        view()->share('periodes', $periodes);
        $pdf = PDF::loadview('admin.periode-pdf');
        return $pdf->download('periode.pdf');
    }
}
