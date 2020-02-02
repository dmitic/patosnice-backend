<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
      <li class="@yield('active_dash')"><a href="{{route('home')}}"><i class="icon-group"></i><span>Administratori</span> </a> </li>
        <li class="@yield('active_slajder')"><a href="{{route('slider')}}"><i class="icon-resize-horizontal"></i><span>Slajder</span> </a> </li>
        <li class="@yield('active_blog')"><a href="{{route('postovi')}}"><i class="icon-paste"></i><span>Blog/Tekstovi</span> </a></li>
        <li class="@yield('active_brend')"><a href="{{route('brendovi')}}"><i class="icon-beaker"></i><span>Brendovi</span> </a> </li>
        <li class="@yield('active_proizvodjaci')"><a href="{{route('proizvodjaci')}}"><i class="icon-sitemap"></i><span>Proizvođači</span> </a> </li>
        <li class="@yield('active_proizvodi')"><a href="{{route('proizvodi')}}"><i class="icon-shopping-cart"></i><span>Proizvodi</span> </a> </li>
        <li><a href="https://www.patosnice.rs/" target="_blank"><i class="icon-globe"></i><span>Sajt</span> </a> </li>
      </ul>
    </div>
    <!-- /container -->
  </div>
  <!-- /subnavbar-inner -->
</div>
<!-- /subnavbar -->