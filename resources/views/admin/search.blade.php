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
                <b>DETAIL DU COMPTE INDIVIDUEL</b>
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

                      <tr>
                        <td>Bilan</td>
                        <td>0</td>
                        <td class="numeric">0</td>

                      </tr>
                      <tr>
                        <td>Compte Résultat</td>
                        <td>0</td>
                        <td class="numeric">0</td>

                      </tr>

                    </tbody>
                </table>
            </div>
              <p class="gen-case">
                  <b> Nom du Compte: TESTE</b>
              </p>
              <p class="gen-case">
                  <b> Libellé: TESTE</b>
              </p>
              <div class="form-group">


             </div>

              <form class="form-inline" role="form">
                   <input type="text" name="search" id="search" placeholder="Enter search name" class="form-control" onfocus="this.value=''">
                   <div id="search_list"></div>
                   <table class="table table-striped table-advance table-hover">
                    <thead>
                      <tr>
                        <th> <input type="text" class="form-control" placeholder="Libellé du compte"></th>
                        <th><input type="text" class="form-control" placeholder="Adresse"></th>
                        <th><input type="text" class="form-control" placeholder="Pays"></th>
                        <th><input type="text" class="form-control" placeholder="Code Postale"></th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                            <input type="text" class="form-control" placeholder="N° Indentif. Statistique">
                        </td>
                        <td>
                            <input type="text" class="form-control" placeholder="N° Carte Professionnelle">
                        </td>
                        <td>
                            <input type="text" class="form-control form-control-inline input-medium default-date-picker" placeholder="Date Carte Professionnelle">
                        </td>
                        <td>
                            <input type="text" class="form-control" placeholder="N° Quittance">
                       </td>
                      </tr>

                      <tr>
                        <td>
                            <input type="text" class="form-control form-control-inline input-medium default-date-picker" placeholder="Date Quitance">
                        </td>
                        <td>
                            <input type="text" class="form-control" placeholder="Code Activité">
                        </td>
                        <td>
                            <input type="text" class="form-control" placeholder="Activité Faritany">
                        </td>
                        <td>
                            <input type="text" class="form-control" placeholder="Activité Fivond.">
                       </td>
                      </tr>
                      <tr>
                        <td>
                            <input type="text" class="form-control" placeholder="Code Répétition">
                        </td>
                        <td>
                            <input type="text" class="form-control" placeholder="NIF">
                        </td>
                        <td>
                            <input type="text" class="form-control" placeholder="N° RCS">
                        </td>
                        <td>
                            <input type="text" class="form-control form-control-inline input-medium default-date-picker" placeholder="Date RCS">
                        </td>
                      </tr>
                    </tbody>
                  </table>
              </form>
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
                            <td class="centered"></td>
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
                            <td class="centered"></td>
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

@section('scripts3')
<script>
    $(document).ready(function(){
     $('#search').on('keyup',function(){
         var query= $(this).val();
         $.ajax({
            url:"search",
            type:"GET",
            data:{'search':query},
            success:function(data){
                $('#search_list').html(data);
            }
     });
     //end of ajax call
    });
    });
</script>
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
