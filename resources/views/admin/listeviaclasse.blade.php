@extends('layouts.app')

@section('title')
  Comptabilité - Traitement Plan Comptable
@endsection
@section('content')

  <!--main content start-->
<section id="main-content">

  <section class="wrapper">
    <!-- page start-->
    <div class="row mt">
      <div class="col-sm-3">

        @include('sidebar.sousmenu')

          <section class="panel">
            <div class="panel-body">
              <h4 class="centered">EXPORTATION</h4>
              {!!Form::open(['action' => 'App\Http\Controllers\PcomptableController@exportpcomptable', 'method' => 'POST', 'class' => 'form-horizontal style-form', 'enctype' => "multipart/form-data"])!!}
              {{ csrf_field() }}
                  <input class="form-control" type="text" name="name" placeholder="Nom de fichier"><br/>
                  <select name="extension" class="form-control" >
                    <option value="xlsx" >.xlsx</option>
                    <option value="csv" >.csv</option>
                  </select><br/>
                <center><button type="submit" class="btn btn-info"><i class="fa fa-download"> Exporter</i></button></center>
              {!!Form::close()!!}
              </div>
          </section>
          <section class="panel">
            <div class="panel-body">
              {!!Form::open(['action' => 'App\Http\Controllers\PcomptableController@importpcomptable', 'method' => 'POST', 'class' => 'form-horizontal style-form', 'enctype' => "multipart/form-data"])!!}
              {{ csrf_field() }}
                <input type="file" name="fichier" class="form-control"><br/>
                <center><button type="submit" class="btn btn-info"><i class="fa fa-upload">  Importer XLSX</i></button></center>
              {!!Form::close()!!}
              </div>
          </section>
      </div>
       <!-- FORMULAIRE MODAL -->
       <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title centered">AJOUT NOUVEAU COMPTE</h4>
            </div>
            {!!Form::open(['action' => 'App\Http\Controllers\PcomptableController@saveviaclasse_pcomptables', 'method' => 'POST', 'class' => 'form-horizontal style-form'])!!}
            {{ csrf_field() }}
            <div class="modal-body">
                {{Form::label('', 'Code', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9">
                  {{Form::number('code', '', ['class' => 'form-control', 'placeholder' => 'saisir le code de cet compte pour faciliter le recheche aprés'])}}
                </div>
              </div><br/>
           <div class="modal-body">
              {{Form::label('', 'Rang du Classe', ['class' => 'control-label col-md-3'])}}
              <div class="col-sm-9">
                {{Form::select('rang_classe', $rang_classe, null, ['placeholder' => 'Selectionner la classe de compte', 'class' => 'form-control'])}}
              </div>
            </div><br/>
            <div class="modal-body">
              {{Form::label('', 'Nom du Compte', ['class' => 'control-label col-md-3'])}}
              <div class="col-sm-9">
                {{Form::select('nom_compte', $nom_compte, null, ['placeholder' => 'Selectionner le nom de compte',  'class' => 'form-control'])}}
              </div>
            </div><br/>

            <div class="modal-body">
              {{Form::label('', 'Numéro de Compte', ['class' => 'control-label col-md-3'])}}
              <div class="col-sm-9">
                {{Form::number('COMPTE', '', ['class' => 'form-control', 'placeholder' => 'de la période antérieure'])}}
              </div>
            </div><br/>
            <div class="modal-body">
              {{Form::label('', 'Libellé', ['class' => 'control-label col-md-3'])}}
              <div class="col-sm-9">
                {{Form::text('LIBELLEE', '', ['class' => 'form-control', 'placeholder' => 'de la période antérieure'])}}
              </div>
            </div><br/>

            <div class="modal-body">
              {{Form::label('', 'Code Bilan', ['class' => 'control-label col-md-3'])}}
              <div class="col-sm-9">
                {{Form::text('BILAN', '', ['class' => 'form-control', 'placeholder' => 'code bilan'])}}
              </div>
            </div><br/>
            <div class="modal-body">
              {{Form::label('', 'Rang Bilan', ['class' => 'control-label col-md-3'])}}
              <div class="col-sm-9">
                {{Form::number('rang_bilan', '', ['class' => 'form-control', 'placeholder' => 'Rang bilan'])}}
              </div>
            </div><br/>
            <div class="modal-body">
              {{Form::label('', 'Code Compte de Résultat', ['class' => 'control-label col-md-3'])}}
              <div class="col-sm-9">
                {{Form::text('code_compte_resultat', '', ['class' => 'form-control', 'placeholder' => 'code compte resultat'])}}
              </div>
            </div><br/>
            <div class="modal-body">
              {{Form::label('', 'Rang Compte de Résultat', ['class' => 'control-label col-md-3'])}}
              <div class="col-sm-9">
                {{Form::number('rang_compte_resultat', '', ['class' => 'form-control', 'placeholder' => 'rang compte résultat'])}}
              </div>
            </div><br/>

            <div class="modal-body">
                {{Form::label('', 'Periode', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9">
                  {{Form::select('mois_p', $mois_p, null, ['placeholder' => 'Selectionner la periode de cet compte',  'class' => 'form-control'])}}
                </div>
              </div><br/>
            <div class="modal-body">
                {{Form::label('', 'Code Postale', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9">
                  {{Form::select('code_postale', $code_postale, null, ['class' => 'form-control', 'placeholder' => 'Saisir la code postale de la ville'])}}
                </div>
              </div><br/>
              <div class="modal-body">
                {{Form::label('', 'Nom de la Ville', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9">
                  {{Form::select('nom_ville', $nom_ville, null, ['class' => 'form-control', 'placeholder' => 'Saisir le nom de la ville'])}}
                </div>
              </div><br/>
              <div class="modal-body">
                {{Form::label('', 'N° Identif. Statistique', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9">
                  {{Form::number('num_id_statistique', '', ['class' => 'form-control', 'placeholder' => 'Numéro identification statistique'])}}
                </div>
              </div><br/>
              <div class="modal-body">
                {{Form::label('', 'N° Carte Professionnelle', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9">
                  {{Form::number('num_cp', '', ['class' => 'form-control', 'placeholder' => 'N° Carte Professionnelle'])}}
                </div>
              </div><br/>
              <div class="modal-body">
                {{Form::label('', 'Date Carte Professionnelle', ['class' => 'control-label col-md-3'])}}
                <div class="col-md-9">
                  <div class="input-group input-large" data-date="01/01/2014" data-date-format="mm/dd/yyyy">
                    {{Form::text('date_cp', '', ['class' => 'form-control dpd1', 'placeholder' => 'Date Carte Professionnelle'])}}
                  </div>
                </div>
              </div><br/>

                <div class="modal-body">
                    {{Form::label('', 'N° Quittance', ['class' => 'control-label col-md-3'])}}
                    <div class="col-sm-9">
                    {{Form::number('num_quittance', '', ['class' => 'form-control', 'placeholder' => 'Numéro de quitance'])}}
                    </div>
                </div><br/>
              <div class="modal-body">
                {{Form::label('', 'Date Quittance', ['class' => 'control-label col-md-3'])}}
                <div class="col-md-9">
                  <div class="input-group input-large" data-date="01/01/2014" data-date-format="mm/dd/yyyy">
                    {{Form::text('date_quittance', '', ['class' => 'form-control dpd1', 'placeholder' => 'date de quitance'])}}
                  </div>
                </div>
              </div><br/>

            <div class="modal-body">
                {{Form::label('', 'Code Activité', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9">
                  {{Form::text('activite_code', '', ['class' => 'form-control', 'placeholder' => 'Saisir le code activiter'])}}
                </div>
              </div><br/>
              <div class="modal-body">
                {{Form::label('', 'Activité Faritany', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9">
                  {{Form::text('activite_faritany', '', ['class' => 'form-control', 'placeholder' => 'Saisir activité faritany'])}}
                </div>
              </div><br/>
              <div class="modal-body">
                {{Form::label('', 'Activité Fivondronana', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9">
                  {{Form::text('acctivite_fivondronana', '', ['class' => 'form-control', 'placeholder' => 'Saisir activité fivondronana'])}}
                </div>
              </div><br/>
              <div class="modal-body">
                {{Form::label('', 'Code Répétition', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9">
                  {{Form::text('code_repetition', '', ['class' => 'form-control', 'placeholder' => 'Saisir le code de reception'])}}
                </div>
              </div><br/>
              <div class="modal-body">
                {{Form::label('', 'NIF', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9">
                  {{Form::text('nif', '', ['class' => 'form-control', 'placeholder' => 'Saisir le NIF'])}}
                </div>
              </div>
              <div class="modal-body">
                {{Form::label('', 'N° RCS', ['class' => 'control-label col-md-3'])}}
                <div class="col-sm-9">
                  {{Form::text('num_rcs', '', ['class' => 'form-control', 'placeholder' => 'Saisir le numéro RCS'])}}
                </div>
              </div><br/>
              <div class="modal-body">
                {{Form::label('', 'Date RCS', ['class' => 'control-label col-md-3'])}}
                <div class="col-md-9">
                  <div class="input-group input-large" data-date="01/01/2014" data-date-format="mm/dd/yyyy">
                    {{Form::text('date_rcs', '', ['class' => 'form-control dpd1', 'placeholder' => 'date de quitance'])}}
                  </div>
                </div>
              </div>
            <br/><br/>
            <div class="modal-footer">
              {{Form::button('Annuler', ['class' => 'btn btn-default', 'data-dismiss' => 'modal'])}}
              {{Form::submit('Enregistrer', ['class' => 'btn btn-success'])}}
            </div>
            {!!Form::close()!!}
          </div>
        </div>
      </div>
      <!-- FORMULAIRE MODAL -->
      <div class="col-sm-9">

        <section class="panel">
          <header class="panel-heading wht-bg">

            @if (Session::has('status'))
                <div class="alert alert-success">
                {{Session::get('status')}}
                </div>
            @endif
            @if(Session::has('status1'))
            <div class="alert alert-danger">
                {{Session::get('status1')}}
                </div>
            @endif
          @if (count($errors) > 0)
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
                @endforeach
              </ul>
            </div>
          @endif

          </header>

          <div class="panel-body minimal">
              <div class="adv-table">
                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                  <thead>
                    <tr>
                      <th class="centered">Libellé</th>
                      <th class="centered">Cmpte</th>
                      <th class="centered hidden-phone">C.Bilan</th>
                      <th class="centered hidden-phone">Rang</th>
                      <th class="centered hidden-phone">C.C.Résultat</th>
                      <th class="centered hidden-phone">Rang</th>
                      <th class="centered">ActionsFaite</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($pcgs as $pcgs)
                    <tr class="gradeX">
                      <td>{{$pcgs->LIBELLEE}}</td>
                      <td class="centered">{{$pcgs->COMPTE}}</td>
                      <td class="center hidden-phone">{{$pcgs->BILAN}}</td>
                      <td class="center hidden-phone">{{$pcgs->rang_bilan}}</td>
                      <td class="center hidden-phone">{{$pcgs->code_compte_resultat}}</td>
                      <td class="center hidden-phone">{{$pcgs->rang_compte_resultat}}</td>
                      <td class="centered">
                            <a href="{{url('/listevialibelle/'.$pcgs->LIBELLEE)}}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a>
                            <a href="{{url('/edit_via_classe/'.$pcgs->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                            <a href="{{url('/delete_via_classe/'.$pcgs->id)}}" id="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                      </td>
                    </tr>

                    @endforeach
                    <p class="gen-case">
                      <h4>
                        <b>{{$pcgs->rang_classe}} : {{$pcgs->nom_compte}}</b>
                        <b class="pull-right gen-case">{{$pcgs->created_at}}</b>
                      </h4>
                    </p>
                  </tbody>

                  <!-- <a href="{{url('/exportbyclassepdf/'.$pcgs->nom_compte)}}" class="btn pull-right btn-round-success btn-success"><i class="fa fa-print"></i> Imprimer en PDF</a>-->
                  <a data-toggle="modal" href="#myModal" class="btn btn-round btn-info"><i class="fa fa-plus"></i> Ajouter Nouveau Compte</a>
                  <br/><br/>
                </table><br/><br/><br/>


              </div>
          </div>

        </section>
      </div>
    </div>

  </section>

  <!-- /wrapper -->
</section>
</section>
@endsection

@section('scripts2')
  <script type="text/javascript">
     $(document).on("click", "#delete", function(e){
    e.preventDefault();
    var link = $(this).attr("href");
    bootbox.confirm("Vous voulez vraiment supprimer cette Libellé ?", function(confirmed){
      if (confirmed){
          window.location.href = link;
        };
      });
    });
  </script>
@endsection
@section('scripts')
<script type="text/javascript">
  /* Formating function for row details */
  function fnFormatDetails(oTable, nTr) {
    /*  aData = oTable.fnGetData(nTr);
    var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
    sOut += '<tr><td>Rendering engine:</td><td>' + aData[1] + ' ' + aData[4] + '</td></tr>';
    sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
    sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
    sOut += '</table>';

    return sOut; */
  }

  $(document).ready(function() {
    /*
     * Insert a 'details' column to the table
     */
    var nCloneTh = document.createElement('th');
    var nCloneTd = document.createElement('td');
    /*nCloneTd.innerHTML = '<img src="backend/lib/advanced-datatable/images/">';
    nCloneTd.className = "center";

    $('#hidden-table-info thead tr').each(function() {
      this.insertBefore(nCloneTh, this.childNodes[0]);
    });

    $('#hidden-table-info tbody tr').each(function() {
      this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
    });

    /*
     * Initialse DataTables, with no sorting on the 'details' column
     */
    var oTable = $('#hidden-table-info').dataTable({
      "aoColumnDefs": [{
        "bSortable": false,
        "aTargets": [0]
      }],
      "aaSorting": [
        [1, 'asc']
      ]
    });

    /* Add event listener for opening and closing details
     * Note that the indicator for showing which row is open is not controlled by DataTables,
     * rather it is done here
     */
    $('#hidden-table-info tbody td img').live('click', function() {
      var nTr = $(this).parents('tr')[0];
      if (oTable.fnIsOpen(nTr)) {
        /* This row is already open - close it */
        this.src = "backend/lib/advanced-datatable/media/images/";
        oTable.fnClose(nTr);
      } else {
        /* Open this row */
        this.src = "backend/lib/advanced-datatable/images/";
        oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
      }
    });
  });
</script>
@endsection
