<?php $this->load->view('layouts/base_start') ?>  

 <!-- Table  -->
<div class="container">
  <legend> Daftar Tutorial User </legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <form class="form-inline" action="<?php echo base_url('user/index') ?>" method="posts">
    <input class="form-control" type="text" name="search" value="" placeholder="Search..">
    <input class="btn btn-default" type="submit" name="filter" value="Go">
  </form>
  <hr>
  <a href="<?php echo base_url('user/create')?>"><button type="button" class="btn btn-warning">
  <span class="glyphicon glyphicon-plus"></span>&nbsp;Create </button></a>
  <?php if (isset($results)) { ?>
  <table class="table table-hover">
    <thead>
      <th>ID User</th>
      <th>Nama User</th>
      <th>Email</th>
      <th>Foto</th>
      <th>Tutorial</th>
      <!--<th>Aksi</th> -->
    </thead>
    <tbody>
      <?php foreach ($results as $key) { ?>
        <tr>
        <td><?php echo $key->idUser; ?></td>
        <td><?php echo $key->namaUser; ?></td>
        <td><?php echo $key->email; ?></td>
        <td><img src="<?php echo base_url('assets/upload/')?><?php echo $key->foto; ?>" width="100"></td>
        <td><?php echo $key->nama; ?></td>
        <td>
          <a href="<?php echo base_url('user/delete/')?><?php echo $key->idUser; ?>">
          <button type="button" class="btn btn-danger">
          <span class="glyphicon glyphicon-trash"></span>&nbsp;Delete </button>
          </a> 
          <a href="<?php echo base_url('user/update/')?><?php echo $key->idUser; ?>">
          <button type="button" class="btn btn-info">
          <span class="glyphicon glyphicon-edit"></span>&nbsp;Update </button>
          </a> 
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