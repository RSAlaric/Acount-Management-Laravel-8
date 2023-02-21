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
                  <b>MISE A JOUR</b>
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

                    {!!Form::open(['action' => 'App\Http\Controllers\VilleController@update_ville', 'method' => 'POST', 'class' => 'form-horizontal style-form'])!!}
                    {{ csrf_field() }}
                      <div class="form-group">
                        {{Form::hidden('id', $ville->id)}}
                        {{Form::label('', 'Code Postale', ['class' => 'control-label col-md-3'])}}
                        <div class="col-sm-8">
                            {{Form::number('code_postale', $ville->code_postale, ['class' => 'form-control', 'placeholder' => 'code postale'])}}
                        </div>
                      </div>
                      <div class="form-group">
                        {{Form::label('', 'Nom de Ville', ['class' => 'control-label col-md-3'])}}
                        <div class="col-sm-8">
                            {{Form::text('nom_ville', $ville->nom_ville, ['class' => 'form-control', 'placeholder' => 'nom de la ville'])}}
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
