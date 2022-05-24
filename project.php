<?php
if (@$_GET['hapus']) {
  $id = $_GET['hapus'];
  $q = mysqli_query($con, "DELETE FROM `project` WHERE `project`.`id_p` =$id");
  
}
?>

<div class="row">
  <div class="col-md-12">
    <h1>
      Project
      <a href="?menu=tambah-project" class="btn btn-primary">Tambah</a>
    </h1>
    <table class="table table-striped" id="">
      <thead>
        <tr>
          <th width="5%">#</th>
          <th width="15%">FOTO</th>
          <th>NAMA</th>
          <th>KETERANGAN</th>
          <th width="20%">AKSI</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $q = mysqli_query($con, "select * from project");
        while($data = mysqli_fetch_array($q)) {?>
        <tr>
          <td><?=$data[0]?></td>
          <td><img src="../foto/<?=$data[3]?>" width="130px"></td>
          <td><?=$data[1]?></td>
          <td><?=$data['ket']?></td>
          <td>
            <a href="?menu=ubah-project&id=<?=$data['id_p']?>" class="btn btn-primary">Ubah</a>
            <a onclick="hapus(<?=$data[0]?>)" class="btn btn-danger">Hapus</a>
          </td>
        </tr>
        
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<script>
  function hapus(id) {
    if (confirm('YAKIN HAPUS DATA INI?')) {
      location.href = "?menu=project&hapus=" + id;
    }
  }
</script>