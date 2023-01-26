<div id="content" class="app-content">
  <h1 class="page-header">DATA TBL_KARYAWAN</h1>
  <div class="panel panel-inverse">
    <div class="panel-heading">
      <h4 class="panel-title"></h4>
      <div class="panel-heading-btn">
        <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i
            class="fa fa-expand"></i></a>
        <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i
            class="fa fa-redo"></i></a>
        <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i
            class="fa fa-minus"></i></a>
        <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i
            class="fa fa-times"></i></a>
      </div>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="box-body">
              <div class='row'>
                <div class='col-md-9'>
                  <div style="padding-bottom: 10px;">
                    <?php echo anchor(site_url('karyawan/create'), '<i class="fas fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm tambah_data"'); ?>
                    <?php echo anchor(site_url('karyawan/excel'), '<i class="far fa-file-excel" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm export_data"'); ?>
                  </div>
                </div>
              </div>
              <div class="box-body" style="overflow-x: scroll; ">
                <table id="data-table-default"
                  class="table table-bordered table-hover table-td-valign-middle text-white">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Id User</th>
                      <th>Nama Lengkap</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat</th>
                      <th>Nik</th>
                      <th>Email</th>
                      <th>No Telp</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody><?php $no = 1;
            foreach ($karyawan_data as $karyawan)
            {
                ?>
                    <tr>
                      <td><?= $no++?></td>
                      <td><?php echo $karyawan->id_user ?></td>
                      <td><?php echo $karyawan->nama_lengkap ?></td>
                      <td><?php echo $karyawan->jenis_kelamin ?></td>
                      <td><?php echo $karyawan->alamat ?></td>
                      <td><?php echo $karyawan->nik ?></td>
                      <td><?php echo $karyawan->email ?></td>
                      <td><?php echo $karyawan->no_telp ?></td>
                      <td style="text-align:center" width="200px">
                        <?php 
				echo anchor(site_url('karyawan/update/'.encrypt_url($karyawan->id)),'<i class="fas fa-pencil-alt" aria-hidden="true"></i>','class="btn btn-primary btn-sm update_data"'); 
				echo '  ';
				if($karyawan->status == 1) {
					echo anchor(site_url('karyawan/changeStatus/'.encrypt_url($karyawan->id)),'<i class="fas fa-user-slash" aria-hidden="true"></i>','class="btn btn-danger btn-sm delete_data" Delete','onclick="javasciprt: return confirm(\'Anda yakin?\')"'); 
				} else {
					echo anchor(site_url('karyawan/changeStatus/'.encrypt_url($karyawan->id)),'<i class="fas fa-user-check" aria-hidden="true"></i>','class="btn btn-success btn-sm delete_data" Delete','onclick="javasciprt: return confirm(\'Anda yakin?\')"');
				}
				?>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
