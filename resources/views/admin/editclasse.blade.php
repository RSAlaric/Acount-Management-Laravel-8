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
                  <b>METTRE A JOUR LA CLASSE ET LE NOM DE CODE</b>
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

                    {!!Form::open(['action' => 'App\Http\Controllers\PcomptableController@updateclasse', 'method' => 'POST', 'class' => 'form-horizontal style-form'])!!}
                    {{ csrf_field() }}

                    <div class="modal-body">
                      {{Form::hidden('id', $pcomptables->id)}}
                        {{Form::label('', 'Rang du Classe', ['class' => 'control-label col-md-3'])}}
                        <div class="col-sm-9">
                          {{Form::text('rang_classe', $pcomptables->rang_classe, ['class' => 'form-control', 'placeholder' => 'Saisir me rand classe'])}}
                        </div>
                      </div><br/>
                      <div class="modal-body">
                        {{Form::label('', 'Nom du Compte', ['class' => 'control-label col-md-3'])}}
                        <div class="col-sm-9">
                          {{Form::text('nom_compte',  $pcomptables->nom_compte, ['class' => 'form-control', 'placeholder' => 'Saisir en majuscule le nom du compte'])}}
                        </div>
                      </div><br/>
                      <div class="modal-body">
                        {{Form::label('', 'Date derniere', ['class' => 'control-label col-md-3'])}}
                        <div class="col-md-9">
                          <div class="input-group input-large" data-date="01/01/2014" data-date-format="mm/dd/yyyy">
                            {{Form::text('derniere_ajout_date', $pcomptables->derniere_ajout_date, ['class' => 'form-control dpd1'])}}
                          </div>
                        </div>
                      </div><br/><br/>
                      <div class="form-group centered">
                        <div class="col-lg-offset-2 col-lg-10">
                            {{Form::submit('Mise à jour', ['class' => 'btn btn-success'])}}
                        </div>
                      </div>
                      {!!Form::close()!!}
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
