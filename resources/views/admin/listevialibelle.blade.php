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

          <a href="#" class="pull-center btn btn-round-success btn-compose"><i class="fa fa-print"></i>Imprimer</a><br/>
          <br/>
          <a href="#" class="pull-center btn btn-round btn-compose"><i class="fa fa-plus"></i> Ajouter Nouveau</a>
        </div>

        <div class="col-sm-9">

          <section class="panel">
            <header class="panel-heading wht-bg">
              <h4 class="centered gen-case">
                <b>MISE A JOUR PLAN COMPTABLE</b>
                <b class="pull-right gen-case"> <h5>Période: Février 2021</h5></b>
              </h4>
              <div class="pull-right gen-case">

                <table class="table table-bordered table-striped table-condensed">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Code</th>
                        <th>Rang</th>

                      </tr>
                    </thead>
                    <tbody>
                    @foreach($pcgs as $pcgs)
                      <tr>
                        <td>Bilan</td>
                        <td>{{$pcgs->BILAN}}</td>
                        <td class="numeric">{{$pcgs->rang_bilan}}</td>

                      </tr>
                      <tr>
                        <td>Compte Résultat</td>
                        <td>{{$pcgs->code_compte_resultat}}</td>
                        <td class="numeric">{{$pcgs->rang_compte_resultat}}</td>

                      </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
              <p class="gen-case">
                  <b> Nom du Compte: {{$pcgs->nom_compte}}</b>
              </p>
              <p class="gen-case">
                  <b> Libellé: {{$pcgs->LIBELLEE}}</b>
              </p>

            </header>

            <div class="panel-body minimal">
                <div class="adv-table">

                  <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                      <thead>
                          <tr>
                            <th class="centered"></th>
                            <th class="centered">Mouvements du mois</th>
                            <th class="centered">Capitaux Cumulés</th>
                            <th class="centered hidden-phone">Nouveau Solde</th>
                            <th class="centered hidden-phone">Date du Dérniere</th>
                            <th class="centered">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="gradeX">

                            <td class="centered">DEBIT</td>
                            <td class="centered"></td>
                            <td class="centered">0.0</td>
                            <td class="center hidden-phone"></td>
                            <td class="center hidden-phone">Janvier 2021</td>
                            <td class="centered">

                              <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                              <a href="#" id="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>

                            </td>
                          </tr>
                          <tr class="gradeX">
                            <td class="centered">CREDIT</td>
                            <td class="centered"> </td>
                            <td class="centered">0.0</td>
                            <td class="center hidden-phone"> </td>
                            <td class="center hidden-phone">Janvier 2021</td>
                            <td class="centered">

                              <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                              <a href="#" id="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>

                            </td>
                          </tr>

                        </tbody>
                  </table>

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
    bootbox.confirm("Vous voulez vraiment supprimer cette élément ?", function(confirmed){
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
