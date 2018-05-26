<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <legend>Lihat Mahasiswa</legend>
  <div class="content">
    <div class="form-group">
      <label for="nama">Nama</label>
      <p><?php echo $data->nama ?></p>
    </div>
    <div class="form-group">
      <label for="alamat">Alamat</label>
      <p><?php echo $data->alamat ?></p>
    </div>
    <a class="btn btn-info" href="<?php echo site_url('pegawai/') ?>">Kembali</a>
  </div>
</div>

<?php $this->load->view('layouts/base_end') ?>