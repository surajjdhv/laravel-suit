<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
	<div class="c-sidebar-brand d-lg-down-none">
		<svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
			<use xlink:href="{{ asset('icons/coreui.svg#full') }}"></use>
		</svg>
		<svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
			<use xlink:href="{{ asset('icons/coreui.svg#signet') }}"></use>
		</svg>
	</div>
	<ul class="c-sidebar-nav">
		<li class="c-sidebar-nav-item">
			<a class="c-sidebar-nav-link" href="{{ route('index') }}">
				<svg class="c-sidebar-nav-icon">
					<use xlink:href="{{ asset('icons/free.svg#cil-speedometer') }}"></use>
				</svg>
				Dashboard
			</a>
        </li>
        <li class="c-sidebar-nav-title">Components</li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('icons/free.svg#cil-user') }}"></use>
                </svg>
                Access
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('user.index') }}">
                    <span class="c-sidebar-nav-icon"></span>
                    User Management
                    </a>
                </li>
            </ul>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="base/breadcrumb.html">
                    <span class="c-sidebar-nav-icon"></span>
                    Role Management
                    </a>
                </li>
            </ul>
        </li>
	</ul>
	<button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>
