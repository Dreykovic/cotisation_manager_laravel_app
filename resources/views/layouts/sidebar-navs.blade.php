<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"><span>Main</span></li>
                <li class="{{ Str::startsWith(request()->path(), 'home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}"><i data-feather="home"></i> <span>Dashboard</span></a>
                </li>

                <li class="submenu">
                    <a class="{{ Str::startsWith(request()->path(), 'cotisations') ? 'active' : '' }}" href="#"><i
                            data-feather="credit-card"></i><span> Cotisations</span>
                        <span class="menu-arrow"></span></a>
                    <ul>
                        <li class="{{ Str::startsWith(request()->path(), 'cotisations/liste') ? 'active' : '' }}">
                            <a href="{{ route('cotisations.index') }}">
                                Liste</a>
                        </li>
                        <li class="{{ Str::startsWith(request()->path(), 'cotisations/add') ? 'active' : '' }}">
                            <a href="{{ route('cotisations.create') }}">
                                Ajouter</a>
                        </li>

                    </ul>
                </li>
                <li class="{{ Str::startsWith(request()->path(), 'natures') ? 'active' : '' }}">
                    <a href="{{ route('natures.index') }}"><i data-feather="star"></i> <span>Types
                            Cotisations</span></a>
                </li>








                <li class="submenu">
                    <a class="{{ Str::startsWith(request()->path(), 'membres') ? 'active' : '' }}" href="#"><i
                            data-feather="credit-card"></i><span> Membres</span>
                        <span class="menu-arrow"></span></a>
                    <ul>
                        <li class="{{ Str::startsWith(request()->path(), 'membres/liste') ? 'active' : '' }}">
                            <a href="{{ route('membres.index') }}">Liste</a>
                        </li>
                        <li class="{{ Str::startsWith(request()->path(), 'membres/register') ? 'active' : '' }}">
                            <a href="{{ route('membres.register') }}">Liste</a>
                        </li>


                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
