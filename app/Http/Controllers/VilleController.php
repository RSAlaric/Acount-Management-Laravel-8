<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ville;
use PDF;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Spatie\SimpleExcel\SimpleExcelReader;
use Box\Spout\Writer\Common\Creator\Style\StyleBuilder;
use Box\Spout\Common\Entity\Style\CellAlignment;
use Box\Spout\Common\Entity\Style\Color;

class VilleController extends Controller
{
    //
    public function listeville(){
        $villes = Ville::All();
        return view('admin.listeville')->with('villes', $villes);
    }
    public function save_ville(Request $request){
        $this->validate($request, ['code_postale' => 'required',
        'nom_ville' => 'required']);
        $ville = new Ville();
        $ville->code_postale = $request->input('code_postale');
        $ville->nom_ville = $request->input('nom_ville');
        $ville->save();

        return back()->with('status', 'Le code postale et le nom de la ville ont été bien ajouter');
    }
    public function editville($id){
        $ville = Ville::find($id);
        return view('admin.editville')->with('ville', $ville);
    }
    public function update_ville(Request $request){

        $ville = Ville::find($request->input('id'));
        $ville->code_postale = $request->input('code_postale');
        $ville->nom_ville = $request->input('nom_ville');
        $ville->update();

        return redirect('/listeville')->with('status', 'la mise à jour ont été bien réussi');
    }
    public function delete_ville($id){
        $ville = Ville::find($id);
        $ville->delete();

        return back()->with('status', 'la suppresion été bien réussi');
    }
    public function exportvillepdf(){
        $villes = Ville::All();
        view()->share('villes', $villes);
        $pdf = PDF::loadview('admin.ville-pdf');
        return $pdf->download('ville.pdf');
    }
    public function importville(Request $request){
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
        $status = Ville::insert($rows->toArray());

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
    public function exportville(Request $request) {

    	// 1. Validation des informations du formulaire
    	$this->validate($request, [
    		'name' => 'bail|required|string',
    		'extension' => 'bail|required|string|in:xlsx,csv'
    	]);

    	// 2. Le nom du fichier avec l'extension : .xlsx ou .csv
    	$file_name = $request->name.".".$request->extension;

    	// 3. On récupère données de la table "clients"
    	$villes = Ville::select("code_postale", "nom_ville")->get();

    	// 4. $writer : Objet Spatie\SimpleExcel\SimpleExcelWriter
    	$writer = SimpleExcelWriter::streamDownload($file_name);

 		// 5. On insère toutes les lignes au fichier Excel $file_name
    	$writer->addRows($villes->toArray());

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
        $villes->each(function ($row) use ($writer, $style) {

        $writer->addRow($row->toArray(), $style);

        });
    }
}
