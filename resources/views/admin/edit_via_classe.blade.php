@extends('layouts.app')

@section('title')
  Comptabilité - Traitement Période
@endsection

@section('content')
    <section id="main-content">

      <section class="wrapper">
        <!-- page start-->
        <div class="row mt">
          <div class="col-sm-3">
                @include('sidebar.sousmenu')
          </div>

          <div class="col-sm-9">

            <section class="panel">
              <header class="panel-heading wht-bg">
                <h4 class="centered gen-case">
                  <b>MISE A JOUR DU COMPTE</b>
                  </h4>
              </header>
              <div class="panel-body minimal">

              @if (count($errors) > 0)
                <div class="alert alert-danger centered">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{$error}}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              {!!Form::open(['action' => 'App\Http\Controllers\PcomptableController@updateviaclasse_pcomptables', 'method' => 'POST', 'class' => 'form-horizontal style-form'])!!}
              {{ csrf_field() }}
              <div class="modal-body">
                {{Form::hidden('id', $pcgs->id)}}
                {{Form::label('', 'Code', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9">
                  {{Form::number('code',  $pcgs->code, ['class' => 'form-control', 'placeholder' => 'de la période antérieure'])}}
                </div>
              </div><br/>
             <div class="modal-body">

                {{Form::label('', 'Rang du Classe', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9">
                  {{Form::select('rang_classe', $rang_classe,  $pcgs->rang_classe, ['class' => 'form-control', 'disabled'])}}
                </div>
              </div><br/>
              <div class="modal-body">
                {{Form::label('', 'Nom du Compte', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9">
                  {{Form::select('nom_compte', $nom_compte, $pcgs->$nom_compte, ['class' => 'form-control', 'disabled'])}}
                </div>
              </div><br/>
              <div class="modal-body">
                {{Form::label('', 'Numéro de Compte', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9">
                  {{Form::number('COMPTE',  $pcgs->COMPTE, ['class' => 'form-control', 'placeholder' => 'de la période antérieure', 'disabled'])}}
                </div>
              </div><br/>
              <div class="modal-body">
                {{Form::label('', 'Libellé', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9">
                  {{Form::text('LIBELLEE',  $pcgs->LIBELLEE, ['class' => 'form-control', 'placeholder' => 'libellé du compte', 'disabled'])}}
                </div>
              </div><br/>

              <div class="modal-body">
                {{Form::label('', 'Code Bilan', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9">
                  {{Form::text('BILAN',  $pcgs->BILAN, ['class' => 'form-control', 'placeholder' => 'code bilan du compte'])}}
                </div>
              </div><br/>
              <div class="modal-body">
                {{Form::label('', 'Rang Bilan', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9">
                  {{Form::number('rang_bilan',  $pcgs->rang_bilan, ['class' => 'form-control', 'placeholder' => 'rang bilan du compte'])}}
                </div>
              </div><br/>
              <div class="modal-body">
                {{Form::label('', 'Code Compte de Résultat', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9">
                  {{Form::text('code_compte_resultat',  $pcgs->code_compte_resultat, ['class' => 'form-control', 'placeholder' => 'code compte de résultat du compte'])}}
                </div>
              </div><br/>
              <div class="modal-body">
                {{Form::label('', 'Rang Compte de Résultat', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9">
                  {{Form::number('rang_compte_resultat',  $pcgs->rang_compte_resultat, ['class' => 'form-control', 'placeholder' => 'rang du compte de résultat'])}}
                </div>
              </div><br/>
              <div class="modal-body">
                {{Form::label('', 'Période', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9">
                  {{Form::text('mois_p',  $pcgs->mois_p, ['class' => 'form-control', 'placeholder' => 'code compte de résultat du compte', 'disabled'])}}
                </div>
              </div><br/>
              <div class="modal-body">
                {{Form::label('', 'Code Postale', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9">
                  {{Form::text('code_postale',  $pcgs->code_postale, ['class' => 'form-control', 'placeholder' => 'Saisir la code postale de la ville'])}}
                </div>
              </div><br/>
              <div class="modal-body">
                {{Form::label('', 'Nom de la Ville', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9">
                  {{Form::text('nom_ville',  $pcgs->nom_ville, ['class' => 'form-control', 'placeholder' => 'Saisir le Nom de la ville'])}}
                </div>
              </div><br/>
              <div class="modal-body">
                {{Form::label('', 'N° Identif. Statistique', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9">
                  {{Form::text('num_id_statistique',  $pcgs->num_id_statistique, ['class' => 'form-control', 'placeholder' => 'Numéro identification statistique'])}}
                </div>
              </div><br/>
              <div class="modal-body">
                {{Form::label('', 'N° Carte Professionnelle', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9">
                  {{Form::text('num_cp',  $pcgs->num_cp, ['class' => 'form-control', 'placeholder' => 'N° Carte Professionnelle'])}}
                </div>
              </div><br/>
              <div class="modal-body">
                {{Form::label('', 'Date Carte Professionnelle', ['class' => 'control-label col-md-3'])}}

                <div class="col-sm-9" data-date="01/01/2014" data-date-format="mm/dd/yyyy">
                    {{Form::text('date_cp', $pcgs->date_cp, ['class' => 'form-control dpd1', 'placeholder' => 'début période'])}}
                </div>
              </div><br/>
              <div class="modal-body">
                {{Form::label('', 'N° Quittance', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9">
                  {{Form::text('num_quittance',  $pcgs->num_quittance, ['class' => 'form-control', 'placeholder' => 'Numéro de quitance'])}}
                </div>
              </div><br/>
              <div class="modal-body">
                {{Form::label('', 'Date Quittance', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9" data-date="01/01/2014" data-date-format="mm/dd/yyyy">
                    {{Form::text('date_quittance', $pcgs->date_quittance, ['class' => 'form-control dpd1', 'placeholder' => 'début période'])}}
                </div>
              </div><br/>
              <div class="modal-body">
                {{Form::label('', 'Code Activité', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9">
                  {{Form::text('activite_code',  $pcgs->activite_code, ['class' => 'form-control', 'placeholder' => 'Saisir le code activiter'])}}
                </div>
              </div><br/>
              <div class="modal-body">
                {{Form::label('', 'Activité Faritany', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9">
                  {{Form::text('activite_faritany',  $pcgs->activite_faritany, ['class' => 'form-control', 'placeholder' => 'Saisir activité faritany'])}}
                </div>
              </div><br/>
              <div class="modal-body">
                {{Form::label('', 'Activité Fivondronana', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9">
                  {{Form::text('acctivite_fivondronana',  $pcgs->acctivite_fivondronana, ['class' => 'form-control', 'placeholder' => 'Saisir activité fivondronana'])}}
                </div>
              </div><br/>
              <div class="modal-body">
                {{Form::label('', 'Code Répétition', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9">
                  {{Form::text('code_repetition',  $pcgs->code_repetition, ['class' => 'form-control', 'placeholder' => 'Saisir le code de reception'])}}
                </div>
              </div><br/>
              <div class="modal-body">
                {{Form::label('', 'NIF', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9">
                  {{Form::text('nif',  $pcgs->nif, ['class' => 'form-control', 'placeholder' => 'Saisir le NIF'])}}
                </div>
              </div><br/>
              <div class="modal-body">
                {{Form::label('', 'N° RCS', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9">
                  {{Form::text('num_rcs',  $pcgs->num_rcs, ['class' => 'form-control', 'placeholder' => 'Saisir le  numéro RCS'])}}
                </div>
              </div><br/>
              <div class="modal-body">
                {{Form::label('', 'Date RCS', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9" data-date="01/01/2014" data-date-format="mm/dd/yyyy">
                    {{Form::text('date_rcs', $pcgs->date_rcs, ['class' => 'form-control dpd1', 'placeholder' => 'début période'])}}
                </div>
              </div>
              <br/><br/>
              <div class="form-group centered">
                {{Form::submit('Mettre à jour', ['class' => 'btn btn-success'])}}
              </div>
              {!!Form::close()!!}
            </div>
                </div>

            </section>
          </div>
        </div>

      </section>

      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->

  </section>

  @endsection
