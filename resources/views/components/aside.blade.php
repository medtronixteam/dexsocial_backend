<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="/">
            <h3 class="mt-3" style="color: #024270">Dexsocial</h3>
        </a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="/">DX</a>
    </div>
    <ul class="sidebar-menu">
        {{-- expr --}}



             <li class={{ request()->routeIs('dashboard') ? 'active' : '' }}><a class="nav-link"
                     href="{{ route('dashboard') }}"><i
                         class="far fa-square"></i> <span>Dashboard</span></a></li>

            <li class={{ request()->routeIs('latest-data') ? 'active' : '' }}><a class="nav-link"
                     href="{{ route('latest-data') }}"><i
                         class="fas fa-fire"></i> <span>Scraped Tokens</span></a></li>
            <li class={{ request()->routeIs('promoted-tokens') ? 'active' : '' }}><a class="nav-link"
                     href="{{ route('promoted-tokens') }}"><i
                         class="fas fa-chalkboard-teacher"></i> <span>Promoted Tokens</span></a></li>


       {{--  <li class="dropdown">
            <a href="#" class="nav-link has-dropdown">
                <i class="fas fa-users-cog"></i><span>Manage Tokens</span>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a class="nav-link" href="{{ route('home') }}"
                        >All Tokens</a
                    >
                </li>
                <li><a href="{{ route('edit-data') }}">Edit Data</a></li>
                <li>
                    <a class="nav-link" href="{{ route('promoted-tokens') }}"
                        >Promoted Tokens</a
                    >
                </li>
                <li>
                    <a class="nav-link" href="{{ route('updated-tokens') }}"
                        >Updated Tokens</a
                    >
                </li>
                <li>
                    <a class="nav-link" href="{{ route('latest-data') }}"
                        >Latest Tokens</a
                    >
                </li>
            </ul>
        </li> --}}
             <li class="menu-header">Updated Token Portion</li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown">
                <i class="fas fa-users-cog"></i><span>Manage Tokens</span></a
            >
            <ul class="dropdown-menu">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('token.create') }}"
                        >Create Tokens</a
                    >
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('show-manual-data') }}"
                        >Tokens List</a
                    >
                </li>
            </ul>
        </li>
    </ul>
</aside>
