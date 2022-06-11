<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-book-open"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Perpustakaan</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url() ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#menu-buku"
            aria-expanded="true" aria-controls="menu-buku">
            <i class="fas fa-fw fa-book"></i>
            <span>Buku</span>
        </a>
        <div id="menu-buku" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo base_url().'/Buku' ?>">List Buku</a>
                <?php if (session()->dataUser->jabatan_petugas == 'Admin') { ?>
                    <a class="collapse-item" href="<?php echo base_url().'/Buku/Tambah' ?>">Tambah Buku</a>
                <?php } ?>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#menu-user"
            aria-expanded="true" aria-controls="menu-user">
            <i class="fas fa-fw fa-user"></i>
            <span>User</span>
        </a>
        <div id="menu-user" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo base_url().'/User' ?>">List User</a>
                <?php if (session()->dataUser->jabatan_petugas == 'Admin') { ?>
                    <a class="collapse-item" href="<?php echo base_url().'/User/Tambah' ?>">Tambah User</a>
                <?php } ?>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#menu-anggota"
            aria-expanded="true" aria-controls="menu-anggota">
            <i class="fas fa-fw fa-user"></i>
            <span>Anggota</span>
        </a>
        <div id="menu-anggota" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo base_url().'/Anggota' ?>">List Anggota</a>
                <?php if (session()->dataUser->jabatan_petugas == 'Admin') { ?>
                    <a class="collapse-item" href="<?php echo base_url().'/Anggota/Tambah' ?>">Tambah Anggota</a>
                <?php } ?>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#menu-pinjaman-buku"
            aria-expanded="true" aria-controls="menu-pinjaman-buku">
            <i class="fas fa-fw fa-book-reader"></i>
            <span>Peminjaman Buku</span>
        </a>
        <div id="menu-pinjaman-buku" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo base_url().'/PeminjamanBuku' ?>">List Peminjaman</a>
                <a class="collapse-item" href="<?php echo base_url().'/PeminjamanBuku/Pinjam' ?>">Peminjaman Buku</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url().'/Pengembalian' ?>">
        <i class="fas fa-fw fa-dollar-sign"></i>
        <span>Pengembalian Buku</span></a>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url().'/CurriculumVitae' ?>">
        <span>Curriculum Vitae</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->