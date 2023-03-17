<div id="content" class="app-content">
  <h1 class="page-header">DATA TBL_ABSENSI</h1>
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

                  </div>
                </div>
              </div>
              <div class="box-body" style="overflow-x: scroll; ">
                <table id="data-table-default"
                  class="table table-bordered table-hover table-td-valign-middle text-white">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Tanggal</th>
                      <th>Jam</th>
                      <th>Latitude</th>
                      <th>Longitude</th>
                      <th>Foto</th>
                      <th>Ip Address</th>
                      <th>Telat</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody><?php $no = 1;
            foreach ($absensi_data as $absensi)
            {
                ?>
                    <tr>
                      <td><?= $no++?></td>
                      <td><?php echo get_nama_users($absensi->users_id) ?></td>
                      <td><?php echo $absensi->tanggal ?></td>
                      <td><?php echo $absensi->jam ?></td>
                      <td><?php echo $absensi->latitude ?></td>
                      <td><?php echo $absensi->longitude ?></td>
                      <td><a href="<?php echo base_url('assets/assets/img/bukti_absen/' . $absensi->foto) ?>" target="_blank"><img src="<?php echo base_url('assets/assets/img/bukti_absen/' . $absensi->foto) ?>" width="50px" height="50px"></a></td>
                      <td><?php echo $absensi->ip_address ?></td>
                      <td><?php echo $absensi->telat ?></td>
                      <td><?php echo $absensi->status ?></td>
                      <td style="text-align:center" width="200px">
                        <?php
								if(!$absensi->status) { 
									?>
                        <div class="btn-group">
                          <button class="btn btn-success btn-sm btn-approve" data-id="<?= $absensi->id ?>"
                            data-status="approved"><i class="fas fa-check-circle"></i></button>
                          <button class="btn btn-danger btn-sm btn-reject" data-id="<?= $absensi->id ?>"
                            data-status="rejected"><i class="fas fa-times-circle"></i></button>
                        </div>
                        <?php
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

	<script>
$(document).ready(function() {
  $('.btn-approve').click(function() {
    var id = $(this).data('id');
    var status = $(this).data('status');
    Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Anda akan mengubah status absensi menjadi " + status,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, ubah status!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = '<?= base_url('koordinator_lapangan/absensi/update_status/') ?>' + id + '/' + status;
      }
    })
  })

  $('.btn-reject').click(function() {
    var id = $(this).data('id');
    var status = $(this).data('status');
    Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Anda akan mengubah status absensi menjadi " + status + "? Tindakan ini akan menghapus data absensi, mohon beri notifikasi kepada karyawan terkait",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, ubah status!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = '<?= base_url('koordinator_lapangan/absensi/update_status/') ?>' + id + '/' + status;
      }
    })
  })
})
</script>

