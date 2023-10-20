<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">

    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="?page=utama">Perpustakaan SMK Assa'idiyah Kudus</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">

                <?php
                function setActiveClass($url, $currentURL)
                {
                    return $url === $currentURL ? 'active' : '';
                }

                // Mendapatkan URL saat ini
                $currentURL = $_SERVER['REQUEST_URI'];
                ?>

                <li class="<?php echo setActiveClass('/', $currentURL); ?>"><a href="/">Home</a></li>

                <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 1) { ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Master Data <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="?page=buku&actions=tampil">Daftar Buku</a></li>
                            <li><a href="?page=peminjaman&actions=tampil">Peminjaman</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Reports <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="?page=buku&actions=report">Laporan Daftar Buku</a></li>
                            <li><a href="?page=peminjaman&actions=report">Laporan Pinjaman</a></li>
                        </ul>
                    </li>
                    <li class="<?php echo setActiveClass('/?page=user&actions=tampil', $currentURL); ?>"><a
                            href="?page=user&actions=tampil">User</a></li>


                <?php } ?>


                <li class="<?php echo setActiveClass('/?page=about&actions=tampil', $currentURL); ?>"><a
                        href="?page=about&actions=tampil">About</a></li>
                <li class="<?php echo setActiveClass('/?page=kontak&actions=tampil', $currentURL); ?>"><a
                        href="?page=kontak&actions=tampil">Contact</a></li>

                <?php if (isset($_SESSION['username'])) { ?>
                    <li><button class="btn" onclick="window.location.href = 'logout.php'"
                            style="width: 15vh;background-color: transparent; border: 2px solid white; font-weight: bold;margin-left: 2vh;border-radius: 10px;">Logout</button>
                    </li>
                <?php } ?>

            </ul>
        </div>
    </div>
</nav>