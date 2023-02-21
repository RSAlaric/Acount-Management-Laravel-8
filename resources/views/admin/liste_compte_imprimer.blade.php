@extends('layouts.app')

@section('title')
  Comptabilité - Impression
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
              <b>LISTE DES COMPTES IMPRIMER(380, 4111, 4112 et 416)</b>
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
                    <th class="centered">Compte</th>
                    <th class="centered">Libellé</th>
                    <th class="centered">Nom de Compte</th>
                    <th class="centered hidden-phone">Rang</th>

                    <th class="centered">ActionsFaite</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($pcgs as $pcgs)
                  <tr class="gradeX">

                    <td class="centered">{{$pcgs->COMPTE}}</td>
                    <td class="centered">{{$pcgs->LIBELLEE}}</td>
                    <td class="centered">{{$pcgs->nom_compte}}</td>
                    <td class="center hidden-phone">{{$pcgs->rang_classe}}</td>

                    <td class="centered">
                          <a href="" class="btn btn-success btn-xs"><i class="fa fa-print"></i></a>

                    </td>
                  </tr>
                  @endforeach
                  <p class="gen-case">
                    <h4>
                      <b></b>
                      <b class="pull-right gen-case"></b>
                    </h4>
                  </p>
                </tbody>
              </table><br/><br/><br/>


            </div>
        </div>

        </section>
      </div>
    </div>

  </section>

  <!-- /wrapper -->
</section>
@endsection
@section('scripts2')
  <script type="text/javascript">
     $(document).on("click", "#delete", function(e){
    e.preventDefault();
    var link = $(this).attr("href");
    bootbox.confirm("Vous voulez vraiment supprimer cette Compte ?", function(confirmed){
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
