@extends('layouts.app')

@section('title')
  Comptabilité - Traitement Période
@endsection

@section('content')
{{Form::hidden('', $increment = 1)}}
<section id="main-content">
  <section class="wrapper">
    <!-- page start-->
    <div class="row mt">
        {{-- START MENU--}}
        <div class="col-sm-3">

          @include('sidebar.sousmenu')
            <a data-toggle="modal" href="periode.blade.php#myModal" class="pull-center btn btn-round btn-compose"><i class="fa fa-plus"></i> Ajouter Nouveau Période</a>
        </div>

        <!-- FORMULAIRE MODAL -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title centered">AJOUT PERIODE</h4>
              </div><br/><br/>

                    {!!Form::open(['action' => 'App\Http\Controllers\PeriodeController@saveperiode', 'method' => 'POST', 'class' => 'form-horizontal style-form'])!!}
                    {{ csrf_field() }}

                    <div class="modal-body">
                      {{Form::label('', 'Période comptable', ['class' => 'control-label col-md-3'])}}
                      <div class="col-md-9">
                        <div class="input-group input-large" data-date="01/01/2014" data-date-format="mm/dd/yyyy">
                          {{Form::text('date_debut_p', '', ['class' => 'form-control dpd1', 'placeholder' => 'début période'])}}
                          <span class="input-group-addon">au</span>
                            {{Form::text('date_fin_p', '', ['class' => 'form-control dpd2', 'placeholder' => 'fin période'])}}
                        </div>
                      </div>
                    </div><br/>
                    <div class="modal-body">
                      {{Form::label('', 'Mois de', ['class' => 'control-label col-md-3'])}}
                      <div class="col-md-8">
                        <div data-date-minviewmode="months" data-date-viewmode="years" data-date-format="mm/yyyy" data-date="01/2014" class="input-append date dpMonths">
                          {{Form::text('mois_p', '', ['class' => 'form-control', 'size' => '16', 'placeholder' => 'click sur icon calendrier'])}}
                          <span class="input-group-btn add-on">
                            <button class="btn btn-success" type="button"><i class="fa fa-calendar"></i></button>
                          </span>
                        </div>
                      </div>
                    </div><br/>
                    <div class="modal-body">
                      {{Form::label('', 'Rang Traitement', ['class' => 'control-label col-md-3'])}}
                      <div class="col-sm-9">
                        {{Form::number('rang_traitement_p', '', ['class' => 'form-control', 'placeholder' => 'de Traitement du'])}}
                      </div>
                    </div><br/>
                    <div class="modal-body">
                      {{Form::label('', 'Rang Période Antérieure', ['class' => 'control-label col-md-3'])}}
                      <div class="col-sm-9">
                        {{Form::number('rang_anterieure_p', '', ['class' => 'form-control', 'placeholder' => 'de la période antérieure'])}}
                      </div>
                    </div>

                  <br/><br/>
                    <div class="modal-footer">
                      {{Form::button('Annuler', ['class' => 'btn btn-default', 'data-dismiss' => 'modal'])}}
                      {{Form::submit('Enregistrer', ['class' => 'btn btn-success'])}}
                    </div>
                  {{--</form>--}}
                {!!Form::close()!!}
            </div>
          </div>
        </div>
        <!-- FORMULAIRE MODAL -->

        {{-- END MENU--}}
      <div class="col-sm-9">

        <section class="panel">
          <header class="panel-heading wht-bg">
            <h4 class="centered gen-case">
              <b>CHANGEMENT DE PERIODE</b>
            </h4>

            @if (Session::has('status'))
            <div class="alert alert-success">
              {{Session::get('status')}}
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
                      {{--<th class="centered">id</th>--}}
                      <th class="centered">Période Comptable</th>
                      <th class="centered">Mois</th>
                      <th class="centered hidden-phone">Rang de Traitement</th>
                      <th class="centered hidden-phone">Rang de la période antérieure</th>
                      <th class="centered">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($periodes as $periode)
                      <tr class="gradeX">
                        {{--<td class="centered">{{$increment}}</td>--}}
                        <td class="centered">{{$periode->date_debut_p}} <b><font color="#337ab7">au</font> </b> {{$periode->date_fin_p}}</td>
                        <td class="centered">{{$periode->mois_p}}</td>
                        <td class="center hidden-phone">{{$periode->rang_traitement_p}}</td>
                        <td class="center hidden-phone">{{$periode->rang_anterieure_p}}</td>
                        <td class="centered">

                              <a href="{{url('/editperiode/'.$periode->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                              <a href="{{url('/deleteperiode/'.$periode->id)}}" id="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>

                        </td>
                      </tr>
                      {{Form::hidden('', $increment = $increment + 1)}}
                    @endforeach
                  </tbody>
                  <a href="/exportpdf" class="btn pull-right btn-round-success btn-success"><i class="fa fa-print"></i> Imprimer en PDF</a><br/><br/>
                </table>
              </div>
          </div>

        </section>
      </div>
    </div>

  </section>

</section>

@endsection

@section('scripts2')
  <script type="text/javascript">
     $(document).on("click", "#delete", function(e){
    e.preventDefault();
    var link = $(this).attr("href");
    bootbox.confirm("Vous voulez vraiment supprimer cette Période ?", function(confirmed){
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
