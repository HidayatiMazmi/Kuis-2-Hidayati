<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <legend>Sewpad</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
    <table class="table table-striped">
      <thead>
        <th>
          <a class="btn btn-primary" href="<?php echo base_url('user') ?>">
            User
          </a>
          <a class="btn btn-primary" href="<?php echo base_url('tutorial') ?>">
            Tutorial
          </a>
        </th>
      </thead>
    </table>
  </div>
</div>

<?php $this->load->view('layouts/base_end') ?>

