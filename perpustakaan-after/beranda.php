<div class="container">
    <div class="row">
        <div class="col-xs-12">

            <div class="alert alert-info">
                <strong>Selamat Datang pembaca SMK Assa'idiyah Kudus</strong>
            </div>
        </div>
    </div>
    <div class="row">
        <!--colomn kedua-->
        <div class="col-sm-9 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Daftar Buku</h3>
                </div>
                <div class="panel-body">
                    <!-- Tambahkan kolom pencarian -->
                    <div class="input-group">
                        <input type="text" id="searchInput" class="form-control text-aqua"
                            placeholder="Mau cari buku apa?" style="border-radius: 10px;">

                    </div>
                    <script>
                        // Fungsi pencarian buku
                        function searchBooks() {
                            var input, filter, table, tr, td, i, txtValue;
                            input = document.getElementById("searchInput");
                            filter = input.value.toUpperCase();
                            table = document.getElementById("deskripsi");
                            tr = table.getElementsByTagName("tr");

                            for (i = 0; i < tr.length; i++) {
                                td = tr[i].getElementsByTagName("td")[1]; // Ganti angka 1 sesuai dengan indeks kolom judul buku
                                if (td) {
                                    txtValue = td.textContent || td.innerText;
                                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                        tr[i].style.display = "";
                                    } else {
                                        tr[i].style.display = "none";
                                    }
                                }
                            }
                            console.log(filter)
                        }

                        // Tangani input dalam kolom pencarian
                        document.getElementById("searchInput").addEventListener("input", searchBooks);
                    </script>
                    <br>

                    <table id="deskripsi" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th width="30%">Judul Buku</th>
                                <th>Nama Pengarang</th>
                                <th>Tahun Terbit</th>
                                <th>Loker Buku</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--ambil data dari database, dan tampilkan kedalam tabel-->
                            <?php
                            //buat sql untuk tampilan data, gunakan kata kunci select
                            $sql = "SELECT * FROM buku";
                            $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
                            //Baca hasil query dari databse, gunakan perulangan untuk
                            //Menampilkan data lebh dari satu. disini akan digunakan
                            //while dan fungdi mysqli_fecth_array
                            //Membuat variabel untuk menampilkan nomor urut
                            $nomor = 0;
                            //Melakukan perulangan u/menampilkan data
                            while ($data = mysqli_fetch_array($query)) {
                                $nomor++; //Penambahan satu untuk nilai var nomor
                                ?>
                                <tr>
                                    <td>
                                        <?= $nomor ?>
                                    </td>
                                    <td>
                                        <?= $data['judul_buku'] ?>
                                    </td>
                                    <td>
                                        <?= $data['nama_pengarang'] ?>
                                    </td>
                                    <td>
                                        <?= $data['tahun_terbit'] ?>
                                    </td>
                                    <td>
                                        <?= $data['loker_buku'] ?>
                                    </td>
                                    <td>
                                        <?= $data['status'] ?>
                                    </td>
                                </tr>
                                <!--Tutup Perulangan data-->
                            <?php } ?>


                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <!--akhir colomn kedua-->
        <div class="col-sm-3 col-xs-12">
            <!--Jika terjadi login error tampilkan pesan ini-->
            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger">Maaf! Login Gagal, Coba Lagi..</div>
            <?php } ?>

            <?php if (isset($_SESSION['username'])) { ?>
                <div class="alert alert-info">
                    <strong>Welcome
                        <?= $_SESSION['nama'] ?>
                    </strong>
                </div>
                <?php
            } else { ?>

                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Masuk Ke Sistem</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="proses_login.php" method="post">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" name="user" class="form-control input-sm" placeholder="Username"
                                        required="" autocomplete="off" />
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="password" name="pwd" class="form-control input-sm" placeholder="Password"
                                        required="" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" name="login" value="login" class="btn btn-success btn-block"><span
                                            class="fa fa-unlock-alt"></span>
                                        Login Sistem
                                    </button>
                                </div>
                        </form>
                    </div>
                </div>

            </div>
        <?php } ?>
    </div>
</div>