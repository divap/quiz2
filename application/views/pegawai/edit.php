<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <legend>Edit Data Mahasiswa</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open_multipart('pegawai/update/'.$data->id); ?>

    <?php echo form_hidden('id', $data->id) ?>
    <div class="form-group">
      <label for="Nama">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama"
        value="<?php echo $data->nama ?>">
    </div>

  	<div class="form-group">
      <label for="Jabatan">Jurusan</label>
      <select class="form-control" id="jabatan" name="jabatan">
      
      <?php
        foreach($datajab as $rowjab) {
          $s='';
            if($data->kode == $rowjab->kode)
            { $s='selected'; }
      ?>
        <option value="<?php echo $rowjab->kode ?>" <?php echo $s ?>>
          <?php echo $rowjab->nama ?>
        </option>
      <?php } ?>
      
      </select>
    </div>

    <?php echo $error;?>

    <a class="btn btn-info" href="<?php echo site_url('pegawai/') ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">OK</button>

  <?php echo form_close(); ?>
  </div>
</div>

<?php $this->load->view('layouts/base_end') ?>