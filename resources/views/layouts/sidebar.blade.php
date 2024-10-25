    <!-- Menu -->
    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
                <span class="app-brand-logo demo">
                    <img src="{{ asset('assets/img/logo/download.jpeg') }}" width="50px" height="50px"
                        alt="Book Series Logo">
                </span>
                <span class="app-brand-text demo menu-text fw-bold ms-2">Book series</span>
            </a>
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle"></i>
                <i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>
            </a>
        </div>
        <div class="menu-divider mt-0"></div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
            <!-- Dashboards -->
            <li class="menu-item active open">
                <a href="/index" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Dashboard">Dashboard</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div data-i18n="CONTENT">CONTENT</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ url('books') }}" class="menu-link">
                            <div data-i18n="Books">Books</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('index') }}" class="menu-link">
                            <div data-i18n="Tests">Tests</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('index') }}" class="menu-link">
                            <div data-i18n="Authors">Authors</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('index') }}" class="menu-link">
                            <div data-i18n="Users">Users</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('index') }}" class="menu-link">
                            <div data-i18n="Comments">Comments</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-check-shield"></i>
                    <div data-i18n="Roles & Permissions">Roles & Permissions</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="#" class="menu-link">
                            <div data-i18n="Roles">Roles</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="app-access-permission.html" class="menu-link">
                            <div data-i18n="Permission">Permission</div>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
    <!-- / Menu -->
