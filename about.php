<?php
if (isset($_POST['simpan'])) {
  $column1 = $_POST['column1'];
  $column2 = $_POST['column2'];

  $simpan = mysqli_query($con, 
  "update about set column1 ='$column1', column2 ='$column2'
   where id_about=1"
  );

  if($simpan) {
    $pesan = "<div class='alert alert-success'>Berhasil diperbaharui</div>";
  } else {
    $pesan = "<div class='alert alert-danger'>Terjadi kesalahan</div>";
  }
}

// ACTION UNTUK NGAMBIL DATA SAAT INI
$query = mysqli_query($con, "SELECT * FROM `about`");
$data = mysqli_fetch_assoc($query);
?>

<div class="row mb-5">
  <div class="col-md-12">
    <h1>Update About</h1>
    <div class="row">
      <div class="col-md-6">
      <?=@$pesan?>
        <form action="" method="post">
          <div class="form-group">
            <label for="">Kolom 1</label>
            <textarea name="column1" id="" cols="30" rows="10"><?=$data['column1']?></textarea>
          </div>
          <div class="form-group">
            <label for="">Kolom 2</label>
            <textarea name="column2" id="" cols="30" rows="10"><?=$data['column2']?></textarea>
          </div>
          <button type="submit" class="btn btn-primary" name="simpan">SIMPAN</button>
        </form>
      </div>
    </div>
  </div>
</div>