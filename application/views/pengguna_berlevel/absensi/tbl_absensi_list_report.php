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
                <table id="data-table-cool"
                  class="table table-bordered table-hover table-td-valign-middle text-white">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Users Id</th>
					  <th>Nama Karyawan</th>
                      <th>Tanggal</th>
                      <th>Jam</th>
                      <th>Latitude</th>
                      <th>Longitude</th>
                      <th>Foto</th>
                      <th>Ip Address</th>
                      <th>Telat</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody><?php $no = 1;
            foreach ($absensi_data as $absensi)
            {
                ?>
                    <tr>
                      <td><?= $no++?></td>
                      <td><?php echo $absensi->users_id ?></td>
					  <td><?php echo $absensi->nama_lengkap ?></td>
                      <td><?php echo $absensi->tanggal ?></td>
                      <td><?php echo $absensi->jam ?></td>
                      <td><?php echo $absensi->latitude ?></td>
                      <td><?php echo $absensi->longitude ?></td>
                      <td><?php echo $absensi->foto ?></td>
                      <td><?php echo $absensi->ip_address ?></td>
                      <td><?php echo $absensi->telat ?></td>
                      <td><?php
					  	if ($absensi->status == 1) {
							echo "Masuk";
						} elseif ($absensi->status == 2) {
							echo "Pulang";
						} elseif ($absensi->status == 3) {
							echo "Cuti";
						} elseif ($absensi->status == 4) {
							echo "Izin";
						} elseif ($absensi->status == 5) {
							echo "Sakit";
						} else {
							echo "Tidak Ada Status";
						}
					  ?></td>
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
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.13.2/b-2.3.4/b-html5-2.3.4/datatables.min.js"></script>

  <script>
	$(document).ready(function () {
	  $('#data-table-cool').DataTable({
		"responsive": true,
		"dom": 'Bfrtip',
		"buttons": [
		  'copy', 'csv', 'excel', 'pdf', 'print'
		]
	  });
	});
</script>
