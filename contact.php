<?php
// REMOVE MESSAGE
if(@$_GET['hapus']) {
  $id = $_GET['hapus'];
  $delete = mysqli_query($con, 
  "delete from contact where id_k=$id");
 
  if($delete) $pesan = "<div class='alert alert-success'>Pesan telah dihapus!</div>";
}
?>
<div class="row">
  <div class="col-md-12">
    <h1>contact</h1>
    <?=@$pesan?>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th width="5%">NO.</th>
            <th>Name</th>
            <th>Message</th>
            <th>Email</th>
            <th>ACTION</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $q = mysqli_query($con, "select * from contact");
        $count = mysqli_num_rows($q);
        if($count > 0) {
          $i = 0;
          while($data=mysqli_fetch_array($q)) { $i++?>
            <tr>
              <td><?=$i?>.</td>
              <td><?=$data['nama_k']?></td>
              <td><?=$data['pesan']?></td>
              <td><?=$data['email']?></td>
              <td>
              <a onclick="hapus(<?=$data['id_k']?>)" class="btn btn-danger">hapus</a>
              </td>
          <?php } // end.loop
        } // end.if.ada data 
        else { ?>
          <tr>
            <td colspan="4" class="text-center"><em>Tidak ada pesan</em></td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
  function hapus(id) {
    let h = confirm('hapus projek ini?');
    if(h) {
      location.href = "?menu=contact&hapus="+id;
    }
  }
</script>