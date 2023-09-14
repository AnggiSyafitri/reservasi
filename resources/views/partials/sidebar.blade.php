<!--**********************************
            Sidebar start
        ***********************************-->
<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a href="{{ route('dashboard.index') }}" class="ai-icon" aria-expanded="false">
                    <i class="fa fa-home"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            @if (Auth::user()->role == 'admin')
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-database"></i>
                    <span class="nav-text">Catalogue data</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('menus.index') }}">Menus</a></li>
                    <li><a href="{{ route('informations.index') }}">Information</a></li>
                    <li><a href="{{ route('aditionalOffers.index') }}">Aditional Offers</a></li>
                    <li><a href="{{ route('sittingAreas.index') }}">Sitting Areas</a></li>
                    <li><a href="{{ route('questions.index') }}">Questions</a></li>
                </ul>
            </li>
            @endif
            <li>
                <a href="{{ route('books.index') }}" class="ai-icon" aria-expanded="false">
                    <i class="fa fa-calendar"></i>
                    <span class="nav-text">Reservations</span>
                </a>
            </li>
            @if (Auth::user()->role == 'admin')
            <li>
                <a href="{{ route('users.index') }}" class="ai-icon" aria-expanded="false">
                    <i class="fa fa-users"></i>
                    <span class="nav-text">Users</span>
                </a>
            </li>
            @endif
            <li>
                <a href="{{ route('dashboard.profile') }}" class="ai-icon" aria-expanded="false">
                    <i class="fa fa-user"></i>
                    <span class="nav-text">Profile</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!--**********************************
            Sidebar end
        ***********************************-->
