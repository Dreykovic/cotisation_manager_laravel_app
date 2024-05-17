<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"><span>Main</span></li>
                <li class="{{ Str::startsWith(request()->path(), 'home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}"><i data-feather="home"></i> <span>Dashboard</span></a>
                </li>


                <li class="{{ Str::startsWith(request()->path(), 'natures') ? 'active' : '' }}">
                    <a href="{{ route('natures.index') }}"><i data-feather="star"></i> <span>Types
                            Cotisations</span></a>
                </li>
                <li class="{{ Str::startsWith(request()->path(), 'cotisations') ? 'active' : '' }}">
                    <a href="{{ route('cotisations.index') }}"><i data-feather="credit-card"></i>
                        <span>Cotisations</span></a>
                </li>







                <li class="{{ Str::startsWith(request()->path(), 'membres') ? 'active' : '' }}">
                    <a href="{{ route('membres.index') }}"><i data-feather="user"></i> <span>Membres</span></a>
                </li>


            </ul>
        </div>
    </div>
</div>
