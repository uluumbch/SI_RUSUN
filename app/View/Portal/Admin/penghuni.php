    <header class="header">
        <a href="#" class="logo">Portal<span>Rusun</span></a>
        <nav class="navbar-portal">
            <a href="/portal/admin">Pelayanan</a>
            <a href="/portal/admin/home">Rusunku</a>
            <a href="/portal/admin/pemberitahuan">Pemberitahuan</a>
            <a href="/portal/admin/keluhan?date=<?php echo date('Y-m') ?>">Keluhan</a>
            <a href="/portal/admin/logout"> Logout</a>
        </nav>

        <div class="icons">
            <div id="portal-btn" class="fas fa-bars"></div>
        </div>
    </header>

    <section class="table-content">
        <div>
            <h1 class="heading">Daftar Penghuni Rusun</h1>
        </div>

        <div class="table">
            <table>
                <tr>
                    <th>No</th>
                    <th>Kode Rusun</th>
                    <th>Nomor Rusun</th>
                    <th>Lantai</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>

                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="table-btn fit">
                        <div class="btn-center">
                            <a href="portal-admin-edit-penghuni-rusun.html" class="btn-table">Edit</a>
                            <a href="#" class="btn-table">Hapus</a>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

    </section>

    <script src="js/script.js"></script>