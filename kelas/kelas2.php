<?php
include 'panggil.php';
?>
<br>
<nav class = "navbar navbar-expand-sm bg-light">  
<div class="checkbox">
<form method="GET">
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
<a href=><button class="btn btn-secondary" type="submit">Filter</button></a>
<!--  -->
</form>
</div>
</nav>
<br>
<?php echo '<div hidden>'; print_r($_GET); echo '</div>'; ?>
<html>
    <table class="table table-striped table-bordered" border=1>
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
            echo '<tbody>';
            echo '<td style="display:none">'.htmlentities($result['id_kelas']).'</td>';
            echo '<td>'.htmlentities($result['nama_kategori']).'</td>';
            echo '<td>'.htmlentities($result['nama_level']).'</td>';
            echo '<td>'.htmlentities($result['nama_tipe']).'</td>';
            echo '<td style="display:none">'.htmlentities($result['nama_alur']).'</td>';
            echo '<td>'.htmlentities($result['nama_kelas']).'</td>';
            echo '<td>'.htmlentities($result['harga_kelas']).'</td>';
            echo '<td><p class="btn btn-secondary">Daftar kelas</p></td>'; ?>
            <td><a class="btn btn-secondary" href="index.php?page=pretest&id=<?= $result['id_kelas']?>">Ikuti Pra-test</a></td> <?php
        }

}

elseif(isset($_GET['cari'])){
  $cari = $_GET['cari'];
  echo $cari;


}
else{
    $sql="SELECT * FROM kelas AS a INNER JOIN kategori_kelas AS b ON a.id_kategori=b.id_kategori_kelas INNER JOIN level_kelas AS c ON a.id_level=c.id_level_kelas INNER JOIN tipe_kelas AS d ON a.id_tipe=d.id_tipe_kelas INNER JOIN alur_belajar AS e ON a.id_alur=e.id_alur";
    $query = $koneksiDB->prepare($sql);
    $query->execute();
    while ($result = $query->fetch()) { ?>
         <tbody>
         <tr>
         <td style="display:none"><?= $result['id_kelas']?></td>
         <td><?= $result['nama_kategori']?></td>
         <td><?= $result['nama_level']?></td>
         <td><?= $result['nama_tipe']?></td>
         <td style="display:none"><?= $result['nama_alur']?></td>
         <td><?= $result['nama_kelas']?></td>
         <td><?= $result['harga_kelas']?></td>
         <td><p class="btn btn-secondary">Daftar kelas</p></td>
         <td><a class="btn btn-secondary" href="index.php?page=pretest&id=<?= $result['id_kelas']?>">Ikuti Pra-test</a></td>
         </tr>
 <?php   }
} echo ' </tbody></table></html>';
?>
