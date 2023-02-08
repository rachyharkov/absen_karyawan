<div id="content" class="app-content">
	<div class="row">
		<div class="col-md-6 ui-sortable">
			<div class="panel panel-inverse" data-sortable-id="form-stuff-1" style="" data-init="true">
	
				<div class="panel-heading ui-sortable-handle">
					<h4 class="panel-title">KELOLA DATA TBL_ABSENSI</h4>
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
	
					<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="formnya">
						<thead>
							<table id="data-table-default" class="table  table-bordered table-hover table-td-valign-middle">
								<tr>
									<td>Users Id <?php echo form_error('users_id') ?></td>
									<td>
										<select name="users_id" id="users_id" class="form-control" required>
											<option value="">-- Ketik Username/Nama Karyawan --</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>Tanggal <?php echo form_error('tanggal') ?></td>
									<td><input type="date" class="form-control" required name="tanggal" id="tanggal" placeholder="Tanggal"
											value="<?php echo $tanggal; ?>" /></td>
								</tr>
								<tr>
									<td>Jam <?php echo form_error('jam') ?></td>
									<td><input type="time" class="form-control" required name="jam" id="jam" placeholder="Jam"
											value="<?php echo $jam; ?>" /></td>
								</tr>
								<tr>
									<td>jenis Absen <?php echo form_error('jenis_absen') ?></td>
									<td>
										<input type="text" name="jenis_absen" id="jenis_absen" value="<?php echo $jenis_absen; ?>" class="form-control" readonly>
									</td>
								</tr>
								<tr>
									<td>Lapangan id <?php echo form_error('lapangan_id') ?></td>
									<td>
									<input type="text" class="form-control" required name="lapangan_id" id="lapangan_id" placeholder="lapangan_id" readonly
											value="<?php echo $lapangan_id; ?>" />
									</td>
								</tr>
								<tr>
									<td>Nama Lapangan</td>
									<td>
									<input type="text" class="form-control" required name="nama_lapangan" id="nama_lapangan" placeholder="nama_lapangan" readonly />
									</td>
								</tr>
								<tr>
									<td>Latitude <?php echo form_error('latitude') ?></td>
									<td><input type="text" class="form-control" required name="latitude" id="latitude" placeholder="Latitude" readonly
											value="<?php echo $latitude; ?>" /></td>
								</tr>
								<tr>
									<td>Longitude <?php echo form_error('longitude') ?></td>
									<td><input type="text" class="form-control" required name="longitude" id="longitude" placeholder="Longitude" readonly
											value="<?php echo $longitude; ?>" /></td>
								</tr>
								<tr>
									<td>Foto <?php echo form_error('foto') ?></td>
									<td>
										<input type="file" class="form-control" required name="foto" id="foto" placeholder="foto" />
										<?php
											if($button == 'Update' && $foto != NULL) {
												?>
													<br>
													<a href="<?php echo base_url('assets/assets/img/bukti_absen/'.$foto) ?>" target="_blank">Lihat foto</a>
													<input type="hidden" name="foto_old" value="<?php echo $foto; ?>" />
												<?php
											}
										?>
									</td>
								</tr>
								<tr>
									<td></td>
									<td><input type="hidden" name="id" value="<?php echo $id; ?>" />
										<button type="submit" class="btn btn-danger"><i class="fas fa-save"></i>
											<?php echo $button ?></button>
										<a href="<?php echo site_url(levelUser($this->session->userdata('level')).'/absensi') ?>"
											class="btn btn-info"><i class="fas fa-undo"></i> Kembali</a>
									</td>
								</tr>
						</thead>
						</table>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-6 ui-sortable">
			<div class="panel panel-inverse" data-sortable-id="form-stuff-1" style="" data-init="true">
	
				<div class="panel-heading ui-sortable-handle">
					<h4 class="panel-title">Peta</h4>
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
					<div id="map" style="width: 100%; height: 500px;">
					</div>
				</div>
			</div>
		</div>
	</div>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
	<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.11.0/js/standalone/selectize.js"></script>

  <script>
  $(document).ready(function() {

		<?php
		if($button == 'Update' || $users_id != NULL) {
			$getdatausers = $this->db->get_where('tbl_users', ['id' => $users_id])->row();
			$idnya = $getdatausers->id;
			$usernamenya = $getdatausers->username;
			$namanya = $getdatausers->nama_lengkap;
			?>
				$('#users_id')[0].selectize.addOption({id: '<?php echo $idnya ?>', text: '<?php echo $namanya.' - '.$usernamenya ?>'});
				$('#users_id')[0].selectize.setValue('<?php echo $idnya ?>');
			<?php
		}
		?>

    function checkKosongLatLong() {
      if ($('#latitude').val() == '' || $('#longitude').val() == '') {
        $('.alert-choose-loc').show();
      } else {
        $('.alert-choose-loc').hide();
      }
    }

		function cleanForm() {
			$('#formnya')[0].reset();
		}

		function addRadius(radius, lat, lng) {

			// remove old circle
			getLocationMap.eachLayer(function (layer) {
				if (layer instanceof L.Circle) {
					getLocationMap.removeLayer(layer);
				}
			});

			const circle = L.circle([lat, lng], {
				color: 'red',
				fillColor: '#f03',
				fillOpacity: 0.5,
				radius: radius
			}).addTo(getLocationMap);
		}

		function getInfoAbsensi() {
			var value = $('#users_id').val();
			var tanggal = $('#tanggal').val();

			if(value != '' && tanggal != '') {
				$.ajax({
					url: '<?php echo base_url('admin/manage_users/get_info') ?>',
					type: 'GET',
					dataType: 'json',
					data: {
						id: value,
						tanggal: tanggal
					},
					error: function() {
						callback();
					},
					success: function(res) {

						if(res.jenis_absen == 'udah_absen') {
							Swal.fire({
								icon: 'error',
								title: 'Oops...',
								text: 'Karyawan sudah absen tanggal '+ new Date(tanggal).toLocaleDateString('id-ID') +'! Silahkan pilih tanggal lain.',
							})
							cleanForm()
							return false;
						}

						$('#latitude').val(res.latitude)
						$('#longitude').val(res.longitude)
						$('#lapangan_id').val(res.id)
						$('#nama_lapangan').val(res.nama_lapangan)
						$('#jenis_absen').val(res.jenis_absen)
						getToLoc(res.latitude, res.longitude)
						addRadius(res.radius_diizinkan, res.latitude, res.longitude)
					}
				})
			}
		}

    var delay = (function() {
      var timer = 0;
      return function(callback, ms) {
        clearTimeout(timer);
        timer = setTimeout(callback, ms);
      };
    })()

    // ref: https://switch2osm.org/using-tiles/getting-started-with-leaflet/


    // initialize map
    const getLocationMap = L.map('map');

    // initialize OSM
    const osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
    const osmAttrib = 'Leaflet © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors';
    const osm = new L.TileLayer(osmUrl, {
      minZoom: 8,
      maxZoom: 50,
      attribution: osmAttrib
    });
    // render map

    getLocationMap.scrollWheelZoom.disable()
		getLocationMap.setView(new L.LatLng('-6.175392', '106.827153'), 14)
    getLocationMap.addLayer(osm)
    // initial hidden marker, and update on click
    const getLocationMapMarker = L.marker([0, 0]).addTo(getLocationMap);

    function getToLoc(lat, lng) {
      const zoom = 17;

      $.ajax({
        url: `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`,
        dataType: 'json',
        success: function(data) {
          $('#latitude').val(lat)
          $('#longitude').val(lng)
        }
      });
      getLocationMap.setView(new L.LatLng(lat, lng), zoom);
      getLocationMapMarker.setLatLng([lat, lng])
      $('.results').hide();
      checkKosongLatLong()

    }

    <?php
			if($button == 'Update' || $users_id != NULL) {
				echo "getToLoc($latitude, $longitude)";
			}
		?>

			$('#users_id').selectize({
			// fetch data from api
			valueField: 'id',
			labelField: 'text',
			searchField: 'text',
			options: [],
			create: false,
			load: function(query, callback) {
				if (!query.length) return callback();
				$.ajax({
					url: '<?php echo base_url('admin/cuti/get_user_by_name_or_username') ?>',
					type: 'GET',
					dataType: 'json',
					data: {
						q: query,
					},
					error: function() {
						callback();
					},
					success: function(res) {
						callback(res.data);
					}
				});
			},
			onChange: function(value) {
				getInfoAbsensi()
			}
		});

		$(document).on('change', '#tanggal', function() {
			getInfoAbsensi()
		})
  })
  </script>
</div>
