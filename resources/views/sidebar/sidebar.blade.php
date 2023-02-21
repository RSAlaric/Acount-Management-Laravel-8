<aside>
    <div id="sidebar" class="nav-collapse ">
      <!-- sidebar menu start-->
      <ul class="sidebar-menu" id="nav-accordion">
        <p class="centered"><a href="profile.html"><img src="{{asset('backend/img/ui-sam.jpg')}}" class="img-circle" width="80"></a></p>
        <h5 class="centered">Sam Soffes</h5>
        <li class="mt {{request()->is('dashboard') ? 'active' : ''}}">
          <a href="{{url('/dashboard')}}" class="{{request()->is('dashboard') ? 'active' : ''}}">
            <i class="fa fa-dashboard"></i>
            <span>DASHBOARD</span>
            </a>
        </li>
        <li class="sub-menu {{request()->is('periode') ? 'menu-open' : ''}}">
          <a class="{{request()->is('periode') ? 'active' : ''}} {{request()->is('listeclasse') ? 'active' : ''}} {{request()->is('listeviaclasse') ? 'active' : ''}} {{request()->is('listevialibelle') ? 'active' : ''}}{{request()->is('detail_compte_individuel') ? 'active' : ''}}" href="javascript:;">
            <i class="fa fa-desktop"></i>
            <span>COMPTABILITE</span><span class="label label-theme pull-right mail-info"><b>+</b></span>
            </a>
          <ul class="sub">
            <li class="{{request()->is('periode') ? 'active' : ''}} {{request()->is('listeclasse') ? 'active' : ''}}  {{request()->is('listeviaclasse') ? 'active' : ''}} {{request()->is('listevialibelle') ? 'active' : ''}} {{request()->is('detail_compte_individuel') ? 'active' : ''}}{{request()->is('listeville') ? 'active' : ''}}"><a href="{{url('/periode')}} ">Traitement en debut Période</a></li>
            <li class=""><a href="">Gestion de Mouvement</a></li>
            <li><a href="">Gestion des Impression</a></li>
            <li><a href="">Traitement de fin d'exercice</a></li>
            <li><a href="">Ouverture d'exercice</a></li>
          </ul>
        </li>
        <li class="sub-menu">
          <a  href="{{url('/lockscreen')}}">
            <i class="fa fa-lock"></i>
            <span>VEROUILLER</span>
            </a>
        </li>
      </ul>
      <!-- sidebar menu end-->
    </div>
  </aside>
