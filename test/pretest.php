<?php
if(isset($_GET['id'])){
    $id_kelas = $_GET['id'];
}

$query="SELECT * FROM soal WHERE jenis='pretest' AND id_kelas='$id_kelas'";
$statement = $koneksiDB->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
?>
<div class="container">
<form>
 <?php foreach($result as $x) {?>
 <input type="hidden" name="id_soal[]" id="id_soal[]" value="<?= $x['id_soal']?>" >
 <input type="hidden" name="id_soal[]" id="id_soal[]" value="<?= $x['id_kelas']?>" >
 <input type="hidden" name="id_soal[]" id="id_soal[]" value="<?= $x['kunci']?>" >
 <tr>
    <br>
    <br>
    <td></td>
    <td><?= $x['pertanyaan']?></td>
</tr>
<tr>
    <br>
    <td><input class="form-check-input" type="radio" name="<?= $x['id_soal']?>" <?= $x['id_soal']?>></td>
    <td><?= $x['opsi1']?></td>
</tr>
<tr>
    <br>
    <td><input class="form-check-input" type="radio" name="<?= $x['id_soal']?>" <?= $x['id_soal']?>></td>
    <td><?= $x['opsi2']?></td>
</tr>
<tr>
    <br>
    <td><input class="form-check-input" type="radio" name="<?= $x['id_soal']?>" <?= $x['id_soal']?>></td>
    <td><?= $x['opsi3']?></td>
</tr>
<tr>
    <br>
    <td><input class="form-check-input" type="radio" name="<?= $x['id_soal']?>" <?= $x['id_soal']?>></td>
    <td><?= $x['opsi4']?></td>
</tr>
<tr>
    <td></td>
    <td><?php }; ?></td>
</tr>
<tr>
    <br>
    <br>
    <td></td>
</tr>
<form>
     <td><button type="submit" value="Kirim Jawaban" onclick="return confirm('Yakin Dengan Jawaban Anda?')">Kirim Jawaban</button></td>
 </div>