<?php
require_once 'config/database.php';

$errors=[];
$kode=$nama=$deskripsi='';
$status='Aktif';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $kode=trim($_POST['kode']);
    $nama=trim($_POST['nama']);
    $deskripsi=trim($_POST['deskripsi']);
    $status=$_POST['status'];

    // VALIDASI
    if(empty($kode) || strlen($kode)<4 || strlen($kode)>10 || strpos($kode,'KAT-')!==0){
        $errors[]="Kode tidak valid";
    }

    if(strlen($nama)<3 || strlen($nama)>50){
        $errors[]="Nama tidak valid";
    }

    if(strlen($deskripsi)>200){
        $errors[]="Deskripsi max 200 karakter";
    }

    // CEK DUPLIKAT
    $cek=$conn->prepare("SELECT id FROM kategori WHERE kode_kategori=?");
    $cek->bind_param("s",$kode);
    $cek->execute();
    if($cek->get_result()->num_rows>0){
        $errors[]="Kode sudah ada";
    }

    if(empty($errors)){
        $stmt=$conn->prepare("INSERT INTO kategori (kode_kategori,nama_kategori,deskripsi,status) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss",$kode,$nama,$deskripsi,$status);
        if($stmt->execute()){
            header("Location: index.php?msg=Berhasil tambah");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

<h3>Tambah Kategori</h3>

<?php foreach($errors as $e): ?>
<div class="alert alert-danger"><?= $e ?></div>
<?php endforeach; ?>

<form method="POST">
<input name="kode" class="form-control mb-2" placeholder="Kode" value="<?= $kode ?>" required>
<input name="nama" class="form-control mb-2" placeholder="Nama" value="<?= $nama ?>" required>
<textarea name="deskripsi" class="form-control mb-2"><?= $deskripsi ?></textarea>

<select name="status" class="form-control mb-2">
<option <?= $status=='Aktif'?'selected':'' ?>>Aktif</option>
<option <?= $status=='Nonaktif'?'selected':'' ?>>Nonaktif</option>
</select>

<button class="btn btn-primary">Simpan</button>
<a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

</div>
</body>
</html>