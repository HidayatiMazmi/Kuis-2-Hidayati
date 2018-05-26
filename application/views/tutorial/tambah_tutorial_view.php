<?php $this->load->view('layouts/base_start') ?>  

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<?php echo form_open_multipart('tutorial/create'); ?>
	<legend>Tambah Data tutorial</legend>


	<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
  </button>
   <?php echo validation_errors(); ?>
</div> 
	<div class="form-group">
		<label for="">Nama Tutorial</label>
		<input type="text" name="nama_tutorial" id="nama_tutorial" class="form-control" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">Deskripsi</label>
		<input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Input field">
	</div>

  <div class="form-group">
    <label for="">Foto</label>
    <input type="file" name="foto">
  </div>

  <div class="form-group">
		<label for="">Nama User</label>
		<input type="text" name="namaUser" id="namaUser" class="form-control" placeholder="Input field">
	</div>

	<button type="submit" class="btn btn-primary">Submit</button>
<?php echo form_close();?>
</div>

<?php $this->load->view('layouts/base_end') ?>
