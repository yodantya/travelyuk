<div class="list-group">

    <a href="{{ route('admin.dashboard') }}"
        class="list-group-item list-group-item-action 
            {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="bi bi-speedometer2 me-2"></i>
        Dashboard
    </a>

    <a href="{{ route('admin.rute.index') }}"
        class="list-group-item list-group-item-action
            {{ request()->routeIs('admin.rute.*') ? 'active' : '' }}">
        <i class="bi bi-map me-2"></i>
        Manajemen Rute
    </a>

    <a href="{{ route('admin.pesanan') }}"
        class="list-group-item list-group-item-action
            {{ request()->is('admin/adminpesanan*') ? 'active' : '' }}">
        <i class="bi bi-journal-text me-2"></i>
        Manajemen Pesanan
    </a>

    <a href="{{ route('admin.pengguna.index') }}"
        class="list-group-item list-group-item-action
            {{ request()->is('admin/pengguna*') ? 'active' : '' }}">
        <i class="bi bi-people me-2"></i>
        Manajemen Pengguna
    </a>

    <a href="{{ route('admin.laporan') }}"
        class="list-group-item list-group-item-action
            {{ request()->is('admin/laporan*') ? 'active' : '' }}">
        <i class="bi bi-journal-text me-2"></i>
        Laporan Pesanan
    </a>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="list-group-item list-group-item-action text-danger">
            <i class="bi bi-box-arrow-right me-2"></i>
            Logout
        </button>
    </form>

</div>
