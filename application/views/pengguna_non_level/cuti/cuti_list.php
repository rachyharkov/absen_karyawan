<div id="content" class="app-content">
  <h1 class="page-header">DATA TBL_CUTI</h1>
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
                    <?php echo anchor(site_url(levelUser($this->session->userdata('level')).'/cuti/create'), '<i class="fas fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm tambah_data"'); ?>
                  </div>
                </div>
              </div>
              <div class="box-body" style="overflow-x: scroll; ">
                <table id="data-table-default"
                  class="table table-bordered table-hover table-td-valign-middle text-white">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Users Id</th>
                      <th>Nama Lengkap</th>
											<th>Lampiran</th>
                      <th>Tanggal</th>
											<th>Data Masuk</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody><?php $no = 1;
            foreach ($cuti_data as $cuti)
            {
                ?>
                    <tr>
                      <td><?= $no++?></td>
                      <td><?php echo $cuti->users_id ?></td>
                      <td><?php echo $cuti->nama_lengkap ?></td>
											<td><?= $cuti->lampiran ? '<a href="'.base_url('assets/assets/img/user/cuti/'.$cuti->lampiran).'" target="_blank" class="btn btn-info btn-sm"><i class="fas fa-envelope-open-text" aria-hidden="true"></i></a>' : ''; ?></td>
                      <td><?php echo $cuti->tanggal ?></td>
											<td><?php echo $cuti->created_at ?></td>
                      <td style="text-align: center;font-size: 1.2rem;">
                        <?php
						$arrbutton = array(
							'approved' => [
								'btn' => 'btn-success',
								'icon' => 'fa-check-circle',
								'status' => 'approve',
								'text' => 'Approved'
							],
							'rejected' => [
								'btn' => 'btn-danger',
								'icon' => 'fa-times-circle',
								'status' => 'reject',
								'text' => 'Rejected'
							],
							null => [
								'btn' => 'btn-warning',
								'icon' => 'fa-clock',
								'status' => 'waiting',
								'text' => 'Waiting'
							]
						);
						?>
                        <div class="btn-group">
                          <?php
								foreach($arrbutton as $key => $value) {
									if($key == $cuti->status) {
										echo '<button type="button" class="btn '.$value['btn'].' btn-sm">
											<i class="fas '.$value['icon'].'"></i> '.$value['text'].'
										</button>';
									}
								}
							?>
                        </div>
                      </td>
                      <td style="text-align:center" width="200px">
                      
																	<?php
											if($cuti->status == null) {
												echo anchor(site_url(levelUser($this->session->userdata('level')).'/cuti/delete/'.encrypt_url($cuti->id)),'<i class="fas fa-trash-alt" aria-hidden="true"></i>','class="btn btn-danger btn-sm delete_data" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
					
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
</div>
<script>
$(document).ready(function() {
  
})
</script>
