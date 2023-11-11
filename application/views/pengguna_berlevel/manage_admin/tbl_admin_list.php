<div id="content" class="app-content">
	<h1 class="page-header">DATA ADMIN USER</h1>
	<div class="panel panel-inverse">
		<div class="panel-heading">
			<h4 class="panel-title"></h4>
			<div class="panel-heading-btn">
				<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
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
										<?php echo anchor(site_url(levelUser($this->session->userdata('level')) . '/manage_admin/create'), '<i class="fas fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm tambah_data"'); ?>
									</div>
								</div>
							</div>
							<div class="box-body" style="overflow-x: scroll; ">
								<table id="data-table-default" class="table table-bordered table-hover table-td-valign-middle text-white">
									<thead>
										<tr>
											<th>No</th>
											<th>Photo</th>
											<th>Username</th>
											<th>Password</th>
											<th>Level</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody><?php $no = 1;
											foreach ($manage_admin_data as $manage_admin) {
											?>
											<tr>
												<td><?= $no++ ?></td>
												<td><a href="<?php echo base_url('assets/assets/img/user/' . $manage_admin->photo) ?>" target="_blank"><img src="<?php echo base_url('assets/assets/img/user/' . $manage_admin->photo) ?>" width="50px" height="50px"></a></td>
												<td><?php echo $manage_admin->username ?></td>
												<td><?php echo $manage_admin->password ?></td>
												<td><?php echo levelUser($manage_admin->level) ?></td>
												<td style="text-align:center" width="200px">
													<?php
													echo anchor(site_url(levelUser($this->session->userdata('level')) . '/manage_admin/read/' . encrypt_url($manage_admin->id)), '<i class="fas fa-eye" aria-hidden="true"></i>', 'class="btn btn-success btn-sm read_data"');
													echo '  ';
													echo anchor(site_url(levelUser($this->session->userdata('level')) . '/manage_admin/update/' . encrypt_url($manage_admin->id)), '<i class="fas fa-pencil-alt" aria-hidden="true"></i>', 'class="btn btn-primary btn-sm update_data"');
													echo '  ';
													if ($manage_admin->username != 'admin') {
														echo anchor(site_url(levelUser($this->session->userdata('level')) . '/manage_admin/delete/' . encrypt_url($manage_admin->id)), '<i class="fas fa-trash-alt" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm delete_data" Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
