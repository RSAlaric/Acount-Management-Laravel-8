<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Pcg;

class PostController extends Controller
{
    //
    public function pagesearch(){

        return view('admin.search');
    }
    public function search(Request $request){

        if($request->ajax()){

            $data=Pcg::where('code','like','%'.$request->search.'%')->get();
            //->orwhere('libelle','like','%'.$request->search.'%')
            //->orwhere('rang_bilan','like','%'.$request->search.'%')->get();

            $output='';
        if(count($data)>0){

             $output ='
             <div class="pull-right gen-case">
             <table class="table table-bordered table-striped table-condensed">

                <thead>
                <tr>
                 <th></th>
                 <th>Code</th>
                 <th>Rang</th>
                </tr>

                </thead>
                <tbody>';

                    foreach($data as $row){
                        $output .='
                        <tr>
                            <td>Bilan</td>
                            <td>'.$row->BILAN.'</td>
                            <td>'.$row->rang_bilan.'</td>
                        </tr>
                        <tr>
                            <td>Compte Résultat</td>
                            <td>'.$row->code_compte_resultat.'</td>
                            <td>'.$row->rang_compte_resultat.'</td>
                        </tr>
                        ';
                    }

             $output .= '
                 </tbody>
                </table>
                    <b class="pull-right gen-case"> <h5>Code Postale: '.$row->code_postale.'</h5></b>
                </div><br/>
                <p class="gen-case">
                    <b> Période: '.$row->mois_p.'</b>
                </p>
                <p class="gen-case">
                    <b> Numéro de Compte: '.$row->COMPTE.'</b>
                </p>
                <p class="gen-case">
                    <b> Nom: '.$row->LIBELLEE.'</b>
                </p>
                <p class="gen-case">
                    <b> Adresse: '.$row->nom_ville.'</b>
                </p>
                <p class="gen-case">
                    <b> Pays: </b>
                </p>
                </div><br/>

                <div class="pull-right gen-case">
                <table class="table table-bordered table-striped table-condensed">

                <thead>

                </thead>
                <tbody>';

                    foreach($data as $row){
                        $output .='
                        <tr>

                        <td>
                            <label class="col-sm-11 col-sm-11 control-label">N° Identif. Statistique</label>
                            <div class="col-sm-10">
                                 <input type="text" class="form-control" disabled value='.$row->num_id_statistique.'>
                            </div>
                        </td>
                        <td>
                            <label class="col-sm-11 col-sm-11 control-label">N° Carte Professionnelle</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" disabled value='.$row->num_cp.'>
                            </div>
                        </td>
                        <td>
                            <label class="col-sm-12 col-sm-12 control-label">Date Carte Professionnelle</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" disabled value='.$row->date_cp.'>
                            </div>
                        </td>
                        <td>
                            <label class="col-sm-11 col-sm-11 control-label">N° Quittance</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" disabled value='.$row->num_quittance.'>
                            </div>
                        </td>
                      </tr>

                      <tr>
                        <td>
                            <label class="col-sm-11 col-sm-11 control-label">Date Quittance</label>
                            <div class="col-sm-10">
                                 <input type="text" class="form-control" disabled value='.$row->date_quittance.'>
                            </div>
                        </td>
                        <td>
                            <label class="col-sm-11 col-sm-11 control-label">Code Activité</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" disabled value='.$row->activite_code.'>
                            </div>
                        </td>
                        <td>
                            <label class="col-sm-11 col-sm-11 control-label">Activité Faritany</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" disabled value='.$row->activite_faritany.'>
                            </div>
                        </td>
                        <td>
                            <label class="col-sm-11 col-sm-11 control-label">Activité Fivond.</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" disabled value='.$row->acctivite_fivondronana.'>
                            </div>
                        </td>
                      </tr>

                      <tr>
                        <td>
                            <label class="col-sm-11 col-sm-11 control-label">Code Répétition</label>
                            <div class="col-sm-10">
                                 <input type="text" class="form-control" disabled value='.$row->code_repetition.'>
                            </div>
                        </td>
                        <td>
                            <label class="col-sm-11 col-sm-11 control-label">NIF</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" disabled value='.$row->nif.'>
                            </div>
                        </td>
                        <td>
                            <label class="col-sm-11 col-sm-11 control-label">N° RCS</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" disabled value='.$row->num_rcs.'>
                            </div>
                        </td>
                        <td>
                            <label class="col-sm-11 col-sm-11 control-label">Date RCS</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" disabled value='.$row->date_rcs.'>
                            </div>
                        </td>
                      </tr>
                        ';
                    }

             $output .= '
                 </tbody>
                </table>
                </div><br/>
                </div><br/>';



        }
        else{

            $output .='Aucun résultat';

        }

        return $output;

        }


        return view('admin.search');

      }

    }
