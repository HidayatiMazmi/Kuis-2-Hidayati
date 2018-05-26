<?php $this->load->view('layouts/base_start') ?>
 <!-- Table  -->
<div class="container">
  <h2> Daftar Tutorial </h2>
  <hr>
  <a href="<?php echo base_url('tutorial/create')?>">
  <button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-plus"></span>&nbsp;Create </button></a>
  <?php if (isset($results)) { ?>
  <table class="table table-hover">
    <thead>
      <th>ID Tutorial</th>
      <th>Nama tutorial</th>
      <th>Email</th>
      <th>Foto</th>
      <!--<th>Aksi</th> -->
    </thead>
    <tbody>
      <?php foreach ($result as $key) { ?>
        <tr>
        <td><?php echo $key->id; ?></td>
        <td><?php echo $key->nama_tutorial; ?></td>
        <td><?php echo $key->deskripsi; ?></td>
        <td><?php echo $key->idUser; ?></td>
        <td><img src="<?php echo base_url('assets/upload/')?><?php echo $key->foto_tutorial; ?>" width="100"></td>

        <td><a href="<?php echo base_url('tutorial/delete/')?><?php echo $key->id; ?>">
        <button type="button" class="btn btn-danger">
        <span class="glyphicon glyphicon-trash"></span>&nbsp;Delete 
        </button></a> 
        <a href="<?php echo base_url('tutorial/update/')?><?php echo $key->id; ?>">
        <button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit">
        </span>&nbsp;Update </button></a> 
        </td>

        </tr>
      <?php } ?>
    </tbody>
  </table>
  <?php echo $links ?>
  <?php } else { ?>
  <div>Tidak ada data</div>
  <?php } ?>
  
</div>

<?php $this->load->view('layouts/base_end') ?>
