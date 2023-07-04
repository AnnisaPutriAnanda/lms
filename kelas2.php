<?php
include 'panggil.php';
?>
<div class="checkbox">
<form method="GET">
<!--  -->
<?php
$query1 = "SELECT * FROM kategori_kelas";
$kategori = $koneksiDB->prepare($query1);
$kategori->execute();
$result1 = $kategori->fetchAll(PDO::FETCH_ASSOC);
foreach ($result1 as $x) {
?>
<input type="checkbox" id="id_kategori[]" name="id_kategori[]" value="<?= $x['id_kategori_kelas']?>"
<?php echo isset($_GET['id_kategori']) && in_array('?', $_GET['id_kategori']) ? 'checked' : '';?>>
<label><?= $x['nama_kategori'] ?></label>
<?php }; ?>
<!--  -->
<?php
$query2 = "SELECT * FROM level_kelas";
$level = $koneksiDB->prepare($query2);
$level->execute();
$result2 = $level->fetchAll(PDO::FETCH_ASSOC);
foreach ($result2 as $y) {
?>
<input type="checkbox" id="id_level[]" name="id_level[]" value="<?= $y['id_level_kelas']?>"
<?php echo isset($_GET['id_level']) && in_array('?', $_GET['id_level']) ? 'checked' : '';?>>
<label><?= $y['nama_level'] ?></label>
<?php }; ?>
<!--  -->
<?php
$query3 = "SELECT * FROM tipe_kelas";
$tipe = $koneksiDB->prepare($query3);
$tipe->execute();
$result3 = $tipe->fetchAll(PDO::FETCH_ASSOC);
foreach ($result3 as $z) {
?>
<input type="checkbox" id="id_tipe[]" name="id_tipe[]" value="<?= $z['id_tipe_kelas']?>"
<?php echo isset($_GET['id_tipe']) && in_array('?', $_GET['id_tipe']) ? 'checked' : '';?>>
<label><?= $z['nama_tipe'] ?></label>
<?php }; ?>
<!--  -->
<button type="submit">Filter</button>
<!--  -->
</form>
</div>

<?php echo '<div hidden>'; print_r($_GET); echo '</div>'; ?>
<table border=1>
<thead>
<td>id</td>
<td>Kategori</td>
<td>Level</td>
<td>Tipe</td>
<td>Alur</td>
<td>Nama</td>
<td>Harga</td>
<td colspan=2>Aksi</td>
</thead>
<tbody>
    <?php
    if(!empty($_GET)){
    $sql ="SELECT * FROM kelas AS a INNER JOIN kategori_kelas AS b ON a.id_kategori=b.id_kategori_kelas INNER JOIN level_kelas AS c ON a.id_level=c.id_level_kelas INNER JOIN tipe_kelas AS d ON a.id_tipe=d.id_tipe_kelas INNER JOIN alur_belajar AS e ON a.id_alur=e.id_alur WHERE 1 ";
    $filter= array();
    $bindParam = array();
    $bindParam2 = array();
    $bindParam3 = array();

    if(isset($_GET['id_kategori'])){
        
        foreach ($_GET['id_kategori'] as $index => $id_kategori) {
            $bindParam[] = ":id_kategori".$index;
            $filter[":id_kategori".$index] = $id_kategori;

        }; 
        $sql .= " AND  a.id_kategori IN (".implode(",", $bindParam).") "; 
    }


    if(isset($_GET['id_level'])){

        foreach ($_GET['id_level'] as $index2 => $id_level) {
            $bindParam2[] = ":id_level".$index2;
            $filter[":id_level".$index2] = $id_level;
        }; 
        $sql .= " AND  a.id_level IN (".implode(",", $bindParam2).") ";
    }

    if(isset($_GET['id_tipe'])){

        foreach ($_GET['id_tipe'] as $index3 => $id_tipe) {
            $bindParam3[] = ":id_tipe".$index3;
            $filter[":id_tipe".$index3] = $id_tipe;
        }; 
        $sql .= " AND  a.id_tipe IN (".implode(",", $bindParam3).") ";
    }
        echo '<div hidden>';
        echo '<br>';
        print_r($filter);
        echo '<br>';
        echo $sql;
        echo '<br>';
        print_r($bindParam);
        echo '<br>';
        print_r($bindParam2);
        echo '<br>';
        print_r($bindParam3);
        echo '</div>';
        
        $query = $koneksiDB->prepare($sql);
        $query->execute($filter);
    
        while ($result = $query->fetch()) {
            echo '<tr>';
            echo '<td>'.htmlentities($result['id_kelas']).'</td>';
            echo '<td>'.htmlentities($result['nama_kategori']).'</td>';
            echo '<td>'.htmlentities($result['nama_level']).'</td>';
            echo '<td>'.htmlentities($result['nama_tipe']).'</td>';
            echo '<td>'.htmlentities($result['nama_alur']).'</td>';
            echo '<td>'.htmlentities($result['nama_kelas']).'</td>';
            echo '<td>'.htmlentities($result['harga_kelas']).'</td>';
            echo '<td> <button class>Daftar Kelas</button></td>';
            echo '<td> <button class>Ikuti Pretest</button></td>';
            echo '</tr>';
        }

}
else {
    $sql="SELECT * FROM kelas AS a INNER JOIN kategori_kelas AS b ON a.id_kategori=b.id_kategori_kelas INNER JOIN level_kelas AS c ON a.id_level=c.id_level_kelas INNER JOIN tipe_kelas AS d ON a.id_tipe=d.id_tipe_kelas INNER JOIN alur_belajar AS e ON a.id_alur=e.id_alur";
    $query = $koneksiDB->prepare($sql);
    $query->execute();
    while ($result = $query->fetch()) {
        echo '<tr>';
        echo '<td>'.htmlentities($result['id_kelas']).'</td>';
        echo '<td>'.htmlentities($result['nama_kategori']).'</td>';
        echo '<td>'.htmlentities($result['nama_level']).'</td>';
        echo '<td>'.htmlentities($result['nama_tipe']).'</td>';
        echo '<td>'.htmlentities($result['nama_alur']).'</td>';
        echo '<td>'.htmlentities($result['nama_kelas']).'</td>';
        echo '<td>'.htmlentities($result['harga_kelas']).'</td>';
        echo '<td> <button class>Daftar Kelas</button></td>';
        echo '<td> <button class>Ikuti Pretest</button></td>';
        echo '</tr>';
    }
} echo '</table>';
