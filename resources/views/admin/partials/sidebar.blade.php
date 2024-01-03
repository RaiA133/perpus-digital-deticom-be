<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="/">
                <i class="bi bi-house-door"></i>
                <span>Keluar</span>
            </a>
        </li><!-- End Profile Page Nav -->


        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/user*') ? ' active' : ' collapsed' }}" href="/admin/user">
                <i class="bi bi-people"></i>
                <span>User</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/perpus*') ? ' active' : ' collapsed' }}"
                data-bs-target="#tables-books" data-bs-toggle="collapse" href="#">
                <i class="bi bi-book-half"></i></i><span>Perpustkaan</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-books" class="nav-content collapse " data-bs-parent="#tables-books">
                <li>
                    <a href="/admin/categorybooks/">
                        <i class="bi bi-circle"></i><span>Category</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/perpus">
                        <i class="bi bi-circle"></i><span>Books</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->


        @auth
        @if (in_array(auth()->user()->role_id, [1]))

        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/administrator*') ? ' active' : ' collapsed' }}"
                href="/admin/administrator">
                <i class="bi bi-people"></i>
                <span>Admin</span>
            </a>
        </li><!-- End Profile Page Nav -->

        @endif
        @endauth

        <li>
            <div>
                <a class="dropdown-item d-flex align-items-center" href="/logout">
                    <i class="bi bi-box-arrow-right btn btn-success m-4"><span>Logout</span></i>
                </a>
            </div>
        </li>

    </ul>

</aside><!-- End Sidebar-->
