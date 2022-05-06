<a class="nav-link" href="{{ route('home.mainPage') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
    Panel
</a>
<div class="sb-sidenav-menu-heading">Konto</div>
<div class="sb-sidenav-menu-nested">
<a class="nav-link" href="{{ route('me.profile') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
    Profil
</a>
</div>
<div class="sb-sidenav-menu-nested">
<a class="nav-link" href="{{ route('me.games.list') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
    Gry
</a>
</div>
<div class="sb-sidenav-menu-heading">Gry</div>
<div class="sb-sidenav-menu-nested">
<a class="nav-link" href="{{ route('games.dashboard') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-gamepad"></i></div>
    Dashboard
</a>
</div>
<div class="sb-sidenav-menu-nested">
<a class="nav-link" href="{{ route('games.list') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-gamepad"></i></div>
    Katalog
</a>
</div>
@can('admin-level')
<div class="sb-sidenav-menu-heading">Admin Panel</div>
<div class="sb-sidenav-menu-nested">
<a class="nav-link" href="{{ route('get.users') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
    Użytkownicy
</a>
</div>
@endcan


