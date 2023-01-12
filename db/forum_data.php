<?php
//koneksi ke database
require 'function.php';



$users = query("SELECT * FROM peminjaman");

if (isset($_POST["cari"])) {
    $users = cari ($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style_form_input.css">
    <title>Admin Dashboard</title>
</head>

<body>
    <div class="container">
        <nav class="navbar">
            <div class="nav_icon" onclick="toggleSidebar()">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
            <div class="navbar__left">
                <a href="#">Subscribers</a>
                <a href="#">Video Management</a>
                <a class="active_link" href="#">Admin</a>
            </div>
            <div class="navbar__right">
                <a href="#">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </a>
                <a href="#">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                </a>
                <a href="#">
                    <img width="30" src="assets/avatar2.png" alt="" />
                    <!-- <i class="fa fa-user-circle-o" aria-hidden="true"></i> -->
                </a>
            </div>
        </nav>
        <!-- bagian isi -->
        <div class="table">
            <h1>data Peminjaman</h1>
            <form action="" method="post">
                <a href="forum_input_data.php">Tambah Data mahasiswa</a>

                <input type="text" name="keyword" size="40" autofocus placeholder="masukan keyyword pencarian"
                    autocomplete="off">
                <button type="submit" name="cari">cari!</button>
                <form action="" method="post">
                    <table border="1" cellpadding="10" cellspacing="0"">

                    <tr class=" hieght">
                        <th>no.</th>
                        <th>username </th>
                        <th>Waktu </th>
                        <th>playstasion</th>
                        <th>harga</th>
                        <th>tombol</th>
                        </tr>

                        <?php $i = 1; ?>
                        <?php foreach ($users as $row): ?>
                            <tr>
                                <td>
                                    <?= $i; ?>
                                </td>
                                <td>
                                    <?= $row["username"]; ?>
                                </td>
                                <td>
                                    <?= $row["waktu_peminjaman"]; ?>
                                </td>
                                <td>
                                    <?= $row["ps"]; ?>
                                </td>
                                <td>
                                    <?= $row["harga"]; ?>
                                </td>
                                <td>
                                    <a href="forum_input_data.php?id=<?= $row["id"]; ?>">ubah</a> |
                                    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">hapus</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>

                    </table>
                </form>

        </div>

        <!-- isi selesai -->

        <div id="sidebar">
            <div class="sidebar__title">
                <div class="sidebar__img">
                    <img src="assets/logo.png" alt="logo" />
                    <h1>DevQueen</h1>
                </div>
                <i onclick="closeSidebar()" class="fa fa-times" id="sidebarIcon" aria-hidden="true"></i>
            </div>

            <div class="sidebar__menu">
                <div class="sidebar__link active_menu_link">
                    <i class="fa fa-home"></i>
                    <a href="#">Dashboard</a>
                </div>
                <h2>MNG</h2>
                <div class="sidebar__link">
                    <i class="fa fa-user-secret" aria-hidden="true"></i>
                    <a href="#">Admin Management</a>
                </div>
                <div class="sidebar__link">
                    <i class="fa fa-building-o"></i>
                    <a href="#">Company Management</a>
                </div>
                <div class="sidebar__link">
                    <i class="fa fa-wrench"></i>
                    <a href="#">Employee Management</a>
                </div>
                <div class="sidebar__link">
                    <i class="fa fa-archive"></i>
                    <a href="#">Warehouse</a>
                </div>
                <div class="sidebar__link">
                    <i class="fa fa-handshake-o"></i>
                    <a href="#">Contracts</a>
                </div>
                <h2>LEAVE</h2>
                <div class="sidebar__link">
                    <i class="fa fa-question"></i>
                    <a href="#">Requests</a>
                </div>
                <div class="sidebar__link">
                    <i class="fa fa-sign-out"></i>
                    <a href="#">Leave Policy</a>
                </div>
                <div class="sidebar__link">
                    <i class="fa fa-calendar-check-o"></i>
                    <a href="#">Special Days</a>
                </div>
                <div class="sidebar__link">
                    <i class="fa fa-files-o"></i>
                    <a href="#">Apply for leave</a>
                </div>
                <h2>PAYROLL</h2>
                <div class="sidebar__link">
                    <i class="fa fa-money"></i>
                    <a href="#">Payroll</a>
                </div>
                <div class="sidebar__link">
                    <i class="fa fa-briefcase"></i>
                    <a href="#">Paygrade</a>
                </div>
                <div class="sidebar__logout">
                    <i class="fa fa-power-off"></i>
                    <a href="#">Log out</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script src="js/main.js"></script>
</body>

</html>