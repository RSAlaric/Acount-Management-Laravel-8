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
  </table>