<style>
	.modal-backdrop {
		z-index: -1;
	}
</style>
<div id="content" class="app-content">
  <div class="col-md-7 ui-sortable">
    <div class="panel panel-inverse" data-sortable-id="form-stuff-1" style="" data-init="true">

      <div class="panel-heading ui-sortable-handle">
        <h4 class="panel-title">KELOLA DATA TBL_KARYAWAN</h4>
        <div class="panel-heading-btn">
          <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"
            data-bs-original-title="" title="" data-tooltip-init="true"><i class="fa fa-expand"></i></a>
          <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i
              class="fa fa-redo"></i></a>
          <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i
              class="fa fa-minus"></i></a>
          <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i
              class="fa fa-times"></i></a>
        </div>
      </div>
      <div class="panel-body">

        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
          <thead>
            <table id="data-table-default" class="table  table-bordered table-hover table-td-valign-middle">
              <?php
						if($button == 'Update') {
							?>
              <input type="hidden" class="form-control" name="id_user" id="id_user" placeholder="Id User"
                value="<?php echo $id_user; ?>" />
              <?php
						}?>
						<tr>
                <td>Nik <?php echo form_error('nik') ?></td>
                <td><input type="text" class="form-control" name="nik" id="nik" placeholder="Nik"
                    value="<?php echo $nik; ?>" /></td>
              </tr>
              <tr>
                <td>Nama Lengkap <?php echo form_error('nama_lengkap') ?></td>
                <td> <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap"
                    placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>"></td>
              </tr>
              <tr>
                <td>Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></td>
                <td>
									<select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
										<option value="Laki-Laki" <?php if($jenis_kelamin == 'Laki-Laki') echo 'selected'; ?>>Laki-Laki</option>
										<option value="Perempuan" <?php if($jenis_kelamin == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
									</select>
								</td>
              </tr>

              <tr>
                <td>Alamat <?php echo form_error('alamat') ?></td>
                <td> <textarea class="form-control" rows="3" name="alamat" id="alamat"
                    placeholder="Alamat"><?php echo $alamat; ?></textarea></td>
              </tr>
              <tr>
                <td>Email <?php echo form_error('email') ?></td>
                <td><input type="text" class="form-control" name="email" id="email" placeholder="Email"
                    value="<?php echo $email; ?>" /></td>
              </tr>
              <tr>
                <td>No Telp <?php echo form_error('no_telp') ?></td>
                <td><input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="No Telp"
                    value="<?php echo $no_telp; ?>" /></td>
              </tr>
							<tr>
								<td>Akun <?php echo form_error('username') ?><br><?php echo form_error('password') ?></td>
								<td>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="checkBuatAkun" id="checkBuatAkun" <?= $punya_akun['status'] == true ? 'checked': '' ?>>
										<label class="form-check-label" for="checkBuatAkun">Buat Akun?</label>
									</div>
									<div class="form-akun" style="<?= $punya_akun['status'] == true ? 'display: block': 'display: none' ?>">
										<div class="input-group">
											<span class="input-group-text w-25" id="basic-addon1">Username</span>
											<input type="text" class="form-control" name="username" id="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="<?= $punya_akun['status'] == true ? $punya_akun['username']: ''; ?>">
										</div>
										<div class="input-group mt-2">
											<span class="input-group-text w-25" id="basic-addon1">Password</span>
											<input type="password" class="form-control" name="password" id="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" value="">
										</div>
											<?php
												if($button == 'Update') {
													?>
														<span class="text-danger">*Kosongkan jika tidak ingin mengubah password</span>
													<?php
												}
											?>
										<div class="input-group mt-2">
											<input type="file" class="form-control" name="foto" id="foto" placeholder="Foto" aria-label="Foto" aria-describedby="basic-addon1">
											<button class="btn btn-outline-secondary btn-see-photo" type="button" id="button-addon1">Lihat Foto</button>
										</div>
									</div>
								</td>
							</tr>
              <tr>
                <td></td>
                <td><input type="hidden" name="id" value="<?php echo $id; ?>" />
                  <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i>
                    <?php echo $button ?></button>
                  <a href="<?php echo site_url('karyawan') ?>" class="btn btn-info"><i class="fas fa-undo"></i>
                    Kembali</a>
                </td>
              </tr>
          </thead>
          </table>
        </form>
      </div>
    </div>
  </div>
	<div class="modal fade" id="modalFoto" tabindex="-1" aria-labelledby="modalFotoLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalFotoLabel">Foto</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<img src="<?= base_url('assets/assets/img/user/') . $punya_akun['photo']; ?>" alt="Foto" class="img-fluid">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	<script>
		$(document).ready(function() {
			$('#checkBuatAkun').click(function() {
				if($(this).is(':checked')) {
					$('.form-akun').show();
				} else {
					$('.form-akun').hide();
				}
			});

			$('#foto').change(function() {
				if($(this).val() != '') {
					var foto = $(this)[0].files[0];
					var reader = new FileReader();
					reader.onload = function(e) {
						$('#modalFoto img').attr('src', e.target.result);
					}
					reader.readAsDataURL(foto);
				}
			});

			$('.btn-see-photo').click(function() {
				<?php
					if($button == 'Update') {
						?>
							$('#modalFoto').modal('show');
						<?php
					} else {
						?>
							if($('#foto').val() != '') {
								$('#modalFoto').modal('show');
							} else {
								alert('Foto belum dipilih');
							}
						<?php
					}	
				?>
			});

		});
	</script>
</div>
