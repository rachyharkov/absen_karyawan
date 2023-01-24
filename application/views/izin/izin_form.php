<div id="content" class="app-content">
<div class="col-md-6 ui-sortable">
<div class="panel panel-inverse" data-sortable-id="form-stuff-1" style="" data-init="true">

<div class="panel-heading ui-sortable-handle">
<h4 class="panel-title">KELOLA DATA IZIN</h4>
<div class="panel-heading-btn">
<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand" data-bs-original-title="" title="" data-tooltip-init="true"><i class="fa fa-expand"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
</div>
</div>
<div class="panel-body">
        
            <form action="<?php echo $action; ?>" method="post">
            <thead>
            <table id="data-table-default" class="table  table-bordered table-hover table-td-valign-middle">
	    <tr><td >Id User <?php echo form_error('id_user') ?></td><td><input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" /></td></tr>
	    <tr><td >Tanggal <?php echo form_error('tanggal') ?></td><td><input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" /></td></tr>
	    
        <tr><td >Alasan Izin <?php echo form_error('alasan_izin') ?></td><td> <textarea class="form-control" rows="3" name="alasan_izin" id="alasan_izin" placeholder="Alasan Izin"><?php echo $alasan_izin; ?></textarea></td></tr>
	    <tr><td >Status <?php echo form_error('status') ?></td><td><input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_izin" value="<?php echo $id_izin; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('izin') ?>" class="btn btn-info"><i class="fas fa-undo"></i> Kembali</a></td></tr>
</thead>
	</table></form>        </div>
</div>
</div>
</div>