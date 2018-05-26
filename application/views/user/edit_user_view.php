<?php $this->load->view('layouts/base_start') ?> 

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<?php echo form_open('user/update/'.$this->uri->segment(3)); ?>
	<legend>Update Data User</legend>
	<?php echo validation_errors();?>
	<?php foreach ($user as $key) { ?>
	<div class="form-group">
		<label for="">Nama</label>
		<input type="text" name="nama" id="nama" class="form-control" 
    value="<?php echo $key->namaUser; ?>">
	</div>

	<div class="form-group">
		<label for="">Email</label>
		<input type="text" name="alamat" id="alamat" class="form-control" 
    value="<?php echo $key->email; ?>">
	</div>

  <div class="form-group">
    <label for="">Password</label>
    <input type="password" name="alamat" id="alamat" class="form-control" 
    value="<?php echo $key->password; ?>">
  </div>

  <div class="form-group">
    <label for="">Foto</label>
    <input type="file" name="foto" 
    value="<?php echo $key->foto; ?>">
  </div>

  <?php } ?>

<!--	<div class="form-group">
		<label for="">Tanggal Lahir</label>
		<input type="date" name="ttl" id="ttl" class="form-control" placeholder="Input field">
	</div> -->

	<button type="submit" class="btn btn-primary">Submit</button>
<?php echo form_close();?>
</div>

<?php $this->load->view('layouts/base_end') ?>