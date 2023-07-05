<?php
include 'panggil.php';

?>
<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
<!--Sidebar Index-->
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <form>
                    <li class="nav-item">
                        <a href="index.php?page=kelas&" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline"><button class="btn btn-secondary" type="submit">Filter</button></span>
                        </a>
                    </li>
                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline"><a href="index.php?page=kelas">Semua Kelas</a></span> </a>
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <?php
                             $query = "SELECT * FROM kategori_kelas";
                             $kategori = $koneksiDB->prepare($query);
                             $kategori->execute();
                             $result = $kategori->fetchAll(PDO::FETCH_ASSOC);
                             foreach ($result as $x) {
                             ?>
                            <li class="w-100">
                                <a href="index.php?page=kelas" class="nav-link px-0"> <span class="d-none d-sm-inline"><input type="checkbox" id="id_kategori[]" name="id_kategori[]" value="<?= $x['id_kategori_kelas']?>" <?php echo isset($_GET['id_kategori']) && in_array('?', $_GET['id_kategori']) ? 'checked' : '';?>/>
                                <label><?= $x['nama_kategori'] ?></label>
                            </span></a>
                            </li>
                            <?php }; ?>
                        </ul>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">loser</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                             </form>
                    </ul>
                </div>
            </div>
        </div>
        <!--Tutup Sidebar-->
        <div class="container-fluid">
        <div class="page-container">
    <div class="content-wrap">
        <div class="row">
            <div class="col-10">
                <?php
                     if(isset($_GET['page'])){
                        $page = $_GET['page'];
                    }
                    if(empty($page)){
                        include 'kelas/kelas2.php';
                    }
                    elseif(isset($page)){
                        switch ($page){
                            case 'kelas':
                                include 'kelas/kelas2.php';
                                break;
                            case 'pretest';
                                include_once 'test/pretest.php';
                                break;
                            case 'daftar';
                                include_once 'kelas/daftarkelas.php';
                                break;
                        }
                    }
                ?>
            </div> 
            <div class="col-9">
                <!--Footer--->
            </div> 
        </div>
    </div>
</div>
    </div>
</div>
                </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>