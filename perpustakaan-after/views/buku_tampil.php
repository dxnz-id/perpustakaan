<?php
if (!isset($_SESSION['idsesi'])) {
    echo "<script> window.location.assign('../index.php'); </script>";
}
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-user-plus"></span> Data Buku</h3>
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
                                <th>Judul Buku</th>
                                <th>Nama Pengarang</th>
                                <th>Loker Buku</th>
                                <th>Tahun Terbit</th>
                                <th>Status</th>
                                <th>ACTIONS</th>
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
                                        <?= $data['loker_buku'] ?>
                                    </td>
                                    <td>
                                        <?= $data['tahun_terbit'] ?>
                                    </td>
                                    <td>
                                        <?= $data['status'] ?>
                                    </td>
                                    <td>
                                        <a href="?page=buku&actions=detail&id=<?= $data['id'] ?>"
                                            class="btn btn-info btn-xs">
                                            <span class="fa fa-eye"></span>
                                        </a>
                                        <a href="?page=buku&actions=edit&id=<?= $data['id'] ?>"
                                            class="btn btn-warning btn-xs">
                                            <span class="fa fa-edit"></span>
                                        </a>
                                        <a href="?page=peminjaman&actions=tambah&judulbuku=<?= $data['judul_buku'] ?>"
                                            class="btn btn-info btn-xs">
                                            <span class="fa fa-arrow-right"></span>
                                        </a>
                                        <a href="?page=buku&actions=delete&id=<?= $data['id'] ?>"
                                            class="btn btn-danger btn-xs">
                                            <span class="fa fa-remove"></span>
                                        </a>
                                    </td>
                                </tr>
                                <!--Tutup Perulangan data-->
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    <a href="?page=buku&actions=tambah" class="btn btn-info btn-sm">
                                        Tambah Data Buku

                                    </a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>