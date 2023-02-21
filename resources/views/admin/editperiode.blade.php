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
                  <b>METTRE A JOUR LA PERIDOE</b>
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

                    {!!Form::open(['action' => 'App\Http\Controllers\PeriodeController@updateperiode', 'method' => 'POST', 'class' => 'form-horizontal style-form'])!!}
                    {{ csrf_field() }}
                      <div class="form-group">
                        {{Form::hidden('id', $periode->id)}}
                        {{Form::label('', 'Période comptable', ['class' => 'control-label col-md-3'])}}
                        <div class="col-md-8">
                          <div class="input-group input-large" data-date="01/01/2014" data-date-format="mm/dd/yyyy">
                            {{Form::text('date_debut_p', $periode->date_debut_p, ['class' => 'form-control dpd1', 'placeholder' => 'début période'])}}
                            <span class="input-group-addon">au</span>
                            {{Form::text('date_fin_p', $periode->date_fin_p, ['class' => 'form-control dpd2', 'placeholder' => 'fin période'])}}
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        {{Form::label('', 'Mois de', ['class' => 'control-label col-md-3'])}}
                        <div class="col-md-7">
                          <div data-date-minviewmode="months" data-date-viewmode="years" data-date-format="mm/yyyy" data-date="01/2014" class="input-append date dpMonths">
                            {{Form::text('mois_p',  $periode->mois_p, ['class' => 'form-control', 'size' => '16', 'placeholder' => 'click sur icon calendrier'])}}
                            <span class="input-group-btn add-on">
                              <button class="btn btn-theme" type="button"><i class="fa fa-calendar"></i></button>
                              </span>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        {{Form::label('', 'Rang Traitement', ['class' => 'control-label col-md-3'])}}
                        <div class="col-sm-8">
                            {{Form::number('rang_traitement_p', $periode->rang_traitement_p, ['class' => 'form-control', 'placeholder' => 'de Traitement du'])}}
                        </div>
                      </div>
                      <div class="form-group">
                        {{Form::label('', 'Rang Période Antérieure', ['class' => 'control-label col-md-3'])}}
                        <div class="col-sm-8">
                            {{Form::number('rang_anterieure_p', $periode->rang_anterieure_p, ['class' => 'form-control', 'placeholder' => 'de la période antérieure'])}}
                        </div>
                      </div>
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
