<?php $this->load->view('layouts/base_start') ?> 

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<?php echo form_open('tutorial/update/'.$this->uri->segment(3)); ?>
	<legend>Update Data Tutorial</legend>
	<?php echo validation_errors();?>
	<?php foreach ($tutorial as $key) { ?>
	<div class="form-group">
		<label for="">Nama Tutorial</label>
		<input type="text" name="nama_tutorial" id="nama_tutorial" class="form-control" value="<?php echo $key->namaTutorial; ?>">
	</div>

	<div class="form-group">
		<label for="">Deskripsi</label>
		<input type="text" name="deskripsi" id="deskripsi" class="form-control" value="<?php echo $key->deskripsi; ?>">
	</div>


  <div class="form-group">
    <label for="">Foto</label>
    <input type="file" name="foto_tutorial">
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