<section class="panel">
    <div class="panel-body">
      <a href="#" class="btn btn-compose">
        <i></i>  TRAITEMENT DEBUT PERIODE
        </a>
      <ul class="nav nav-pills nav-stacked mail-nav">
        <li class="{{request()->is('periode') ? 'active' : ''}}"><a href="{{url('/periode')}}"> <i class="fa fa-rotate-left"></i> Changement de Période</a></li>
        <li class="{{request()->is('listeclasse') ? 'active' : ''}} {{request()->is('liste_by_classe') ? 'active' : ''}} {{request()->is('listeviaclasse') ? 'active' : ''}} {{request()->is('listevialibelle') ? 'active' : ''}} {{request()->is('editperiode') ? 'active' : ''}}"><a href="{{url('/listeclasse')}}"> <i class="fa fa-pencil"></i> Mise à jour Plan comptable</a></li>
        <li class="{{request()->is('liste_by_classe') ? 'active' : ''}} {{request()->is('listeviaclasse') ? 'active' : ''}} {{request()->is('listevialibelle') ? 'active' : ''}} {{request()->is('editperiode') ? 'active' : ''}} {{request()->is('detail_compte_individuel') ? 'active' : ''}}"><a href="{{url('/detail_compte_individuel')}}"> <i class="fa fa-plus"></i> Détail du compte individuel</a></li>
        <li class="{{request()->is('liste_by_classe') ? 'active' : ''}} {{request()->is('listeviaclasse') ? 'active' : ''}} {{request()->is('listevialibelle') ? 'active' : ''}} {{request()->is('editperiode') ? 'active' : ''}} {{request()->is('listeville') ? 'active' : ''}} "><a href="{{url('/listeville')}}"> <i class="fa fa-vimeo"></i> Les Villes</a></li>
        <li><a href="#"> <i class="fa fa-paste"></i> Fusions de traitement n Mois</a></li>
        <li class="{{request()->is('liste_by_classe') ? 'active' : ''}} {{request()->is('listeviaclasse') ? 'active' : ''}} {{request()->is('listevialibelle') ? 'active' : ''}} {{request()->is('editperiode') ? 'active' : ''}} {{request()->is('liste_compte_imprimer') ? 'active' : ''}} "><a href="{{url('/liste_compte_imprimer')}}"> <i class="fa fa-print"></i> Impr. Des 380, 4111, 4112 et 416</a></li>
        <br/>
      </ul>
      <a href="" class="pull-center btn btn-round-success btn-compose"><i class=""></i></a>
    </div>
</section>
