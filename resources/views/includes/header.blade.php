<header class="c-header c-header-light c-header-fixed c-header-with-subheader">
    <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
        <svg class="c-icon c-icon-lg">
            <use xlink:href="{{ asset('icons/free.svg#cil-menu') }}"></use>
        </svg>
    </button>
    <a class="c-header-brand d-lg-none" href="#">
        <svg width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="assets/brand/coreui.svg#full"></use>
        </svg>
    </a>
    <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
        <svg class="c-icon c-icon-lg">
            <use xlink:href="{{ asset('icons/free.svg#cil-menu') }}"></use>
        </svg>
    </button>
    <ul class="c-header-nav ml-auto mr-4">
        <li class="c-header-nav-item dropdown">
            <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <div class="c-avatar"><img class="c-avatar-img" src="{{ sprintf('https://ui-avatars.com/api/?name=%s&color=7F9CF5&background=EBF4FF', urlencode(auth()->user()->name)) }}" alt="user@email.com"></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right pt-0">
                <a class="dropdown-item" href="#">
                    <svg class="c-icon mr-2">
                        <use xlink:href="{{ asset('icons/free.svg#cil-user') }}"></use>
                    </svg>
                    Profile
                </a>
                <a class="dropdown-item" href="#">
                    <svg class="c-icon mr-2">
                        <use xlink:href="{{ asset('icons/free.svg#cil-settings') }}"></use>
                    </svg>
                    Settings
                </a>
                <a
                    class="dropdown-item"
                    href="#"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                >
                    <svg class="c-icon mr-2">
                        <use xlink:href="{{ asset('icons/free.svg#cil-account-logout') }}"></use>
                    </svg>
                    Logout
                    <x-form.post :action="route('logout')" id="logout-form" class="d-none" />
                </a>
            </div>
        </li>
    </ul>
    <div class="c-subheader justify-content-between px-3">
        @php dd(Breadcrumbs::has()) @endphp
        @if (Breadcrumbs::has())
            <ol class="breadcrumb border-0 m-0">
                @foreach (Breadcrumbs::current() as $crumb)
                    @if ($crumb->url() && !$loop->last)
                        <li class="breadcrumb-item">
                            <x-utils.link :href="$crumb->url()" :text="$crumb->title()" />
                        </li>
                    @else
                        <li class="breadcrumb-item active">
                            {{ $crumb->title() }}
                        </li>
                    @endif
                @endforeach
            </ol>
        @endif

        <div class="c-subheader-nav mfe-2">
            @yield('breadcrumb-links')
        </div>
    </div>
</header>
