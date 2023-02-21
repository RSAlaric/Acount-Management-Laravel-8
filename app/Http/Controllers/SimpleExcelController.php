<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Spatie\SimpleExcel\SimpleExcelReader;
use Box\Spout\Writer\Common\Creator\Style\StyleBuilder;
use Box\Spout\Common\Entity\Style\CellAlignment;
use Box\Spout\Common\Entity\Style\Color;

class SimpleExcelController extends Controller
{
    //
    public function client(){
        $clients = Client::All();
        return view('admin.clients')->with('clients', $clients);
    }
    public function import(Request $request){
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
        $status = Client::insert($rows->toArray());

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
    public function export (Request $request) {

    	// 1. Validation des informations du formulaire
    	$this->validate($request, [
    		'name' => 'bail|required|string',
    		'extension' => 'bail|required|string|in:xlsx,csv'
    	]);

    	// 2. Le nom du fichier avec l'extension : .xlsx ou .csv
    	$file_name = $request->name.".".$request->extension;

    	// 3. On récupère données de la table "clients"
    	$clients = Client::select("name", "email", "phone", "address")->get();

    	// 4. $writer : Objet Spatie\SimpleExcel\SimpleExcelWriter
    	$writer = SimpleExcelWriter::streamDownload($file_name);

 		// 5. On insère toutes les lignes au fichier Excel $file_name
    	$writer->addRows($clients->toArray());

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
        $clients->each(function ($row) use ($writer, $style) {

        $writer->addRow($row->toArray(), $style);

        });
    }
}
