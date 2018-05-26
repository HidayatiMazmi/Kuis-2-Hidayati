<?php $this->load->view('layouts/base_start') ?> 

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<?php echo form_open_multipart('user/create'); ?>
	<legend>Tambah Data User</legend>
  
	<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
  </button>
   <?php echo validation_errors(); ?>
</div> 
	<div class="form-group">
		<label for="">Nama</label>
		<input type="text" name="nama" id="nama" class="form-control" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">Email</label>
		<input type="text" name="email" id="email" class="form-control" placeholder="Input field">
	</div>

  <div class="form-group">
    <label for="">Password</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="Input field">
  </div>

  <div class="form-group">
    <label for="">Foto</label>
    <input type="file" name="foto">
  </div>

	<button type="submit" class="btn btn-primary">Submit</button>
<?php echo form_close();?>
</div>

<?php $this->load->view('layouts/base_end') ?>
