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
          <section class="panel">
            <div class="panel-body">
              {!!Form::open(['action' => 'App\Http\Controllers\SimpleExcelController@import', 'method' => 'POST', 'class' => 'form-horizontal style-form', 'enctype' => "multipart/form-data"])!!}
              {{ csrf_field() }}
                <input type="file" name="fichier" class="form-control"><br/>
                <center><button type="submit" class="btn btn-info"><i class="fa fa-upload">  Importer XLSX</i></button></center>
              {!!Form::close()!!} 
              </div> 
          </section>
          <section class="panel">
            <div class="panel-body"> 
              <h4 class="centered">EXPORTATION</h4>
              {!!Form::open(['action' => 'App\Http\Controllers\SimpleExcelController@export', 'method' => 'POST', 'class' => 'form-horizontal style-form', 'enctype' => "multipart/form-data"])!!}
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
        </div>

        {{-- END MENU--}}
      <div class="col-sm-9">
        
        <section class="panel">
          <header class="panel-heading wht-bg">
            <h4 class="centered gen-case">
              <b> LISTE DES CLIENTS</b>
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
                      <th class="centered">Name</th>
                      <th class="centered">Email</th>
                      <th class="centered hidden-phone">Phone</th>
                      <th class="centered hidden-phone">Adresse</th>
                      <th class="centered">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                    @foreach ($clients as $client)
                    <tr class="gradeX">
                      {{--<td class="centered">{{$increment}}</td>--}}
                      <td class="centered">{{$client->name}} </td>
                      <td class="centered">{{$client->email}}</td>
                      <td class="center hidden-phone">{{$client->phone}}</td>
                      <td class="center hidden-phone">{{$client->address}}</td>
                      <td class="centered">
                        
                            <a href="{{url('/editperiode/')}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                            <a href="{{url('/deleteperiode/')}}" id="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                          
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