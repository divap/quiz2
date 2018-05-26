<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <legend>Daftar Mahasiswa</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
    <table class="table table-striped">
    
      <thead>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>
      <a class="btn btn-primary" href="<?php echo site_url('pegawai/create/') ?>">
            Tambah
          </a>
          </th>
      </thead>

      <tbody>

      <input type="text" class="form-control" placeholder="Cari..." ng-model="filter_data">
      <br><br>
      
      <?php 
		$no = $this->uri->segment('3');
		foreach($user as $u){ 
		?>
		<tr>
      <td><?php echo $no++ ?></td>
			<td><?php echo $u->nama ?></td>
			<td><?php echo $u->alamat ?></td>
	
      <td>
            <?php echo form_open('pegawai/destroy/'.$u->id); ?>
            <a class="btn btn-info" href="<?php echo site_url('pegawai/edit/'.$u->id) ?>">
              Ubah
            </a>
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
            <?php echo form_close() ?>
          </td>
		</tr>
  <?php } ?>
  

      </tbody>
    </table>
    <br/>
	
<nav aria-label="Page navigation">
<ul class="pagination">
  <li>
    <a href="http://localhost/grid7/index.php/pegawai/index/1" aria-label="First">
      <span aria-hidden="true">&laquo;</span>
    </a>
  </li>
  <li><a href="http://localhost/grid7/index.php/pegawai/index/1">1</a></li>
  <li><a href="http://localhost/grid7/index.php/pegawai/index/3">2</a></li>
  <li><a href="http://localhost/grid7/index.php/pegawai/index/5">3</a></li>
  <li><a href="http://localhost/grid7/index.php/pegawai/index/7">4</a></li>
  <li>
    <a href="http://localhost/grid7/index.php/pegawai/index/9" aria-label="Last">
      <span aria-hidden="true">&raquo;</span>
    </a>
  </li>
</ul>
</nav>
	
  </div>
</div>

<?php $this->load->view('layouts/base_end') ?>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
  <script>
   var app=angular.module('app_filter',[]);
   app.controller('ini_controller',function($scope,$http){
    $scope.ini_datanya=[];
    $http.get("<?php echo site_url('angular/data_angularnya');?>").success(function(result){
     $scope.ini_datanya=result;
    });
    
   });
  </script>
  
