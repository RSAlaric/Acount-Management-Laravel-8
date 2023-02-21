<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Pcomptables;
use App\Models\Pcg;
use App\Models\Periode;
use App\Models\Ville;
use PDF;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Spatie\SimpleExcel\SimpleExcelReader;
use Box\Spout\Writer\Common\Creator\Style\StyleBuilder;
use Box\Spout\Common\Entity\Style\CellAlignment;
use Box\Spout\Common\Entity\Style\Color;

class PcomptableController extends Controller
{
    //
    public function listeclasse(){
        return view('admin.listeclasse');
    }

    public function saveclasse_pcomptable(Request $request){
        $this->validate($request, ['rang_classe' => 'required|unique:pcomptables',
                                   'nom_compte' => 'required|unique:pcomptables',
                                   'derniere_ajout_date' => 'required']);

        $pcomptables = new Pcomptables();
        $pcomptables->rang_classe = $request->input('rang_classe');
        $pcomptables->nom_compte = $request->input('nom_compte');
        $pcomptables->derniere_ajout_date = $request->input('derniere_ajout_date');

        $pcomptables->save();

        return back()->with('status', 'La '.$request->input('rang_classe').' de '.$request->input('nom_compte').' et le nouveau compte sont bien ajouter');
    }

    public function pcomptables(){
        $pcomptables = Pcomptables::All();
        return view('admin.listeclasse')->with('pcomptables', $pcomptables);
    }

    public function editclasse($id){
        $pcomptables = Pcomptables::find($id);
        return view('admin.editclasse')->with('pcomptables', $pcomptables);
    }

    public function updateclasse(Request $request){

        $pcomptables = Pcomptables::find($request->input('id'));
        $pcomptables->rang_classe = $request->input('rang_classe');
        $pcomptables->nom_compte = $request->input('nom_compte');
        $pcomptables->derniere_ajout_date = $request->input('derniere_ajout_date');

        $pcomptables->update();

        return redirect('/listeclasse')->with('status', 'Le Compte à été bien mise à jour');
    }
    public function deleteclasse($id){
        $pcomptables = Pcomptables::find($id);
        $pcomptables->delete();

        return back()->with('status', 'le compte a été bien supprimer');
    }
    //FIN DE LA FONCTION SUR LE CLASSE COMPTABLE ETO INDRAY MANOMBOBA NY FONCTION DETAILLE NY COMPTES/

    public function listeviaclasse($nom_compte){
        $pcgs = Pcg::All()->where('nom_compte', $nom_compte);
        $pcomptables = Pcomptables::All();
        $periodes = Periode::All();
        $villes = Ville::All();
        $rang_classe = Pcomptables::All()->pluck('rang_classe', 'rang_classe');
        $nom_compte = Pcomptables::All()->pluck('nom_compte', 'nom_compte');
        $mois_p = Periode::All()->pluck('mois_p', 'mois_p');
        $code_postale = Ville::All()->pluck('code_postale', 'code_postale');
        $nom_ville = Ville::All()->pluck('nom_ville', 'nom_ville');

        return view('admin.listeviaclasse')->with('pcgs', $pcgs)->with('pcomptables', $pcomptables)
        ->with('rang_classe', $rang_classe)
        ->with('nom_compte', $nom_compte)
        ->with('mois_p', $mois_p)
        ->with('code_postale', $code_postale)
        ->with('nom_ville', $nom_ville);
    }
    public function listevialibelle($LIBELLEE){
        $pcgs = Pcg::All()->where('LIBELLEE', $LIBELLEE);
        $nom_compte = Pcg::All()->pluck('nom_compte', 'nom_compte');
        $LIBELLE = Pcg::All()->pluck('LIBELLEE', 'LIBELLEE');

        return view('admin.listevialibelle')->with('pcgs', $pcgs)->with('LIBELLEE', $LIBELLEE);
    }

    public function saveviaclasse_pcomptables(Request $request){
        $this->validate($request, ['rang_classe' => 'required',
                                   'COMPTE' => 'required',
                                   'LIBELLEE' => 'required',
                                   'code' => 'required']);

        if($request->input('nom_compte')){

            $pcgs = new Pcg();
            $pcgs->rang_classe = $request->input('rang_classe');
            $pcgs->nom_compte = $request->input('nom_compte');
            $pcgs->COMPTE = $request->input('COMPTE');
            $pcgs->LIBELLEE = $request->input('LIBELLEE');
            $pcgs->code = $request->input('code');
            $pcgs->BILAN = $request->input('BILAN');
            $pcgs->rang_bilan = $request->input('rang_bilan');
            $pcgs->code_compte_resultat = $request->input('code_compte_resultat');
            $pcgs->rang_compte_resultat = $request->input('rang_compte_resultat');
            $pcgs->mois_p = $request->input('mois_p');
            $pcgs->code_postale = $request->input('code_postale');
            $pcgs->nom_ville = $request->input('nom_ville');
            $pcgs->num_id_statistique = $request->input('num_id_statistique');
            $pcgs->num_cp = $request->input('num_cp');
            $pcgs->date_cp = $request->input('date_cp');
            $pcgs->num_quittance = $request->input('num_quittance');
            $pcgs->date_quittance = $request->input('date_quittance');
            $pcgs->activite_code = $request->input('activite_code');
            $pcgs->activite_faritany = $request->input('activite_faritany');
            $pcgs->acctivite_fivondronana = $request->input('acctivite_fivondronana');
            $pcgs->code_repetition = $request->input('code_repetition');
            $pcgs->nif = $request->input('nif');
            $pcgs->num_rcs = $request->input('num_rcs');
            $pcgs->date_rcs = $request->input('date_rcs');


            $pcgs->save();
            return back()->with('status', 'Les libellé '.$request->input('LIBELLEE').' appartient  à la '.$request->input('rang_classe').' dans le '.$request->input('nom_compte').' sont bien enregistrer');

        }
        else{
            return back()->with('status1', 'Selectionner dabord le nom de compte pour cette libellé');
        }


    }
    public function edit_via_classe($id){
        $pcgs = Pcg::find($id);
        $rang_classe = Pcomptables::All()->pluck('rang_classe', 'rang_classe');
        $nom_compte = Pcomptables::All()->pluck('nom_compte', 'nom_compte');
        $derniere_ajout_date = Pcomptables::All()->pluck('derniere_ajout_date', 'derniere_ajout_date');
        return view('admin.edit_via_classe')
        ->with('pcgs', $pcgs)
        ->with('rang_classe', $rang_classe)
        ->with('nom_compte', $nom_compte);


    }
    public function updateviaclasse_pcomptables(Request $request){
        $this->validate($request, ['rang_classe' => 'required',
                                   'code' => 'required',
                                   'COMPTE' => 'required',
                                   'LIBELLEE' => 'required']);

        $pcgs = Pcg::find($request->input('id'));
        $pcgs->rang_classe = $request->input('rang_classe');
        $pcgs->nom_compte = $request->input('nom_compte');
        $pcgs->COMPTE = $request->input('COMPTE');
        $pcgs->LIBELLEE = $request->input('LIBELLEE');
        $pcgs->code = $request->input('code');
        $pcgs->BILAN = $request->input('BILAN');
        $pcgs->rang_bilan = $request->input('rang_bilan');
        $pcgs->code_compte_resultat = $request->input('code_compte_resultat');
        $pcgs->rang_compte_resultat = $request->input('rang_compte_resultat');
        $pcgs->mois_p = $request->input('mois_p');
        $pcgs->code_postale = $request->input('code_postale');
        $pcgs->nom_ville = $request->input('nom_ville');
        $pcgs->num_id_statistique = $request->input('num_id_statistique');
        $pcgs->num_cp = $request->input('num_cp');
        $pcgs->date_cp = $request->input('date_cp');
        $pcgs->num_quittance = $request->input('num_quittance');
        $pcgs->date_quittance = $request->input('date_quittance');
        $pcgs->activite_code = $request->input('activite_code');
        $pcgs->activite_faritany = $request->input('activite_faritany');
        $pcgs->acctivite_fivondronana = $request->input('acctivite_fivondronana');
        $pcgs->code_repetition = $request->input('code_repetition');
        $pcgs->nif = $request->input('nif');
        $pcgs->num_rcs = $request->input('num_rcs');
        $pcgs->date_rcs = $request->input('date_rcs');

        $pcgs->update();
        return redirect('/listeclasse')->with('status', 'Le '.$request->input('nom_compte'). ' de libellé nommé '.$request->input('libelle'). ' '.$request->input('rang_classe'). ' sont été bien mise à jour !!');
    }
    public function delete_via_classe($id){
        $pcgs = Pcg::find($id);
        $pcgs->delete();

        return back()->with('status', 'la compte à été bien supprimer');
    }
    //public function liste_by_classe($nom_compte){
        //$pcgs = Pcg::All()->where('nom_compte', $nom_compte);
        //$pcomptables = Pcomptables::All();
        //$rang_classe = Pcomptables::All()->pluck('rang_classe', 'rang_classe');
        //$nom_compte = Pcomptables::All()->pluck('nom_compte', 'nom_compte');

        //return view('admin.listeviaclasse')->with('pcgs', $pcgs)->with('pcomptables', $pcomptables)->with('rang_classe', $rang_classe)->with('nom_compte', $nom_compte);
    //}
     //FIN DE LA FONCTION SUR LE CLASSE COMPTABLE ETO INDRAY MANOMBOBA NY FONCTION DETAILLE NY LIBELLER PAR COMPTE/

    public function exportclassepdf(){
        $pcomptables = Pcomptables::All();
        view()->share('pcomptables', $pcomptables);
        $pdf = PDF::loadview('admin.classe-pdf');
        return $pdf->download('classe.pdf');
    }
    public function exportbyclassepdf($nom_compte){
        $pcgs = Pcg::All()->where('nom_compte', $nom_compte);

        view()->share('pcgs', $pcgs);
        $pdf = PDF::loadview('admin.plan_comptable-pdf');
        return $pdf->download('plan_comptable.pdf');
    }

    public function importpcomptable(Request $request){
        // 1. Validation du fichier uploadé. Extension ".xlsx" autorisée
    	$this->validate($request, [
    		'fichier' => 'bail|required|file|mimes:xlsx'
    	]);

    	// 2. On déplace le fichier uploadé vers le dossier "public" pour le lire
    	$fichier = $request->fichier->move(public_path(), $request->fichier->hashName());

        // 3. $reader : L'instance Spatie\SimpleExcel\SimpleExcelReader
    	$reader = SimpleExcelReader::create($fichier);

        // On récupère le contenu (les lignes) du fichier
        $rows = $reader->getRows();

        // $rows est une Illuminate\Support\LazyCollection

        // 4. On insère toutes les lignes dans la base de données
        $status = Pcg::insert($rows->toArray());

        // Si toutes les lignes sont insérées
    	if ($status) {

            // 5. On supprime le fichier uploadé
            $reader->close(); // On ferme le $reader
            unlink($fichier);

            // 6. Retour vers le formulaire avec un message $msg
            return back()->with('status', 'Importation réussie !');

        } else { abort(500); }
        return view('dmin.listeclasse');
    }
    // Exporter les données
    public function exportpcomptable(Request $request) {

    	// 1. Validation des informations du formulaire
    	$this->validate($request, [
    		'name' => 'bail|required|string',
    		'extension' => 'bail|required|string|in:xlsx,csv'
    	]);

    	// 2. Le nom du fichier avec l'extension : .xlsx ou .csv
    	$file_name = $request->name.".".$request->extension;

    	// 3. On récupère données de la table "clients"
    	$pcgs = Pcg::select("COMPTE", "LIBELLEE", "BILAN")->get();

    	// 4. $writer : Objet Spatie\SimpleExcel\SimpleExcelWriter
    	$writer = SimpleExcelWriter::streamDownload($file_name);

 		// 5. On insère toutes les lignes au fichier Excel $file_name
    	$writer->addRows($pcgs->toArray());

        // 6. Lancer le téléchargement du fichier
        $writer->toBrowser();
        // Le style
        $style = (new StyleBuilder())->setFontName("Arial")
        ->setFontSize(15)
        ->setFontColor(Color::BLACK)
        ->setBackgroundColor(Color::rgb(246,248,250))
        ->setShouldWrapText()
        ->setCellAlignment(CellAlignment::LEFT)
        ->build();

        // L'instance Spatie\SimpleExcel\SimpleExcelWriter;
        $writer = SimpleExcelWriter::create("fichier-stylisé.xlsx");

        // On insère la collection $clients au fichier Excel en appliquant le $style à chaque ligne
        $pcgs->each(function ($row) use ($writer, $style) {

        $writer->addRow($row->toArray(), $style);

        });
    }
    public function detail_compte_individuel(){
        //$pcgs = Pcg::All()->where('libelle', $libelle);
        //$nom_compte = Pcg::All()->pluck('nom_compte', 'nom_compte');
        //$libelle = Pcg::All()->pluck('libelle', 'libelle');

        return view('admin.detail_compte_individuel');
    }
}
