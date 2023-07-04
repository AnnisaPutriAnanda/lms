<?php
if (isset($_GET['cari'])){
    $pencarian = $_GET['cari'];
    $query = "SELECT * FROM kelas AS a INNER JOIN kategori_kelas AS b ON a.id_kategori=b.id_kategori_kelas INNER JOIN level_kelas AS c ON a.id_level=c.id_level_kelas INNER JOIN tipe_kelas AS d ON a.id_tipe=d.id_tipe_kelas INNER JOIN alur_belajar AS e ON a.id_alur=e.id_alur WHERE id_kategori LIKE '%".$pencarian."%'";
} else{
    $query="SELECT * FROM kelas AS a INNER JOIN kategori_kelas AS b ON a.id_kategori=b.id_kategori_kelas INNER JOIN level_kelas AS c ON a.id_level=c.id_level_kelas INNER JOIN tipe_kelas AS d ON a.id_tipe=d.id_tipe_kelas INNER JOIN alur_belajar AS e ON a.id_alur=e.id_alur";
}
$statement = $koneksiDB->prepare($query);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<html>
    <table class="table table-striped table-bordered">
        <thead>
            <td style="display:none">id</td>
           <td>Kategori</td>
           <td>Level</td>
           <td>Tipe</td>
           <td style="display:none">Alur</td>
           <td>Nama</td>
           <td>Harga</td>
           <td colspan="2">Kelas</td>
        </thead>
        <?php foreach ($result as $x) { ?>
        <tbody>
           <td style="display:none"><?= $x['id_kelas']?></td>
           <td><?= $x['nama_kategori']?></td>
           <td><?= $x['nama_level']?></td>
           <td><?= $x['nama_tipe']?></td>
           <td style="display:none"><?= $x['nama_alur']?></td>
           <td><?= $x['nama_kelas']?></td>
           <td><?= $x['harga_kelas']?></td>
           <td><p class="btn btn-secondary">Daftar kelas</p></td>
            <td><a class="btn btn-secondary" href="index.php?page=pretest">Ikuti Pra-test</a></td>
        </tbody>
        <?php };?>
    </table>
</html>